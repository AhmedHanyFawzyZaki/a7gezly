<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactForm extends CFormModel {

    public $name;
    public $email;
    public $comment;
    public $verifyCode;
    public $phone;
    public $mobile;
    public $address;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            // name, email, subject and body are required
          //  array('name,email,comment', 'required', 'on' => 'contact'),
            array('phone , mobile', 'numerical'),
            array('name ', 'required', 'message' => Helper::t('من فضلك أدخل الأسم')),
             array('email ', 'required','message' =>Helper::t('من فضلك أدخل البريد الأكترونى')),
            array('email', 'email', 'message' => Helper::t('من فضلك أدخل البريد الأكترونى بشكل صحيح')),
            array('comment ', 'required', 'message' =>Helper::t('من فضلك أدخل الرسالة' )),
            array('phone', 'numerical', 'message' => Helper::t('رقم الهاتف أرقام فقط')),
            array('mobile', 'numerical', 'message' => Helper::t('رقم الموبايل  أرقام فقط')),
             array('verifyCode', 'captcha', 'message' => Helper::t('رمز التحقق غير صحيح')),
            array('name, email', 'required', 'on' => 'index'),
            
            // verifyCode needs to be entered correctly
         ///   array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements(), 'on' => 'contact'),
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels() {
        return array(
            'verifyCode' => 'Verification Code',
            'name' => Yii::t('app', 'name'),
            'email' => Yii::t('app', 'email'),
            'subject' => Yii::t('app', 'subject'),
            'body' => Yii::t('app', 'body'),
        );
    }

}
