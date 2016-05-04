<?php

class CarrierController extends Controller {

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
        $model = new Carrier;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Carrier'])) {
            $model->attributes = $_POST['Carrier'];
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

        if (isset($_POST['Carrier'])) {
            $model->attributes = $_POST['Carrier'];
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
        $dataProvider = new CActiveDataProvider('Carrier');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Carrier('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Carrier']))
            $model->attributes = $_GET['Carrier'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Carrier the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Carrier::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Carrier $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'carrier-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionGetCarrier() {
        $client_id = $_GET['id'];
        $client_name = $_GET['Company_name'];
        $model = new Carrier('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Carrier']))
            $model->attributes = $_GET['Carrier'];

        $this->render('admin', array(
            'model' => $model,
            'client_name' => $client_name,
            'client_id' => $client_id,
        ));
    }
        public function actionCall() {
        $client_id = $_GET['id'];
        $data =array ('client_id'=>$client_id);
        $this->render('call',$data);
        ;
    }
    
    public function actionSaveCall(){
      $user=User::model()->find('id=:id', array(':id'=>Yii::app()->user->id));
      $user_name = $user['first_name'].' '.$user['last_name'];
       $id = $_POST['id'];
       $comment = $_POST['comment'];
        $post = Carrier::model()->findByPk($id);
        $post->Comment = $comment.'( '.$user_name.')';
        $post->Last_Activity_Date = date('Y-m-d');
        $post->save();
        
        $reports = new UserReports;
        $reports->client_id = (int) $id;
        $reports->user_id = (int) Yii::app()->user->id;
        $reports->action = 1;
        $reports->comment = $comment;
        $reports->date = date('Y-m-d');
        $reports->save();

        $model = new Carrier('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Carrier']))
            $model->attributes = $_GET['Carrier'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

}
