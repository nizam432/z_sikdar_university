<div class="article_header"> 
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-8">
					<?php $this->load->view('pages/home_slider.php'); ?>
				</div>

				<div class="col-sm-4">
					<div class="title_top_videos">
						<h3>Top articles</h3>
					</div> 
					<?php
						foreach($top_article as $top_article_data)
						{
					?><div class="col-sm-12">
							<div class="top_videos row hidden-xs">
							
								<div class="col-sm-6 ">
									<a href="<?php echo base_url();?>frontend/article/<?php echo $top_article_data->article_id;?>">
										<img  src="<?php echo base_url().$top_article_data->article_image; ?>"  class="image" width="100%" alt="..."  >
									</a>

								</div>
								<div class="col-sm-6">
									<a href="<?php echo base_url();?>frontend/article/<?php echo $top_article_data->article_id;?>">
										<p><?php echo $top_article_data->title; ?></p>
									</a>
								</div>
							</div>
							
							<div class="top_videos row visible-xs">

									<a href="<?php echo base_url();?>frontend/article/<?php echo $top_article_data->article_id;?>">
										<img  src="<?php echo base_url().$top_article_data->article_image; ?>"  width="100%" alt="..."  >
									</a>
									

									<a href="<?php echo base_url();?>frontend/article/<?php echo $top_article_data->article_id;?>">
										<p style="margin-left:10px"><?php echo $top_article_data->title; ?></p>
									</a>

							</div>
						</div> 
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="home_video_title">
	<h3>Latest BBC 5 Article</h3>
</div>

<?php
$rss = simplexml_load_file('http://feeds.bbci.co.uk/news/rss.xml');
$sl=0;
foreach($rss->channel->item as $item) {
$sl++;
    $title = (string)$item->title[0]; 
    $description = (string)$item->description[0]; 
    $link = (string)$item->link[0];
    $pubDate = (string)$item->pubDate[0]; 

?>
	<div class="bbc_news">
		<div class="imag">
			<a target="_blank" href="<?php echo $link; ?> ">
				<img src="http://news.bbcimg.co.uk/nol/shared/img/bbc_news_120x60.gif">
			</a>
		</div>
		<div class="link_pub_des_div">
		    <h1 style="margin: 0">
		    	<a target="_blank" href="<?php echo $link; ?> ">
		    		<?php echo $title; ?> 
		    	</a>
		    </h1>
		    <div class="pubDate">
		     	<?php echo $pubDate; ?> 
		    </div>
		    <div>
		    	<?php echo $description; ?> 
		    </div>
		</div> <div style="clear: both;"></div>
	</div>
	<?php if($sl==5) break; } ?>

<div class="home_video_title">
	<h3>Latest CNN 5 Article</h3>
</div>



<?php
$rss2 = simplexml_load_file('http://rss.cnn.com/rss/cnn_topstories.rss');

$sl=0;
foreach($rss2->channel->item as $item) {
$sl++;
    $title = (string)$item->title[0]; 
    $description = (string)$item->description[0]; 
    $link = (string)$item->link[0];
    $pubDate = (string)$item->pubDate[0]; 

?>
	<div class="bbc_news">
		<div class="imag">
			<a target="_blank" href="<?php echo $link; ?> ">
				<img src="http://i2.cdn.turner.com/cnn/2015/images/09/24/cnn.digital.png">
			</a>
		</div>
		<div class="link_pub_des_div">
		    <h1 style="margin: 0">
		    	<a target="_blank" href="<?php echo $link; ?> ">
		    		<?php echo $title; ?> 
		    	</a>
		    </h1>
		    <div class="pubDate">
		     	<?php echo $pubDate; ?> 
		    </div>
		    <div>
		    	<?php echo $description; ?> 
		    </div>
		</div> <div style="clear: both;"></div>
	</div>
	

<?php if($sl==5) break; } ?>




<div class="home_video">

	<div class="home_video_title">
		<h3>Latest articles</h3>
	</div>

	<div class="row">
		<?php
			$sl=1;
			foreach($home_article as $home_article_data)
			{
					
				if($sl==4)
				{
					$individual_class='individual_video2';
					$sl=0;
				}
				else
				{
					$individual_class='individual_video';
				}
				$sl++;
		?>
			
		  <div class="col-sm-4 col-md-3 ">
			<div class="<?php echo $individual_class; ?>">
				<a href="<?php echo base_url();?>frontend/article/<?php echo $home_article_data->article_id;?>">
					<img class="test img-responsive " src="<?php echo base_url().$home_article_data->article_image; ?>" width="100%" alt="..."   >
				</a>
				
			  <div class="title">
				<h1>
					<a href="<?php echo base_url();?>frontend/article/<?php echo $home_article_data->article_id;?>"> <?php echo $home_article_data->title; ?> </a>
				</h1>
			  </div>
			</div>
		 </div>

		<?php
		}
		?>
		<div class="col-xs-12">
			<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>
</div>

