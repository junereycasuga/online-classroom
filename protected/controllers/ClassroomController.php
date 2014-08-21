<?php

/**
 * 
 */
class ClassroomController extends Controller
{
    public function actionView($id)
    {
    	$model = Classroom::model()->findByPk($id);
    	$modelAssignments = new Assignments;
    	$assignmentList = Assignments::getAssignmentsOfClassroom($id);

    	if(isset($_POST['Assignments']) && isset($_POST['btnSaveAssignment'])) {
    		$modelAssignments->attributes = $_POST['Assignments'];
    		$modelAssignments->classroom_id = $id;

    		if($modelAssignments->save(false)) {
    			$this->refresh();
    		}
    	}
     	
     	$this->render('view', array(
     		'model'=>$model,
     		'modelAssignments'=>$modelAssignments,
     		'assignments'=>$assignmentList,
 		));
    }
}