<?php

/**
 * 
 */
class QuizController extends Controller
{
    public function actionView($id) {
		$model = Quizzes::model()->findByPk($id);
		$this->render('view', array(
			'model'=>$model
		));
	}
}