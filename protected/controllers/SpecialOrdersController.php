<?php

class SpecialOrdersController extends Controller {

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
        $this->render('index');
    }

    public function actionSaveSpecOrders() {

        $comment = $_POST['comment'];
        if (empty($comment)) {
            echo 'Заполните коментарий';
            return false;
        }
        $model = new UserReports;
        $model->user_id = (int) Yii::app()->user->id;
        $model->client_id = 0;
        $model->action = 5;
        $model->comment = $comment;
        $model->date = date('Y-m-d');
        $r = $model->save();
        if ($r == true) {
            echo 'Запись успешно добавлена в отчет';
        } else {
            echo 'Ошибка в сохранени';
        }
    }

}
