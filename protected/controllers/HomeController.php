<?php

class HomeController extends FrontController {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewActionM',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $banners = Banner::model()->findAll();
        $homeSlider = HomeSlider::model()->findAll();
        $locations = Location::model()->findAll();
        $locations = Location::model()->findAll();
        $newsletter = new Newsletter;
        $offers = Trip::model()->findAll(array('condition' => 'offerd = 1', 'order' => 'id  DESC'));
       $paypal_page = Pages::model()->findByPk(15);
        $contactUs_page = Pages::model()->findByPk(16);
        $cash_page = Pages::model()->findByPk(17);
        $callBack_page = Pages::model()->findByPk(18);
        // echo count($offers);die;
        //$banners='test';
        //$categories= Categories::model()->findAll();

        $this->render('index', array(
            'banners' => $banners,
            'homeSlider' => $homeSlider,
            'locations' => $locations,
            'offers' => $offers,
            'newsletter' => $newsletter,
          'paypal_page' => $paypal_page,
            'contactUs_page' => $contactUs_page,
            'cash_page' => $cash_page,
            'callBack_page' => $callBack_page,
        ));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm('contact');
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {

                $mail = new YiiMailer();
                $mail->setFrom($model->email, $model->name);
                $mail->setTo(Helper::yiiparam('email'));
                $mail->setSubject("Contact from " . $model->name);

                $message = '
                <br/>
                User information  <br/>
                ________________________________________<br/>
                Name :  ' . $model->name . '<br/>
                phone:   ' . $model->phone . '<br/>
                Mobile :   ' . $model->mobile . '<br/>
                Address:   ' . $model->address . '<br/>
                Comment:   ' . $model->comment . '

              ';

                $mail->setBody($message);

                if ($mail->send()) {
                    Yii::app()->user->setFlash('contact', Helper::t('شكرا لك .. سوف يتم اﻻتصال بك فى اقرب وقت '));
                    $this->redirect(array('home/contact#success'));
                } else {
                    Yii::app()->user->setFlash('error', 'Error while sending email: ' . $mail->getError());
                }
            }
        }
        $this->render('contact', array('model' => $model));
    }

    public function actionRegister() {
        if (isset(Yii::app()->user->id))
            $this->redirect(Yii::app()->user->returnUrl);
        $model = new User('register');
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($_POST['User']['groups_id'] == '') {
                // normal member
                $model->groups_id = '1';
                $model->active = 0;
            }
            if ($model->save()) {
                $mail = new YiiMailer();
                $mail->setFrom(Yii::app()->params['adminEmail'], 'a7gezly Admininstrator');
                $mail->setTo($model->email);
                $mail->setSubject(' A7gezly - profile notification');

                $message = $msg . '
              <br/>
              User account information  <br/>
              ________________________________________<br/>
              Username:  ' . $model->username . '<br/>
              Password:   ' . $model->simple_decrypt($model->password) . '<br/>
              Activation URL:   <a href="' . Yii::app()->params['webSite'] . '/home/activeProfile/' . $model->id . '">' . Yii::app()->params['webSite'] . '/home/activeProfile/' . $model->id . '</a>

              ';

                $mail->setBody($message);


                if ($mail->send()) {
                    Yii::app()->user->setFlash('register-success', Helper::t('شكرا لك سوف تصلك الان رسالة التفعيل على بريد الالكترونى .'));
                } else {
                    Yii::app()->user->setFlash('error', Helper::t(' خطأ فى اﻻرسال') . $mail->getError());
                }


                // $this->redirect(Yii::app()->user->returnUrl);
            }
        }

        $this->render('register', array(
            'model' => $model,
        ));
    }

    //*****************************//

    public function actionActiveProfile() {
        $userId = $_GET['id'];
        $user = User::model()->findByPk($userId);
        $user->active = 1;
        if ($user->save(true, array('active')))
            $this->redirect(array('home/login'));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        if (isset(Yii::app()->user->id))
            $this->redirect(Yii::app()->user->returnUrl);
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {

                if (Yii::app()->user->group == 1) {
                    $this->redirect(array('profile'));
                } else if (Yii::app()->user->group == 6) {
                    $this->redirect(array('admin/dashboard/'));
                } else {
                    $this->redirect(Yii::app()->user->returnUrl);
                }
            }
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionForgotpass() {

        // $model = new User;
        $model = new User('passforget');
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];

            $criteria = new CDbCriteria;
            $criteria->condition = 'email=:email';
            $criteria->params = array(':email' => $model->email);
            $usermodel = User::model()->find($criteria);
            if (count($usermodel) == 0) {

                Yii::app()->user->setFlash('ErrorMsg', 'Sorry, there\'s no account associated with that email address');
            } else {

                //create randomkey
                $key = Helper::GenerateRandomKey();
                $usermodel->pass_reset = 1;
                $usermodel->pass_code = $key;
                $usermodel->save(false);

                $mail = new YiiMailer();
                $mail->setFrom(Yii::app()->params['adminEmail'], ' a7gezly Admininstrator');
                $mail->setTo($model->email);
                $mail->setSubject('A7gezly - Password reset');

                $message = 'Dear customer,

          Please follow this link to reset your password :
          Username:' . $usermodel->username . '
          <br />
          URL:  <a href="' . Yii::app()->params['webSite'] . '/home/reset/hash/' . $usermodel->pass_code . '"> ' . Yii::app()->params['webSite'] . '/home/reset/hash/' . $usermodel->pass_code . ' </a>

          ';

                $mail->setBody($message);


                if ($mail->send()) {
                    Yii::app()->user->setFlash('success', Helper::t('شكرا لك .. سوف تصلك الان رسالة على بريدك الالكترونى .. '));
                } else {
                    Yii::app()->user->setFlash('error', 'Error while sending email: ' . $mail->getError());
                }

                Yii::app()->user->setFlash('ErrorMsg', 'Check <b> ' . $usermodel->email . ' </b> for the confirmation email. It will have a link to reset your password..');
            }
        }



        $this->render('forgotpass', array('model' => $model));
    }

    public function actionReset($hash) {


        $criteria = new CDbCriteria;
        $criteria->condition = 'pass_code=:Hash and pass_reset=1';
        $criteria->params = array(':Hash' => $hash);
        $user_found = User::model()->find($criteria);

        if (count($user_found) == 0) {
            $flag = 0;
            Yii::app()->user->setFlash('ErrorMsg', 'Sorry you have followed a wrong link .');
        } else {
            $flag = 1;
        }

        $model = new User('passreset');


        if (isset($_POST['User']) and count($user_found) != 0) {
            $model->attributes = $_POST['User'];

            $user_found->pass_reset = 0;
            $user_found->pass_code = '';
            $user_found->password = $model->newpassword = $_POST['User']['newpassword'];
            $user_found->save(false);

            Yii::app()->user->setFlash('ErrorMsg', ' Please Login with your new credentials');

            $this->redirect(array('profile'));
        }


        $this->render('resetpass', array('model' => $model, 'flag' => $flag));
    }

    public function actionSetcookie() {

        $model = Faq::model()->findAll();
        $value = serialize($model);
        //  $value='i am the first test for cookie';
        Yii::app()->request->cookies['TstCookie'] = new CHttpCookie('TstCookie', $value);
        echo "cookie has been set";
    }

    public function actionGetcookie() {
        $value = new Faq;
        $value = unserialize(Yii::app()->request->cookies['TstCookie']);
        echo "cookie is";
        //var_dump($value);
        foreach ($value as $fq) {
            echo $fq['question'] . "<br/>";
        }
    }

    public function actionAdvirtiseWithUs() {
        $model = new AdvirtiseWithUs;
        if (isset($_POST['AdvirtiseWithUs'])) {
            $model->attributes = $_POST['AdvirtiseWithUs'];
            if ($model->save()) {
                //code
                Yii::app()->user->setFlash('contact', Helper::t('شكرا لك .. سوف يتم اﻻتصال بك فى اقرب وقت '));
            }
        }

        $this->render('advirtiseWithUs', array(
            'model' => $model,
        ));
    }

    public function actionProfile() {
        if (isset(Yii::app()->user->id)) {
            $userId = Yii::app()->user->id;
            $user = User::model()->findByPk($userId);
        }
        else
            $this->redirect('login');
        $criteria = new CDbCriteria();
        $criteria->condition = 'user_id = :user_id';
        $criteria->params = array(':user_id' => $user->id);
        $myBookings = Booking::model()->findAll($criteria);
        //$myBookings = Booking::model()->findAll(array('condition' => 'user_id = ' . $user->id . ''));
        //update username
        if ($_GET['id'] == 1) {
            $newname = $_POST['newname'];
            $pass = $_POST['pass'];
            $currentPass = User::model()->simple_decrypt($user->password);
            if ($currentPass == $pass) {
                $user->username = $newname;
                if ($user->save(true, array('username')))
                    $this->redirect(Yii::app()->request->baseUrl . '/home/profile');
                //   Yii::app()->user->setFlash('success', 'تم التعديل .');
            }
            else
                Yii::app()->user->setFlash('wrongPass', Helper::t('كلمة السر غير صحيحة ..من فضلك تأكد واعد المحاولة .'));
        }

        //update email
        if ($_GET['id'] == 2) {
            $newmail = $_POST['newmail'];
            $pass = $_POST['pass'];
            $currentPass = User::model()->simple_decrypt($user->password);
            if ($currentPass == $pass) {
                $user->email = $newmail;
                if ($user->save(false, array('email')))
                    $this->redirect(Yii::app()->request->baseUrl . '/home/profile');
                // Yii::app()->user->setFlash('success', 'تم التعديل .');
            }
            else
                Yii::app()->user->setFlash('wrongPass',Helper::t('كلمة السر غير صحيحة ..من فضلك تأكد واعد المحاولة .'));
        }
        //update password
        if ($_GET['id'] == 3) {
            $newpass = $_POST['newpass'];
            $pass = $_POST['pass'];
            $currentPass = User::model()->simple_decrypt($user->password);
            if ($currentPass == $pass) {
                $user->password = $newpass;
                if ($user->save(false, array('password')))
                    $this->redirect(Yii::app()->request->baseUrl . '/home/profile');
                //  Yii::app()->user->setFlash('success', 'تم التعديل .');
            }
            else
                Yii::app()->user->setFlash('wrongPass', Helper::t('كلمة السر غير صحيحة ..من فضلك تأكد واعد المحاولة .'));
        }
        $this->render('profile', array('user' => $user, 'myBookings' => $myBookings));
    }

