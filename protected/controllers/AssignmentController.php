<?php

/**
 * 
 */
class AssignmentController extends Controller
{
	public function actionView($id) {
		$model = Assignments::model()->findByPk($id);

		if(Yii::app()->user->userType == 1) {
			$studentReplies = AssignmentReplies::getAllRepliesFromAssignment($id);

			$this->render('view', array(
				'replies'=>$studentReplies,
				'model'=>$model
			));
		} else if (Yii::app()->user->userType == 2) {
			$modelAssignmentReply = new AssignmentReplies;
			if(isset($_POST['AssignmentReplies']) && isset($_POST['btnReply'])) {
				$modelAssignmentReply->attributes = $_POST['AssignmentReplies'];
				$modelAssignmentReply->assignment_id = $id;
				$modelAssignmentReply->student_id = Yii::app()->user->id;

				if($modelAssignmentReply->save(false)) {
					$this->refresh();
				}
			}

			$this->render('view', array(
				'model'=>$model,
				'modelAssignmentReply'=>$modelAssignmentReply,
			));
		}
	}
}