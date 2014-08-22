<?php

/**
 * 
 */
class ClassroomController extends Controller
{
    public function beforeAction($action) {
        if(!file_exists(Yii::app()->params['handoutPath']."/".$_GET['id'])) {
            mkdir(Yii::app()->params['handoutPath']."/".$_GET['id']);
            chmod(Yii::app()->params['handoutPath']."/".$_GET['id'], 0777);
        }

        return parent::beforeAction($action);
    }

    public function actionView($id)
    {
    	$model = Classroom::model()->findByPk($id);
    	$modelAssignments = new Assignments;
        $modelQuizzes = new Quizzes;
        $modelHandouts = new Handouts;
        $modelStudents = new StudentClassroom;

    	$assignmentList = Assignments::getAssignmentsOfClassroom($id);
        $quizList = Quizzes::getQuizzesOfClassroom($id);
        $handoutList = Handouts::getHandoutsOfClassroom($id);
        $studentList = StudentClassroom::getStudentsOfClassroom($id);

        // posting of assignments
    	if(isset($_POST['Assignments']) && isset($_POST['btnSaveAssignment'])) {
    		$modelAssignments->attributes = $_POST['Assignments'];
    		$modelAssignments->classroom_id = $id;

    		if($modelAssignments->save(false)) {
    			$this->refresh();
    		}
    	}

        // posting of quizzes
        if(isset($_POST['Quizzes']) && isset($_POST['btnSaveQuiz'])) {
            $modelQuizzes->attributes = $_POST['Quizzes'];
            $modelQuizzes->classroom_id = $id;

            if($modelQuizzes->save(false)) {
                $this->refresh();
            }
        }

        // uploading of handouts
        if(isset($_POST['Handouts']) && isset($_POST['btnUpload'])) {
            $modelHandouts->attributes = $_POST['Handouts'];
            $modelHandouts->classroom_id = $id;
            // $uploadedFile = CUploadedFile::getInstance($modelHandouts, 'file');

            if($modelHandouts->save(false)) {
                // $uploadedFile->saveAs($upload->saveAs(Yii::app()->params['handoutPath'].$id.'/'.$modelHandouts->file));
                $this->refresh();
            }
        }

        // adding student to classroom
        if(isset($_POST['StudentClassroom']) && isset($_POST['btnAddStudent'])) {
            $modelStudents->attributes = $_POST['StudentClassroom'];
            $modelStudents->classroom_id = $id;

            if($modelAssignments->save(false)) {
                $this->refresh();
            }
        }
     	
     	$this->render('view', array(
     		'model'=>$model,
     		'modelAssignments'=>$modelAssignments,
            'modelQuizzes'=>$modelQuizzes,
            'modelHandouts'=>$modelHandouts,
            'modelStudents'=>$modelStudents,
            'assignments'=>$assignmentList,
            'quizzes'=>$quizList,
            'handouts'=>$handoutList,
            'students'=>$studentList,
 		));
    }
}