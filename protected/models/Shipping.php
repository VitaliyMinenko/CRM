<?php

/**
 * This is the model class for table "shipping".
 *
 * The followings are the available columns in table 'shipping':
 * @property string $id
 * @property string $route
 * @property string $carriers_id
 * @property string $comment
 * @property string $carrier_name
 */
class Shipping extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'shipping';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('route', 'length', 'max' => 250),
            array('carrier_name', 'length', 'max' => 250),
            array('carriers_id', 'length', 'max' => 5000),
            array('comment', 'length', 'max' => 1000),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, route, carriers_id,carrier_name,comment', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'route' => 'Маршрут',
            'carriers_id' => 'ID Перевозчика',
            'comment' => 'Коментарий',
            'carrier_name' => 'Название перевозчика',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('route', $this->route, true);
        $criteria->compare('carriers_id', $this->carriers_id, true);
        $criteria->compare('comment', $this->comment, true);
        $criteria->compare('carrier_name', $this->carrier_name, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 30,
            ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Shipping the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function GetShipping($id) {
        $connection = Yii::app()->db;
        $sql = 'SELECT *  FROM shipping WHERE id = :id';
        $command = $connection->createCommand($sql);
        $command->bindValue(":id", $id, PDO::PARAM_INT);
        $rows = $command->queryAll();
        return $rows;
    }

    public function getCarrier($id) {
        $connection = Yii::app()->db;
        $sql = 'SELECT *  FROM carrier WHERE id = :id';
        $command = $connection->createCommand($sql);
        $command->bindValue(":id", $id, PDO::PARAM_INT);
        $rows = $command->queryAll();
        return $rows;
    }

}
