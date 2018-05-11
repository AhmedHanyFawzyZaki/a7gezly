<?php

/**
 * This is the model class for table "car_location".
 *
 * The followings are the available columns in table 'car_location':
 * @property integer $id
 * @property string $title
 * @property integer $country_id
 *
 * The followings are the available model relations:
 * @property CarBooking[] $carBookings
 * @property CarDriverBooking[] $carDriverBookings
 */
class CarLocation extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return CarLocation the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'car_location';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('country_id, title', 'required'),
            array('country_id', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 200),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, country_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'carBookings' => array(self::HAS_MANY, 'CarBooking', 'location_id'),
            'carDriverBookings' => array(self::HAS_MANY, 'CarDriverBooking', 'location_id'),
            'country' => array(self::BELONGS_TO, 'Country', 'country_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'country_id' => 'Country',
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
        $criteria->compare('title', $this->title, true);
        $criteria->compare('country_id', $this->country_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
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
                'admin_routes' => array('admin/carlocation/view', 'admin/carlocation/update'),
                'translations_table' => 'translations',
            ),
        );
    }
}