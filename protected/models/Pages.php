<?php

/**
 * This is the model class for table "pages".
 *
 * The followings are the available columns in table 'pages':
 * @property integer $id
 * @property string $title
 * @property string $title_ar
 * @property string $url
 * @property string $intro
 * @property string $intro_ar
 * @property string $details
 * @property string $details_ar
 * @property string $image
 * @property string $video
 * @property integer $publish
 * @property string $meta_author
 * @property string $meta_keywords
 * @property string $meta_desc
 */
class Pages extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('publish', 'numerical', 'integerOnly'=>true),
			array('title, title_ar, url, image, video, meta_author', 'length', 'max'=>255),
			array('intro, intro_ar, details, details_ar, meta_keywords, meta_desc', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, title_ar, url, intro, intro_ar, details, details_ar, image, video, publish, meta_author, meta_keywords, meta_desc', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => ' Title',
			//'title_ar' => 'Arabic Title',
			'url' => 'Url',
			'intro' => ' Intro',
			//'intro_ar' => 'Arabic Intro ',
			'details' => ' Details',
			//'details_ar' => 'Arabic Details',
			'image' => 'Image',
			'video' => 'Video',
			'publish' => 'Publish',
			'meta_author' => 'Meta Author',
			'meta_keywords' => 'Meta Keywords',
			'meta_desc' => 'Meta Description',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('title_ar',$this->title_ar,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('intro',$this->intro,true);
		$criteria->compare('intro_ar',$this->intro_ar,true);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('details_ar',$this->details_ar,true);
		$criteria->compare('image',$this->image,true);
                
                
		$criteria->compare('video',$this->video,true);
		$criteria->compare('publish',$this->publish);
		$criteria->compare('meta_author',$this->meta_author,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('meta_desc',$this->meta_desc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
         public function  getStatus($value)
	 {
	 	return $value=0 ? 'Unpublished' : 'Published' ;

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
                'translated_attributes' => array('title', 'details','meta_author','meta_keywords','meta_desc'),
                'languages' => Yii::app()->params['languages'],
                'default_language' => Yii::app()->params['default_language'],
                'admin_routes' => array('admin/pages/view', 'admin/pages/update'),
                'translations_table' => 'translations',
            ),
        );
    }

}
