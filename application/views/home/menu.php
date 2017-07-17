<div class="main_menu">
	<nav class="navbar navbar-default">
	<div class="container">
		<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-left">
				<li><a href="<?php echo base_url()?>frontend">Home</a></li>
                <li><a href="<?php echo base_url()?>frontend/bbc">BBC</a></li>
                <li><a href="<?php echo base_url()?>frontend/cnn">CNN</a></li>
				<?php
					foreach($category as  $category_data)
					{
						echo '<li><a href="'.base_url().'frontend/category/'.$category_data->category_id.'">'.$category_data->category_name.'</a></li>';
					}
					
				?>
				
			</ul>
		</div><!-- /.container-fluid -->
	  </div></div>
	</nav>
</div>
