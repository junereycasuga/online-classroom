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
		<table class="table">
			<thead>
				<tr>
					<th>Assignment Title</th>
					<th>Assignment Deadline</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($assignments as $assignment) { ?>
				<tr>
					<td><a href="<?php echo Yii::app()->createUrl('assignment/view', array('id'=>$assignment->id)); ?>"><?php echo $assignment->assignment_title; ?></td>
					<td><?php echo $assignment->assignment_deadline; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

	<div class="tab-pane" id="quizzes">
		<br>
		<table class="table">
			<thead>
				<tr>
					<th>Quiz Title</th>
					<th>Quiz Deadline</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($quizzes as $quiz) { ?>
				<tr>
					<td><a href="<?php echo Yii::app()->createUrl('quiz/view', array('id'=>$quiz->id)); ?>"><?php echo $quiz->quiz_title; ?></td>
					<td><?php echo $quiz->quiz_deadline; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

	<div class="tab-pane" id="handouts">
		<br>
		<table class="table">
			<thead>
				<tr>
					<th>File Name</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($handouts as $handout) { ?>
				<tr>
					<td><?php echo $handout->file; ?></td>
					<td><a href="<?php echo Yii::app()->createUrl('classroom/download',array('classroom'=>$handout->classroom_id,'file'=>$handout->file)); ?>">Download</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>