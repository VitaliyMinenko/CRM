<?php

class DirectionController extends Controller {

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
        $model = new Direction;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Direction'])) {
            $model->attributes = $_POST['Direction'];
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

        if (isset($_POST['Direction'])) {
            $model->attributes = $_POST['Direction'];
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
        $dataProvider = new CActiveDataProvider('Direction');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Direction('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Direction']))
            $model->attributes = $_GET['Direction'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Direction the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Direction::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Direction $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'direction-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionSetDirection() {

        $route_id = $_GET['id'];
        $route_name = $_GET['route'];
        $carrier_name = $_GET['carrier_name'];
        $carrier_id = $_GET['carrier_id'];
        $client_name = $_GET['client_name'];
        $client_id = $_GET['client_id'];

        $this->render('createDirection', array('route_id' => $route_id,
            'route_name' => $route_name,
            'carrier_name' => $carrier_name,
            'carrier_id' => $carrier_id,
            'client_name' => $client_name,
            'client_id' => $client_id,
        ));
    }

    public function actionCreateDirection() {
 
        $Directory = new Direction;
        $Directory->date = $_POST['date'];
        $Directory->comment = $_POST['comment'];
        $Directory->cost = $_POST['cost'];
        $Directory->client = $_POST['client_name'];
        $Directory->Shipping = $_POST['route_name'];
        $Directory->carrier = $_POST['carrier_name'];
        $Directory->client_id = $_POST['client_id'];
        $Directory->carrier_id = $_POST['carrier_id'];
        $Directory->shipping_id = $_POST['route_id'];
        $Directory->manager_id = Yii::app()->user->id;
        $Directory->save();
        if ($Directory->save()) {
            $model = new UserReports;
            $model->user_id = (int) Yii::app()->user->id;
            $model->client_id = $_POST['client_id'];
            $model->action = 3;
            $model->comment =  $_POST['comment'];
            $model->date = $_POST['date'];
            $model->save();
        }
        $this->redirect(array('view', 'id' => $Directory->id));
    }

    public function actionMyDirection() {
        $model = new Direction('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Direction']))
            $model->attributes = $_GET['Direction'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionDone() {
        $id = $_GET['id'];
        $model = Direction::model()->findByPk($id);
        $model->done = 1;
        if ($model->save()) {
            $this->actionAdmin();
        }
    }

}
