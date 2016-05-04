<?php

/**
 * This is the model class for table "user_planes".
 *
 * The followings are the available columns in table 'user_planes':
 * @property string $id
 * @property integer $user_id
 * @property string $comment
 * @property string $date
 * @property integer $resolve
 */
class UserPlanes extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user_planes';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, comment, date, resolve', 'required'),
            array('user_id, resolve', 'numerical', 'integerOnly' => true),
            array('comment', 'length', 'max' => 1000),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_id, comment, date, resolve', 'safe', 'on' => 'search'),
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
            'user_id' => 'User',
            'comment' => 'Comment',
            'date' => 'Date',
            'resolve' => 'Resolve',
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
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('comment', $this->comment, true);
        $criteria->compare('date', $this->date, true);
        $criteria->compare('resolve', $this->resolve);

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
     * @return UserPlanes the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getPlane($user_id, $dt) {
        $connection = Yii::app()->db;
        $sql = 'SELECT * FROM user_planes 
                                WHERE user_id = :user_id 
                                AND date 
                                BETWEEN :start  
                                AND :stop
                                AND resolve = 1 ORDER BY date ';
        $command = $connection->createCommand($sql);
        $start = $dt . ' 00:00:00';
        $stop = $dt . ' 23:59:00';
        $command->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $command->bindValue(":start", $start, PDO::PARAM_INT);
        $command->bindValue(":stop", $stop, PDO::PARAM_INT);
        $rows = $command->queryAll();

        return $rows;
    }

}
