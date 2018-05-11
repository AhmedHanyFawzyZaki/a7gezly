<?php

/**
 * This is the model class for table "room_type".
 *
 * The followings are the available columns in table 'room_type':
 * @property integer $id
 * @property string $title
 * @property string $title_ar
 * @property integer $room_option_id
 * @property string $size
 * @property integer $gallery_id
 * @property integer $max_person
 * @property integer $min_person
 * @property string $tax_included
 * @property string $tax_excluded
 * @property string $temp1
 * @property string $temp2
 * @property string $temp3
 *
 * The followings are the available model relations:
 * @property RoomBedRelation[] $roomBedRelations
 * @property RoomCoditionRelation[] $roomCoditionRelations
 * @property Gallery $gallery
 * @property RoomOption $roomOption
 * @property TripRoomCoditionRelation[] $tripRoomCoditionRelations
 */
class RoomType extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'room_type';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('room_option_id, gallery_id, max_person, min_person,hotel_id', 'numerical', 'integerOnly' => true),
            array('title, title_ar, size, tax_included, tax_excluded, temp1, temp2, temp3', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, title_ar, room_option_id, size, gallery_id, max_person, min_person, tax_included, tax_excluded, temp1, temp2, temp3', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'roomBedRelations' => array(self::HAS_MANY, 'RoomBedRelation', 'room_type_id'),
            'roomCoditionRelations' => array(self::HAS_MANY, 'RoomCoditionRelation', 'room_type_id'),
            'roomOptionRelations' => array(self::HAS_MANY, 'RoomOptionRelation', 'room_type_id'),
            'gallery' => array(self::BELONGS_TO, 'Gallery', 'gallery_id'),
            'roomOption' => array(self::BELONGS_TO, 'RoomOption', 'room_option_id'),
            'hotels' => array(self::BELONGS_TO, 'Hotels', 'hotel_id'),
            'tripRoomCoditionRelations' => array(self::HAS_MANY, 'TripRoomCoditionRelation', 'room_type_id'),
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
           'room_option_id' => 'Room Option',
            'size' => 'Size',
            'gallery_id' => 'Gallery',
            'max_person' => 'Max Person',
            'min_person' => 'Min Person',
            'tax_included' => 'Tax Included',
            'tax_excluded' => 'Tax Excluded',
            'temp1' => 'Temp1',
            'temp2' => 'Temp2',
            'temp3' => 'Temp3',
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
//        $criteria->compare('room_option_id', $this->room_option_id);
        $criteria->compare('size', $this->size, true);
        $criteria->compare('gallery_id', $this->gallery_id);
        $criteria->compare('max_person', $this->max_person);
        $criteria->compare('min_person', $this->min_person);
        $criteria->compare('tax_included', $this->tax_included, true);
        $criteria->compare('tax_excluded', $this->tax_excluded, true);
        $criteria->compare('temp1', $this->temp1, true);
        $criteria->compare('temp2', $this->temp2, true);
        $criteria->compare('temp3', $this->temp3, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return RoomType the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function optionString($id) {
        $room_option = RoomOptionRelation::model()->findAll(array('condition' => ' room_type_id=' . $id . ' '));
        if ($room_option != NULL) {
            foreach ($room_option as $option) {
                $option_title = RoomOption::model()->findByPk($option->room_option_id);
                $arr[] = $option_title->title_ar;
            }
            return implode(' , ', $arr);
        }
        else
            return 'no options selected';
    }

    public function bedString($id) {
        $room_bed = RoomBedRelation::model()->findAll(array('condition' => ' room_type_id=' . $id . ' '));
        if ($room_bed != NULL) {
            foreach ($room_bed as $row) {
                $bed_title = BedType::model()->findByPk($row->bed_type_id);
                $arr[] = $bed_title->title_ar;
            }
            return implode(' , ', $arr);
        }
        else
            return 'no bed preferences';
    }

    public function conditionString($id) {
        $room_condition = RoomCoditionRelation::model()->findAll(array('condition' => ' room_type_id=' . $id . ' '));
        if ($room_condition != NULL) {
            foreach ($room_condition as $condition) {
                    $condition_string = RoomCondition::model()->findByPk($condition->condition_id);
                $arr[] = $condition_string->condition_ar;
            }
            return implode(' , ', $arr);
        }
        else
            return 'no conditions';
    }

    public function RoomTypeList($id) {
//        $criteria = new CDbCriteria;
//        $criteria->condition = 'hotel_id=' . $id;
        return CHtml::listData(RoomType::model()->findAll(array('condition' => ' hotel_id=' . $id . ' ')), 'id', 'title');
    }

    public function RoomConditionList($id) {
//        $criteria = new CDbCriteria;
//        $criteria->condition = 'room_type_id=' . $id;
        return CHtml::listData(RoomCondition::model()->findAll(array('condition' => ' room_type_id=' . $id . ' ')), 'id', 'title');
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
                'translated_attributes' => array('title', 'tax_included','tax_excluded'),
                'languages' => Yii::app()->params['languages'],
                'default_language' => Yii::app()->params['default_language'],
                'admin_routes' => array('admin/roomType/view', 'admin/roomType/update'),
                'translations_table' => 'translations',
            ),
        );
    }

}
