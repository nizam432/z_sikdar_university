<div class="col-md-12">
  <!-- general form elements -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Course Allocation</h3>
	</div>
	<!-- /.box-header -->
	
	<!-- form start -->
	  <div class="box-body">
	  <table class="table table-striped table-bordered">
		<tr>
			<th >Course</th>
			<th width="150">Faculty Member</th>
			<th width="85">Room No</th>			
			<th width="100">Section</th>
			<th width="100">Day</th>
			<th width="100">Start Time</th>
			<th width="100">End Time</th>
			<th width="50">Update</th>

		</tr>		

		<tr>
			<td>
				<?php echo $allocated_course->course_title; ?> ( <?php echo $allocated_course->course_code; ?> )
				<input type="hidden" name="course" value="<?php //echo  $course_data['course_id']; ?>" id="course_id">
		   </td>
		   <td>
				<select name="faculty_member" id="faculty_member<?php //echo $sl-1; ?>" class="form-control" >
				<option value="">Please select</option>
					<?php 
						foreach($faculty_member as $faculty_member_data)
						{		
							 echo '<option '.(($allocated_course->faculty_member==$faculty_member_data->faculty_member_id)? ' selected="selected" ':'').' value="'.$faculty_member_data->faculty_member_id.'">'.$faculty_member_data->faculty_member_name.'</option>';
						}
					?>
				</select>				
		   </td>
		   <td>
				<input type="text" name="room_no" value="<?php echo $allocated_course->room_no; ?>" id="room_no" class="form-control">
		   </td>		   
		   <td>
			  <select name="section" id="section" class="form-control faculty" required>
				<option value="">Please select</option>
					<?php 
						foreach($section as $section_data)
						{		
							 echo '<option '.(($allocated_course->section==$section_data->section_id)? ' selected="selected" ':'').' value="'.$section_data->section_id.'">'.$section_data->section_title.'</option>';
						}
					?>
			  </select>
		   </td>	
		   <td>
				<select name="day" id="day" class="form-control">
					<option value="">Please Select</option>
					<?php 
						foreach($day as $key_day=>$day_data)
						{		
							 echo '<option '.(($allocated_course->day==$key_day)? ' selected="selected" ':'').'  value="'.$key_day.'">'.$day_data.'</option>';
						}
					?>
				</select>
		   </td>			   
		   <td>
				<input type="text" name="start_time" id="start_time" value="<?php echo $allocated_course->start_time;?>"  class="form-control" >
		   </td>
		   <td>
				<input type="text" name="end_time" id="end_time" value="<?php echo $allocated_course->end_time; ?>"  class="form-control">
		   </td>

		   <td>
				<button  id="add_course" onclick="a()" value="" class="btn btn-success add_course search" ><span class="glyphicon glyphicon-plus-sign"></span> Update</button>
		   </td>			   
		</tr>
	

	
	 </div>
</div>
  <!-- /.box -->
</div>


<script>
	  $('.delete_course').click(function(){
		if (confirm("Are you sure?")) {
			var course_allocation_id=$(this).val();
			$.ajax({
            url:"<?php echo base_url();?>backend_course_allocation/delete_course",
			type: 'POST',
			data:{
				course_allocation_id:course_allocation_id
			},
			
			beforeSend :function(){
			//$('#course').html('<div style="width:100%;background:#fff; height:100px; text-align:center"><img src="<?php echo base_url();?>assets/backend/images/loading.gif"/></div>');
			}, 
					
            success: function(response) {
			    alert("Delete Data Successfully");
				
				$.ajax({
					url:"<?php echo base_url();?>backend_course_allocation/get_course",
					data:{
						faculty:$('.faculty').val(),
						department:$('.department').val(),
						program:$('.program').val()
					},
					success: function(response) {
						$("#course").html(response);
					}
				}); 			
			}
        }); 
	  
		}
		return false;
	});

  $('.add_course').click(function(){
	  var increment=$(this).val();
	  if(fn_validation('semester'+'*faculty_member'+increment+'*room_no'+increment+'*section'+increment+'*day'+increment+'*start_time'+increment+'*end_time'+increment)==0) return ;
	  var semester=$('#semester').val();
	  var course_id=$('#course_id'+increment).val();
	  var faculty_member=$('#faculty_member'+increment).val();
	  var room_no=$('#room_no'+increment).val();
	  var section=$('#section'+increment).val();
	  var day=$('#day'+increment).val();
	  var start_time=$('#start_time'+increment).val();
	  var end_time=$('#end_time'+increment).val();

        $.ajax({
            url:"<?php echo base_url();?>backend_course_allocation/update",
			type: 'POST',
			data:{
				course:course_id,
				faculty_member:faculty_member,
				semester:semester,
				room_no:room_no,
				section:section,
				day:day,
				start_time:start_time,
				end_time:end_time
			},
			
			beforeSend :function(){
			$('#course').html('<div style="width:100%;background:#fff; height:100px; text-align:center"><img src="<?php echo base_url();?>assets/backend/images/loading.gif"/></div>');
			}, 
					
            success: function(response) {
               // $("#course").html(response);
				$('.content'+increment).find('input[type=text],select').val("");
			    alert("Save Data Successfully");
				
				$.ajax({
					url:"<?php echo base_url();?>backend_course_allocation/get_course",
					data:{
						faculty:$('.faculty').val(),
						department:$('.department').val(),
						program:$('.program').val()
					},
					success: function(response) {
						$("#course").html(response);
					}
				}); 			
			}
        }); 
    });
	
	function fn_validation(id)
	{
		var id=id.split("*");
		
		for(var i=0; i<id.length; i++)
		{
			
			var x=document.getElementById(id[i]);
			if(x.value=="" || x.value==0)
			{
				/*$("#msg").fadeTo( 200, 0.1, function() {
				$(this).text('Validating......').addClass('messagebox_ok').fadeTo(900,1);
				$(this).fadeOut(2000);});
	;	*/
				x.style.border = "1px solid red";
				x.style.background = "#E5E6E5";
				$("#"+id[i]).focus();		    
				return 0;	
			}else{
				 x.style.border = "1px solid #E2E2E2";
				x.style.background = "#FFFFFF";
			}
			
		}
		
	}	
</script>

