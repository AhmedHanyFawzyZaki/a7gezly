<?php

/**
 * This is the model class for table "booking_details".
 *
 * The followings are the available columns in table 'booking_details':
 * @property integer $id
 * @property integer $booking_id
 * @property integer $room_type_id
 * @property integer $condition_id
 * @property double $bedType_id
 * @property double $room_no *
 * The followings are the available model relations:
 * @property Booking $booking
 */
class BookingDetails extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return BookingDetails the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'booking_details';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id', 'required'),
            array('id, booking_id, room_type_id, condition_id , bedType_id , room_no', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, booking_id, room_type_id, condition_id, bedType_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'booking' => array(self::BELONGS_TO, 'Booking', 'booking_id'),
            'roomType' => array(self::BELONGS_TO, 'RoomType', 'room_type_id'),
            'roomCondition' => array(self::BELONGS_TO, 'RoomCondition', 'condition_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'booking_id' => 'Booking in trip',
            'room_type_id' => 'Room Type',
            'condition_id' => 'Condition',
            'bedType_id' => 'Bed Type',
            'room_no' => 'Room Number',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('booking_id', $this->booking_id);
        $criteria->compare('room_type_id', $this->room_type_id);
        $criteria->compare('condition_id', $this->condition_id);
        $criteria->compare('bedType_id', $this->bedType_id);
        $criteria->compare('room_no', $this->room_no);



        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    function GetTripName($id) {
        $book = Booking::model()->findByPk($id);
        $trip = $book->trip->title_ar;
        return $trip;
    }

}