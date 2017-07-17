<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>/backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li><a href="<?php echo base_url(); ?>backend_article">Article</a></li>
		  <li class="active">Edit</li>
		</ol>
	</div>
</div>

<div class="col-md-6 col-md-offset-3">
  <!-- general form elements -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Edit Article</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form action="<?php echo base_url(); ?>backend_article/update/<?php echo $article_edit->article_id;?>" method="post" enctype="multipart/form-data">
	  <div class="box-body">
		<div class="form-group ">
		  <label >title</label>
		  <input type="text" name="title" value="<?php echo $article_edit->title;?>" class="form-control">
		</div>		
		<div class="form-group">
			<label>Categroy</label>
			<select name="category_id[]" class="form-control select2" multiple="multiple" data-placeholder="Select Categroy" style="width: 100%;">
			  <?php	
				foreach($category_assing_data as $category_assing_data_item)
				{
					
					$assing_category[]=$category_assing_data_item->category_id;
				} 

				foreach($category_data as $category_data_item)
				{				
					echo '<option '.((in_array($category_data_item->category_id,$assing_category))? ' selected=" selected " ' : '').' 
					value="'.$category_data_item->category_id.'">'.$category_data_item->category_name.'</option>';
				}
			  ?>
			</select>
         </div>
		<div class="form-group">
		<div class="form-group ">
		  <label>Top Article</label> &nbsp; &nbsp; 
		  <input type="radio" name="top_articles" <?php if($article_edit->top_articles==1) echo ' checked="checked" '; ?> class="flat-red" value="1"> Yes  &nbsp;&nbsp;
		  <input type="radio" name="top_articles" <?php if($article_edit->top_articles==0) echo ' checked="checked" '; ?> class="flat-red " value="0"> No 
		</div>
		<div class="form-group ">
		  <label>Slide title</label> &nbsp; &nbsp; 
		  <input type="radio" name="slide" <?php if($article_edit->slide==1) echo ' checked="checked" '; ?>  class="flat-red" value="1"> Yes  &nbsp;&nbsp;
		  <input type="radio" name="slide" <?php if($article_edit->slide==0) echo ' checked="checked" '; ?>   class="flat-red " value="0"> No 
		</div>
		<div class="form-group ">
		  <label >Article</label>
		  <textarea id="editor1" name="description" class="form-control"><?php echo $article_edit->description; ?></textarea>
		</div>
		<div class="form-group ">
		  <label>Article Image</label>
		  <input type="file" name="article_image" class="form-control">
		  <?php
			if(!empty($article_edit->article_image))
			{
				echo '<img src="'.base_url().$article_edit->article_image.'" width="100" height="100" style="margin-top:10px;">';
			}
		  ?>
		</div>
		<div class="form-group">
		  <label>Status</label>
		  <select name="status" class="form-control">
			<option <?php  if($article_edit->status==1) echo ' selected="selected" ' ?> value="1">Publish</option>
			<option <?php  if($article_edit->status==2) echo ' selected="selected" ' ?>  value="2">Unpublish</option>
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
