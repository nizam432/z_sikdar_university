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
						  <select name="semester" class="form-control semester" id="semester">
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
						<button class="btn btn-primary search">Search</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<div id="course">
</div>

<script>
	 // Faculty data load
	$('.faculty').change(function(){
	  $.ajax({
		type: "POST",
		url: "<?php echo base_url();?>backend_course/get_department",
		data:{id:$(this).val()}, 
		beforeSend :function(){
		$(".department option:gt(0)").remove(); 
		$('.department').find("option:eq(0)").html("Please wait..");

		},                         
		success: function (data) {
		  /*get response as json */
		   $('.department').find("option:eq(0)").html("Please Select");
		  var obj=jQuery.parseJSON(data);
		  $(obj).each(function()
		  {
		   var option = $('<option />');
		   option.attr('value', this.value).text(this.label);           
		   $('.department').append(option);
		 });  

		  /*ends */

		}
	  });
	});	 

	//Department data load 
	$('.department').change(function(){
	  $.ajax({
		type: "POST",
		url: "<?php echo base_url();?>backend_course/get_program",
		data:{id:$(this).val()}, 
		beforeSend :function(){
		$(".program option:gt(0)").remove(); 
		$('.program').find("option:eq(0)").html("Please wait..");

		},                         
		success: function (data) {
		  /*get response as json */
		   $('.program').find("option:eq(0)").html("Please Select");
		  var obj=jQuery.parseJSON(data);
		  $(obj).each(function()
		  {
		   var option = $('<option />');
		   option.attr('value', this.value).text(this.label);           
		   $('.program').append(option);
		 });  
		  /*ends */
		}
	  });
	});	
	
	// search course
    $(".search").click(function(){
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
        return false;
    });
	
</script>

