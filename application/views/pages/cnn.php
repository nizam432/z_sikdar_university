<?php
$rss2 = simplexml_load_file('http://rss.cnn.com/rss/cnn_topstories.rss');


foreach($rss2->channel->item as $item) {

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
	

<?php } ?>