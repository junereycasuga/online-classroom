<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Online Classroom</title>

	<!-- bootstrap specific styles -->
	<?php
	Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/library/css/bootstrap.min.css');
	?>
</head>
<body role="document">
	<!-- header -->
	<?php
	if(Yii::app()->user->isGuest) {
		$this->renderPartial('//layouts/commHeader');
	} else {
		$this->renderPartial('//layouts/commHeader');
	}
	?>
	<div class="container theme-showcase" role="main">
		<?php echo $content; ?>
	</div>

	<!-- bootstrap specific script -->
	<?php
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/jquery-2.1.1.min.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/library/js/bootstrap.min.js');
	?>
</body>
</html>