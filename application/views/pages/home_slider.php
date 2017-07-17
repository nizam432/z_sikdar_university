<div class="home_slider">
	<div id="myCarousel" class="carousel slide" data-ride="carousel" >
	<!-- Indicators -->
	<ol class="carousel-indicators">
	  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	  <li data-target="#myCarousel" data-slide-to="1"></li>
	  <li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner">
	<?php
		$sl=1;
		foreach($slide_article as $slide_article_data)
		{
			
	?>
	  <div class="item <?php if($sl==1) echo 'active'; ?>">
		<a href="<?php echo base_url();?>frontend/article/<?php echo $slide_article_data->article_id;?>">
			<img src="<?php echo base_url().$slide_article_data->article_image; ?>" alt="Chicago" class="slide_img image">
		</a>
		<div class="carousel-caption">
		<h3>
			<a href="<?php echo base_url();?>frontend/article/<?php echo $slide_article_data->article_id;?>" style="color:white;text-decoration:none">
				<?php echo $slide_article_data->title;?>
			</a>
		</h3>
		  <!--<p>Thank you, Chicago!</p>-->
		</div>
	  </div>

	<?php $sl++; } ?>

	</div>

	<!-- Left and right controls -->
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
	  <span class="glyphicon glyphicon-chevron-left"></span>
	  <span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
	  <span class="glyphicon glyphicon-chevron-right"></span>
	  <span class="sr-only">Next</span>
	</a>
	</div>
</div>