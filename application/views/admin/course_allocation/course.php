<div class="col-md-12">
  <!-- general form elements -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Course Allocation</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form class="form-horizontal" action="<?php echo base_url(); ?>backend_course_allocation/save" method="post">
	  <div class="box-body">
	  <div class="form-group">
		  <label class="col-sm-2">Course</label>
		  <label class="col-sm-2">Faculty Member</label>
		  <label class="col-sm-2">Semester</label>
		  <label class="col-sm-2">Section</label>
		  <label class="col-sm-1">Start Time</label>
		  <label class="col-sm-1">End Time</label>
		  <label class="col-sm-1">Room No</label>		  
	 </div>
	  <?php 
		foreach($course as $course_data)
		{?>

		<div class="form-group">
		   <div class="col-sm-2">
				<input type="text" value="<?php echo $course_data->course_title ?>" class="form-control" readonly="readonly">
		   </div>
		   <div class="col-sm-2">
				<select name="faculty_member" class="form-control faculty_member" required>
				<option value="">Please select</option>
					<?php 
						foreach($faculty_member as $faculty_member_data)
						{		
							 echo '<option value="'.$faculty_member_data->faculty_member_id.'">'.$faculty_member_data->faculty_member_name.'</option>';
						}
					?>
				</select>				
		   </div>
		   <div class="col-sm-2">
			  <select name="semester" class="form-control faculty" required>
				<option value="">Please select</option>
					<?php 
						foreach($semester as $semester_data)
						{		
							 echo '<option value="'.$semester_data->semester_id.'">'.$semester_data->semester_title.'</option>';
						}
					?>
			  </select>
		   </div>		   
		   <div class="col-sm-2">
			  <select name="section" class="form-control faculty" required>
				<option value="">Please select</option>
					<?php 
						foreach($section as $section_data)
						{		
							 echo '<option value="'.$section_data->section_id.'">'.$section_data->section_title.'</option>';
						}
					?>
			  </select>
		   </div>
		   <div class="col-sm-1">
				<input type="text"  class="form-control" >
		   </div>
		   <div class="col-sm-1">
				<input type="text"  class="form-control">
		   </div>
		   <div class="col-sm-1">
				<input type="text" class="form-control">
		   </div>
		   <div class="col-sm-1">
				<input type="submit" value="submit" class="form-control btn btn-primary" >
		   </div>			   
		</div>
		<?php } ?>	
		
	  </div>
	</form>
  </div>
  <!-- /.box -->
</div>