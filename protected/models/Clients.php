<?php

/**
 * This is the model class for table "clients".
 *
 * The followings are the available columns in table 'clients':
 * @property string $id
 * @property string $Company_name
 * @property string $Contact_person
 * @property string $City
 * @property string $phone
 * @property string $email
 * @property string $addres
 * @property string $direction
 * @property string $comment
 * @property string $last_activity_date
 * @property integer $who_add_id
 * @property string $who_add_name
 */
class Clients extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'clients';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Company_name, Contact_person, City, phone, email, addres, direction, comment, last_activity_date, who_add_id, who_add_name', 'required'),
			array('who_add_id', 'numerical', 'integerOnly'=>true),
			array('Company_name, Contact_person, City, phone, email, addres, direction, comment, who_add_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Company_name, Contact_person, City, phone, email, addres, direction, comment, last_activity_date, who_add_id, who_add_name', 'safe', 'on'=>'search'),
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
			'Company_name' => 'Название компании',
			'Contact_person' => 'Контактное Лицо',
			'City' => 'Город',
			'phone' => 'Телефон',
			'email' => 'Email',
			'addres' => 'адрес',
			'direction' => 'Напрвление',
			'comment' => 'Комментарий',
			'last_activity_date' => 'Дата последней активности',
			'who_add_id' => 'Кто добавил',
			'who_add_name' => 'Имя того кто добавил',
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
		$criteria->compare('Company_name',$this->Company_name,true);
		$criteria->compare('Contact_person',$this->Contact_person,true);
		$criteria->compare('City',$this->City,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('addres',$this->addres,true);
		$criteria->compare('direction',$this->direction,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('last_activity_date',$this->last_activity_date,true);
		$criteria->compare('who_add_id',$this->who_add_id);
		$criteria->compare('who_add_name',$this->who_add_name,true);

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
	 * @return Clients the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
