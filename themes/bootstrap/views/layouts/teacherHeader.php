<div class="navbar navbar-inverse" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand">Online Classroom</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav pull-right">
				<li><a href="#">Hello, Teacher <?php echo Yii::app()->user->userFirstname . ' ' . Yii::app()->user->userLastname; ?></a></li>
				<li><a href="<?php echo Yii::app()->createUrl('teacher/dashboard'); ?>">Dashboard</a></li>
				<li><a href="<?php echo Yii::app()->createUrl('site/logout'); ?>">Logout</a></li>
			</ul>
		</div>
	</div>
</div>