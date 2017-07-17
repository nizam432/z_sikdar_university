<div class="home_video">
	<div class="row">
	<?php
		foreach($category_article as $category_article_data)
		{
	?>

		
	   <div class="col-sm-4 col-md-3 ">
			<div class="<?php echo 'individual_video'?>">
			<a href="<?php echo base_url();?>frontend/article/<?php echo $category_article_data->article_id;?>">
				<img class="test img-responsive" src="<?php echo base_url().$category_article_data->article_image; ?>" width="100%" alt="..."  >
			</a>
		  <div class="caption">
			<h1>
				<a href="<?php echo base_url();?>frontend/article/<?php echo $category_article_data->article_id;?>"> <?php echo $category_article_data->title; ?> </a>
			</h1>
		  </div>
		</div>
		
	  </div>
	

	<?php
	}
	?>
	 </div>
	<?php //echo $this->pagination->create_links(); ?>
</div>
