<?php

class TestController extends Controller
{
	public function actionIndex()
	{
            
                                   
                $model = new UserReports;
                $reports = $model->getByDate(3, '2012-01-01', '2018-01-01');
    
                $data = new CArrayDataProvider($reports,array(
	           'id'=>'id',
	            'sort'=>array(
	               'attributes'=>array(
	                   'city', 'phone',
	               ),
	           ), 
	           'pagination'=>array(
	               'pageSize'=>1,
	           ),
	       ));
		$this->render('index',array('dataProvider' => $data));
	}


}