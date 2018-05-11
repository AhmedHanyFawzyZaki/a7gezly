<?php

class ApiController extends Controller {
	public $PROJECT_NAME = "Mobile API";
	public $MESSAGE_SUCCESS = "success";
	public $MESSAGE_FAIL = "fail";
	public $MESSAGE_ERROR = "error";
	public $MESSAGE_FAIL_EX = "fail_ex";
	public $MESSAGE_ACCESS_DENIED = "access_denied";
	public $MESSAGE_REGISTERED_BEFORE = "registered_before";
	public $MESSAGE_EMAIL_NOT_FOUND = "email_not_found";


	public function actionGetProducts()
	{
		try {
			$request = $this->parseRequest();
			if ($request != false) {
				$all = Product::model()->findAll();
				$response['message'] = $this->MESSAGE_SUCCESS;
				$response['count'] = count($all);

				$criteria = new CDbCriteria();
				$criteria->limit = $request['end'];
				$criteria->offset = $request['start'];

				$all = Product::model()->findAll($criteria);

				$all_arr = array();
				foreach($all as $item) {
					$arr['id'] = intval($item->id);
					$arr['title'] = $this->stringVal($item->title);

					$all_arr[] = $arr;
				}

				$response['products'] = $all_arr;
				echo json_encode($response);
			}
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	public function actionGetProductById()
	{
		try {
			$request = $this->parseRequest();
			if ($request != false) {
				$all = Product::model()->findAll();
				$response['message'] = $this->MESSAGE_SUCCESS;
				$response['count'] = count($all);

				$criteria = new CDbCriteria();
				$criteria->limit = $request['end'];
				$criteria->offset = $request['start'];;

				$all = Product::model()->findAll($criteria);

				$all_arr = array();
				foreach($all as $item) {
					$arr['id'] = intval($item->id);
					$arr['title'] = $this->stringVal($item->title);

					$all_arr[] = $arr;
				}

				$response['products'] = $all_arr;
				echo json_encode($response);
			}
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	public function actionLogin()
	{
		try {
			$request = $this->parseRequest();
			if ($request != false) {
				$user = User::model()->findByAttributes(array('email' => $request["email"], 'password' => User::simple_encrypt($request['password'])));

				$arr = $this->fetchUserObject($user);
				$response["message"] = $this->MESSAGE_SUCCESS;
				$response["user"] = $arr;
				echo json_encode($response);
			}
		}
		catch(Exception $ex) {
			echo $ex;
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	public function fetchUserObject($user)
	{
		if (count($user) == 0) {
			return new stdClass();
		} else {
			$arr = array();
			$arr["id"] = intval($user->id);
			$arr["username"] = $this->stringVal($user->username);
			$arr["email"] = $this->stringVal($user->email);
			$arr["firstName"] = $this->stringVal($user->fname);
			$arr["lastName"] = $this->stringVal($user->lname);
			$arr["photo"] = $this->stringVal($user->image);
			$arr["active"] = intval($user->active);

			return $arr;
		}
	}

	public function actionRegisterDevice()
	{
		try {
			$request = $this->parseRequest();
			if ($request != false) {
				if ($this->authUser($request['user']) == true) {
					$device_id = $request['deviceId'];
					$user_id = $request['user']['id'];

					$user_notification_model = UserNotifications::model()->findByAttributes(array('user_id' => $user_id, 'device_id' => $device_id));
					if (count($user_notification_model) > 0) {
						$this->responseWithMessage($this->MESSAGE_REGISTERED_BEFORE);
						return;
					}

					$user_device = new UserNotifications();
					$user_device->user_id = $user_id;
					$user_device->device_id = $device_id;
					$user_device->created_at = date('Y-m-d H:i:s');

					if ($user_device->save()) {
						$this->responseWithMessage($this->MESSAGE_SUCCESS);
					} else {
						$this->responseWithMessage($this->MESSAGE_FAIL);
					}
				}
			}
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	public function actionTerms()
	{
		try {
			$response["message"] = $this->MESSAGE_SUCCESS;
			$pages = Pages::model()->findByPk(3);
			if (!empty($pages)) {
				$response["content"] = $pages->details;
			}
			echo json_encode($response);
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	public function actionRegister()
	{
		try {
			$request = $this->parseRequest();
			if ($request != false) {
				// if the username or email found it returns found and die after that
				$this->checkUserDataFound('username', $request["username"]);
				$this->checkUserDataFound('email', $request["email"]);

				$model = new User;
				$model->username = $request["username"];
				$model->password = $request["password"];
				$model->fname = $request["firstName"];
				$model->lname = $request["lastName"];
				$model->email = $request["email"];

				if ($model->save()) {
					$details = $request["address"];

					$model_details = new UserDetails();
					$model_details->user_id = $model->id;
					$model_details->address = $details["address"];
					$model_details->city = $details["city"];
					$model_details->state = $details["state"];
					$model_details->zipcode = $details["postcode"];
					$model_details->phone_no = $details["phone"];

					if ($model_details->save()) {
						$arr = $this->fetchUserObject($model);
						$response["message"] = $this->MESSAGE_SUCCESS;
						$response["user"] = $arr;
						echo json_encode($response);
					} else {
						$model->delete();
						$this->responseWithMessage($this->MESSAGE_FAIL);
					}
				} else {
					$this->responseWithMessage($this->MESSAGE_FAIL);
				}
			}
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	public function actionUpdateProfile()
	{
		try {
			$request = $this->parseRequest();
			if ($request != false) {
				$user = $request['user'];
				if ($this->authUser($user) == true) {
					// if the username or email found it returns found and die after that
					$this->checkUserDataFound('username', $request["username"], $user['id']);
					$this->checkUserDataFound('email', $request["email"], $user['id']);

					$model = User::model()->findByPk($user['id']);
					$model->username = $request["username"];
					$model->email = $request["email"];
					$model->fname = $request["firstName"];
					$model->lname = $request["lastName"];
					$model->image = $request["photo"];
					$model->password = $request["password"] ;

					if ($model->save(false)) {
						$details = $request["address"];

						$model_details = UserDetails::model()->findByAttributes(array('user_id' => $model->id));
						if (!$model_details) {
							$model_details = new UserDetails();
							$model_details->user_id = $user['id'];
						}
						$model_details->phone_no = $request["phone"];
						$model_details->address = $details["address1"];
						$model_details->address2 = $details["address2"];
						$model_details->city = $details["city"];
						$model_details->country_id = $details["countryId"];
						$model_details->state = $details["state"];
						$model_details->zipcode = $details["postcode"];

						if ($model_details->save(false)) {
							$this->responseWithMessage($this->MESSAGE_SUCCESS);
						} else {
							$this->responseWithMessage($this->MESSAGE_FAIL);
						}
					} else {
						$this->responseWithMessage($this->MESSAGE_FAIL);
					}
				}
			}
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	public function actionForgetPassword()
	{
		try {
			$request = $this->parseRequest();
			if ($request != false) {
				$email = $request['email'];
				$usermodel = User::model()->findByAttributes(array('email' => $email));

				if (count($usermodel) == 0) {
					$this - $this->responseWithMessage($this->MESSAGE_EMAIL_NOT_FOUND);
				} else {
					// create randomkey
					$key = Helper::GenerateRandomKey();
					$usermodel->pass_reset = 1;
					$usermodel->pass_code = $key;
					$usermodel->save(false);
					// send email
					$message = 'Dear customer,
					Please follow this link to reset your password :
					Username:' . $usermodel->username . '
					URL: ' . Yii::app()->params['webSite'] . '/home/reset/hash/' . $usermodel->pass_code . '
					';
					$this->sendEmail(Yii::app()->params['email'], $model->email , $this->PROJECT_NAME . ' Admininstrator', $this->PROJECT_NAME . ' - password reset', $message);
				}
			}
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	public function actionContactInfo()
	{
		try {
			$settings = Settings::model()->findByPk(1);
			if (empty($settings)) {
				$this->responseWithMessage($this->MESSAGE_FAIL);
			} else {
				$info['address'] = $settings['adress'];
				$info['city'] = $settings['city'];
				$info['state'] = $settings['state'];
				$info['postcode'] = $settings['post_code'];
				$info['longitude'] = $settings['long'];
				$info['latitude'] = $settings['lat'];
				$info['phone'] = $settings['phone'];

				$response["message"] = $this->MESSAGE_SUCCESS;
				$response['info'] = $info;
				echo json_encode($response);
			}
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	public function actionContactus()
	{
		try {
			$request = $this->parseRequest();
			if ($request != false) {
				$this->sendEmail($request['email'], Yii::app()->params['email'], $this->PROJECT_NAME . ' Contactus' , $request['subject'] , $request['message']);
			}
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	public function actionCountries()
	{
		try {
			$regions = Regions::model()->findAll();
			$all_arr = array();
			foreach ($regions as $region) {
				$arr["id"] = intval($region->id);
				$arr["title"] = $this->stringVal($region->country);

				$all_arr[] = $arr;
			}

			$response["message"] = $this->MESSAGE_SUCCESS;
			$response["countries"] = $all_arr;
			echo json_encode($response);
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	public function actionStates()
	{
		try {
			$request = $this->parseRequest();
			if ($request != false) {
				$criteria = new CDbCriteria();
				$criteria->condition = "region_id = " . $request["countryId"];
				$subregion = Subregions::model()->findAll($criteria);

				$response["message"] = $this->MESSAGE_SUCCESS;
				$all_arr = array();

				foreach ($subregion as $region) {
					$arr["id"] = intval($region->id);
					$arr["title"] = $this->stringVal($region->name);

					$all_arr[] = $arr;
				}

				$response["message"] = $this->MESSAGE_SUCCESS;
				$response["states"] = $all_arr;
				echo json_encode($response);
			}
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	public function actionCategories()
	{
		try {
			$categories = $this->selectCategories('0');
			$all_arr = array();
			$response["categories"] = $all_arr;

			if (count($categories) > 0) {
				foreach ($categories as $category) {
					$arr = $this->fetchCategories($this->convertCategoryToArray($category));
					$all_arr [] = $arr;
				}
			}

			$response["message"] = $this->MESSAGE_SUCCESS;
			$response["categories"] = $all_arr;
			echo json_encode($response);
		}
		catch(Exception $ex) {
			echo $ex;
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	private function fetchCategories($row)
	{
		$categories = $this->selectCategories($row['id']);
		$sub_arr = array();

		foreach ($categories as $category) {
			$sub = $this->convertCategoryToArray($category);
			// check for parent -> true recursion
			if (count($this->selectCategories($sub['id'])) > 0) {
				$sub = $this->fetchCategories($sub);
			}

			$sub_arr[] = $sub;
		}

		$row['subCategories'] = $sub_arr;
		return $row;
	}

	public function selectCategories($parent_id = '0')
	{
		$criteria = new CDbCriteria();
		$criteria->condition = "parent_id = " . $parent_id;
		$categories = Category::model()->findAll($criteria);
		return $categories;
	}

	private function convertCategoryToArray($category)
	{
		$arr["id"] = intval($category->id);
		$arr["title"] = $this->stringVal($category->title);
		$arr["desc"] = $this->stringVal($category->desc);
		$arr["parentId"] = intval($category->parent_id);

		return $arr;
	}

	public function actionUpload()
	{
		try {
			$request = $this->parseRequest();
			if ($request != false) {
				if ($this->authUser($request['user']) == true) {
					$binary = $request['binary'];
					$ext = $request['ext'];
					$type = $request['type'];
					// decode binary data
					$decoded = base64_decode($binary);
					// make the path
					$file_name = md5(uniqid(rand(), 1)) . "." . strtolower($ext);
					$root_dir = explode("protected", Yii::app()->basePath);

					$path = $root_dir[0] . "/media/" . $type;
					// if the folder not found it will make the directory
					if (!file_exists($path)) {
						mkdir($path);
					}

					$upload_path = $path . "/" . $file_name;
					// write data
					$fp = fopen($upload_path, 'wb');
					if (!fwrite($fp, $decoded)) {
						$this->responseWithMessage($this->MESSAGE_FAIL);
						die();
					}
					fclose($fp);
					header('Content-Type: application/json');
					$response["message"] = $this->MESSAGE_SUCCESS;
					$response["file"] = $file_name;
					echo json_encode($response);
				}
			}
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_FAIL_EX);
		}
	}

	/**
	 * Default actions and methods
	 */

	public function init()
	{
		Yii::app()->setComponents(array(
		        'errorHandler' => array(
		            'errorAction' => '/api/error'
		            )
		        ));
	}

	public function actionError()
	{
		$this->responseWithMessage($this->MESSAGE_ERROR);
	}

	public function actionIndex()
	{
		$this->actionError();
	}

	public function responseWithMessage($message)
	{
		$response['message'] = $message;
		echo json_encode($response);
	}

	public function parseRequest()
	{
		try {
			if (isset($_POST) && count($_POST) > 0) {
				$request = json_decode($_POST['data'], true);
				if ($request) {
					return $request;
				} else {
					$this->responseWithMessage($this->MESSAGE_ERROR);
				}
			} else {
				$this->responseWithMessage($this->MESSAGE_ERROR);
			}
		}
		catch(Exception $ex) {
			$this->responseWithMessage($this->MESSAGE_ERROR);
			// return false;
		}
		die();
		// return false;
	}

	public function stringVal($val)
	{
		return $val == null ? "" : $val;
	}

	public function authUser($user)
	{
		$model = User::model()->findByAttributes(array('id' => $user['id'], 'email' => $user["email"], 'password' => User::simple_encrypt($user['password'])));
		if (count($model) == 0) {
			$this->responseWithMessage($this->MESSAGE_ACCESS_DENIED);
			return false;
		}
		return true;
	}

	public function checkUserDataFound($key, $value, $id = '')
	{
		$user_model = User::model()->findByAttributes(array($key => $value));
		if ($user_model) {
			if ($id != '') {
				if ($user_model->id != $id) {
					$this->responseWithMessage($key . '_found');
					die();
				}
			} else {
				$this->responseWithMessage($key . '_found');
				die();
			}
		}
	}

	public function sendEmail($from, $to, $from_title, $subject, $message)
	{
		$mail = new YiiMailer();
		$mail->setFrom($from, $from_title);
		$mail->setTo($to);
		$mail->setSubject($subject);
		$mail->setBody($message);
		if ($mail->send()) {
			$this->responseWithMessage($this->MESSAGE_SUCCESS);
		} else {
			$this->responseWithMessage($this->MESSAGE_FAIL);
		}
	}


}
?>