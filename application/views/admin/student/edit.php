<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>/backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li><a href="<?php echo base_url(); ?>backend_student">Student</a></li>
		  <li class="active">Update Student</li>
		</ol>
	</div>
</div>

<div class="col-md-12 ">
  <!-- general form elements  -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Update Student Information</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form action="<?php echo base_url(); ?>backend_student/update/<?php echo $student_edit->std_row_id ?>" method="post" data-toggle="validator"  class="form-horizontal" enctype="multipart/form-data">
	  <div class="box-body">
		<?php 
			if(!empty($this->session->flashdata('student_form_validation')))
			{?>
				<div class="alert alert-danger">
					<?php echo $this->session->flashdata('student_form_validation'); ?>
				</div>
			<?php }?>
  <div class="panel panel-primary">
	<div class="panel-heading">
	  Personal Information
	</div>
	<div class="panel-body">
		<div class="form-group ">
		  <label class="col-sm-2 ">Student Name</label>
		  <div class="col-sm-10">
			<input type="text" name="student_full_name" value="<?php echo $student_edit->student_full_name ?>" class="form-control" required >
			<div class="help-block with-errors"></div>
		  </div>
		</div>
		<div class="form-group ">
		  <label class="col-sm-2 ">Father's Name</label>
		   <div class="col-sm-4">
			<input type="text" name="father_name" value="<?php echo $student_edit->father_name ?>" class="form-control" required>
			<div class="help-block with-errors"></div>
		  </div>

		  <label class="col-sm-2 ">Mother's Name</label>
		  <div class="col-sm-4">
			<input type="text" name="mother_name"  value="<?php echo $student_edit->mother_name ?>" class="form-control" required>
			<div class="help-block with-errors"></div>
		  </div>
		</div>
		<div class="form-group ">
			<label class="col-sm-2 ">Marital Status</label>
			<div class="col-sm-4">
			  <select name="marital_status" class="form-control" id="marital_status" required>
				<option <?php if($student_edit->marital_status==1) echo ' selected="selected" ' ?>  value="1">Unmarried</option>
				<option <?php if($student_edit->marital_status==2) echo ' selected="selected" ' ?> value="2">Married</option>
				<option <?php if($student_edit->marital_status==3) echo ' selected="selected" ' ?> value="3">Other</option>
			  </select>
			  <div class="help-block with-errors"></div>
			</div>
		<label class="col-sm-2 ">Sex</label>
		  <div class="col-sm-4">
			<select name="sex" class="form-control"  required>
				<option value="">Please select</option>
				<option <?php if($student_edit->sex==1) echo ' selected="selected "' ?> value="1">Male</option>
				<option <?php if($student_edit->sex==2) echo ' selected="selected "' ?>  value="2">Female</option>
			  </select>
			  <div class="help-block with-errors"></div>
		  </div>
		</div>
		<div id="spouse_field">
		<?php if($student_edit->marital_status==2) { ?>
			<div class="form-group remove_spouse"><label class="col-sm-2 ">Spouse Name</label>

				<div class="col-sm-4">
					<input type="text" name="spouse_name"  value="<?php echo $student_edit->spouse_name; ?>" required class="form-control">
				</div>
			</div>
		<?php }?>
		</div>
		
		<div class="form-group ">
		  <label class="col-sm-2 ">Date of Birth</label>
		  <div class="col-sm-4">
			<div class="input-group date">
			  <div class="input-group-addon">
				<i class="fa fa-calendar"></i>
			  </div>
               <input type="text"  name="dob" value="<?php echo $student_edit->dob ?>"  class="form-control pull-right datepicker" required>
            </div>
			<div class="help-block with-errors"></div>
		  </div>

		  <label class="col-sm-2 ">Blood Group</label>
		  <div class="col-sm-4">
			  <select name="blood_group" class="form-control" required>
				<option value="">Please select</option>
				<?php 
					foreach($blood_group as $key_blood_group=>$blood_group_value)
					{		
						 echo '<option '.(($student_edit->blood_group==$key_blood_group)? 'selected="selected"':'').' value="'.$key_blood_group.'">'.$blood_group_value.'</option>';
					}
				?>					
			  </select>
			  <div class="help-block with-errors"></div>
		  </div>
		</div>	
		<div class="form-group">
		  <label class="col-sm-2 ">Contact Self</label>
		  <div class="col-sm-4">
			<input type="text" name="contact_self" value="<?php echo $student_edit->contact_self; ?>" class="form-control" required>
			<div class="help-block with-errors"></div>
		  </div>

		  <label class="col-sm-2">Contact Family</label>
		  <div class="col-sm-4">
			<input type="text" name="contact_family" value="<?php echo $student_edit->contact_family; ?>" class="form-control" required>
			<div class="help-block with-errors"></div>
		  </div>
		</div>	
		
		<div class="form-group ">
		  <label class="col-sm-2 ">Present Address</label>
		  <div class="col-sm-10">
			<input type="text" name="present_address" value="<?php echo $student_edit->present_address; ?>" class="form-control" required>
			<div class="help-block with-errors"></div>
		  </div>
		  </div>
		<div class="form-group ">  
		  <label class="col-sm-2 ">Permenent Address</label>
		  <div class="col-sm-10">
			<input type="text" name="permanent_address" value="<?php echo $student_edit->permanent_address; ?>" class="form-control" required>
			<div class="help-block with-errors"></div>
		  </div>
		</div>	
		
		<div class="form-group ">
		  <label class="col-sm-2 ">Nationality</label>
		  <div class="col-sm-4">
			  <select name="nationality" class="form-control" required>
				<option  <?php if($student_edit->nationality==1) echo ' selected="selected" ' ?> value="1">Bangladeshi</option>
				<option  <?php if($student_edit->nationality==1) echo ' selected="selected" ' ?> value="2">Foreign</option>
			  </select>
			  <div class="help-block with-errors"></div>
		  </div>

		 <label class="col-sm-2 ">Email ID</label>
		   <div class="col-sm-4">
			<input type="text" name="email_id" class="form-control" value="<?php echo $student_edit->email_id;?>" required>
		  </div>
		  <div class="help-block with-errors"></div>
		</div>	
		<div class="form-group ">
		  <label class="col-sm-2 ">National ID</label>
		   <div class="col-sm-4">
			<input type="text" name="national_id" class="form-control" value="<?php echo $student_edit->national_id;?>">
			<div class="help-block with-errors"></div>
		  </div>

		  <label class="col-sm-2 ">Birth Registration</label>
		  <div class="col-sm-4">
			<input type="text" name="birth_id" class="form-control" value="<?php echo $student_edit->birth_id;?>" >
			<div class="help-block with-errors"></div>
		  </div>
		</div>		

		<div class="form-group ">
			 <label class="col-sm-2 ">Credit Transfer</label> 
			 <div class="col-sm-4">
				  Yes <input type="radio" <?php if($student_edit->credit_transfer==1) echo ' checked="checked" ' ?> name="credit_transfer" id="credit_t_yes" value="1" >
				  No  <input type="radio" <?php if($student_edit->credit_transfer==2) echo ' checked="checked" ' ?> name="credit_transfer" id="credit_t_no" value="2">
			</div>
			 <label class="col-sm-2 ">Physical Challenge</label>
			  <div class="col-sm-4">
			  Yes <input type="radio" <?php if($student_edit->physical_challenge==1) echo ' checked="checked" ' ?>  name="physical_challenge" value="1" >
			  No <input type="radio" <?php if($student_edit->physical_challenge==2) echo ' checked="checked" ' ?> name="physical_challenge"  value="2">
			</div>			
		</div>

		<div class="form-group" id="credit_transfer_item">
		<?php 
			if($student_edit->credit_transfer==1)
			{
				?>
			
		<div class="form-group credit_info">
			<label class="col-sm-2 ">Completed Credit</label>
			<div class="col-sm-4">

				<label class="col-sm-6">Credit</label>
				<label class="col-sm-6">CGPA</label>
				<div class="col-sm-6">
					<input type="text" name="credit" value="<?php if(!empty($credit->credit)) echo $credit->credit;?>" required class="form-control"></div>
				<div class="col-sm-6">
					<input type="text" required value="<?php  if(!empty($credit->cgpa)) echo $credit->cgpa; ?>" name="cgpa" class="form-control">
				</div>
			</div>
		</div>
			<?php }?>
		</div>
	</div> 
