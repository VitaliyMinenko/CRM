<?php

class ShippingController extends Controller {

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

    public function actionCreate() {
        $model = new Shipping;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Shipping'])) {
            $model->attributes = $_POST['Shipping'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Shipping'])) {
            $model->attributes = $_POST['Shipping'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

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
        $dataProvider = new CActiveDataProvider('Shipping');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new Shipping('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Shipping']))
            $model->attributes = $_GET['Shipping'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = Shipping::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Shipping $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'shipping-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionAddShiping() {

        $name = $_GET['name'];
        $id = $_GET['id'];
        var_dump($_GET);
        $model = new Shipping('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Shipping']))
            $model->attributes = $_GET['Shipping'];

        $this->render('admin', array(
            'model' => $model, 'carrier_name' => $name, 'carrier_id' => $id,
        ));
    }

    public function actionChngShiping() {
        $id = $_GET['id'];
        $carrier_name = $_GET['carrier_name'];
        $carrier_id = $_GET['carrier_id'];
        $route = $_GET['route'];
        $Shipping = new Shipping;
        $items = $Shipping->GetShipping($id);
        $item = $items[0];

        if (!empty($item['carriers_id'])) {
            $carriers_id_arr = explode(', ', $item['carriers_id']);
            array_push($carriers_id_arr, $carrier_id);
            $result = array_unique($carriers_id_arr);
            $final_carriers_id = implode(', ', $result);
        } else {
            $final_carriers_id = $carrier_id;
        }
        if (!empty($item['carrier_name'])) {
            $carriers_name_arr = explode('|', $item['carrier_name']);
            array_push($carriers_name_arr, $carrier_name);
            $res = array_unique($carriers_name_arr);
            $final_carriers_name = implode('|', $res);
        } else {
            $final_carriers_name = $carrier_name;
        }
        $post = Shipping::model()->findByPk($id);
        $post->carriers_id = $final_carriers_id;
        $post->carrier_name = $final_carriers_name;
        $post->save();
        if ($post->save()) {

            $car = $Shipping->getCarrier($carrier_id);
            $carrier = $car[0];
            if (!empty($carrier['Direction'])) {

                $carriers_Direction_arr = explode(' | ', $carrier['Direction']);
                array_push($carriers_Direction_arr, $route);
                $carr = array_unique($carriers_Direction_arr);
                $final_route = implode(' | ', $carr);
            } else {
                $final_route = $route;
            }
            if (!empty($carrier['Direction_id'])) {
                $carriers_Direction_id_arr = explode(', ', $carrier['Direction_id']);
                array_push($carriers_Direction_id_arr, $id);
                $carrid = array_unique($carriers_Direction_id_arr);
                $final_id = implode(', ', $carrid);
            } else {
                $final_id = $id;
            }

            $Carrier = Carrier::model()->findByPk($carrier_id);
            $Carrier->Direction = $final_route;
            $Carrier->Direction_id = $final_id;
            $Carrier->save();
            // var_dump($Carrier->errors);die;
            $this->redirect(array('view', 'id' => $post->id));
        }
    }

    public function actionSelectShiping() {
        $carrier_id = $_GET['id'];
        $carrier_name = $_GET['name'];
        $client_id = $_GET['client_id'];
        $client_name = $_GET['client_name'];
        $model = new Shipping('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Shipping']))
            $model->attributes = $_GET['Shipping'];

        $this->render('admin', array(
            'model' => $model,
            'carrier_id' => $carrier_id,
            'carrier_name' => $carrier_name,
            'client_id' => $client_id,
            'client_name' => $client_name,
        ));
    }

}
