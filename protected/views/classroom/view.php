<div class="page-header">
	<h3><?php echo $model->classroom_name; ?></h3>
</div>

<ul class="nav nav-tabs" role="tablist">
	<li class="active"><a href="#assignments" role="tab" data-toggle="tab">Assignments</a></li>
	<li><a href="#quizzes" role="tab" data-toggle="tab">Quizzes</a></li>
	<li><a href="#handouts" role="tab" data-toggle="tab">Handouts</a></li>
</ul>

<div class="tab-content">
	<div class="tab-pane active" id="assignments">
		<br>
		<button class="btn btn-primary" data-toggle="modal" data-target="#newAssignmentModal">New Assignment</button>
	</div>

	<div class="tab-pane" id="quizzes">
		<br>
		<button class="btn btn-primary" data-toggle="modal" data-target="#newQuizModal">New Quiz</button>
	</div>

	<div class="tab-pane" id="handouts">
		<br>
		<button class="btn btn-primary" data-toggle="modal" data-target="#newHandoutModal">New Handout</button>
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
					
					<input type="submit" value="Save" name="btnSave">
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
					
					<input type="submit" value="Save" name="btnSave">
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
						'class'=>'form'
					)
				)); ?>
					
					<input type="submit" value="Save" name="btnSave">
				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
</div>