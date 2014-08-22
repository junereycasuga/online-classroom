<div class="page-header">
	<h3><?php echo $model->assignment_title; ?></h3>
	<small>Deadline: <?php echo $model->assignment_deadline; ?></small>
</div>
<?php echo $model->assignment_body; ?>
<br><br>
<?php if(Yii::app()->user->userType == 1) { ?>
	<table class="table">
		<thead>
			<tr>
				<th>Student Name</th>
				<th>Reply</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($replies as $reply) { ?>
			<tr>
				<td><?php echo Students::getStudentName($reply->student_id); ?></td>
				<td><?php echo $reply->assignment_reply; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
<?php } else if(Yii::app()->user->userType == 2) { ?>
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'assignmentreply-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
		'htmlOptions'=>array(
			'class'=>'form'
		)
	)); ?>
		<?php echo $form->textArea($modelAssignmentReply, 'assignment_reply', array('placeholder'=>'Reply')) ?><br>
		<input type="submit" value="Reply" name="btnReply">
	<?php $this->endWidget(); ?>
<?php } ?>