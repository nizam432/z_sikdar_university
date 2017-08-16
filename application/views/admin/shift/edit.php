<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li><a href="<?php echo base_url(); ?>backend_shift">Shift</a></li>
		  <li class="active">Update Shift</li>
		</ol>
	</div>
</div>

<div class="col-md-6 col-md-offset-3">
  <!-- general form elements -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Update Shift</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form action="<?php echo base_url(); ?>backend_shift/update/<?php echo $shift_edit->shift_id ?>" method="post">
	  <div class="box-body">
		<?php 
			if(!empty($this->session->flashdata('shift_form_validation')))
			{?>
				<div class="alert alert-danger">
					<?php echo $this->session->flashdata('shift_form_validation'); ?>
				</div>
		<?php }?>	  
		<div class="form-group ">
		  <label >Shift Title</label>
		  <input type="text" name="shift_title" value="<?php echo $shift_edit->shift_title ?>" class="form-control">
		</div>
		<div class="form-group">
		  <label>Status</label>
		  <select name="status" class="form-control">
			<option <?php if($shift_edit->status==1) echo ' selected="selected" ';?> value="1">Publish</option>
			<option <?php if($shift_edit->status==2) echo ' selected="selected" ';?> value="2">Unpublish</option>
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
