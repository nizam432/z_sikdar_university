<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li><a href="<?php echo base_url(); ?>backend_category">Category</a></li>
		  <li class="active">Update Category</li>
		</ol>
	</div>
</div>

<div class="col-md-6 col-md-offset-3">
  <!-- general form elements -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Update Category</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form action="<?php echo base_url(); ?>backend_category/update/<?php echo $category_edit->category_id ?>" method="post">
	  <div class="box-body">
		<div class="form-group ">
		  <label >Category Name</label>
		  <input type="text" name="category_name" value="<?php echo $category_edit->category_name ?>" class="form-control">
		</div>
		<div class="form-group">
		  <label>Status</label>
		  <select name="status" class="form-control">
			<option <?php if($category_edit->status==1) echo ' selected="selected" ';?> value="1">Publish</option>
			<option <?php if($category_edit->status==2) echo ' selected="selected" ';?> value="2">Unpublish</option>
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
