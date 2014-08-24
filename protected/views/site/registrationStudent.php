<h1>Student Registration</h1>
<br>

<div class="row-fluid">
	<div class="col-md-3">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'student-registration-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true
			),
			'htmlOptions'=>array(
				'role'=>'form'
			)
		)); ?>
			<div class="form-group">
				<?php echo $form->labelEx($modelStudents, 'student_firstname'); ?>
				<?php echo $form->textField($modelStudents, 'student_firstname', array('class'=>'form-control')); ?>
				<?php echo $form->error($modelStudents, 'student_firstname'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($modelStudents, 'student_lastname'); ?>
				<?php echo $form->textField($modelStudents, 'student_lastname', array('class'=>'form-control')); ?>
				<?php echo $form->error($modelStudents, 'student_lastname'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($modelStudents, 'student_year_level'); ?>
				<?php echo $form->dropDownList($modelStudents, 'student_year_level', array('1'=>'1st Year', '2'=>'2nd Year', '3'=>'3rd Year', '4'=>'4th Year'), array('class'=>'form-control')); ?>
				<?php echo $form->error($modelStudents, 'student_year_level'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($modelUsers, 'username'); ?>
				<?php echo $form->textField($modelUsers, 'username', array('class'=>'form-control')); ?>
				<?php echo $form->error($modelUsers, 'username'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($modelUsers, 'user_password'); ?>
				<?php echo $form->passwordField($modelUsers, 'user_password', array('class'=>'form-control')); ?>
				<?php echo $form->error($modelUsers, 'user_password'); ?>
			</div>

			<div class="form-group">
				<input type="submit" value="Register" name="btnRegister" class="btn btn-primary">
			</div>
		<?php $this->endWidget(); ?>
	</div>
</div>