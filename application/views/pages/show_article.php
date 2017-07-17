<div class="video_header"> 
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-md-8">
					<div class="home_slider">
						<div class="article_title">
							<h1><?php echo $individual_article->title;?> </h1>
						 </div>
						 <div class="published_date" style="margin-bottom:10px;">
							Published : <?php echo $individual_article->entry_date;?>
						 </div>
						  <img class="img-responsive" src="<?php echo base_url().$individual_article->article_image;?>" style="width:100%">
						 <div class="article_details">
							<?php echo $individual_article->description;?> 
						 </div>
					</div>
					<?php 
						$user_data=$this->session->userdata('userData');
					?>
					<form  class="form-horizontal" action="<?php echo base_url()?>frontend/save_comment/<?php echo $individual_article->article_id;?>" method="post" style="padding-left:15px;">
						<div class="form-group">
							<label class="control-label">Comments</label>
								<textarea type="text" rows="4" name="comment" required class="form-control"></textarea>
								<input type="hidden" name="register_id" value="<?php echo $user_data['register_id']; ?>">
						</div>
						<div class="form-group">
							<?php if(empty($user_data['register_id']))
							{
								echo '<button  type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#login_modal"> Comment </button>';
							}
							else
							{
								echo '<button class="btn btn-success pull-right"> Comment </button>';
							}
							?> 
							
						</div>
					</form>
					
					<div class="comments">
					<?php foreach($comments as $comments_data) { ?>
					<div class="col-sm-12 comments_list" >
						<div class="col-sm-1 col-xs-2">
							<img class="img-circle" src="<?php  echo base_url().$comments_data->register_image?>" width="44" height="44">
						</div>	
						<div class="col-sm-11 col-xs-10">
							<b><?php echo $comments_data->full_name;?></b> <?php echo $comments_data->entry_date;?> <br>
							<?php echo $comments_data->comment;?>
						</div>	
						<div style="clear:both"></div>						
					</div>
					<?php } ?>
					</div> 
				</div>
				<div class="col-sm-4">
					<div class="title_top_videos">
						<h3 style="width:135px;">Related articles</h3>
					</div>
					<?php
						foreach($related_article as $related_article_data)
						{
					?><div class="col-sm-12">
						<div class="row top_videos">
							<div class="col-md-6">
								<a href="<?php echo base_url();?>frontend/article/<?php echo $related_article_data->article_id;?>">
									<img class="test " src="<?php echo base_url().$related_article_data->article_image; ?>" height="80" style="margin-bottom:20px;" width="100%" alt="..."  >
								</a>
							</div>
							<div class="col-md-6">
							<a href="<?php echo base_url();?>frontend/article/<?php echo $related_article_data->article_id;?>">
								<?php echo $related_article_data->title; ?>
							</a>
							</div></div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="login_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			  <ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#login">Login</a></li>
				<li><a data-toggle="tab" href="#registration">Create Account</a></li>
			  </ul>
		</div>
	
    <div class="modal-body">
	<div class="tab-content">
		<div id="login" class="tab-pane fade in active">
		  <!-- general form elements -->
		  <div class="box box-primary">
			<div class="box-header with-border">
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<form action="<?php echo base_url(); ?>frontend/check_register_login/<?php echo $individual_article->article_id;?>" method="post">
			  <div class="box-body">

				<div class="form-group ">
				  <label >Email ID</label>
				  <input type="text" name="email_id" class="form-control" required>
				</div>
				
				<div class="form-group ">
				  <label >Password</label>
				  <input type="password" name="password" class="form-control" required>
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
		
		
		
			<div id="registration" class="tab-pane fade">
		  <!-- general form elements -->
		  <div class="box box-primary">
			<div class="box-header with-border">
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<form action="<?php echo base_url(); ?>frontend/register_save/<?php echo $individual_article->article_id;?>" method="post" enctype="multipart/form-data">
			  <div class="box-body">

				<div class="form-group ">
				  <label >Full Name</label>
				  <input type="text" name="full_name" class="form-control" required>
				</div>
				
				<div class="form-group ">
				  <label >Email ID</label>
				  <input type="text" name="email_id" class="form-control" required>
				</div>
				
				<div class="form-group ">
				  <label >Password</label>
				  <input type="password" name="password" class="form-control" required>
				</div>	
				
				<div class="form-group ">
				  <label>Photo</label>
				  <input type="file" name="register_image" class="form-control" required>
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
	</div>	
    </div>
	
	
	  
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>