</div>

  <div class="panel panel-primary">
	<div class="panel-heading">
	  Education Qualification
	</div>
	<div class="panel-body">
		<div class="form-group ">
		  <label class="col-sm-3 ">Degree</label>
		  <label class="col-sm-3 ">Passing Year</label>
		  <label class="col-sm-3 ">DIV/GPA</label>
		  <label class="col-sm-3 ">Board/Institute</label>
		 
		
		<fieldset class="brother" style="width:100%">
			
			<?php 
			$number_of_row=count($qualification);
			$sl=0;
			foreach($qualification as $key=>$qualification_data){
				$sl++;
				?>
			<div class="bro">
				  <div class="col-sm-3">
					<input type="text" name="degree_title[]" value="<?php echo $qualification_data->degree_title ?>" required  class="form-control">
				  </div>
				  
				  <div class="col-sm-3">
					<input type="text" name="passing_year[]" value="<?php echo $qualification_data->passing_year ?>"required class="form-control">
				  </div>
				  
				  <div class="col-sm-3">
					<input type="text" name="div_or_cgpa[]"  value="<?php echo $qualification_data->div_or_cgpa ?>" required class="form-control">
				  </div>
				  <div class="col-sm-3">
					<input type="text" name="board_or_institiute[]" value="<?php echo $qualification_data->board_or_institiute ?>" required class="form-control">
				  </div>
				<br>
				<div class="col-sm-12 pull-right">
				<a class="btn btn-info pull-right" required name="addnewbro"><?php if($number_of_row==$sl) echo '+'; else echo '-';?></a>
				</div >
			</div>
			<?php } ?>
		</fieldset>	 
		
		</div>	
	</div>
	
