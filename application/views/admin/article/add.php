<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>/backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li><a href="<?php echo base_url(); ?>backend_video">Article</a></li>
		  <li class="active">Add</li>
		</ol>
	</div>
</div>

<div class="col-md-6 col-md-offset-3">
  <!-- general form elements -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Add New Article <?php echo validation_errors(); ?></h3>
	</div>

	<!-- form start -->
	<form action="<?php echo base_url(); ?>backend_article/save" method="post" enctype="multipart/form-data">
	  <div class="box-body">
	  		<?php 
			if(!empty($this->session->flashdata('article_form_validation')))
			{?>
				<div class="alert alert-danger">
					<?php echo $this->session->flashdata('article_form_validation'); ?>
				</div>
		<?php }?>
		
		<div class="form-group ">
		  <label >Title</label>
		  <input type="text" name="title" class="form-control">
		</div>		
		<div class="form-group">
			<label>Categroy</label>
			<select name="category_id[]" class="form-control select2" multiple="multiple" data-placeholder="Select Categroy" style="width: 100%;">
			  <?php
					foreach($category_data as $category_data_item)
					{
						echo '<option  value="'.$category_data_item->category_id.'">'.$category_data_item->category_name.'</option>';
					}
			  ?>

			</select>
         </div>
	
		<div class="form-group ">
		  <label>Top Article</label> &nbsp; &nbsp; 
		  <input type="radio" name="top_articles" class="flat-red" value="1"> Yes  &nbsp;&nbsp;
		  <input type="radio" name="top_articles" checked="checked" class="flat-red " value="0"> No 
		</div>
		<div class="form-group ">
		  <label>Slide Article</label> &nbsp; &nbsp; 
		  <input type="radio" name="slide" class="flat-red" value="1"> Yes  &nbsp;&nbsp;
		  <input type="radio" name="slide" checked="checked" class="flat-red " value="0"> No 
		</div>		
		<div class="form-group ">
		  <label >Article Description</label>
		  <textarea id="editor1" name="description" class="form-control"></textarea>
		</div>
		<div class="form-group ">
		  <label>Article image</label>
		  <input type="file" name="article_image" class="form-control">
		</div>
		<div class="form-group">
		  <label>Status</label>
		  <select name="status" class="form-control">
			<option value="1">Publish</option>
			<option value="2">Unpublish</option>
		  </select>
		</div>

	  <!-- /.box-body -->
	  <div class="box-footer">
		<button type="submit" class="btn btn-primary">Submit</button>
	  </div>
	</form>
  </div>
  <!-- /.box -->
</div>
