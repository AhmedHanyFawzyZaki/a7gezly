<?php

/**
 * This is the model class for table "car_booking".
 *
 * The followings are the available columns in table 'car_booking':
 * @property integer $id
 * @property integer $days
 * @property string $price
 * @property string $start_date
 * @property string $start_time
 * @property string $deliver_date
 * @property string $delivery_time
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $passport
 * @property string $driving_licence
 * @property string $accomodation_licence
 * @property integer $location_id
 * @property integer $car_id
 *
 * The followings are the available model relations:
 * @property Car $car
 * @property CarLocation $location
 */
class CarBooking extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return CarBooking the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'car_booking';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('days, location_id, car_id', 'numerical', 'integerOnly' => true),
            array('price, start_date, start_time, delivery_time', 'length', 'max' => 100),
            array('deliver_date, name, phone', 'length', 'max' => 150),
            array('email, passport, driving_licence, accomodation_licence', 'length', 'max' => 200),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, days, price, start_date, start_time, deliver_date, delivery_time, name, phone, email, passport, driving_licence, accomodation_licence, location_id, car_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'car' => array(self::BELONGS_TO, 'Car', 'car_id'),
            'location' => array(self::BELONGS_TO, 'CarLocation', 'location_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'days' => 'Days',
            'price' => 'Price',
            'start_date' => 'Start Date',
            'start_time' => 'Start Time',
            'deliver_date' => 'Deliver Date',
            'delivery_time' => 'Delivery Time',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'passport' => 'Passport',
            'driving_licence' => 'Driving Licence',
            'accomodation_licence' => 'Accomodation Licence',
            'location_id' => 'Location',
            'car_id' => 'Car',
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
        $criteria->compare('days', $this->days);
        $criteria->compare('price', $this->price, true);
        $criteria->compare('start_date', $this->start_date, true);
        $criteria->compare('start_time', $this->start_time, true);
        $criteria->compare('deliver_date', $this->deliver_date, true);
        $criteria->compare('delivery_time', $this->delivery_time, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('passport', $this->passport, true);
        $criteria->compare('driving_licence', $this->driving_licence, true);
        $criteria->compare('accomodation_licence', $this->accomodation_licence, true);
        $criteria->compare('location_id', $this->location_id);
        $criteria->compare('car_id', $this->car_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
}
