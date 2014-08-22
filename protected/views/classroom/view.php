<div class="page-header">
	<h3><?php echo $model->classroom_name; ?></h3>
</div>

<ul class="nav nav-tabs" role="tablist">
	<li class="active"><a href="#assignments" role="tab" data-toggle="tab">Assignments</a></li>
	<li><a href="#quizzes" role="tab" data-toggle="tab">Quizzes</a></li>
	<li><a href="#handouts" role="tab" data-toggle="tab">Handouts</a></li>
	<li><a href="#students" role="tab" data-toggle="tab">Students</a></li>
</ul>

<div class="tab-content">
	<div class="tab-pane active" id="assignments">
		<br>
		<button class="btn btn-primary" data-toggle="modal" data-target="#newAssignmentModal">New Assignment</button>
		<br>
		<table class="table">
			<thead>
				<tr>
					<th>Assignment Title</th>
					<th>Assignment Deadline</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($assignments as $assignment) { ?>
				<tr>
					<td><a href="<?php echo Yii::app()->createUrl('assignment/view', array('id'=>$assignment->id)); ?>"><?php echo $assignment->assignment_title; ?></td>
					<td><?php echo $assignment->assignment_deadline; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

	<div class="tab-pane" id="quizzes">
		<br>
		<button class="btn btn-primary" data-toggle="modal" data-target="#newQuizModal">New Quiz</button>
		<br>
		<table class="table">
			<thead>
				<tr>
					<th>Quiz Title</th>
					<th>Quiz Deadline</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($quizzes as $quiz) { ?>
				<tr>
					<td><a href="<?php echo Yii::app()->createUrl('quiz/view', array('id'=>$quiz->id)); ?>"><?php echo $quiz->quiz_title; ?></td>
					<td><?php echo $quiz->quiz_deadline; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

	<div class="tab-pane" id="handouts">
		<br>
		<button class="btn btn-primary" data-toggle="modal" data-target="#newHandoutModal">New Handout</button>
		<br>
		<table class="table">
			<thead>
				<tr>
					<th>File Name</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($handouts as $handout) { ?>
				<tr>
					<td><?php echo $handout->file; ?></td>
					<td><a href="<?php echo Yii::app()->createUrl('classroom/download',array('classroom'=>$handout->classroom_id,'file'=>$handout->file)); ?>">Download</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

	<div class="tab-pane" id="students">
		<br>
		<button class="btn btn-primary" data-toggle="modal" data-target="#addStudentModal">Add Student</button>
		<br>
		<table class="table">
			<thead>
				<tr>
					<th>Student Name</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($students as $student) { ?>
				<tr>
					<td><?php echo Students::getStudentName($student->student_id); ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<!-- modals -->
<!-- new assignment -->
<div class="modal fade" id="newAssignmentModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">New Assignment</h4>
			</div>
			<div class="modal-body">
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'newAssignment-form',
					'enableClientValidation'=>true,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
					),
					'htmlOptions'=>array(
						'class'=>'form'
					)
				)); ?>
					<?php echo $form->textField($modelAssignments, 'assignment_title', array('placeholder'=>'Assignment Title')); ?><br>
					<?php echo $form->textArea($modelAssignments, 'assignment_body', array('placeholder'=>'Assignment Details')); ?><br>
					<div class='input-group date' id='assignmentdeadlinepicker'>
						<?php echo $form->textField($modelAssignments, 'assignment_deadline', array('class'=>'form-control', 'data-date-format'=>'MM-DD-YYYY hh:mm:ss')); ?>
                    	<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    	</span>
               		</div>
					<input type="submit" value="Save" name="btnSaveAssignment">
				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
</div>

<!-- new quiz -->
<div class="modal fade" id="newQuizModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">New Quiz</h4>
			</div>
			<div class="modal-body">
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'newQuiz-form',
					'enableClientValidation'=>true,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
					),
					'htmlOptions'=>array(
						'class'=>'form'
					)
				)); ?>
					<?php echo $form->textField($modelQuizzes, 'quiz_title', array('placeholder'=>'Quiz Title')); ?><br>
					<?php echo $form->textArea($modelQuizzes, 'quiz_body', array('placeholder'=>'Quiz Details')); ?><br>
					<div class="input-group date" id="quizdeadlinepicker">
						<?php echo $form->textField($modelQuizzes, 'quiz_deadline', array('class'=>'form-control', 'data-date-format'=>'MM-DD-YYYY hh:mm:ss')); ?>
						<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					</div>
					<input type="submit" value="Save" name="btnSaveQuiz">
				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
</div>

<!-- handout -->
<div class="modal fade" id="newHandoutModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">New Handout</h4>
			</div>
			<div class="modal-body">
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'newHandout-form',
					'enableClientValidation'=>true,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
					),
					'htmlOptions'=>array(
						'class'=>'form',
						'enctype'=>'multipart/form-data',
					)
				)); ?>
					<?php echo $form->fileField($modelHandouts, 'file'); ?>
					<input type="submit" value="Upload" name="btnUpload">
				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
</div>

<!-- students -->
<div class="modal fade" id="addStudentModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Add Student</h4>
			</div>
			<div class="modal-body">
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'addStudent-form',
					'enableClientValidation'=>true,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
					),
					'htmlOptions'=>array(
						'class'=>'form'
					)
				)); ?>
					<?php echo $form->dropDownList($modelStudents, 'student_id', Students::getStudents()); ?><br>
					<input type="submit" value="Add" name="btnAddStudent">
				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
</div>

<script>
	$(function() {
    	$('#assignmentdeadlinepicker, #quizdeadlinepicker').datetimepicker();
  	});
</script>