<?php

/**
 * 
 */
class AssignmentController extends Controller
{
	public function actionView($id) {
		$model = Assignments::model()->findByPk($id);
		$this->render('view', array(
			'model'=>$model
		));
	}
}