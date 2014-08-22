<?php

/**
 * 
 */
class StudentController extends Controller
{
	public function actionDashboard() {
		$classrooms = StudentClassroom::getClassroomsOfStudent(Yii::app()->user->id);
		$this->render('dashboard', array(
			'classrooms'=>$classrooms
		));
	}
}