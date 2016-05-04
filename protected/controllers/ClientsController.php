<?php

class ClientsController extends Controller {

    public function init() {

        if (!Yii::app()->user->checkAccess(1) &&
                !Yii::app()->user->checkAccess(2) &&
                //!Yii::app()->user->checkAccess(3) &&
                !Yii::app()->user->checkAccess(3)
        ) {
            throw new CHttpException(403, 'Forbidden');
        }
    }

    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Clients;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Clients'])) {
            $model->attributes = $_POST['Clients'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Clients'])) {
            $model->attributes = $_POST['Clients'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Clients');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Clients('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Clients']))
            $model->attributes = $_GET['Clients'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Clients the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Clients::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Clients $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'clients-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function __call($name, $arguments) {
        
    }

    public function actionWork() {
        $uzver = $_GET;
        $this->render('work', array('uzver' => $uzver));
    }

    public function actionSetReport() {
        $id = $_POST['id'];
        $comment = $_POST['comment'];
        if (empty($comment)) {
            echo 'Комментарий не может быть пустым';
            return;
        }
        $act = $_POST['action'];
        if ($act == 'button_call') {
            $action = 1;
        } elseif ($act == 'button_mail') {
            $action = 6;
        } elseif ($act == 'button_meet') {
            $action = 2;
        } elseif ($act == 'button_agreement') {
            $action = 3;
        } elseif ($act == 'button_other') {
            $action = 4;
        }

        $model = new UserReports;
        $model->client_id = (int) $id;
        $model->user_id = (int) Yii::app()->user->id;
        $model->action = (int) $action;
        $model->comment = $comment;
        $model->date = date('Y-m-d');
        $r = $model->save();
        if ($r == true) {
            echo 'Запись успешно добавлена в отчет';
        } else {
            echo 'Ошибка в сохранени';
        }
    }

    public function actionAddPlane() {
        $comment = $_POST['comment'];
        $dt = $_POST['dt'];
        if (empty($comment)) {
            echo 'Комментарий не может быть пустым';
            return;
        }
        $model = new UserPlanes;
        $model->user_id = (int) Yii::app()->user->id;
        $model->comment = $comment;
        $model->date = $dt;
        $model->resolve = 1;
        $r = $model->save();
        if ($r == true) {
            echo 'Запись успешно добавлена в отчет';
        } else {
            echo 'Ошибка в сохранени';
        }
    }

}
