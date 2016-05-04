<?php

class CustomQueryController extends Controller
{
          public function init() {

        if (!Yii::app()->user->checkAccess(1) &&
                !Yii::app()->user->checkAccess(2) &&
                //!Yii::app()->user->checkAccess(3) &&
                !Yii::app()->user->checkAccess(3) 
        ) {
            throw new CHttpException(403, 'Forbidden');
        }
    }
	public function actionIndex()
	{   
                            
                        
                   $list =  $this->getByDate();
           
         

                                $fp = fopen('file.csv', 'w');

                                foreach ($list as $fields) {
                                    fputcsv($fp, $fields);
                                }

                                fclose($fp);

            
		$this->render('index');
	}
        
               public function getByDate(){
                    $connection = Yii::app()->db;
                    $sql = 'SELECT * FROM user';
                    $command = $connection->createCommand($sql);
                    $rows = $command->queryAll();
                    return $rows;
                    
                }
	
}