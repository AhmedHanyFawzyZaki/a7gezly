<?php

class DashboardController extends Controller
{
	public $pageTitlecrumbs;

	public function init(){
		// set the default theme for any other controller that inherit the admin controller
		Yii::app()->theme = 'bootstrap';
	}



	public function actionIndex()
	{
		$this->layout='column2';
		//$this->render('index');

		if((! Yii::app()->user->isGuest)  and Yii::app()->user->group==6 )
		{

				$this->render('dashboard');
		}else{


			$model=new LoginForm;

			// if it is ajax validation request
			if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
			{
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}

			// collect user input data
			if(isset($_POST['LoginForm']))
			{
				$model->attributes=$_POST['LoginForm'];
				// validate user input and redirect to the previous page if valid
				if($model->validate() && $model->login())
					 $this->redirect(array('/admin/dashboard'));
			}


			// display the login form
			$this->renderPartial('login',array('model'=>$model));


		}


 	}


	public function actionLogout()
	{
		Yii::app()->user->logout();
		//$this->redirect(Yii::app()->homeUrl);
                 $this->redirect(array('/admin/dashboard'));
	}


	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('dashboard/error', $error);
		}
	}



	public function actionAjaxRequest()
		{

		if(Yii::app()->user->getState('wide_screen') ==1){
			Yii::app()->user->setState('wide_screen', '0');
			}else if(Yii::app()->user->getState('wide_screen')==0){
				Yii::app()->user->setState('wide_screen', '1');
				}

		  Yii::app()->end();
		}


}