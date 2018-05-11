<?php

/**
 * This is the model class for table "trip".
 *
 * The followings are the available columns in table 'trip':
 * @property integer $id
 * @property string $title
 * @property string $title_ar
 * @property string $details
 * @property string $details_ar
 * @property string $import_info
 * @property string $import_info_ar
 * @property string $safari_details
 * @property string $safari_details_ar
 * @property integer $category_id
 * @property integer $gallery_id
 * @property integer $hotel_id
 * @property integer $location_id
 * @property string $start_date
 * @property string $end_date
 * @property integer $offerd
 * @property string $price
 * @property integer $price_range_id
 * @property integer $days_id
 * @property string $temp1
 * @property string $temp2
 * @property string $temp3
 * @property string $temp4
 *
 * The followings are the available model relations:
 * @property Booking[] $bookings
 * @property Comments[] $comments
 * @property PriceRange $priceRange
 * @property Categories $category
 * @property Gallery $gallery
 * @property Hotels $hotel
 * @property Location $location
 * @property Days $days
 * @property TripRoomCoditionRelation[] $tripRoomCoditionRelations
 */
class Trip extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'trip';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('category_id, gallery_id, hotel_id, location_id, offerd, price_range_id, days_id', 'numerical', 'integerOnly' => true),
            array('title, title_ar, start_date, end_date, url, temp2, temp3, temp4', 'length', 'max' => 255),
            array('price', 'length', 'max' => 10),
            array('details, details_ar, import_info, import_info_ar, safari_details, safari_details_ar', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, title_ar, details, details_ar, import_info, import_info_ar, safari_details, safari_details_ar, category_id, gallery_id, hotel_id, location_id, start_date, end_date, offerd, price, price_range_id, days_id, url, temp2, temp3, temp4', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'bookings' => array(self::HAS_MANY, 'Booking', 'trip_id'),
            'comments' => array(self::HAS_MANY, 'Comments', 'trip_id'),
            'priceRange' => array(self::BELONGS_TO, 'PriceRange', 'price_range_id'),
            'category' => array(self::BELONGS_TO, 'Categories', 'category_id'),
            'gallery' => array(self::BELONGS_TO, 'Gallery', 'gallery_id'),
            'hotel' => array(self::BELONGS_TO, 'Hotels', 'hotel_id'),
            'location' => array(self::BELONGS_TO, 'Location', 'location_id'),
            'days' => array(self::BELONGS_TO, 'Days', 'days_id'),
            'tripRoomCoditionRelations' => array(self::HAS_MANY, 'TripRoomCoditionRelation', 'trip_id'),
            'roomOptionRelation' => array(self::HAS_MANY, 'RoomOptionRelation', 'trip_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => ' Title',
            //'title_ar' => 'Arabic Title',
            'details' => ' Details',
           // 'details_ar' => 'Arabic Details ',
            'import_info' => ' Important Info',
           // 'import_info_ar' => 'Arabic Important Info ',
            'safari_details' => ' Safari Details',
           // 'safari_details_ar' => 'Arabic Safari Details',
            'category_id' => 'Category',
            'gallery_id' => 'Gallery',
            'hotel_id' => 'Hotel',
            'location_id' => 'Location',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'offerd' => 'Offerd',
            'price' => 'Price',
            'price_range_id' => 'Price Range',
            'days_id' => 'Days',
            'url' => 'Link',
            'temp2' => 'Temp2',
            'temp3' => 'Temp3',
            'temp4' => 'Temp4',
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
        $criteria->compare('details', $this->details, true);
        $criteria->compare('details_ar', $this->details_ar, true);
        $criteria->compare('import_info', $this->import_info, true);
        $criteria->compare('import_info_ar', $this->import_info_ar, true);
        $criteria->compare('safari_details', $this->safari_details, true);
        $criteria->compare('safari_details_ar', $this->safari_details_ar, true);
        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('gallery_id', $this->gallery_id);
        $criteria->compare('hotel_id', $this->hotel_id);
        $criteria->compare('location_id', $this->location_id);
        $criteria->compare('start_date', $this->start_date, true);
        $criteria->compare('end_date', $this->end_date, true);
        $criteria->compare('offerd', $this->offerd);
        $criteria->compare('price', $this->price, true);
        $criteria->compare('price_range_id', $this->price_range_id);
        $criteria->compare('days_id', $this->days_id);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('temp2', $this->temp2, true);
        $criteria->compare('temp3', $this->temp3, true);
        $criteria->compare('temp4', $this->temp4, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Trip the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getStatus($value) {
        return $value = 0 ? 'No offer' : 'Has offer';
    }

    public function tripRooms($ids) {
        if (!empty($ids)) {
            foreach ($ids as $idd) {
                $room_id = $idd->room_type_id;
                $room = RoomType::model()->findByPk($room_id);
                $arr[] = $room->title;
                $room_title->title; //;die;
                $roomtitles = implode(' , ', $arr);
            }
        }
        else
            $roomtitles = 'No Available Room';
        return $roomtitles;
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
                'translated_attributes' => array('title', 'details', 'import_info', 'safari_details'),
                'languages' => Yii::app()->params['languages'],
                'default_language' => Yii::app()->params['default_language'],
                'admin_routes' => array('admin/trip/view', 'admin/trip/update'),
                'translations_table' => 'translations',
            ),
        );
    }
}