<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li><a href="<?php echo base_url(); ?>backend_course">Course</a></li>
		  <li class="active">Update Course</li>
		</ol>
	</div>
</div>

<div class="col-md-6 col-md-offset-3">
  <!-- general form elements -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Update Course</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form action="<?php echo base_url(); ?>backend_course/update/<?php echo $course_edit->course_id ?>" method="post">
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
		  <input type="text" name="course_title" value="<?php echo $course_edit->course_title ?>" class="form-control">
		</div>
		<div class="form-group ">
		  <label >Course Code</label>
		  <input type="text" name="course_code" value="<?php echo $course_edit->course_code ?>"  class="form-control">
		</div>		

		<div class="form-group">
		  <label>Course Type</label>
		  <select name="course_type" class="form-control">
			<option value="">Please select</option>
			<option <?php if($course_edit->status==1) echo ' selected="selected" ';?>  value="1">A</option>
			<option <?php if($course_edit->status==2) echo ' selected="selected" ';?>  value="2">B</option>
			<option <?php if($course_edit->status==3) echo ' selected="selected" ';?>  value="1">C</option>
			<option <?php if($course_edit->status==4) echo ' selected="selected" ';?>  value="2">D</option>

			</select>
		</div>
		
		<div class="form-group">
		  <label>Faculty</label>
		  <select name="faculty" class="form-control faculty">
			<option value="">Please select</option>
				<?php 
					foreach($faculty as $faculty_data)
					{		
						 echo '<option '.(($faculty_data->faculty_id==$course_edit->faculty)? 'selected="selected"':'').' value="'.$faculty_data->faculty_id.'">'.$faculty_data->faculty_title.'</option>';
					}
				?>
		  </select>
		</div>	

		<div class="form-group">
		  <label>Department</label>
		  <select name="department"  class="form-control department">
			<option value="">Please select</option>
				<?php 
					foreach($department as $department_data)
					{		
						 echo '<option '.(($department_data->department_id==$course_edit->department)? 'selected="selected"':'').' value="'.$department_data->department_id.'">'.$department_data->department_title.'</option>';
					}
				?>			
		  </select>
		</div>
		
		<div class="form-group">
		  <label>Program</label>
		  <select name="program"  class="form-control program">
			<option value="">Please select</option>
			  	<?php 
					foreach($program as $program_data)
					{		
						 echo '<option '.(($program_data->program_id==$course_edit->program)? 'selected="selected"':'').' value="'.$program_data->program_id.'">'.$program_data->program_title.'</option>';
					}
				?>			
		  </select>
		</div>		
		<div class="form-group ">
		  <label >Credit</label>
		  <input type="text" name="credit" value="<?php echo $course_edit->credit; ?>" class="form-control">
		</div>		
		<div class="form-group">
		  <label>Status</label>
		  <select name="status" class="form-control">
			<option <?php if($course_edit->status==1) echo ' selected="selected" ';?> value="1">Publish</option>
			<option <?php if($course_edit->status==2) echo ' selected="selected" ';?> value="2">Unpublish</option>
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
