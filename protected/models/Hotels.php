<?php

/**
 * This is the model class for table "hotels".
 *
 * The followings are the available columns in table 'hotels':
 * @property integer $id
 * @property string $title
 * @property string $title_ar
 * @property string $desc
 * @property string $desc_ar
 * @property string $image
 * @property string $map
 * @property string $video
 * @property integer $level_id
 * @property string $longitude
 * @property string $latitude
 * The followings are the available model relations:
 * @property HotelsLevel $level
 * @property Trip[] $trips
 */
class Hotels extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'hotels';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('level_id', 'numerical', 'integerOnly' => true),
            array('title, image, video, latitude, longitude', 'length', 'max' => 255),
            array('desc , map', 'safe'),
             array('title, image, desc,level_id', 'required'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, desc,image, map, video, level_id, latitude, longitude', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'level' => array(self::BELONGS_TO, 'HotelsLevel', 'level_id'),
            'trips' => array(self::HAS_MANY, 'Trip', 'hotel_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => ' Title',
           // 'title_ar' => 'Arabic Title',
            'desc' => 'English Description',
            'desc_ar' => 'Arabic Description',
            'image' => 'Image',
            'map' => 'Google Map',
            'video' => 'Video(youtube)',
            'level_id' => 'Level',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
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
        //$criteria->compare('title_ar', $this->title_ar, true);
        $criteria->compare('desc', $this->desc, true);
       // $criteria->compare('desc_ar', $this->desc_ar, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('map', $this->map, true);
        $criteria->compare('video', $this->video, true);
        $criteria->compare('level_id', $this->level_id);
         $criteria->compare('longitude', $this->longitude, true);
        $criteria->compare('latitude', $this->latitude, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Hotels the static model class
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
                'translated_attributes' => array('title', 'desc'),
                'languages' => Yii::app()->params['languages'],
                'default_language' => Yii::app()->params['default_language'],
                'admin_routes' => array('admin/hotels/view', 'admin/hotels/update'),
                'translations_table' => 'translations',
            ),
        );
    }

}

