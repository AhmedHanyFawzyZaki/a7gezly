<?php

/**
 * This is the model class for table "room_option".
 *
 * The followings are the available columns in table 'room_option':
 * @property integer $id
 * @property string $title
 * @property string $title_ar
 * @property string $desc
 * @property string $desc_ar
 *
 * The followings are the available model relations:
 * @property RoomType[] $roomTypes
 */
class RoomOption extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'room_option';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, title_ar', 'length', 'max' => 255),
            array('desc, desc_ar', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, title_ar, desc, desc_ar', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'roomTypes' => array(self::HAS_MANY, 'RoomType', 'room_option_id'),
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
            'desc' => ' Description',
         //   'desc_ar' => 'Arabic Description',
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
        $criteria->compare('desc', $this->desc, true);
        $criteria->compare('desc_ar', $this->desc_ar, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return RoomOption the static model class
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
                'admin_routes' => array('admin/roomOption/view', 'admin/roomOption/update'),
                'translations_table' => 'translations',
            ),
        );
    }

}
