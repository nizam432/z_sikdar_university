<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li><a href="<?php echo base_url(); ?>backend_department">Department</a></li>
		  <li class="active">Update Department</li>
		</ol>
	</div>
</div>

<div class="col-md-6 col-md-offset-3">
  <!-- general form elements -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Update Department</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form action="<?php echo base_url(); ?>backend_department/update/<?php echo $department_edit->department_id ?>" method="post">
	  <div class="box-body">
		<?php 
			if(!empty($this->session->flashdata('department_form_validation')))
			{?>
				<div class="alert alert-danger">
					<?php echo $this->session->flashdata('department_form_validation'); ?>
				</div>
		<?php }?>	  
		<div class="form-group ">
		  <label >Department Title</label>
		  <input type="text" name="department_title" value="<?php echo $department_edit->department_title ?>" class="form-control">
		</div>
		<div class="form-group">
		  <label>Faculty</label>
		  <select name="faculty" class="form-control">
			<?php 
				foreach($faculty as $faculty_data)
				{		
					 echo '<option '.(($faculty_data->faculty_id==$department_edit->faculty)? 'selected="selected"': '').' value="'.$faculty_data->faculty_id.'">'.$faculty_data->faculty_title.'</option>';
				}
			?>
		  </select>
		</div>		
		<div class="form-group">
		  <label>Status</label>
		  <select name="status" class="form-control">
			<option <?php if($department_edit->status==1) echo ' selected="selected" ';?> value="1">Publish</option>
			<option <?php if($department_edit->status==2) echo ' selected="selected" ';?> value="2">Unpublish</option>
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
