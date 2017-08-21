<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li><a href="<?php echo base_url(); ?>backend_student">student</a></li>
		  <li class="active">Update student</li>
		</ol>
	</div>
</div>

<div class="col-md-6 col-md-offset-3">
  <!-- general form elements -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Update Student</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form action="<?php echo base_url(); ?>backend_student/update/<?php echo $student_edit->std_row_id ?>" method="post">
	  <div class="box-body">
		<div class="form-group ">
		  <label >Student Name</label>
		  <input type="text" name="student_full_name" value="<?php echo $student_edit->student_full_name ?>" class="form-control">
		</div>
		<div class="form-group ">
		  <label >Student ID</label>
		  <input type="text" name="student_id" value="<?php echo $student_edit->student_id ?>" class="form-control">
		</div>
		<div class="form-group ">
		  <label >Father</label>
		  <input type="text" name="student_id" value="<?php echo $student_edit->student_id ?>" class="form-control">
		</div>		
		<div class="form-group">
		  <label>Status</label>
		  <select name="status" class="form-control">
			<option <?php if($student_edit->status==1) echo ' selected="selected" ';?> value="1">Publish</option>
			<option <?php if($student_edit->status==2) echo ' selected="selected" ';?> value="2">Unpublish</option>
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
