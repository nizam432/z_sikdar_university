<div class="container">
	<div class="logo col-sm-6">
		<a href="<?php echo base_url()?>">
			<img src="<?php echo base_url()?>/assets/frontend/images/logo.jpg"  width="200" style="margin:20px 0px;">
		</a>
	</div>
	<div class="col-sm-6">
		<?php $user_data=$this->session->userdata('userData');
		if(!empty($user_data['register_name']))
		{
		?>
		<div class="pull-right user_profile">
			<img class="img-circle" src="<?php echo base_url().$user_data['register_image'];?>" width="44" height="44">  			
			<?php echo $user_data['register_name'];?> |
			<a href="<?php echo base_url()?>frontend/logout_register"><b>  Logout</b> <i class="fa fa-sign-out"></i></a>
		</div>
		<?php } ?>
	</div>
</div>
<?php //echo $authUrl; ?>