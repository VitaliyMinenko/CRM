<?php

class PlanesController extends Controller {

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
        $model = new UserPlanes;
        $user_id = Yii::app()->user->id;
        if (isset($_POST['today'])) {
            $dt = $_POST['today'];
        } else {
            $dt = date('Y-m-d');
        }
        $retur = $model->getPlane($user_id, $dt);
        var_dump($dt);
        $this->render('index', array('data' => $retur,'dt' => $dt));
    }

    public function actionResolve() {
        $id = (int) $_POST['id'];
        $model = UserPlanes::model()->findByPk($id);
        $model->resolve = 0;
        $r = $model->save();
        return $r;
    }

}
