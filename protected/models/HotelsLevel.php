<?php

/**
 * This is the model class for table "hotels_level".
 *
 * The followings are the available columns in table 'hotels_level':
 * @property integer $id
 * @property string $title
 * @property string $title_ar
 * @property integer $stars
 * @property string $temp1
 *
 * The followings are the available model relations:
 * @property Hotels[] $hotels
 */
class HotelsLevel extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'hotels_level';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('stars', 'numerical', 'integerOnly' => true),
            array('title, title_ar, temp1', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, title_ar, stars, temp1', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'hotels' => array(self::HAS_MANY, 'Hotels', 'level_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => ' Title',
         //   'title_ar' => 'Arabic Title',
            'stars' => 'Stars',
            'temp1' => 'Temp1',
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
        $criteria->compare('title', $this->title, true);
        $criteria->compare('title_ar', $this->title_ar, true);
        $criteria->compare('stars', $this->stars);
        $criteria->compare('temp1', $this->temp1, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return HotelsLevel the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function getlevels() {

        $getTrips = Trip::model()->findAll();
        $levelArray = array();
        foreach ($getTrips as $getTrip) {
            $hotel_id=$getTrip->hotel_id;
            $criteria = new CDbCriteria;
            $criteria->condition = "id=:id";
            $criteria->params = array(":id" => $hotel_id);
             $hotels = Hotels::model()->findAll($criteria);
             foreach ($hotels as $hotel){
                $level= $hotel->level->title  ;
             }
            $levelArray[$hotel->level_id] = $level;
        }
        return $levelArray;
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
                'translated_attributes' => array('title'),
                'languages' => Yii::app()->params['languages'],
                'default_language' => Yii::app()->params['default_language'],
                'admin_routes' => array('admin/hotelsLevel/view', 'admin/hotelsLevel/update'),
                'translations_table' => 'translations',
            ),
        );
    }

}
