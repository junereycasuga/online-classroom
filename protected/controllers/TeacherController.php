<?php

/**
 * 
 */
class TeacherController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionDashboard()
    {
    	$modelClassroom = new Classroom;
    	$classrooms = Classroom::getClassroomsOfTeacher(Yii::app()->user->id);

    	if(isset($_POST['Classroom']) && isset($_POST['btnSave'])) {
    		$modelClassroom->attributes = $_POST['Classroom'];
    		$modelClassroom->classroom_name = Subjects::getSubjectShortCode($modelClassroom->classroom_subject) . ' - ' . Teachers::getTeacherName(Yii::app()->user->id);
    		$modelClassroom->classroom_teacher = Yii::app()->user->id;
    		
    		if($modelClassroom->save(false)) {
    			$this->refresh();
    		}
    	}
    	$this->render('dashboard', array(
    		'modelClassroom'=>$modelClassroom,
    		'classrooms'=>$classrooms
		));	
    }
}