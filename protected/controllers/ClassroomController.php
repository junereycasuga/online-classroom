<?php

/**
 * 
 */
class ClassroomController extends Controller
{
    public function actionView($id)
    {
    	$model = Classroom::model()->findByPk($id);
     	
     	$this->render('view', array(
     		'model'=>$model
 		));
    }
}