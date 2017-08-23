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
		  <select name="Course_type" class="form-control">
			<option value="">Please select</option>
			<option <?php if($course_edit->status==1) echo ' selected="selected" ';?>  value="1">Option 1</option>
			<option <?php if($course_edit->status==2) echo ' selected="selected" ';?>  value="2">Option 2</option>
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
