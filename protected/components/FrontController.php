<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class FrontController extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/main';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    public function init() {
        $parameters = Settings::model()->findByPk(1);

        Yii::app()->params['google'] = $parameters['google'];
        Yii::app()->params['twitter'] = $parameters['twitter'];
        Yii::app()->params['pinterest'] = $parameters['pinterest'];
        Yii::app()->params['support_email'] = $parameters['support_email'];
        Yii::app()->params['email'] = $parameters['email'];
        Yii::app()->params['adminEmail'] = $parameters['email'];
        Yii::app()->params['facebook'] = $parameters['facebook'];
        Yii::app()->params['youtube'] = $parameters['youtube'];

        Yii::app()->params['paypal_email'] = $parameters['paypal_email'];
        Yii::app()->params['phone'] = $parameters['phone'];
        Yii::app()->params['mobile'] = $parameters['mobile'];
        Yii::app()->params['fax'] = $parameters['fax'];
        Yii::app()->params['address'] = $parameters['address'];


        Yii::app()->Paypal->apiUsername = $parameters['api_username'];
        Yii::app()->Paypal->apiPassword = $parameters['api_password'];
        Yii::app()->Paypal->apiSignature = $parameters['signature'];
        if ($parameters['paypal_live'] == 1)
            Yii::app()->Paypal->apiLive = true;
        else
            Yii::app()->Paypal->apiLive = false;

        EMHelper::catchLanguage();

             parent::init();
    }

    public function getadv($position) {
        $criteria = new CDbCriteria;
        $criteria->condition = 'position =' . $position;
        //"1" => "top", "2" => "right", "3" => "left", "4" => "middle", "5" => "inner"
        $criteria->order = 'id DESC';
        if ($position == 5) {
            $criteria->limit = 2;
            $top_ad = Ads::model()->findAll($criteria);
        } else {
            $criteria->limit = 1;
            $top_ad = Ads::model()->find($criteria);
        }

        return $top_ad;
    }

    public function getcategories() {
        $categories = Categories::model()->findAll();
        return $categories;
    }

  public function getPage($id) {
        $page = Pages::model()->findByPk($id);
        return $page->title;
    }


}
