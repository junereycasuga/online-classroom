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
		<button class="btn btn-primary">New Assignment</button>
	</div>

	<div class="tab-pane" id="quizzes">
		<br>
		<button class="btn btn-primary">New Quiz</button>
	</div>

	<div class="tab-pane" id="handouts">
		<br>
		<button class="btn btn-primary">New Handout</button>
	</div>
</div>