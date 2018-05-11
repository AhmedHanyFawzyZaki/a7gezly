<?php

/**
 * This is the model class for table "room_condition".
 *
 * The followings are the available columns in table 'room_condition':
 * @property integer $id
 * @property string $condition
 * @property string $condition_ar
 * @property integer $persons_no
 * @property string $price
 *
 * The followings are the available model relations:
 * @property Booking[] $bookings
 * @property RoomCoditionRelation[] $roomCoditionRelations
 * @property TripRoomCoditionRelation[] $tripRoomCoditionRelations
 */
class RoomCondition extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'room_condition';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('persons_no', 'numerical', 'integerOnly' => true),
            array('price', 'length', 'max' => 10),
            array('condition, condition_ar', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, condition, condition_ar, persons_no, price', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'bookings' => array(self::HAS_MANY, 'Booking', 'condition_id'),
            'roomCoditionRelations' => array(self::HAS_MANY, 'RoomCoditionRelation', 'condition_id'),
            'tripRoomCoditionRelations' => array(self::HAS_MANY, 'TripRoomCoditionRelation', 'condition_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'condition' => ' Condition',
           // 'condition_ar' => 'Arabic Condition',
            'persons_no' => 'Persons Number',
            'price' => 'Price',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('condition', $this->condition, true);
        $criteria->compare('condition_ar', $this->condition_ar, true);
        $criteria->compare('persons_no', $this->persons_no);
        $criteria->compare('price', $this->price, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return RoomCondition the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function __set($name, $value) {
        if (EMHelper::WinnieThePooh($name, $this->behaviors()))
            $this->{$name} = $value;
        else
            parent::__set($name, $value);
    }

    /**
     * behaviors 
     * 
     * @return array
     */
    public function behaviors() {
        return array(
            'EasyMultiLanguage' => array(
                'class' => 'ext.EasyMultiLanguage.EasyMultiLanguageBehavior',
                'translated_attributes' => array('condition'),
                'languages' => Yii::app()->params['languages'],
                'default_language' => Yii::app()->params['default_language'],
                'admin_routes' => array('admin/roomCondition/view', 'admin/roomCondition/update'),
                'translations_table' => 'translations',
            ),
        );
    }

}
