<?php

/**
 * This is the model class for table "carrier".
 *
 * The followings are the available columns in table 'carrier':
 * @property string $id
 * @property string $name
 * @property string $City
 * @property string $Direcotrs_name
 * @property string $Phone
 * @property double $Load_capacity
 * @property string $Body
 * @property string $Direction  volume
 * @property string $volume
 * @property string $Direction_id
 * @property string $Special_requirements
 * @property string $Comment
 * @property string $Last_Activity_Date
 */
class Carrier extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'carrier';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, City, Direcotrs_name, Phone, Load_capacity, Body, Last_Activity_Date', 'required'),
			array('name, City, Direcotrs_name,volume, Special_requirements', 'length', 'max'=>255),
			array('Phone, Body, Direction', 'length', 'max'=>2000),
			array('Comment', 'length', 'max'=>1000),
                                                array('Direction_id', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, City, Direcotrs_name, Phone, Load_capacity, Body,volume, Direction,Direction_id, Special_requirements, Comment, Last_Activity_Date', 'safe', 'on'=>'search'),
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
			'name' => 'Название',
			'City' => 'Город',
			'Direcotrs_name' => 'Имя директорв',
			'Phone' => 'телефон',
			'Load_capacity' => 'Грузоподьемность',
			'Body' => 'Тип Кузова',
			'Direction' => 'Направление',
                                                'Direction_id' => 'id направления',
			'Special_requirements' => 'Особые требования',
			'Comment' => 'Коментарий',
			'Last_Activity_Date' => 'Дата последней активности',
                                                'volume' => 'Объем'
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('City',$this->City,true);
		$criteria->compare('Direcotrs_name',$this->Direcotrs_name,true);
		$criteria->compare('Phone',$this->Phone,true);
		$criteria->compare('Load_capacity',$this->Load_capacity);
		$criteria->compare('Body',$this->Body,true);
		$criteria->compare('Direction',$this->Direction,true);
                                $criteria->compare('Direction_id',$this->Direction_id,true);
		$criteria->compare('Special_requirements',$this->Special_requirements,true);
                                $criteria->compare('Comment',$this->Comment,true);
		$criteria->compare('volume',$this->volume,true);
		$criteria->compare('Last_Activity_Date',$this->Last_Activity_Date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                                                 'pagination'=>array(
                                                'pageSize'=>30,
                                            ),
                                             'sort' => array(
                                            'defaultOrder' => 'id DESC',
                                          ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Carrier the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
