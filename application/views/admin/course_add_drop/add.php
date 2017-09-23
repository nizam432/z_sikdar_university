<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>/backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li><a href="<?php echo base_url(); ?>backend_course_allocation">Course Allocation</a></li>
		  <li class="active">Add New Course Allocation</li>
		</ol>
	</div>
</div>

<div class="col-md-12">
  <!-- general form elements -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Search Course</h3>
	</div>
		<form class="form-horizontal" action="<?php echo base_url()?>backend_dashboard/resgister_search" method="post">
			<div class="box-body">
				<div class="form-group">
					<label class="col-sm-2 control-label">Faculty</label>
					<div class="col-sm-4">
					  <select name="faculty" class="form-control faculty">
						<option value="">Please select</option>
							<?php 
								foreach($faculty as $faculty_data)
								{		
									 echo '<option value="'.$faculty_data->faculty_id.'">'.$faculty_data->faculty_title.'</option>';
								}
							?>
					  </select>
					</div>
					<label class="col-sm-2 control-label">Department</label>
					<div class="col-sm-4">
					  <select name="department"  class="form-control department" >
						<option value="">Please select</option>
					  </select>
					</div>
				</div>
				<div class="form-group">				
					<label class="col-sm-2 control-label">Program</label>
					<div class="col-sm-4">
						  <select name="program"  class="form-control program" >
							<option value="">Please select</option>
						  </select>
					</div>
					<label class="col-sm-2 control-label">Semester</label>
					<div class="col-sm-4">
						  <select  class="form-control" id="semester">
							<option value="">Please select</option>
								<?php 
									foreach($semester as $semester_data)
									{		
										 echo '<option value="'.$semester_data->semester_id.'">'.$semester_data->semester_title.'</option>';
									}
								?>
						  </select>
					</div>
				</div>
				<div class="form-group">				
					<label class="col-sm-2 control-label">Student ID</label>
					<div class="col-sm-4">
						  <input type="text" id="student_id" class="form-control">
					</div>
				</div>				
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-5">
						<!--<button  value="39" class="btn btn-primary search" onclick="fnc_search_course()">Search</button>-->
                    <input type="button" class="btn btn-primary" value="Search" onclick="fnc_search_course()">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<div id="student_registerd_course"></div>
<div id="course_add_drop"></div>

<<<<<<< HEAD
			<tbody id="data_load_list">
			<?php foreach($get_assing_course_day_wise as $course_assing_day_info): ?>
			<?php
			//$i=1;
			
			
			//$sql_day=mysql_query("select * from fbs_assign_course where semester_id='$txt_semister_id' and revised='//$batch_code'  group by course_date");
			//while($row_day=mysql_fetch_assoc($sql_day)){
				?>
			 <tr>
				<td valign="middle"><b><?php echo $day[$course_assing_day_info->day]; ?></b></td>
				<td colspan="7">
			 
		   <table class="table table-striped table-bordered table-hover" width="100%">
			 
			
			<?php
			//$sql=mysql_query("select * from fbs_assign_course where semester_id='$txt_semister_id' and course_date='".$row_day['course_date']."'  and revised='$batch_code'");
			//while($row=mysql_fetch_assoc($sql)){
				
			//$SQLCEHCKCOURSE=mysql_query("select * from  fbs_tabulation_sheet WHERE course_code='".$row['course_id']."' AND //student_id='$student_id'");
			//$check_row_when_while_loop=mysql_fetch_assoc($SQLCEHCKCOURSE);
			//echo $check_row_when_while_loop['course_code'];
			//if($check_row_when_while_loop['course_code']!=$row['course_id']){
			
			?>
				  
			
					
					<tr class="odd gradeA">
							<td width="5%">
							 <input type="button" class="btn btn-success" value="Add" onclick="fnc_course_registration('<?php //echo //$row['course_id'].'##'.$txt_semister_id.'##'.$student_id.'##'.$row['section'].'##'.$batch.'##'.$row['course_date']; ?>')">
							</td>

							<td width="5%"><?php //echo $i; ?></td>
							<td align="center" width="10%"><?php //echo $course_name_arrays[$row['course_id']]; ?> </td>
							<td width="40%"><?php //echo $course_name_array[$row['course_id']]; ?> </td>
							<td align="left" width="20%"><?php //echo $course_type_Arr[$course_name_arrays_type[$row['course_id']]]; ?> </td>
							
							<td align="center" width="10%"><?php //echo $Section_Arr[$row['section']]; ?> </td>
							<td align="center" width="10%"><?php //echo $course_name_arrays_credit[$row['course_id']]; ?> </td>
					</tr>
			  
					<?php
					 // $i++;}
					 // }
				   
					?>
					 </table>
				</td>
				</tr>
			<?php endforeach; ?>
			
		 </tbody>
	</table>
<script> 
=======
<script>
>>>>>>> c72e90a6ca1fdded7932fa44c3d3d1285ca7870a
	
	 function fnc_search_course()
	 {
        $.ajax({
            url:"<?php echo base_url();?>backend_course_add_drop/get_assigned_course",
            type:"POST",
			data:{
                semester:$('#semester').val(),
				student_id:$('#student_id').val()
			},
            success: function(response) {
                $("#course_add_drop").html(response);
            }
        }); 

        $.ajax({
            url:"<?php echo base_url();?>backend_course_add_drop/get_student_registerd_course",
            type:"POST",
			data:{
                semester:$('#semester').val(),
				student_id:$('#student_id').val()
			},
            success: function(response) {
                $("#student_registerd_course").html(response);
            }
        }); 
 return false;
        
    }

	 function fnc_course_registration(val)
	 {
        var valueData=val.split(',');
        var course_code=valueData[0];
        var semester=valueData[1];
        var student_id=valueData[2];
        var section=valueData[3];
        var day=valueData[4];
        var course=valueData[5];


        $.ajax({
            url:"<?php echo base_url();?>backend_course_add_drop/save_course_registration",
			data:{
				course_code:course_code,
				semester:semester,
				student_id:student_id,
                section:section,
                day:day,
                course:course
			},
            success: function(response) {
                alert('data save successfully');
                fnc_search_course();
            }
        }); 
        return false;
    }	

	 function student_assing_course_delete(course_add_drop_id)
	 {
        if (confirm("Are you want to delete?")) {
        $.ajax({
            url:"<?php echo base_url();?>backend_course_add_drop/delete_registerd_course_row",
			data:{
				course_add_drop_id:course_add_drop_id
            },
            success: function(response) {
                alert('Deleted row successfully');
                fnc_search_course();
            }
        }); 
        }
        return false;
    }	
</script>

