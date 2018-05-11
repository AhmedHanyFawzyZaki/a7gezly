<?php

/**
 * This is the model class for table "booking".
 *
 * The followings are the available columns in table 'booking':
 * @property integer $id
 * @property integer $trip_id
 * @property integer $user_id
 * @property integer $total_price
 * @property integer $payment_way
 * @property integer $payment_status
 * @property string $fullName
 * @property string $email
 * @property string $address
 * @property string $phone
 * @property string $created
 * @property integer $total_persons
 *
 * The followings are the available model relations:
 * @property Trip $trip
 * @property User $user
 * @property BookingDetails[] $bookingDetails
 */
class Booking extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Booking the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'booking';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            // array('trip_id, user_id, total_price, payment_way,payment_status, total_persons', 'numerical', 'integerOnly' => true),
            array('trip_id, user_id, total_price,payment_status, total_persons', 'numerical', 'integerOnly' => true),
            array('fullName, email, address, phone, created', 'length', 'max' => 255),
            // array('fullName, email, address, phone, created', 'required'),
            array('fullName ', 'required', 'message' => Helper::t('من فضلك أدخل الأسم')),
            array('payment_way ', 'numerical', 'message' => 'من فضلك اختر طريقة الدفع'),
            array('email ', 'required', 'message' =>  Helper::t('من فضلك أدخل البريد الأكترونى')),
            array('email', 'email', 'message' => Helper::t('من فضلك أدخل البريد الأكترونى بشكل صحيح')),
            array('address ', 'required', 'message' => Helper::t('من فضلك أدخل العنوان')),
            array('phone', 'numerical', 'message' => Helper::t('رقم الهاتف أرقام فقط')),
            array('phone ', 'required', 'message' => Helper::t('من فضلك ادخل الهاتف')),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, trip_id, user_id, total_price, payment_way, payment_status, fullName, email, address, phone, created, total_persons', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'trip' => array(self::BELONGS_TO, 'Trip', 'trip_id'),
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            'bookingDetails' => array(self::HAS_MANY, 'BookingDetails', 'booking_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'trip_id' => 'Trip',
            'user_id' => 'User',
            'total_price' => 'Total Price',
            'payment_way' => 'Payment Way',
            'payment_status' => 'Payment Status',
            'fullName' => 'Full Name',
            'email' => 'Email',
            'address' => 'Address',
            'phone' => 'Phone',
            'created' => 'Created',
            'total_persons' => 'Total Persons',
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
        $criteria->compare('trip_id', $this->trip_id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('total_price', $this->total_price);
        $criteria->compare('payment_way', $this->payment_way);
        $criteria->compare('payment_status', $this->payment_status);
        $criteria->compare('LOWER(fullName)', strtolower($this->fullName), true);
        $criteria->compare('LOWER(email)', strtolower($this->email), true);
        $criteria->compare('LOWER(address)', strtolower($this->address), true);
        $criteria->compare('LOWER(phone)', strtolower($this->phone), true);
        $criteria->compare('LOWER(created)', strtolower($this->created), true);
        $criteria->compare('total_persons', $this->total_persons);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getPaymentWay($value) {
        return $value = 1 ? Helper::t('يتم التحصيل مباشرة') : 'paypal';
    }

    public function getPaymentStatus($value) {
        if ($value == 1)
            $value = Helper::t('تم');
        
        if ($value == 2)
            $value = Helper::t('تم الالغاء');
        if ($value == 3)
            $value = Helper::t('معلقة');
        return $value;
    }

    function GetBookDetails($id) {
        $criteria = new CDbCriteria;
        $criteria->condition = 'booking_id=:id';
        $criteria->params = array(':id' => $id);
        $details = BookingDetails::model()->findAll($criteria);
        return $details ;
        
    }

}
