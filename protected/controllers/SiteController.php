<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->redirect('site/login');
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
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	public function actionRegister()
	{
		$modelUsers = new Users;
		$registrationType = $_GET['type'];

		if($registrationType == 'teacher') {
			$modelTeachers = new Teachers;

			if(isset($_POST['Users']) && isset($_POST['btnRegister'])) {
				$modelTeachers->attributes = $_POST['Teachers'];

				if($modelTeachers->save(false)) {
					$modelUsers->attributes = $_POST['Users'];
					$modelUsers->id = $modelTeachers->id;
					$modelUsers->user_type = 1;
					$modelUsers->isPasswordChange = 1;

					if($modelUsers->save(false)) {
						$this->redirect(array('site/login'));
					}
				}
			}

			$this->render('registrationTeacher', array(
				'modelUsers'=>$modelUsers,
				'modelTeachers'=>$modelTeachers
			));
		} else if($registrationType == 'student') {
			$modelStudents = new Students;

			if(isset($_POST['Users']) && isset($_POST['btnRegister'])) {
				$modelStudents->attributes = $_POST['Students'];

				if($modelStudents->save(false)) {
					$modelUsers->attributes = $_POST['Users'];
					$modelUsers->id = $modelStudents->id;
					$modelUsers->user_type = 2;
					$modelUsers->isPasswordChange = 1;

					if($modelUsers->save(false)) {
						$this->redirect(array('site/login'));
					}
				}
			}

			$this->render('registrationStudent', array(
				'modelUsers'=>$modelUsers,
				'modelStudents'=>$modelStudents
			));
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model = new Users;

		if(isset($_POST['Users']) && isset($_POST['btnLogin'])) {
			$model->attributes = $_POST['Users'];

			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()) {
				if(Yii::app()->user->userType == 1) {
					$this->redirect(array('teacher/dashboard'));
				} else  if(Yii::app()->user->userType == 2) {
					$this->redirect(array('student/dashboard'));
				}
			} else {
				$this->redirect(array('site/login'));
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}