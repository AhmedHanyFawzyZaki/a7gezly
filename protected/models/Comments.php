<?php

/**
 * This is the model class for table "comments".
 *
 * The followings are the available columns in table 'comments':
 * @property integer $id
 * @property string $title
 * @property string $comment
 * @property integer $trip_id
 * @property integer $user_id
 * @property string $date
 *
 * The followings are the available model relations:
 * @property Trip $trip
 * @property User $user
 */
class Comments extends CActiveRecord
{
  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return Comments the static model class
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
    return 'comments';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules()
  {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
      array('trip_id, user_id', 'numerical', 'integerOnly'=>true),
      array('title, date', 'length', 'max'=>255),
       array('title', 'required', 'message' => Helper::t('من فضلك أدخل العنوان')),
       array('comment', 'required', 'message' => Helper::t('من فضلك أدخل التعليق')),
      array('comment', 'safe'),
      // The following rule is used by search().
      // Please remove those attributes that should not be searched.
      array('id, title, comment, trip_id, user_id, date', 'safe', 'on'=>'search'),
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
      'user' => array(self::BELONGS_TO, 'User', 'user_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels()
  {
    return array(
      'id' => 'ID',
      'title' => 'Title',
      'comment' => 'Comment',
      'trip_id' => 'Trip',
      'user_id' => 'User',
      'date' => 'Date',
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
    $criteria->compare('LOWER(title)',strtolower($this->title),true);
    $criteria->compare('LOWER(comment)',strtolower($this->comment),true);
    $criteria->compare('trip_id',$this->trip_id);
    $criteria->compare('user_id',$this->user_id);
    $criteria->compare('LOWER(date)',strtolower($this->date),true);

    return new CActiveDataProvider($this, array(
      'criteria'=>$criteria,
    ));
  }
}