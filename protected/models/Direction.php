<?php

/**
 * This is the model class for table "direction".
 *
 * The followings are the available columns in table 'direction':
 * @property string $id
 * @property integer $client_id
 * @property integer $carrier_id
 * @property integer $shipping_id
 * @property string $client
 * @property string $carrier
 * @property string $Shipping
 * @property string $date
 * @property string $comment
 * @property double $cost
 * @property integer $manager_id
 * @property integer $done
 */
class Direction extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'direction';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('client_id, carrier_id, shipping_id, client, carrier, Shipping, date, cost, manager_id', 'required'),
            array('client_id, carrier_id, shipping_id,done, manager_id', 'numerical', 'integerOnly' => true),
            array('cost', 'numerical'),
            array('client, carrier, Shipping', 'length', 'max' => 255),
            array('comment', 'length', 'max' => 1000),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, client_id, carrier_id, shipping_id, client, carrier,done, Shipping, date, comment, cost, manager_id', 'safe', 'on' => 'search'),
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
            'client_id' => 'ID Клиента',
            'carrier_id' => 'Carrier',
            'shipping_id' => 'Shipping',
            'client' => 'Client',
            'carrier' => 'Carrier',
            'Shipping' => 'Shipping',
            'date' => 'Date',
            'comment' => 'Comment',
            'cost' => 'Cost',
            'manager_id' => 'Manager',
            'done' => 'done'
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
        if (Yii::app()->user->checkAccess('3')) {
            $criteria = new CDbCriteria;
            $criteria->compare('id', $this->id, true);
            $criteria->compare('client_id', $this->client_id);
            $criteria->compare('carrier_id', $this->carrier_id);
            $criteria->compare('shipping_id', $this->shipping_id);
            $criteria->compare('client', $this->client, true);
            $criteria->compare('carrier', $this->carrier, true);
            $criteria->compare('Shipping', $this->Shipping, true);
            $criteria->compare('date', $this->date, true);
            $criteria->compare('comment', $this->comment, true);
            $criteria->compare('cost', $this->cost);
            $criteria->compare('manager_id', Yii::app()->user->id);
            $criteria->compare('done', 0);
            return new CActiveDataProvider($this, array(
                'criteria' => $criteria,
                'pagination' => array(
                    'pageSize' => 30,
                ),
            ));
        } else {
            $criteria = new CDbCriteria;
            $criteria->compare('id', $this->id, true);
            $criteria->compare('client_id', $this->client_id);
            $criteria->compare('carrier_id', $this->carrier_id);
            $criteria->compare('shipping_id', $this->shipping_id);
            $criteria->compare('client', $this->client, true);
            $criteria->compare('carrier', $this->carrier, true);
            $criteria->compare('Shipping', $this->Shipping, true);
            $criteria->compare('date', $this->date, true);
            $criteria->compare('comment', $this->comment, true);
            $criteria->compare('cost', $this->cost);
            $criteria->compare('manager_id', $this->manager_id, true);

            return new CActiveDataProvider($this, array(
                'criteria' => $criteria, 'pagination' => array(
                    'pageSize' => 30,
                ),
            ));
        }
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Direction the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
