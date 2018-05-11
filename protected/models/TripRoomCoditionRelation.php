<?php

/**
 * This is the model class for table "trip_room_codition_relation".
 *
 * The followings are the available columns in table 'trip_room_codition_relation':
 * @property integer $id
 * @property integer $trip_id
 * @property integer $room_type_id
 * @property integer $condition_id
 * @property string $temp1
 * @property string $temp2
 *
 * The followings are the available model relations:
 * @property Trip $trip
 * @property RoomType $roomType
 * @property RoomCondition $condition
 */
class TripRoomCoditionRelation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'trip_room_codition_relation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('trip_id, room_type_id, condition_id', 'numerical', 'integerOnly'=>true),
			array('temp1, temp2', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, trip_id, room_type_id, condition_id, temp1, temp2', 'safe', 'on'=>'search'),
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
			'trip' => array(self::BELONGS_TO, 'Trip', 'trip_id'),
			'roomType' => array(self::BELONGS_TO, 'RoomType', 'room_type_id'),
			'condition' => array(self::BELONGS_TO, 'RoomCondition', 'condition_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'trip_id' => 'Trip',
			'room_type_id' => 'Room Type',
			'condition_id' => 'Condition',
			'temp1' => 'Temp1',
			'temp2' => 'Temp2',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('trip_id',$this->trip_id);
		$criteria->compare('room_type_id',$this->room_type_id);
		$criteria->compare('condition_id',$this->condition_id);
		$criteria->compare('temp1',$this->temp1,true);
		$criteria->compare('temp2',$this->temp2,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TripRoomCoditionRelation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