</div>

  <div class="panel panel-primary">
	<div class="panel-heading">
	  For Official Use
	</div>
	<div class="panel-body">
		<div class="form-group ">
		  <label class="col-sm-2 ">Student ID</label>
		  <div class="col-sm-4">		  
			<input type="text" name="student_id" value="<?php echo $student_edit->student_id; ?>" class="form-control" required>
		  </div>
		  <label class="col-sm-2 ">Reg.No. </label>
		  <div class="col-sm-4">
			<input type="text" name="reg_no" value="<?php echo $student_edit->reg_no; ?>" class="form-control" required>
		  </div>
		</div>			
		<div class="form-group ">
		  <label class="col-sm-2 ">Semester</label>
		  <div class="col-sm-4">		  
			  <select name="semester" class="form-control" required>
				<option value="">Please select</option>
				<?php 
					foreach($semester as $semester_data)
					{		
						 echo '<option '.(($semester_data->semester_id==$student_edit->semester)? 'selected="selected"':'').' value="'.$semester_data->semester_id.'">'.$semester_data->semester_title.'</option>';
					}
				?>				
			  </select>
		   </div>

		  <label class="col-sm-2 ">Session</label>
		  <div class="col-sm-4">			  
			  <select name="session" class="form-control" required>
				<option value="">Please select</option>
				<?php 
					foreach($session as $session_data)
					{		
						 echo '<option '.(($session_data->session_id==$student_edit->session)? 'selected="selected"':'').' value="'.$session_data->session_id.'">'.$session_data->session_title.'</option>';
					}
				?>				
			  </select>
		  </div>
		</div>
	
		<div class="form-group ">
		  <label class="col-sm-2 ">Faculty</label>
		  <div class="col-sm-4">
			  <select name="faculty" class="form-control faculty" required>
				<option value="">Please select</option>
				<?php 
					foreach($faculty as $faculty_data)
					{		
						 echo '<option '.(($faculty_data->faculty_id==$student_edit->faculty)? 'selected="selected"':'').' value="'.$faculty_data->faculty_id.'">'.$faculty_data->faculty_title.'</option>';
					}
				?>
			  </select>
		  </div>
		  <label class="col-sm-2 ">Department</label>
		  <div class="col-sm-4">		  
			  <select name="department" class="form-control department" required>
				<?php 
					foreach($department as $department_data)
					{		
						 echo '<option '.(($department_data->department_id==$student_edit->department)? 'selected="selected"':'').' value="'.$department_data->department_id.'">'.$department_data->department_title.'</option>';
					}
				?>
			  </select>
		   </div>
		</div>
		
		<div class="form-group ">
		  <label class="col-sm-2 ">Program</label>
		  <div class="col-sm-4">			  
			  <select name="program" class="form-control program" required>
			  	<?php 
					foreach($program as $program_data)
					{		
						 echo '<option '.(($program_data->program_id==$student_edit->program)? 'selected="selected"':'').' value="'.$program_data->program_id.'">'.$program_data->program_title.'</option>';
					}
				?>
			  </select>
		  </div>	  
		  <label class="col-sm-2 ">Section</label>
		  <div class="col-sm-4">			  
			  <select name="section" class="form-control" required>
				<option value="">Please select</option>
				<?php 
					foreach($section as $section_data)
					{		
						 echo '<option '.(($section_data->section_id==$student_edit->section)? 'selected="selected"':'').' value="'.$section_data->section_id.'">'.$section_data->section_title.'</option>';
					}
				?>
			  </select>
			</div>
		</div>	
		<div class="form-group ">
		  <label class="col-sm-2 ">Shift</label>
		  <div class="col-sm-4">
			  <select name="shift" class="form-control" required>
				<option value="">Please select</option>
				<?php 
					foreach($shift as $shift_data)
					{		
						 echo '<option '.(($shift_data->shift_id==$student_edit->shift)? 'selected="selected"':'').' value="'.$shift_data->shift_id.'">'.$shift_data->shift_title.'</option>';
					}
				?>				
			  </select>
			</div>
			
		  <label class="col-sm-2 ">Admission Date</label>
		  <div class="col-sm-4">		  
			<div class="input-group date">
			  <div class="input-group-addon">
				<i class="fa fa-calendar"></i>
			  </div>
               <input type="text"  name="admission_date" value="<?php echo $student_edit->admission_date; ?>" class="form-control pull-right datepicker" required >
            </div>			
		   </div>
		</div>	
	
		<div class="form-group">
		  <label class="col-sm-2 ">Admission Status</label>
		   <div class="col-sm-4">
			  <select name="status" class="form-control">
				<option  <?php if($student_edit->graduation_type==1) echo ' checked="checked" ' ?>   value="1">Active</option>
				<option  <?php if($student_edit->graduation_type==2) echo ' checked="checked" ' ?>   value="2">Cancelled</option>
			  </select>
		  </div>
		  <label class="col-sm-2 ">Type</label>
		  <div class="col-sm-4">
		   <label class="">Undergraduate</label>
			 <input type="radio" value="1"  <?php if($student_edit->graduation_type==1) echo ' checked="checked" ' ?>   name="graduation_type" > &nbsp;&nbsp;&nbsp;
			 <label class="">Graduate</label>
			<input type="radio"  <?php if($student_edit->graduation_type==2) echo ' checked="checked" ' ?> value="2" name="graduation_type">
		  </div>		  
		</div>
		<div class="form-group">
		  <label class="col-sm-2 ">Student Photo</label>
		   <div class="col-sm-4">
			  <input type="file" id="student_photo" name="student_photo"><br>
			  Maximum photo size  200kb
			  
		  </div>	
		<div class="col-sm-2">
			  <img src="<?php echo base_url().$student_edit->student_photo;?>" class="img-responsive">
		  </div>			  
		</div>		
	  </div>
