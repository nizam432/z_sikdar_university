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
		<div class="box-body">
			<form class="form-horizontal" action="<?php echo base_url()?>backend_dashboard/resgister_search" method="post">
					<div class="form-group">
						<label class="col-sm-2 control-label">Student ID</label>
						<div class="col-sm-4">
							  <input type="text" id="student_id" class="form-control">
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
						<div class="col-sm-offset-4 col-sm-5">
							<!--<button  value="39" class="btn btn-primary search" onclick="fnc_search_course()">Search</button>-->
						<input type="button" class="btn btn-primary" value="Search" onclick="fnc_search_course()"><br><br>
						</div>
					</div>
			</form>
		</div>
	</div>
</div>
<div id="completed_crouse"></div>
<div id="inprogress_crouse"></div>
<div id="student_registerd_course"></div>
<div id="course_add_drop"></div>

<script>
	
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
		
        $.ajax({
            url:"<?php echo base_url();?>backend_course_add_drop/get_student_inprogress_course",
            type:"POST",
			data:{
                semester:$('#semester').val(),
				student_id:$('#student_id').val()
			},
            success: function(response) {
                $("#inprogress_crouse").html(response);
            }
        });	
	
        $.ajax({
            url:"<?php echo base_url();?>backend_course_add_drop/get_student_completed_course",
            type:"POST",
			data:{
                semester:$('#semester').val(),
				student_id:$('#student_id').val()
			},
            success: function(response) {
                $("#completed_crouse").html(response);
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
		var course_allocation_id=valueData[6];


        $.ajax({
            url:"<?php echo base_url();?>backend_course_add_drop/save_course_registration",
			data:{
				course_code:course_code,
				semester:semester,
				student_id:student_id,
                section:section,
                day:day,
                course:course,
                course_allocation_id:course_allocation_id
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
	
	function course_registration_final(val) 
	{
		if (confirm("Are you want to confirm registration?")) {
			var valData=val.split('##');
			var semester=valData[0];
			var student_id=valData[1];
			$.ajax({
				url:"<?php echo base_url();?>backend_course_add_drop/final_registration",
				data:{
					semester:semester,
					student_id:student_id
				},
				success: function(response) {
					alert('data save successfully');
					// $("#inprogress_crouse").html(response);
					fnc_search_course();
				}
			}); 
		}
		return false;			
	}

function cancel_registerd_courses(val)
{
    if (confirm("Are you want to confirm registration?")) {
        var trabulation_sheet_id=val;
        $.ajax({
            url:"<?php echo base_url();?>backend_course_add_drop/cancel_registerd_courses",
            data:{
                trabulation_sheet_id:trabulation_sheet_id
            },
            success: function(response) {
                alert('Cancel Course successfully');
                fnc_search_course();
            }
        }); 
    }
    return false;		
}	
	
</script>

