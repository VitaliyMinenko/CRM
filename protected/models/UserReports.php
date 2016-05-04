<?php

/**
 * This is the model class for table "user_reports".
 *
 * The followings are the available columns in table 'user_reports':
 * @property string $id
 * @property integer $user_id
 * @property integer $client_id 
 * @property integer $carrier_id
 * @property integer $action
 * @property string $comment
 * @property string $date
 */
class UserReports extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_reports';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, client_id, action,date', 'required'),
			array('user_id, client_id,carrier_id, action', 'numerical', 'integerOnly'=>true),
			array('comment', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, client_id, action,carrier_id, comment, date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'client_id' => 'Client',
                                                'carrier_id'=>'Carrier',
			'action' => 'Action',
			'comment' => 'Comment',
			'date' => 'Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('client_id',$this->client_id);
                                $criteria->compare('carrier_id',$this->carrier_id);
		$criteria->compare('action',$this->action);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('date',$this->date,true);
                                $criteria->condition = 'user_id = :user_id AND date BETWEEN :start AND :stop';
                                $criteria->params = array(':user_id'=>$user_id,':start'=>$start,':stop'=>$stop);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                                                 'pagination'=>array(
                                                'pageSize'=>30,
                                            ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserReports the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
                public function getUsers() {
                    $connection = Yii::app()->db;
                    $sql = 'SELECT first_name,last_name,id FROM user WHERE deleted <> 1';
                    $command = $connection->createCommand($sql);
                  //  $command->bindValue(":user_id", $user_id, PDO::PARAM_INT);
                    $rows = $command->queryAll();
                    return $rows;
                }
                
                public function getByDate($user_id,$start,$stop){
                    $connection = Yii::app()->db;
                    $sql = 'SELECT clients.Company_name,user.first_name,user.last_name,user_reports.action,user_reports.comment,user_reports.date,user_reports.id FROM user_reports 
                                LEFT JOIN clients ON user_reports.client_id = clients.id 
                                LEFT JOIN user ON user_reports.user_id = user.id
                                WHERE user_id = :user_id 
                                AND date 
                                BETWEEN :start
                                AND :stop'
                                ;
                    $command = $connection->createCommand($sql);
                    $command->bindValue(":user_id", $user_id, PDO::PARAM_INT);
                    $command->bindValue(":start", $start, PDO::PARAM_INT);
                    $command->bindValue(":stop", $stop, PDO::PARAM_INT);
                    $rows = $command->queryAll();
                    
                    return $rows;
                    
                }
}
