<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>/backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li><a href="<?php echo base_url(); ?>backend_course">Course</a></li>
		  <li class="active">Add New Course</li>
		</ol>
	</div>
</div>

<div class="col-md-6 col-md-offset-3">
  <!-- general form elements -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Add New course</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form  data-toggle="validator"  action="<?php echo base_url(); ?>backend_course/save" method="post">
	  <div class="box-body">
		<?php 
			if(!empty($this->session->flashdata('course_form_validation')))
			{?>
				<div class="alert alert-danger">
					<?php echo $this->session->flashdata('course_form_validation'); ?>
				</div>
			<?php }?>

		<div class="form-group ">
		  <label >Course Title</label>
		  <input type="text" name="course_title" class="form-control" required>
		</div>		
		<div class="form-group ">
		  <label >Course Code</label>
		  <input type="text" name="course_code" class="form-control" required>
		</div>		

		<div class="form-group">
		  <label>Course Type</label>
		  <select name="course_type" class="form-control" required>
			<option value="">Please select</option>
				<option value="1">A</option>
				<option value="2">B</option>
				<option value="3">C</option>
				<option value="4">D</option>
		  </select>
		</div>	
		
		<div class="form-group">
		  <label>Faculty</label>
		  <select name="faculty" class="form-control faculty" required>
			<option value="">Please select</option>
				<?php 
					foreach($faculty as $faculty_data)
					{		
						 echo '<option value="'.$faculty_data->faculty_id.'">'.$faculty_data->faculty_title.'</option>';
					}
				?>
		  </select>
		</div>	

		<div class="form-group">
		  <label>Department</label>
		  <select name="department"  class="form-control department" required>
			<option value="">Please select</option>
		  </select>
		</div>
		
		<div class="form-group">
		  <label>Program</label>
		  <select name="program"  class="form-control program" required>
			<option value="">Please select</option>
		  </select>
		</div>
		
		<div class="form-group ">
		  <label >Credit</label>
		  <input type="text" name="credit" class="form-control" required>
		</div>		
		<div class="form-group">
		  <label>Status</label>
		  <select name="status" class="form-control" required>
			<option value="1">Publish</option>
			<option value="2">Unpublish</option>
		  </select>
		</div>
	  </div>
	  <!-- /.box-body -->
	  <div class="box-footer">
		<button type="submit" class="btn btn-primary">Submit</button>
	  </div>
	</form>
  </div>
  <!-- /.box -->
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
</script>
