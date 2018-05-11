<?php

/**
 * This is the model class for table "car_price".
 *
 * The followings are the available columns in table 'car_price':
 * @property integer $id
 * @property integer $car_id
 * @property string $price
 * @property integer $start_days
 * @property integer $end_days
 *
 * The followings are the available model relations:
 * @property Car $car
 */
class CarPrice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CarPrice the static model class
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
		return 'car_price';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('price, car_id', 'required'),
			array('car_id, start_days, end_days', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('id, car_id, price, start_days, end_days', 'safe', 'on'=>'search'),
                        array('id, car_id, price, start_days, end_days', 'safe'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'car_id' => 'Car',
			'price' => 'Price',
			'start_days' => 'Start Days',
			'end_days' => 'End Days',
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
		$criteria->compare('car_id',$this->car_id);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('start_days',$this->start_days);
		$criteria->compare('end_days',$this->end_days);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}