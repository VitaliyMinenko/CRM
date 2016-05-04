<?php

class UserReportsController extends Controller {
    
    
        public function init() {

        if (!Yii::app()->user->checkAccess(1) &&
                !Yii::app()->user->checkAccess(2) &&
                //!Yii::app()->user->checkAccess(3) &&
                !Yii::app()->user->checkAccess(3) 
        ) {
            throw new CHttpException(403, 'Forbidden');
        }
    }

    public function actionIndex() {
        $model = new UserReports;
        $all_users = $model->getUsers();
        $users = array();
        foreach ($all_users as $us) {
            $users[$us['id']] = $us['first_name'] . ' ' . $us['last_name'];
        }

        $this->render('index', array('all_users' => $users));
    }

    public function actionGetDay() {
        $class = $_POST['class_name'];
        $user_id = $_POST['user_id'];
        if ($class == "one_day") {
            $start = date('Y-m-d');
            $stop = date('Y-m-d');
        } elseif ($class == "seven_days") {
            $start = date('Y-m-d', strtotime('-7 days'));
            $stop = date('Y-m-d');
        } elseif ($class == "one_month") {
            $start = date('Y-m-d', strtotime('-30 days'));
            $stop = date('Y-m-d');
        } elseif ($class == "one_year") {
            $start = date('Y-m-d', strtotime('-365 days'));
            $stop = date('Y-m-d');
        } elseif ($class == "range") {
            $start = $_POST['start'];
            $stop = $_POST['stop'];
        }
        if (!empty($user_id)) {
            $this->actionRenPart($user_id, $start, $stop);
        }
    }

    public function actionRenPart($user_id, $start, $stop) {
        $model = new UserReports;
        $reports = $model->getByDate($user_id, $start, $stop);
        var_dump($reports);die;
        if (count($reports) != 0) {
            $statisic = array('Совершено звонков' => 0, 'Проведено встречь' => 0, 'Заключено договоров' => 0, 'Иные действия' => 0, 'Особые поручения' => 0,'Отправил mail'=>0);
            foreach ($reports as $report) {
                if ($report['action'] == 1) {
                    $statisic['Совершено звонков'] = $statisic['Совершено звонков'] + 1;
                }
                if ($report['action'] == 2) {
                    $statisic['Проведено встречь'] = $statisic['Проведено встречь'] + 1;
                }
                if ($report['action'] == 3) {
                    $statisic['Заключено договоров'] = $statisic['Заключено договоров'] + 1;
                }
                if ($report['action'] == 4) {
                    $statisic['Иные действия'] = $statisic['Иные действия'] + 1;
                }
                if ($report['action'] == 5) {
                    $statisic['Особые поручения'] = $statisic['Особые поручения'] + 1;
                }
                if ($report['action'] == 6) {
                    $statisic['Отправил mail'] = $statisic['Отправил mail'] + 1;
                }
            }

            arsort($statisic);
            $maxIs100 = max($statisic);
            $one_procent = 100 / $maxIs100;

            foreach ($statisic as $key => $sta) {
                $new_static[$key] = array($sta, ceil($one_procent * $sta));
            }

            $data = new CArrayDataProvider($reports ,
        array(
            'pagination' => array(
                'pageSize' => 999,   
            ),
        )); 
            $this->renderPartial('result', array('dataProvider' => $data, 'statisic' => $new_static, 'maxIs100' => $maxIs100), FALSE, true);
        } else {
            $this->renderPartial('ss');
        }
    }

}
