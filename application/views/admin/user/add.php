<div class="user_form">
	<h2>Add user</h2>
	<?php 
		$message_success=$this->session->userdata('message');
		if(isset($message_success))
		{
			echo '<div class="alert alert-success" role="alert">'.$message_success.'</div>';
			$this->session->unset_userdata('message');
		}
	?>
	<form class="form-horizontal" action="<?php echo base_url(); ?>backend_user/save" data-toggle="validator" method="post">

		<div class="form-group">
			<label class="col-sm-2 control-label">Name</label>
			<div class="col-sm-4 ">
				<input type="text" name="name" class="form-control" required>
			</div>
		</div>			
		<div class="form-group">
			<label class="col-sm-2 control-label">Email</label>
			<div class="col-sm-4 ">
				<input type="text" name="email_id" class="form-control" required>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Password</label>
			<div class="col-sm-4 ">
				<input type="password" name="password" class="form-control" required>
			</div>
		</div>	
		
		<div class="form-group">
			<label class="col-sm-2 control-label">User Type</label>
			<div class="col-sm-4 ">
				<select name="user_type" class="form-control" >
					<option value="">Please Select</option>
					<option value="1">Admin</option>
					<option value="2">User</option>
					
				</select>
			</div>
		</div>	
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Status</label>
			<div class="col-sm-4 ">
				<select name="status" class="form-control" >
					<option value="">Please Select</option>
					<option value="1">Active</option>
					<option value="2">Inactive</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</form>
</div>