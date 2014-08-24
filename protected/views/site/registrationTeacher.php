<h1>Teacher Registration</h1>
<br>

<div class="row-fluid">
	<div class="col-md-3">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'teacher-registration-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true
			)
		)); ?>
			<div class="form-group">
				<?php echo $form->labelEx($modelTeachers,'teacher_firstname'); ?>	
				<?php echo $form->textField($modelTeachers,'teacher_firstname', array('class'=>'form-control')); ?>
				<?php echo $form->error($modelTeachers,'teacher_firstname'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($modelTeachers,'teacher_lastname'); ?>
				<?php echo $form->textField($modelTeachers,'teacher_lastname', array('class'=>'form-control')); ?>
				<?php echo $form->error($modelTeachers,'teacher_lastname'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($modelUsers,'username'); ?>
				<?php echo $form->textField($modelUsers,'username', array('class'=>'form-control')); ?>
				<?php echo $form->error($modelUsers,'username'); ?>
			</div>
			
			<div class="form-group">
				<?php echo $form->labelEx($modelUsers,'user_password'); ?>
				<?php echo $form->passwordField($modelUsers,'user_password', array('class'=>'form-control')); ?>
				<?php echo $form->error($modelUsers,'user_password'); ?>
			</div>

			<div class="form-group">
				<input type="submit" value="Register" name="btnRegister" class="btn btn-primary">
			</div>
		<?php $this->endWidget(); ?>
	</div>
</div>
