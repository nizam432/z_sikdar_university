<div class="col-md-12">
  <!-- general form elements -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Course Allocation</h3>
	</div>
	<!-- /.box-header -->
	
	<!-- form start -->
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
		
	  <?php 
		$sl=1;
		foreach($course as $course_data)
		{?>
		<tr class="content<?php echo $sl; ?>">
			<td><?php echo $sl++; ?></td>
			<td>
				<?php echo $course_data->course_title ?> ( <?php echo $course_data->course_code ?> )
				<input type="hidden" name="course" value="<?php echo  $course_data->course_id; ?>" id="course_id<?php echo $sl-1; ?>">
		   </td>
		   <td>
				<select name="faculty_member" id="faculty_member<?php echo $sl-1; ?>" class="form-control" required>
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
				<input type="text" name="room_no" id="room_no<?php echo $sl-1; ?>" class="form-control">
		   </td>		   
		   <td>
			  <select name="section" id="section<?php echo $sl-1; ?>" class="form-control faculty" required>
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
				<select name="day" id="day<?php echo $sl-1; ?>" class="form-control">
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
				<input type="text" name="start_time" id="start_time<?php echo $sl-1; ?>"  class="form-control" >
		   </td>
		   <td>
				<input type="text" name="end_time" id="end_time<?php echo $sl-1; ?>"  class="form-control">
		   </td>

		   <td>
				<button  id="add_course" onclick="a(<?php echo $sl-1; ?>)" value="<?php echo $sl-1; ?>" class="btn btn-success add_course" ><span class="glyphicon glyphicon-plus-sign"></span></button>
		   </td>	
		   <td>
				<!--<button type="submit" value="Add" class="btn btn-danger" ><span class="fa fa-trash"></span></button>--> N/A
		   </td>		   
		</tr>
		
		
		<?php } ?>	
		
	 </div>
</div>
  <!-- /.box -->
</div>

<script>
  $('.add_course').click(function(){
	  var increment=$(this).val();
	  var semester=$('#semester').val();
        $.ajax({
            url:"<?php echo base_url();?>backend_course_allocation/save",
			type: 'POST',
			data:{
				course:$('#course_id'+increment).val(),
				faculty_member:$('#faculty_member'+increment).val(),
				semester:semester,
				room_no:$('#room_no'+increment).val(),
				section:$('#section'+increment).val(),
				day:$('#day'+increment).val(),
				start_time:$('#start_time'+increment).val(),
				end_time:$('#end_time'+increment).val()
			},
            success: function(response) {
               // $("#course").html(response);
				$('.content'+increment).find('input[type=text],select').val("");
			   alert("Save Data Successfully");
            }
        }); 
    });
</script>