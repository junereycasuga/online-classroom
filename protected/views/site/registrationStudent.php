<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-registration-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true
	)
)); ?>
	<h1>Student Registration</h1>
	<br>

	<div class="form">
		<div class="row">
			<?php echo $form->labelEx($modelStudents, 'student_firstname'); ?>
			<?php echo $form->textField($modelStudents, 'student_firstname'); ?>
			<?php echo $form->error($modelStudents, 'student_firstname'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($modelStudents, 'student_lastname'); ?>
			<?php echo $form->textField($modelStudents, 'student_lastname'); ?>
			<?php echo $form->error($modelStudents, 'student_lastname'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($modelStudents, 'student_year_level'); ?>
			<?php echo $form->dropDownList($modelStudents, 'student_year_level', array('1'=>'1st Year', '2'=>'2nd Year', '3'=>'3rd Year', '4'=>'4th Year')); ?>
			<?php echo $form->error($modelStudents, 'student_year_level'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($modelUsers, 'username'); ?>
			<?php echo $form->textField($modelUsers, 'username'); ?>
			<?php echo $form->error($modelUsers, 'username'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($modelUsers, 'user_password'); ?>
			<?php echo $form->passwordField($modelUsers, 'user_password'); ?>
			<?php echo $form->error($modelUsers, 'user_password'); ?>
		</div>

		<div class="row">
			<input type="submit" value="Register" name="btnRegister">
		</div>
	</div>
<?php $this->endWidget(); ?>