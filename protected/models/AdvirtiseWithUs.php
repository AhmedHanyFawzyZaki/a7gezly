<?php

/**
 * This is the model class for table "advirtise_with_us".
 *
 * The followings are the available columns in table 'advirtise_with_us':
 * @property integer $id
 * @property string $title
 * @property string $title_ar
 * @property string $url
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $image
 */
class AdvirtiseWithUs extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'advirtise_with_us';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, title_ar, url, name, email, phone, image', 'length', 'max' => 255),
            array('email', 'email', 'message' => Helper::t('من فضلك أدخل البريد الأكترونى بشكل صحيح')),
            array('name ', 'required', 'message' =>Helper::t('من فضلك أدخل الأسم')),
            array('email ', 'required', 'message' => Helper::t('من فضلك أدخل البريد الأكترونى')),
            array('title ', 'required', 'message' =>Helper::t('من فضلك أدخل العنوان')),
            array('phone', 'numerical', 'message' => Helper::t('رقم الهاتف أرقام فقط')),
             array('url', 'required', 'message' => Helper::t('من فضلك ادخل الرابط')),
             array('url', 'url', 'defaultScheme' => 'http', 'message' => Helper::t('من فضلك أدخل الرابط  بشكل صحيح')),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, title_ar, url, name, email, phone, image', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => ' Title',
           // 'title_ar' => 'Arabic title',
            'url' => 'Link',
            'name' => 'Name',
            'email' => 'E-mail',
            'phone' => 'Phone',
            'image' => 'Image',
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
        $criteria->compare('url', $this->url, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('image', $this->image, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return AdvirtiseWithUs the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

