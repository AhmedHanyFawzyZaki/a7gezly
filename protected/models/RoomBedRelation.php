<?php

/**
 * This is the model class for table "room_bed_relation".
 *
 * The followings are the available columns in table 'room_bed_relation':
 * @property integer $id
 * @property integer $room_type_id
 * @property integer $bed_type_id
 * @property string $temp1
 * @property string $temp2
 *
 * The followings are the available model relations:
 * @property BedType $bedType
 * @property RoomType $roomType
 */
class RoomBedRelation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'room_bed_relation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('room_type_id, bed_type_id', 'numerical', 'integerOnly'=>true),
			array('temp1, temp2', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, room_type_id, bed_type_id, temp1, temp2', 'safe', 'on'=>'search'),
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
			'bedType' => array(self::BELONGS_TO, 'BedType', 'bed_type_id'),
			'roomType' => array(self::BELONGS_TO, 'RoomType', 'room_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'room_type_id' => 'Room Type',
			'bed_type_id' => 'Bed Type',
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
		$criteria->compare('room_type_id',$this->room_type_id);
		$criteria->compare('bed_type_id',$this->bed_type_id);
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
	 * @return RoomBedRelation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