//    public function actionCategoryTrips($id) {
//        //echo $id;
//        $getCatInfo = Categories::model()->findByPk($id);
//        $trips = Trip::model()->findAll(array("condition" => "category_id = $id"));
//        //print_r($trips);
//        $this->render('categoryTrips', array('model' => $model, 'trips' => $trips, 'getCatInfo' => $getCatInfo));
//    }

 public function actionNewsletter() {
        $model = new Newsletter;
        if (isset($_POST['NewsLetter']['email']) && !empty($_POST['NewsLetter']['email'])) { 
            $model->email = $_POST['NewsLetter']['email'];
       
       $result= count(Newsletter::model()->findByAttributes(array('email' => $_POST['NewsLetter']['email'])));
      
      if($result == 0)
           {
            if ($model->validate() && $model->save()) {

                Yii::app()->user->setFlash('success', Helper::t('شكراً لك , سوف تستقبل الرسائل على البريد '));
            } else {

                Yii::app()->user->setFlash('error', Helper::t(' البريد الالكتروني غير صحيح'));
            }
      }
      else
      {Yii::app()->user->setFlash('error',Helper::t('هذا البريد موجود .. من فضلك ادخل بريد اخر'));}
      
        }


        $this->redirect(Yii::app()->request->urlReferrer);
    }


    public function actionLocationTrips($slug) {
        //get location info
        $location = Location::model()->findByAttributes(array('url' => $slug));
        $location_id = $location->id;
        $location_title = $location->title;

        $criteria = new CDbCriteria();
        $criteria->condition = 'location_id = :location_id';
        $criteria->params = array(':location_id' => $location_id);
        $criteria->order = 'id DESC';

        //Pagination
        $count = Trip::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 3;
        $pages->applyLimit($criteria);
        //

        $trips = Trip::model()->findAll($criteria);
        $this->render('locationTrips', array('trips' => $trips, 'pages' => $pages, 'location_title' => $location_title));
    }

    public function actionOffers() {
        $criteria = new CDbCriteria();
        $criteria->condition = 'offerd = :offerd';
        $criteria->params = array(':offerd' => 1);
        $criteria->order = 'id DESC';

        //Pagination
        $count = Trip::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 3;
        $pages->applyLimit($criteria);

        $tripOffers = Trip::model()->findAll($criteria);
        $this->render('offers', array('tripOffers' => $tripOffers, 'pages' => $pages));
    }

    public function actionTripDetails($slug) {
        $trip = Trip::model()->findByAttributes(array('url' => $slug));
        $hotel_id = $trip->hotel_id;
        $hotel_info = Hotels::model()->findByPk($hotel_id);
        $category_id = $trip->category_id;
        $category_info = Categories::model()->findByPk($category_id);
        //get comments
        $criteria_c = new CDbCriteria();
        $criteria_c->condition = 'trip_id = :trip_id';
        $criteria_c->params = array(':trip_id' => $trip->id);
        $comments = Comments::model()->findAll($criteria_c);

        //get rooms
        $criteria = new CDbCriteria();
        $criteria->condition = 'trip_id = :trip_id';
        $criteria->params = array(':trip_id' => $trip->id);
        $details = TripRoomCoditionRelation::model()->findAll($criteria);
///////////////////////////////////////////////////////////////////end the displaying details
///////////////////////////////////////////////////////////////////start seaving the booking
        //get the name of roomtype select box and conditions
        if (isset($_POST['rooms'])) {
            $total_price = $_POST['price'];
            $post_without_zero = array_filter($_POST);
            $keys = array_keys($post_without_zero);
            $rooms = array();
            $conditions = array();
            foreach ($keys as $key) {
                if (preg_match("/^[0-9]+_[0-9]+$/", $key)) {
                    $rooms[] = substr($key, 0, strpos($key, '_'));
                    $conditions[] = substr($key, strpos($key, "_") + 1);
                    $num_rooms[] = $_POST[$key];
                }
            }
///
            $rooms_obj = array();
            foreach ($rooms as $key => $room) {
                if ($room != '')
                    $rooms_obj[] = RoomType::model()->findByPk($room);
            }
            $conditions_obj = array();
            foreach ($conditions as $condition) {
                if ($condition != '')
                    $conditions_obj[] = RoomCoditionRelation::model()->findByPk($condition);
            }
            $rooms_array = array();

            for ($i = 0; $i < count($rooms); $i++) {
                $rooms_array[$i] = array('room' => $rooms_obj[$i], 'condition' => $conditions_obj[$i], 'num' => $num_rooms[$i]);
            }

            //get the bed tpe selectbox
            $beds = $_POST['beds'];

            $book = new Booking();
            $book->trip_id = $trip->id;
            $book->total_price = $total_price;
            $book->payment_status = 3; //pending
            $book->created = date('Y-m-d H:i:s');
            if ($book->save(false)) {
                foreach ($rooms_array as $row) {
                    $bookDetails = new BookingDetails;
                    $bookDetails->booking_id = $book->id;
                    $bookDetails->room_type_id = $row['room']->id;
                    $bookDetails->condition_id = $row['condition']->id;
                    $bookDetails->bedType_id = $beds;
                    $bookDetails->room_no = $row['num'];

                    $bookDetails->save(false);
                }
            }
            $this->redirect(array('book', 'id' => $book->id));
        }
        $this->render('trip_details', array('trip' => $trip,
            'hotel_info' => $hotel_info,
            'category_info' => $category_info,
            'details' => $details,
            'comments' => $comments
        ));
    }

    public function actionCategoryTrips($slug) {

        //get location info
        $category = Categories::model()->findByAttributes(array('url' => $slug));
        $category_id = $category->id;
        // $category_title = $category->title;

        $criteria = new CDbCriteria();
        $criteria->condition = 'category_id = :category_id';
        $criteria->params = array(':category_id' => $category_id);
        $criteria->order = 'id DESC';

        //Pagination
        $count = Trip::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 3;
        $pages->applyLimit($criteria);
        //

        $trips = Trip::model()->findAll($criteria);

        $this->render('categoryTrips', array('trips' => $trips, 'pages' => $pages, 'category' => $category));
    }

    public function actionSearch() {
        $model = new Trip;
        $model2 = new Hotels;

        $model->attributes = $_POST['Trip'];
        $title = $model->title;
        $location_id = $model->location_id;

        $days_id = $model->days_id;
        $price_id = $model->price_range_id;
        $level_id = $_POST['Hotels']['level_id'];
        $criteria = new CDbCriteria();
        $criteria->compare('title', $title);
        $criteria->compare('location_id', $location_id);
        $criteria->compare('days_id', $days_id);
        $criteria->compare('price_range_id', $price_id);

        if (!empty($level_id)) {
            $criteria->condition = "hotel_id IN (SELECT id FROM hotels WHERE level_id=:level_id)";
            $criteria->params = array(":level_id" => $level_id);
        }
        //Pagination
        $count = Trip::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 3;
        $pages->applyLimit($criteria);
        $trips = Trip::model()->findAll($criteria);
        $this->render('search', array('model' => $model, 'pages' => $pages, 'trips' => $trips));
    }

    public function actionAddComment($slug) {
        $trip = Trip::model()->findByAttributes(array('url' => $slug));
        $model = new Comments;
        if (isset($_POST['Comments'])) {
            $model->attributes = $_POST['Comments'];
            $model->trip_id = $trip->id;
            $model->user_id = Yii::app()->user->id;
            $date = date('Y-m-d H:i:s');
            $model->date = $date;

            if ($model->save())
                Yii::app()->user->setFlash('comment', Helper::t('تم اضافة تعليقك'));
        }

        $this->render('addComment', array('model' => $model));
    }

    public function actionBook($id) {

        $model = Booking::model()->findByPk($id);
        $details = BookingDetails::model()->findAll(array('condition' => 'booking_id = ' . $id . ''));
        $trip = Trip::model()->findByPk($model->trip_id);
        $userid = Yii::app()->user->id;
        if (!empty($userid)) {
            $user = User::model()->findByPk($userid);
        }

        if (isset($_POST['Booking'])) {
            $model->attributes = $_POST['Booking'];

            if ($model->save()) {
                Yii::app()->user->setFlash('booking', Helper::t('تم الحجز'));
                if ($model->payment_way == 2)
                    $this->redirect(yii::app()->request->baseUrl . '/home/buy/' . $model->id);
            }
        }


        $this->render('userInfo', array('model' => $model, 'details' => $details, 'user' => $user));
    }

    public function loadModel($model_name, $id) {

        $model = Yii::app()->db->createCommand()
                ->select('*')
                ->from(strtolower($model_name))
                ->where('id=:id', array(':id' => $id))
                ->queryRow();

        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionDelete() {
        $id = $_GET['id'];
        $booking = Booking::model()->findByPk($id);
        $bookingDetails = BookingDetails::model()->findAll(array('condition' => 'booking_id = ' . $booking->id . ''));

        foreach ($bookingDetails as $row) {
            $this->loadModel('BookingDetails', $row->id)->delete();
        }
        $this->loadModel('Booking', $id)->delete();
        $this->redirect(yii::app()->request->baseUrl . '/home/profile');
    }

    public function actionBookDetail() {
        $id = $_GET['id'];
        $details = BookingDetails::model()->findAll(array('condition' => 'booking_id = ' . $id . ''));

        $this->render('bookDetails', array('details' => $details));
    }

    public function actionBuy() {
        $id = $_GET['id'];
        $book = Booking::model()->findByPk($id);
        $total = $book->total_price;
        $paymentInfo['Order']['theTotal'] = $total;
        $paymentInfo['Order']['description'] = "Booking of A7gazly website";
        $paymentInfo['Order']['quantity'] = '1';
        $paymentInfo['Order']['PAYERID'] = $id;
        // call paypal
        $result = Yii::app()->Paypal->SetExpressCheckout($paymentInfo);

        if (!Yii::app()->Paypal->isCallSucceeded($result)) {
            if (Yii::app()->Paypal->apiLive === true) {
                // Live mode basic error message
                $error = 'We were unable to process your request. Please try again later';
            } else {
                // Sandbox output the actual error message to dive in.
                $error = $result['L_LONGMESSAGE0'];
            }

            echo $error;

            Yii::app()->end();
        } else {
            // send user to paypal            
            $token = urldecode($result["TOKEN"]);
            $buyer_id = urldecode($result["buyer_id"]);
            $book->token = $token;
            $book->buyer_id = $buyer_id;
            if ($book->save()) {
                $payPalURL = Yii::app()->Paypal->paypalUrl . $token . '&Order=' . $model->id;
                $this->redirect($payPalURL);
            }
        }
    }

    public function actionConfirm() {
        $token = trim($_GET['token']);
        $payerId = trim($_GET['PayerID']);
        $criteria = new CDbCriteria;
        $criteria->condition = 'token=:Token';
        $criteria->params = array(':Token' => $token);
        $book = Booking::model()->find($criteria);
        $trip = $book->trip->title;

        $result = Yii::app()->Paypal->GetExpressCheckoutDetails($token);

        $result['PAYERID'] = $payerId;
        $result['TOKEN'] = $token;
        $result['ORDERTOTAL'] = $book->total_price;

        // Detect errors
        if (!Yii::app()->Paypal->isCallSucceeded($result)) {
            if (Yii::app()->Paypal->apiLive === true) {
                // Live mode basic error message
                $error = 'We were unable to process your request. Please try again later';
            } else {
                // Sandbox output the actual error message to dive in.
                $error = $result['L_LONGMESSAGE0'];
            }

            echo $error;

            Yii::app()->end();
        } else {
            $paymentResult = Yii::app()->Paypal->DoExpressCheckoutPayment($result);
            // Detect errors
            if (!Yii::app()->Paypal->isCallSucceeded($paymentResult)) {
                if (Yii::app()->Paypal->apiLive === true) {
                    // Live mode basic error message
                    $error = 'We were unable to process your request. Please try again later';
                } else {
                    // Sandbox output the actual error message to dive in.
                    $error = $paymentResult['L_LONGMESSAGE0'];
                }

                echo $error;

                Yii::app()->end();
            } else {
                // echo $paymentResult['TRANSACTIONID']; die;
                // payment was completed successfully
                if ($book->payment_status == 3) { // /pending
                    $book->payment_status = 2; //paypal complete payment
                    $book->save();

                    //////////////////////////////////send mail to the user
                    $mail = new YiiMailer();
                    $mail->setFrom(Yii::app()->params['adminEmail'], ' a7gezly Admininstrator');
                    $mail->setTo($book->email);
                    $mail->setSubject(Helper::t('تاكيد الدفع عن طريق الباى بال'));

                    $message =  Helper::t('عميلنا العزيز').','.
                                               Helper::t('لقد تم دفع مبلغ الاشتراك  '). 
                                                '<br>'.
                                                Helper::t('وقيمته').
                                                '<br>'.
                                               ' (' . $book->total_price . ')'.
                                                 Helper::t( 'فى  رحلة  ').
                                                ' <br>'
                                               . $trip . '
                                                 <br>'.
                                                   Helper::t( 'عن طريق الباى بال')
                                                ;
                    $mail->setBody($message);
                    if ($mail->send()) {
                        Yii::app()->user->setFlash('confirm_success', Helper::t('تم العملية بنجاح . '));
                    } else {
                        Yii::app()->user->setFlash('error', Helper::t('خطأ فى الارسال ..رجاء اعادة المحاولة. ') . $mail->getError());
                    }


                    ///////////////////////send mail to admin
                    $mail2 = new YiiMailer();
                    $mail2->setFrom(Yii::app()->params['adminEmail'], ' a7gezly Admininstrator');
                    $mail2->setTo(Yii::app()->params['adminEmail'], ' a7gezly Admininstrator');
                    $mail2->setSubject(Helper::t('تاكيد دفع عن طريق الباى بال'));

                    $message = Helper::t('عميلنا العزيز').','.
                                             Helper::t('لقد قام').  $username  . Helper::t('بدقع اشتراك الرحلة ') . $trip . Helper::t('عن طريق الباى بال ') 
                        ;
                    $mail2->setBody($message);
                    $mail2->send();
                }
                $this->render('confirm');
            }
        }
    }

    /**
     * cancel return from paypal
     */
    public function actionCancel() {
        // The token of the cancelled payment typically used to cancel the payment within your application
        $token = trim($_GET['token']);
        $payerId = trim($_GET['PayerID']);
        $criteria = new CDbCriteria;
        $criteria->condition = 'token=:Token';
        $criteria->params = array(':Token' => $token);
        $book = Booking::model()->find($criteria);

        if ($book->payment_status == 3) {
            $book->payment_status = 2;
            $book->save();
        }
        $this->render('cancel');
    }

    public function actionloginFB() {
        $returnUrl = Yii::app()->request->baseUrl;
        try {
            $user = Yii::app()->facebook->getUser();

            if ($user) {
                Yii::app()->facebook->setAccessToken($accessToken);
                $facebookUserInfo = Yii::app()->facebook->api('/me');
                $facebookUser = Yii::app()->facebook->getUser();
                $userinfo = $facebookUserInfo;
                // after we have the user informaition
                $userFBID = $userinfo[id];
                $email = $userinfo[email];
                $first_name = $userinfo[first_name];
                $last_name = $userinfo[last_name];
                $username = $userinfo[username];


                ////// check if user exist before or not useing email or userid
                $criteria = new CDbCriteria;

                $criteria->condition = 'email ="' . $email . '" or oauth_uid ="' . $userFBID . '"';

                $Users = User::model()->find($criteria);

                //print_r($Users);
                ///// if user exist make session login
                if (!empty($Users)) {

                    $model = new LoginForm;
                    $model->username = $Users->username;
                    $model->password = User::model()->simple_decrypt($Users->password);
                    if ($model->login()) {
                        $userGroup = Yii::app()->user->getState('userGroup');
                        if ($userGroup == 6)
                            $this->redirect(array('/dashboard'));
                        else
                            $this->redirect(array('/home/profile'));
                    }

                    ///end login
                }///end login
                ////////  user not exist  then register and then login
                //registration and send emial with user name and password
                else {
                    //// create rand password
                    $a = array_merge(range(0, 9), range('A', 'Z'));
                    shuffle($a);
                    $password = implode('', array_slice($a, 0, 10));

                    $model = new User('register');
                    $model->username = $username;
                    $model->email = $email;
                    $model->password = $password;
                    $model->fname = $first_name;
                    $model->lname = $last_name;
                    $model->oauth_uid = $userFBID;
                    $model->groups_id = 1;

                    if ($model->save(false)) {
                        //create the user details  record
                        $user_details = new UserDetails();
                        $user_details->user_id = $model->id;
                        $user_details->save(false);

                        $mail = new YiiMailer();
                        $mail->setFrom(Yii::app()->params['email'], ' PuntersPage Admininstrator');
                        $mail->setTo($model->email);
                        $mail->setSubject(' A7gezly - profile notification');

                        $message = 'Dear customer,

                Thank you for becoming a registered user at ' . CHtml::encode(Yii::app()->name) . ' .<br/>
                User account information  <br/>
                ________________________________________<br/>
                Username:  ' . $model->username . '<br/>
                Password:   ' . $model->simple_decrypt($model->password) . '<br/>
                Login URL:   ' . Yii::app()->params['webSite'] . '

                ';

                        $mail->setBody($message);


                        if ($mail->send()) {
                            Yii::app()->user->setFlash('register-success', Helper::t('شكرا لك سوف تصلك الان رسالة التفعيل على بريد الالكترونى .'));
                        } else {
                            Yii::app()->user->setFlash('error', Helper::t(' خطأ فى اﻻرسال') . $mail->getError());
                        }


                        ////// login
                        $model->username = $username;
                        $model->password = $password;

                        $model = new LoginForm;
                        if ($model->login()) {
                            $userGroup = Yii::app()->user->getState('userGroup');
                            if ($userGroup == 6)
                                $this->redirect(array('/dashboard'));
                            else
                                $this->redirect(Yii::app()->request->getUrl('home/profile'));
                        }
                    }///// end registration and send emial with user name and password
                }/// end register user
            }/// end user access from FB
            else {
                $userinfo = null;
                //echo 'error 1';
                $loginUrl = Yii::app()->facebook->getLoginUrl(array('scope' => 'email , publish_stream ,manage_pages', 'redirect-uri' => $returnUrl));
                $this->redirect($loginUrl);
            }
        } catch (Exception $e) {
            $userinfo = null;
            //echo 'error 2';
            $loginUrl = Yii::app()->facebook->getLoginUrl(array('scope' => 'email , publish_stream ,manage_pages', 'redirect-uri' => $returnUrl));
            $this->redirect($loginUrl);
        }

        //$this->redirect(array('/home/index'));
        $this->redirect(Yii::app()->request->getUrl('home'));
    }

}