</div>
	  <!-- /.box-body -->
	  <div class="box-footer">
		<div class="col-sm-offset-5">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	  </div>
	</form>
  </div>
  <!-- /.box -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
$('#student_photo').bind('change', function() {

  //this.files[0].size gets the size of your file.
  var file_size=this.files[0].size;
  if(file_size>204800)
  {
	  alert('Maximum  student photo size 200KB.');
	  this.value = null;
  }

});
	//Education qualification more row
	$(document).ready(function() {
	  $(' a[name="addnewbro"]').live('click', function() {
		if ($(this).text().indexOf('+') > -1) {
		  var cp = $(this).parent().parent().clone();
		  $(cp).find('a[name="addnewbro"]').text('-');
		  $(cp).insertBefore($(this).parent().parent().val(''));
		  $(this).parent().parent().find('input').val('');
		} else {
		  $(this).parent().parent().next().remove();
		  $('a[name="addnewbro"]:last').text('+');
		}
	  });
	});
	
	
	// Credit filed load
	 $('#credit_t_yes').click(function () {
		 $('.credit_info').remove();
	   $('#credit_transfer_item').append('<div class="form-group credit_info"><label class="col-sm-2 ">Completed Credit</label><div class="col-sm-4"><label class="col-sm-6">Credit</label><label class="col-sm-6">CGPA</label><div class="col-sm-6"><input type="text" name="credit" required value="<?php if(!empty($credit->credit)) echo $credit->credit;?>" class="form-control"></div><div class="col-sm-6"><input type="text" required value="<?php if(!empty($credit->cgpa)) echo $credit->cgpa;?>" name="cgpa" class="form-control"></div</div></div></div>');
	 });	
	 
	 $('#credit_t_no').click(function () {
	   $('.credit_info').remove();
	 });
	 
	 //Martila status field laod
	 $('#marital_status').change(function () {
		 var marital_status=$('#marital_status').val();
		 if(marital_status==2)
		 {
			$('.remove_spouse').remove();
			$('#spouse_field').append('<div class="form-group remove_spouse"><label class="col-sm-2 ">Spouse Name</label><div class="col-sm-4"><input type="text" name="spouse_name" value="<?php echo $student_edit->spouse_name; ?>" required class="form-control"></div></div>');
		 }else
		 {
			 $('.remove_spouse').remove();
		 }
	 });
	 
	 // Faculty data load
	$('.faculty').change(function(){
	  $.ajax({
		type: "POST",
		url: "<?php echo base_url();?>backend_student/get_department",
		data:{id:$(this).val()}, 
		beforeSend :function(){
		$(".department option:gt(0)").remove(); 
		$('.department').find("option:eq(0)").html("Please wait..");

		},                         
		success: function (data) {
		  /*get response as json */
		   $('.department').find("option:eq(0)").html("Please Select");
		  var obj=jQuery.parseJSON(data);
		  $(obj).each(function()
		  {
		   var option = $('<option />');
		   option.attr('value', this.value).text(this.label);           
		   $('.department').append(option);
		 });  

		  /*ends */

		}
	  });
	});	 

	//Department data load 
	$('.department').change(function(){
	  $.ajax({
		type: "POST",
		url: "<?php echo base_url();?>backend_student/get_program",
		data:{id:$(this).val()}, 
		beforeSend :function(){
		$(".program option:gt(0)").remove(); 
		$('.program').find("option:eq(0)").html("Please wait..");

		},                         
		success: function (data) {
		  /*get response as json */
		   $('.program').find("option:eq(0)").html("Please Select");
		  var obj=jQuery.parseJSON(data);
		  $(obj).each(function()
		  {
		   var option = $('<option />');
		   option.attr('value', this.value).text(this.label);           
		   $('.program').append(option);
		 });  
		  /*ends */
		}
	  });
	});	

</script>

