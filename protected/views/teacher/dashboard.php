<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addClassroomModal">Add Classroom</a>

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
			<td><a href="<?php echo Yii::app()->createUrl('classroom/view', array('id'=>$classroom->id)); ?>"><?php echo $classroom->classroom_name; ?></a></td>
			<td><?php echo Subjects::getSubjectLongName($classroom->classroom_subject); ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<!-- Create Classroom Modal -->
<div class="modal fade" id="addClassroomModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Add Classroom</h4>
			</div>
			<div class="modal-body">
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'addClassroom-form',
					'enableClientValidation'=>true,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
					),
					'htmlOptions'=>array(
						'class'=>'form'
					)
				)); ?>
					<?php echo $form->dropDownList($modelClassroom, 'classroom_subject', Subjects::getSubjects()); ?>
					<input type="submit" value="Save" name="btnSave">
				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
</div>