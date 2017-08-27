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
		<tr>
			<td><?php echo $sl++; ?></td>
			<td>
				<?php echo $course_data->course_title ?> ( <?php echo $course_data->course_code ?> )
				<input type="hidden" name="course_id" id="course_id<?php echo $sl-1; ?>">
		   </td>
		   <td>
				<select name="faculty_member" id="faculty_member<?php echo $sl-1; ?>" class="form-control faculty_member" required>
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
				<button type="submit" id="add+<?php echo $sl-1; ?>" value="Add" class="btn btn-success add_course" ><span class="glyphicon glyphicon-plus-sign"></span></button>
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
function course_allocation2(increment)
{
	 // Faculty data load
	$('#add'+increment).click(function(){
	alert('test');
       /* $.ajax({
            url:"<?php echo base_url();?>backend_course_allocation/get_course",
			data:{
				faculty:$('.faculty').val(),
				department:$('.department').val(),
				program:$('.program').val()
			},
            success: function(response) {
                //$("#course").html(response);
            }
        }); 
        return false;*/
  });

}


function course_allocation2(increment)
{
	//if(fn_validation('faculty_member'+increment+'*section'+increment+'*day'+increment)==0) return ;
	//var faculty_member=$('#faculty_member'+increment).val();

	
	/*
	var revised=$('#cours_type').val();
	var txt_semister_id=$('#txt_semister_id').val();
	var txt_date=$('#txt_date'+increment).val();
	var txt_room=$('#txt_room'+increment).val();
	var txt_id=$('#txt_id'+increment).val();
	var txt_section=$('#txt_section'+increment).val();
	var data='action=save_update_delete&txt_faculty_id='+txt_faculty_id+'&txt_semister_id='+txt_semister_id+'&revised='+revised+'&txt_room='+txt_room+'&txt_date='+txt_date+'&txt_section='+txt_section+'&course_id='+increment+'&txt_id='+increment;
	//alert(data); return;
	http.open( "POST","controller/assign_course_controller.php",true);
	http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	http.onreadystatechange =fnc_assign_course_response;
	http.send(data); */
}

function fnc_assign_course_response()
{
	if(http.readyState == 4)
	{ 
	  var response=http.responseText.split('#');
	  //alert(response[1]); return;
	  if(response[0]==1)
	  {
		  
		alert('Data save successfully');
		$('#txt_button'+response[1]).html('Complete');
		$('#content').find('input,select,textarea').val("");
		fnc_generate_course_form();
		return;
	  }
	  else if(response[0]==2)
	  {
		alert('Already Exists');
		fnc_generate_course_form();
		return;
	  }
	}
}
	
</script>