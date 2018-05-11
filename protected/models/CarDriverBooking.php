<?php

/**
 * This is the model class for table "car_driver_booking".
 *
 * The followings are the available columns in table 'car_driver_booking':
 * @property integer $id
 * @property string $name
 * @property string $number
 * @property string $email
 * @property integer $location_id
 * @property string $picked_date
 * @property string $picked_time
 * @property integer $with_return
 * @property string $city
 * @property string $area
 * @property string $return_date
 * @property string $return_time
 * @property integer $driver_id
 * @property integer $car_id
 * @property string $price
 *
 * The followings are the available model relations:
 * @property Car $car
 * @property CarLocation $location
 * @property Driver $driver
 */
class CarDriverBooking extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CarDriverBooking the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'car_driver_booking';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('location_id, with_return, driver_id, car_id', 'numerical', 'integerOnly'=>true),
			array('name, number, email, picked_date, picked_time, city, area, return_date, return_time, price', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, number, email, location_id, picked_date, picked_time, with_return, city, area, return_date, return_time, driver_id, car_id, price', 'safe', 'on'=>'search'),
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
			'car' => array(self::BELONGS_TO, 'Car', 'car_id'),
			'location' => array(self::BELONGS_TO, 'CarLocation', 'location_id'),
			'driver' => array(self::BELONGS_TO, 'Driver', 'driver_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'number' => 'Number',
			'email' => 'Email',
			'location_id' => 'Location',
			'picked_date' => 'Picked Date',
			'picked_time' => 'Picked Time',
			'with_return' => 'With Return',
			'city' => 'City',
			'area' => 'Area',
			'return_date' => 'Return Date',
			'return_time' => 'Return Time',
			'driver_id' => 'Driver',
			'car_id' => 'Car',
			'price' => 'Price',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('number',$this->number,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('location_id',$this->location_id);
		$criteria->compare('picked_date',$this->picked_date,true);
		$criteria->compare('picked_time',$this->picked_time,true);
		$criteria->compare('with_return',$this->with_return);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('return_date',$this->return_date,true);
		$criteria->compare('return_time',$this->return_time,true);
		$criteria->compare('driver_id',$this->driver_id);
		$criteria->compare('car_id',$this->car_id);
		$criteria->compare('price',$this->price,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}