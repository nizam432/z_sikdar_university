<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>/backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li><a href="<?php echo base_url(); ?>backend_faculty">Faculty</a></li>
		  <li class="active">Add New Faculty</li>
		</ol>
	</div>
</div>

<div class="col-md-6 col-md-offset-3">
  <!-- general form elements -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Add New Faculty</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form action="<?php echo base_url(); ?>backend_faculty/save" method="post">
	  <div class="box-body">
		<?php 
			if(!empty($this->session->flashdata('faculty_form_validation')))
			{?>
				<div class="alert alert-danger">
					<?php echo $this->session->flashdata('faculty_form_validation'); ?>
				</div>
			<?php }?>

		<div class="form-group ">
		  <label >Faculty Title</label>
		  <input type="text" name="faculty_title" class="form-control">
		</div>
		<div class="form-group">
		  <label>Status</label>
		  <select name="status" class="form-control">
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
