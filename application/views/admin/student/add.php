<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>/backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li><a href="<?php echo base_url(); ?>backend_student">Student</a></li>
		  <li class="active">Add New Student</li>
		</ol>
	</div>
</div>

<div class="col-md-12 ">
  <!-- general form elements  -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Add New Student</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form action="<?php echo base_url(); ?>backend_student/save" method="post" class="form-horizontal">
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
			<input type="text" name="student_full_name" class="form-control">
		  </div>
		</div>
		<div class="form-group ">
		  <label class="col-sm-2 ">Father's Name</label>
		   <div class="col-sm-4">
			<input type="text" name="father_name" class="form-control">
		  </div>

		  <label class="col-sm-2 ">Mother's Name</label>
		  <div class="col-sm-4">
			<input type="text" name="mother_name" class="form-control">
		  </div>
		</div>
		<div class="form-group ">
			<label class="col-sm-2 ">Marital Status</label>
			<div class="col-sm-4">
			  <select name="marital_status" class="form-control" id="marital_status">
				<option value="">Please select</option>
				<option value="1">Unmarried</option>
				<option value="2">Married</option>
				<option value="3">Other</option>
			  </select>
			</div>
		</div>
		<div id="spouse_field">
		</div>
		
		<div class="form-group ">
		  <label class="col-sm-2 ">Date of Birth</label>
		  <div class="col-sm-4">
			<input type="text" name="dob" class="form-control">
		  </div>

		  <label class="col-sm-2 ">Blood Group</label>
		  <div class="col-sm-4">
			  <select name="blood_group" class="form-control">
				<option value="">Please select</option>
			  </select>
		  </div>
		</div>	
		<div class="form-group ">
		  <label class="col-sm-2 ">Contact Self</label>
		  <div class="col-sm-4">
			<input type="text" name="contact_self" class="form-control">
		  </div>

		  <label class="col-sm-2 ">Contact Family</label>
		  <div class="col-sm-4">
			<input type="text" name="contact_family" class="form-control">
		  </div>
		</div>	
				
		<div class="form-group ">
		  <label class="col-sm-2 ">Present Address</label>
		  <div class="col-sm-4">
			<input type="text" name="present_address" class="form-control">
		  </div>
		  <label class="col-sm-2 ">Permenent Address</label>
		  <div class="col-sm-4">
			<input type="text" name="permanent_address" class="form-control">
		  </div>
		</div>	
		
		<div class="form-group ">
		  <label class="col-sm-2 ">Nationality</label>
		  <div class="col-sm-4">
			  <select name="nationality" class="form-control">
				<option value="">Please select</option>
				<option value="1">Bangladeshi</option>
				<option value="2">Forieng</option>
			  </select>
		  </div>

		 <label class="col-sm-2 ">Email ID</label>
		   <div class="col-sm-4">
			<input type="text" name="email_id" class="form-control">
		  </div>
		</div>	
		<div class="form-group ">
			 <label class="col-sm-2 ">Physical Challenge</label>
			  <div class="col-sm-4">
			  Yes <input type="radio" name="physical_challenge" value="1" >
			  No <input type="radio" name="physical_challenge" checked="checked" value="2">
			</div>
			

			 <label class="col-sm-2 ">Credit Transfer</label> 
			 <div class="col-sm-4">
				  Yes <input type="radio" name="credit_transfer" id="credit_t_yes" value="1" >
				  No  <input type="radio" checked="checked" name="credit_transfer" id="credit_t_no" value="2">
			</div>
		</div>

		<div class="form-group" id="credit_transfer_item">

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
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		
		<fieldset class="brother" style="width:100%">
			<div class="bro">
				  <div class="col-sm-3">
					<input type="text" name="degree_title[]" class="form-control">
				  </div>
				  
				  <div class="col-sm-3">
					<input type="text" name="passing_year[]" class="form-control">
				  </div>
				  
				  <div class="col-sm-3">
					<input type="text" name="div_or_cgpa[]" class="form-control">
				  </div>
				  <div class="col-sm-3">
					<input type="text" name="board_or_institiute[]" class="form-control">
				  </div>
				<br>
				<div class="col-sm-12 pull-right">
				<a class="btn btn-info pull-right" name="addnewbro">+</a>
				</div >
			</div>
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
			<input type="text" name="student_id" class="form-control">
		  </div>
		  <label class="col-sm-2 ">Reg.No. </label>
		  <div class="col-sm-4">
			<input type="text" name="student_id" class="form-control">
		  </div>
		</div>			
		<div class="form-group ">
		  <label class="col-sm-2 ">Semester</label>
		  <div class="col-sm-4">		  
			  <select name="semester" class="form-control">
				<option value="">Please select</option>
			  </select>
		   </div>

		  <label class="col-sm-2 ">Session</label>
		  <div class="col-sm-4">			  
			  <select name="session" class="form-control">
				<option value="">Please select</option>
			  </select>
		  </div>
		</div>
	
		<div class="form-group ">
		  <label class="col-sm-2 ">Faculty</label>
		  <div class="col-sm-4">
			  <select name="faculty" class="form-control faculty">
				<option value="">Please select</option>
				<?php 
					foreach($faculty as $faculty_data)
					{		
						 echo '<option value="'.$faculty_data->faculty_id.'">'.$faculty_data->faculty_title.'</option>';
					}
				?>
			  </select>
		  </div>
		  <label class="col-sm-2 ">Department</label>
		  <div class="col-sm-4">		  
			  <select name="department" class="form-control department">
				<option value="">Please select</option>
			  </select>
		   </div>
		</div>
		
		<div class="form-group ">
		  <label class="col-sm-2 ">Program</label>
		  <div class="col-sm-4">			  
			  <select name="program" class="form-control program">
				<option value="">Please select</option>
			  </select>
		  </div>	  
		  <label class="col-sm-2 ">Section</label>
		  <div class="col-sm-4">			  
			  <select name="section" class="form-control">
				<option value="">Please select</option>
			  </select>
			</div>
		</div>	
		<div class="form-group ">
		  <label class="col-sm-2 ">Shift</label>
		  <div class="col-sm-4">
			  <select name="shift" class="form-control">
				<option value="">Please select</option>
			  </select>
			</div>
			
		  <label class="col-sm-2 ">Admission Date</label>
		  <div class="col-sm-4">		  
			<input type="text" name="admission_date" class="form-control">
		   </div>
		</div>	
	
		<div class="form-group">
		  <label class="col-sm-2 ">Admission Status</label>
		   <div class="col-sm-4">
			  <select name="status" class="form-control">
				<option value="1">Active</option>
				<option value="2">Cancelled</option>
			  </select>
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

<script>
	$(document).ready(function() {
	  $('a[name="addnewbro"]').live('click', function() {
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
	
	 $('#credit_t_yes').click(function () {
		 $('.credit_info').remove();
	   $('#credit_transfer_item').append('<div class="form-group credit_info"><label class="col-sm-2 ">Completed Credit</label><div class="col-sm-4"><label class="col-sm-6">Credit</label><label class="col-sm-6">CGPA</label><div class="col-sm-6"><input type="text" name="credit" class="form-control"></div><div class="col-sm-6"><input type="text" name="cgpa" class="form-control"></div</div></div></div>');
	 });	
	 
	 $('#credit_t_no').click(function () {
	   $('.credit_info').remove();
	 });
	 
	 $('#marital_status').change(function () {
		 var marital_status=$('#marital_status').val();
		 if(marital_status==2)
		 {
			$('.remove_spouse').remove();
			$('#spouse_field').append('<div class="form-group remove_spouse"><label class="col-sm-2 ">Spouse Name</label><div class="col-sm-4"><input type="text" name="spouse_name" class="form-control"></div></div>');
		 }else
		 {
			 $('.remove_spouse').remove();
		 }
	 });
	 
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

