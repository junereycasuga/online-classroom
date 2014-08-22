<?php

/**
 * 
 */
class QuizController extends Controller
{
    public function actionView($id) {
		$model = Quizzes::model()->findByPk($id);

		if(Yii::app()->user->userType == 1) {
			$studentReplies = QuizReplies::getAllRepliesFromQuiz($id);

			$this->render('view', array(
				'replies'=>$studentReplies,
				'model'=>$model
			));
		} else if (Yii::app()->user->userType == 2) {
			$modelQuizReply = new QuizReplies;
			if(isset($_POST['QuizReplies']) && isset($_POST['btnReply'])) {
				$modelQuizReply->attributes = $_POST['QuizReplies'];
				$modelQuizReply->quiz_id = $id;
				$modelQuizReply->student_id = Yii::app()->user->id;

				if($modelQuizReply->save(false)) {
					$this->refresh();
				}
			}

			$this->render('view', array(
				'model'=>$model,
				'modelQuizReply'=>$modelQuizReply,
			));
		}
	}
}