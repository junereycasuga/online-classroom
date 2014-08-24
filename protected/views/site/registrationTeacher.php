<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'teacher-registration-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true
	)
)); ?>
	<h1>Teacher Registration</h1>
	<br>

	<div class="form">
		<div class="row">
			<?php echo $form->labelEx($modelTeachers,'teacher_firstname'); ?>	
			<?php echo $form->textField($modelTeachers,'teacher_firstname'); ?>
			<?php echo $form->error($modelTeachers,'teacher_firstname'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($modelTeachers,'teacher_lastname'); ?>
			<?php echo $form->textField($modelTeachers,'teacher_lastname'); ?>
			<?php echo $form->error($modelTeachers,'teacher_lastname'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($modelUsers,'username'); ?>
			<?php echo $form->textField($modelUsers,'username'); ?>
			<?php echo $form->error($modelUsers,'username'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($modelUsers,'user_password'); ?>
			<?php echo $form->passwordField($modelUsers,'user_password'); ?>
			<?php echo $form->error($modelUsers,'user_password'); ?>
		</div>

		<div class="row">
			<input type="submit" value="Register" name="btnRegister">
		</div>
	</div>
<?php $this->endWidget(); ?>