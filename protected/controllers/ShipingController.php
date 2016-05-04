<?php

class ShipingController extends Controller {

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
        $Shipping = new Shipping;
        if (isset($_POST['name_shipping']) && isset($_POST['comment_shipping'])) {
            $Shipping->comment = $_POST['comment_shipping'];
            $Shipping->route = $_POST['name_shipping'];
            $Shipping->carriers_id = 0;
            $Shipping->carrier_name = '';
            $r = $Shipping->save();
        }
        $this->render('index', array('model' => $Shipping));
    }

    public function actionAddShiping() {
        $name = $_GET['name'];
        $id = $_GET['id'];
        $Shipping = new Shipping;
        $this->render('shipping', array('carrier_name' => $name, 'carrier_id' => $id, 'model' => $Shipping));
    }

    public function actionChngShiping() {
        $id = $_GET['id'];
        $carrier_id = $_GET['carrier_name'];
        $carrier_name = $_GET['carrier_id'];
        $Shipping = new Shipping;
        $item = $Shipping->GetShipping($id);


        if (!empty($item['carriers_id'])) {
            $carriers_id_arr = explode(', ', $item['carriers_id']);
            array_push($carriers_id_arr, $carrier_id);
            $res = array_unique($carriers_id_arr);
            $final_carriers_id = implode(', ', $res);
        } else {
            $final_carriers_id = $carrier_id;
        }
        if (!empty($item['carrier_name'])) {
            $carriers_name_arr = explode('|', $item['carrier_name']);
            array_push($carriers_name_arr, $carrier_id);
            $res = array_unique($carriers_name_arr);
            $final_carriers_name = implode('|', $res);
        } else {
            $final_carriers_name = $carrier_name;
        }
        $post = Shipping::model()->findByPk($id);

        $post->carriers_id = $final_carriers_id;
        $post->carrier_name = $final_carriers_name;
        // $Shipping->route = $item['route'];
        //  $Shipping->comment = $item['comment'];


        $r = $post->save();
        //  var_dump($post->errors);die;
    }

}
