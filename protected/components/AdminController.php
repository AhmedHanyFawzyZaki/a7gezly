<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class AdminController extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column2';
    public $pageTitlecrumbs;

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
        // set the default theme for any other controller that inherit the admin controller
        Yii::app()->theme = 'bootstrap';

        $parameters = Settings::model()->findByPk(1);

        Yii::app()->params['google'] = $parameters['google'];
        Yii::app()->params['twitter'] = $parameters['twitter'];
        Yii::app()->params['pinterest'] = $parameters['pinterest'];
        Yii::app()->params['support_email'] = $parameters['support_email'];
        Yii::app()->params['email'] = $parameters['email'];
        Yii::app()->params['adminEmail'] = $parameters['email'];
        Yii::app()->params['facebook'] = $parameters['facebook'];
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
        Yii::app()->language = 'ar';
        Yii::app()->request->cookies['_language']->value = 'ar';
        Yii::app()->user->setState('_language', 'ar');

        parent::init();
    }

    protected function beforeAction($action) {
        //if the user is not admin redirect to the home page of the normal user



        if (Yii::app()->user->isGuest) {
            $this->redirect(Yii::app()->baseurl . '/dashboard');
        }
        return parent::beforeAction($action);
    }

}