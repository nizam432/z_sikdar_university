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
	  <table class="table">
		<tr>
			<th>SL</th>
			<th >Course</th>
			<th width="150">Faculty Member</th>
			<th width="85">Room No</th>			
			<th width="100">Section</th>
			<th width="100">Day</th>
			<th width="100">Start Time</th>
			<th width="100">End Time</th>
			<th width="50">Edit</th>
			<th width="50">Trash</th>
	
		</tr>		
	 </div>
	  <?php 
		$sl=1;
		foreach($course as $course_data)
		{?>
		<tr>
			<td><?php echo $sl++; ?></td>
			<td>
				<?php echo $course_data->course_title ?> ( <?php echo $course_data->course_code ?> )
		   </td>
		   <td>
				<select name="faculty_member" class="form-control faculty_member" required>
				<option value="">Please select</option>
					<?php 
						foreach($faculty_member as $faculty_member_data)
						{		
							 echo '<option value="'.$faculty_member_data->faculty_member_id.'">'.$faculty_member_data->faculty_member_name.'</option>';
						}
					?>
				</select>				
		   </td>
		   <td>
				<input type="text" class="form-control">
		   </td>		   
		   <td>
			  <select name="section" class="form-control faculty" required>
				<option value="">Please select</option>
					<?php 
						foreach($section as $section_data)
						{		
							 echo '<option value="'.$section_data->section_id.'">'.$section_data->section_title.'</option>';
						}
					?>
			  </select>
		   </td>	
		   <td>
				<select name="day" class="form-control">
					<option value="">Please Select</option>
					<?php 
						foreach($day as $key_day=>$day_data)
						{		
							 echo '<option value="'.$key_day.'">'.$day_data.'</option>';
						}
					?>
				</select>
		   </td>			   
		   <td>
				<input type="text"  class="form-control" >
		   </td>
		   <td>
				<input type="text"  class="form-control">
		   </td>

		   <td>
				<button type="submit" value="Add" class="btn btn-success" ><span class="fa fa-plus"></span></button>
		   </td>	
		   <td>
				<button type="submit" value="Add" class="btn btn-danger" ><span class="fa fa-trash"></span></button>
		   </td>		   
		</tr>
		<?php } ?>	
		
	  </div>
	</form>
  </div>
  <!-- /.box -->
</div>