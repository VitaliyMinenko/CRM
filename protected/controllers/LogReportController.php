<?php

class LogReportController extends Controller {

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

    public function actionSaveReport() {
        
        $model = new UserReports;
        $model->user_id = (int) Yii::app()->user->id;
        $model->client_id = 0;
        $model->action = 1;
        $model->comment = $_POST['comment'];
        $model->date = date('Y-m-d');
        $model->save();
        $this->render('index');
        Yii::app()->user->setFlash('success',"Запись добавлена в отчет");
        Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".info").animate({opacity: 1.0}, 30).fadeOut("slow");',
   CClientScript::POS_READY
);
    }
        

}
