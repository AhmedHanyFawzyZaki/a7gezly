<?php

/**
 * This is the model class for table "car".
 *
 * The followings are the available columns in table 'car':
 * @property integer $id
 * @property string $title
 * @property string $age
 * @property string $power
 * @property string $price_per_day
 * @property integer $model_id
 * @property integer $category_id
 * @property string $mileage
 * @property string $price_includes
 * @property string $price_excludes
 * @property string $driving_type
 *
 * The followings are the available model relations:
 * @property CarModel $model
 * @property CarCategory $category
 * @property CarBooking[] $carBookings
 * @property CarDriverBooking[] $carDriverBookings
 * @property CarPrice[] $carPrices
 * @property Property[] $properties
 */
class Car extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Car the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'car';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, age, model_id, category_id, price_per_day, emission, fuel, no_of_laggages, no_of_doors, no_of_seats, price_per_day, driver_id', 'required'),
            array('no_of_laggages, no_of_doors, no_of_seats', 'numerical'),
            array('title', 'unique'),
            array('image', 'file', 'allowEmpty' => true, 'types' => 'jpg, jpeg, JPEG, gif, GIF, png, PNG'),
            array('id, title, age, power, price_per_day, model_id, category_id, mileage, , driving_type', 'safe', 'on' => 'search'),
            array('id, title, title_en, slug, age, power, no_of_laggages, no_of_doors, no_of_seats, driver_id, transmission, price_per_day, model_id, category_id, mileage, price_includes, price_excludes, driving_type', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'model' => array(self::BELONGS_TO, 'CarModel', 'model_id'),
            'category' => array(self::BELONGS_TO, 'CarCategory', 'category_id'),
            'carEmission' => array(self::BELONGS_TO, 'CarEmission', 'emission'),
            'carFuelType' => array(self::BELONGS_TO, 'CarFuelType', 'fuel'),
            'carBookings' => array(self::HAS_MANY, 'CarBooking', 'car_id'),
            'carDriverBookings' => array(self::HAS_MANY, 'CarDriverBooking', 'car_id'),
            'carPrices' => array(self::HAS_MANY, 'CarPrice', 'car_id'),
            'properties' => array(self::MANY_MANY, 'Property', 'car_property(car_id, property_id)'),
            'driver' => array(self::BELONGS_TO, 'Driver', 'driver_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Car',
            'driver_id' => 'Driver',
            'title' => 'Title',
            'age' => 'Age',
            'power' => 'Power',
            'no_of_laggages' => 'No Of Luggages',
            'no_of_doors' => 'No Of Doors',
            'no_of_seats' => 'No Of Seats',
            'transmission' => 'Transmission',
            'price_per_day' => 'Price Per Day',
            'model_id' => 'Model',
            'category_id' => 'Category',
            'mileage' => 'Mileage',
            'price_includes' => 'Price Includes',
            'price_excludes' => 'Price Excludes',
            'driving_type' => 'Driving Type',
            'slug' => 'Slug',
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
        $criteria->compare('age', $this->age, true);
        $criteria->compare('power', $this->power, true);
        $criteria->compare('no_of_laggages', $this->no_of_laggages, true);
        $criteria->compare('no_of_doors', $this->no_of_doors, true);
        $criteria->compare('no_of_seats', $this->no_of_seats, true);
        $criteria->compare('transmission', $this->transmission, true);
        $criteria->compare('price_per_day', $this->price_per_day, true);
        $criteria->compare('model_id', $this->model_id);
        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('mileage', $this->mileage, true);
        $criteria->compare('price_includes', $this->price_includes, true);
        $criteria->compare('price_excludes', $this->price_excludes, true);
        $criteria->compare('driving_type', $this->driving_type, true);
        $criteria->compare('slug', $this->slug, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    protected function beforeSave() {
        if (parent::beforeSave()) {
            $this->slug = Helper::slugify($this->title_en);
            return true;
        }
        return false;
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
                'translated_attributes' => array('title','age','mileage','price_includes','price_excludes','power'),
                'languages' => Yii::app()->params['languages'],
                'default_language' => Yii::app()->params['default_language'],
                'admin_routes' => array('admin/car/view', 'admin/car/update'),
                'translations_table' => 'translations',
            ),
        );
    }
}