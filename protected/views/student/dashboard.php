<table class="table">
	<thead>
		<tr>
			<th>Classroom Name</th>
			<th>Subject</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($classrooms as $classroom) { ?>
		<tr>
			<td><a href="<?php echo Yii::app()->createUrl('classroom/view',array('id'=>$classroom->classroom_id)) ?>"><?php echo Classroom::getClassroomName($classroom->classroom_id); ?></a></td>
			<td><?php echo Subjects::getSubjectLongName($classroom->classroom_id); ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>