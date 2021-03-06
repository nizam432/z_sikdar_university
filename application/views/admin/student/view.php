<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>/backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li><a href="<?php echo base_url(); ?>backend_student">Student</a></li>
		  <li class="active">Student Information</li>
		</ol>
	</div>
</div>
<?php // echo '<pre>'; print_r($student_info); echo '</pre>';?>

<div class="col-md-12 printablediv" id="printablediv">
  <!-- general form elements  -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Student Information</h3>
	</div>
  <div class="panel panel-primary">
	<div class="panel-heading">
	  Personal Information
	</div>
		<div class="panel-body">
			<table class="table table-bordered table-striped">
				<tr>
					<th>Student Name</th>
					<td colspan="3"><?php echo $student_info->student_full_name;?></td>			
				</tr>
				<tr>
					<th>Father's Name</th>
					<td><?php echo $student_info->father_name;?></td>
					<th>Mother's Name</th>
					<td><?php echo $student_info->mother_name;?></td>
				</tr>
				<tr>
					<th>Marital Status</th>
					<td>
						<?php 
							if($student_info->marital_status==1) echo 'Unmarried';
							if($student_info->marital_status==2) echo 'Married';
							if($student_info->marital_status==3) echo 'Other';
						?>			
					</td>
					<th>Sex</th>
					<td>
						<?php 
							if($student_info->sex==1) echo 'Male';
							if($student_info->sex==2) echo 'Female';
						?>	
					</td>
				</tr>	
				
				<?php if($student_info->marital_status==2) 
				{
					echo '<tr>
						<th>Spouse Name</th>
						<td colspan="3">'.$student_info->spouse_name.'</td>			
					</tr>';
				}
				?>
				<tr>
					<th>Date of Birth</th>
					<td><?php echo $student_info->dob;?></td>
					<th>Blood Group</th>
					<td><?php 
						foreach($blood_group as $key=>$value)
						{
							if($key==$student_info->blood_group) 
							{
								echo $value;
								break;
							}
						}
						?>
					</td>
				</tr>	
				<tr>
					<th>Contact Self</th>
					<td><?php echo $student_info->contact_self;?></td>
					<th>Contact Family</th>
					<td><?php echo $student_info->contact_family;?></td>
				</tr>	

				<tr>
					<th>Present Address</td>
					<td colspan="3"><?php echo $student_info->present_address;?></td>
				</tr>
				<tr>
					<th>Permenent Address</td>
					<td colspan="3"><?php echo $student_info->permanent_address;?></td>
				</tr>		
				<tr>
					<th>Nationality</td>
					<td>
						<?php 
						if($student_info->nationality)
						{
							if($student_info->nationality==1) echo 'Bangladeshi';
							if($student_info->nationality==2) echo 'Foreign';
						}
							
						?>
					</td>
					<th>Email ID</th>
					<td><?php echo $student_info->email_id;?></td>
				</tr>	
				<tr>
					<?php if(!empty($student_info->national_id))
					{ ?>
					<th>National ID</td>
					<td><?php echo $student_info->national_id;?></td>
					<?php } else {?>
					<th>Birth Registration</th>
					<td><?php echo $student_info->birth_id;?></td>
					<?php } ?>
					<th>Physical Challenge</th>
					<td><?php 
							if($student_info->physical_challenge==1) echo 'Yes'; else echo "No"; ?></td>
				</tr>			
			</table>

	</div>
</div>

	<div class="panel panel-primary">
		<div class="panel-heading">
		  Education Qualification
		</div>
		<div class="panel-body">
			<table class="table table-bordered table-striped">
				<tr>
					<th>Degree</th>
					<th>Passing Year</th>	
					<th>DIV/GPA</th>
					<th>Board/Institute</th>
				</tr>
				<?php 
					foreach($qualification as $key=>$qualification_data)
					{

						echo '	<tr>
									<th>'.$qualification_data->degree_title.'</th>
									<th>'.$qualification_data->passing_year.'</th>	
									<th>'.$qualification_data->div_or_cgpa.'</th>
									<th>'.$qualification_data->board_or_institiute.'</th>
								</tr>';								
					}
				?>
			</table>
		</div>	
	</div>

	<div class="panel panel-primary">
		<div class="panel-heading">
		  For Official Use
		</div>
		<div class="panel-body">
			<table class="table table-bordered table-striped">	
				<tr>
					<th>Student ID</th>
					<td><?php echo $student_info->student_id;?></td>
					<th>Reg.No</th>
					<td><?php echo $student_info->reg_no;?></td>
				</tr>	
				<tr>
					<th>Semester</th>
					<td><?php echo $student_info->semester_title;?></td>
					<th>Session</th>
					<td><?php echo $student_info->session_title;?></td>
				</tr>	
				<tr>
					<th>faculty</th>
					<td><?php echo $student_info->faculty_title;?></td>
					<th>department</th>
					<td><?php echo $student_info->department_title;?></td>
				</tr>		
				<tr>
					<th>Program</th>
					<td><?php echo $student_info->program_title;?></td>
					<th>Section</th>
					<td><?php echo $student_info->section_title;?></td>
				</tr>
				<tr>
					<th>Admission Date</th>
					<td><?php echo $student_info->admission_date;?></td>
					<th>Admission status</th>
					<td>
						<?php 						
							if($student_info->status==1) echo 'Active';
							if($student_info->status==2) echo 'Cancel';
						?>					
					</td>
				</tr>	
				<tr>
					<th>Type</th>
					<td>
						<?php 						
							if($student_info->graduation_type==1) echo 'TypeUndergraduate';
							if($student_info->graduation_type==2) echo 'Graduate';
						?>
					</td>
					<th>Student Photo</th>
					<td><img src="<?php echo base_url().$student_info->student_photo;?>" class="img-responsive" width="100" height="100"></td>
				</tr>				
			</table>		
		</div>
	</div>
  <!-- /.box -->
</div>

</div>

<input type="button" class="btn btn-primary col-offset-12" value="Print" onclick="javascript:printDiv('printablediv')" />

<script language="javascript" type="text/javascript">
	function printDiv(divID) {
		//Get the HTML of div
		var divElements = document.getElementById(divID).innerHTML;
		//Get the HTML of whole page
		var oldPage = document.body.innerHTML;

		//Reset the page's HTML with div's HTML only
		document.body.innerHTML = 
		  "<html><head><title></title></head><body>" + 
		  divElements + "</body>";

		//Print Page
		window.print();

		//Restore orignal HTML
		document.body.innerHTML = oldPage;

	  
	}
</script>

