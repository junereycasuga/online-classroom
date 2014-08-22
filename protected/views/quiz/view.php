<div class="page-header">
	<h3><?php echo $model->quiz_title; ?></h3>
	<small>Deadline: <?php echo $model->quiz_deadline; ?></small>
</div>
<?php echo $model->quiz_body; ?>
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
				<td><?php echo $reply->quiz_reply; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
<?php } else if(Yii::app()->user->userType == 2) { ?>
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'quizreply-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
		'htmlOptions'=>array(
			'class'=>'form'
		)
	)); ?>
		<?php echo $form->textArea($modelQuizReply, 'quiz_reply', array('placeholder'=>'Reply')) ?><br>
		<input type="submit" value="Reply" name="btnReply">
	<?php $this->endWidget(); ?>
<?php } ?>