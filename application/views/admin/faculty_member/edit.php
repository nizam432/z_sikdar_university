<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li><a href="<?php echo base_url(); ?>backend_faculty">faculty</a></li>
		  <li class="active">Update Faculty</li>
		</ol>
	</div>
</div>

<div class="col-md-6 col-md-offset-3">
  <!-- general form elements -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Update Faculty</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form action="<?php echo base_url(); ?>backend_faculty/update/<?php echo $faculty_edit->faculty_id ?>" method="post">
	  <div class="box-body">
		<?php 
			if(!empty($this->session->flashdata('faculty_form_validation')))
			{?>
				<div class="alert alert-danger">
					<?php echo $this->session->flashdata('faculty_form_validation'); ?>
				</div>
		<?php }?>	  
		<div class="form-group ">
		  <label >Faculty Member Name</label>
		  <input type="text"  value="<?php echo $faculty_member_edit->faculty_member_name; ?>" name="faculty_member_name" class="form-control" required>
		  <div class="help-block with-errors"></div>
		</div>
		
		<div class="form-group">
		  <label>Faculty</label>
		  <select name="faculty" class="form-control" required>
			<option value="">Please Select</option>
			<?php 
				foreach($faculty as $faculty_data)
				{		
					 echo '<option  '.(($faculty_data->faculty_id==$faculty_member_edit->faculty)? ' selected="selected" ':'').' value="'.$faculty_data->faculty_id.'">'.$faculty_data->faculty_title.'</option>';
				}
			?>			
		  </select>
		  <div class="help-block with-errors"></div>
		</div>
		
		<div class="form-group">
		  <label>Sex</label>
		  <select name="sex" class="form-control" required>
			<option <?php if($faculty_member_edit->sex==1) echo ' selected="selected" ' ?> value="1">Male</option>
			<option <?php if($faculty_member_edit->sex==2) echo ' selected="selected" ' ?> value="2">Female</option>
		  </select>
		  <div class="help-block with-errors"></div>
		</div>
		<div class="form-group ">
		  <label>Date of Birth</label>
		  <input type="text" name="dob" value="<?php echo $faculty_member_edit->dob?>" class="form-control" required>
		  <div class="help-block with-errors"></div>
		</div>			
		<div class="form-group">
		  <label>Blood Group</label>
		  <select name="blood_group" class="form-control" required>
			<option value="">Please Select</option>
				<?php 
					foreach($blood_group as $key_blood_group=>$blood_group_value)
					{		
						 echo '<option  '.(($faculty_member_edit->blood_group==$key_blood_group)? 'selected="selected"':'').'  value="'.$key_blood_group.'">'.$blood_group_value.'</option>';
					}
				?>				
		  </select>
		  <div class="help-block with-errors"></div>
		</div>
		<div class="form-group ">
		  <label>Email ID</label>
		  <input type="text" name="email_id" value="<?php echo $faculty_member_edit->email_id; ?>" class="form-control" required>
		  <div class="help-block with-errors"></div>
		</div>
		<div class="form-group ">
		  <label>Mobile No</label>
		  <input type="text" name="contact_no" value="<?php echo $faculty_member_edit->contact_no; ?>" class="form-control" required>
		  <div class="help-block with-errors"></div>
		</div>			
		<div class="form-group ">
		  <label>Designation</label>
		  <input type="text" name="designation" value="<?php echo $faculty_member_edit->designation; ?>" class="form-control" required>
		  <div class="help-block with-errors"></div>
		</div>
		<div class="form-group ">
		  <label>Qalification</label>
		  <input type="text" name="qualification" value="<?php echo $faculty_member_edit->qualification; ?>" class="form-control" required>
		  <div class="help-block with-errors"></div>
		</div>	
		<div class="form-group ">
		  <label>Joining Date</label>
		  <input type="text" name="join_date" value="<?php echo $faculty_member_edit->join_date; ?>" class="form-control" required>
		  <div class="help-block with-errors"></div>
		</div>	
		<div class="form-group ">
		  <label>Present Address</label>
		  <input type="text" name="present_address" value="<?php echo $faculty_member_edit->present_address; ?>" class="form-control" required>
		  <div class="help-block with-errors"></div>
		</div>	
		<div class="form-group ">
		  <label>Parmanent Address</label>
		  <input type="text" name="permanent_address" value="<?php echo $faculty_member_edit->permanent_address; ?>" class="form-control" required>
		  <div class="help-block with-errors"></div>
		</div>			
		<div class="form-group ">
		  <label>Picture</label>
		  <input type="file" name="faculty_member_photo" class="form-control" required><br>
		  Maximum size 200KB 
		  <div class="help-block with-errors"></div>
		</div>	
		<div class="form-group">
		  <label>Status</label>
		  <select name="status" class="form-control">
			<option value="1">Publish</option>
			<option value="2">Unpublish</option>
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
