
<?php 

$rss = simplexml_load_file('http://feeds.bbci.co.uk/news/rss.xml');
/*echo '<pre>';
	 print_r($rss);
echo '</pre>';
*/
foreach($rss->channel->item as $item) {

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
	

<?php } ?>