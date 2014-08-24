<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>

<div class="row-fluid">
	<div class="col-md-3">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
			'htmlOptions'=>array(
				'role'=>'form'
			)
		)); ?>

			<div class="form-group">
				<?php echo $form->labelEx($model,'username'); ?>
				<?php echo $form->textField($model,'username', array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'username'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'user_password'); ?>
				<?php echo $form->passwordField($model,'user_password', array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'user_password'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->checkBox($model,'rememberMe'); ?>
				<?php echo $form->label($model,'rememberMe'); ?>
				<?php echo $form->error($model,'rememberMe'); ?>
			</div>

			<div class="form-group">
				<input type="submit" value="Login" class="btn btn-primary" name="btnLogin"><br>
				<a href="<?php echo Yii::app()->createUrl('site/register', array('type'=>'teacher')); ?>">Teacher Registration</a><br>
				<a href="<?php echo Yii::app()->createUrl('site/register', array('type'=>'student')); ?>">Student Registration</a>
			</div>

		<?php $this->endWidget(); ?>
	</div>
</div><!-- form -->
