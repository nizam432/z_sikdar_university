
<div class="panel-body" align="left">
    
    <?php 
    //$SQLMinandMax_CourseCheck=mysql_query("SELECT semester,student_id,uid FROM fbs_check_day WHERE semester ='$txt_semister_id' and student_id='$student_id' and status='0'");
    //$final_confirm=mysql_fetch_assoc($SQLMinandMax_CourseCheck);
    ?>
      
    <button type="button" class="btn btn-primary" style="background:green; font-weight:bolder;"  onclick="course_registration_final('<?php echo $semester.'##'.$student_id; ?>')">
    <span class="glyphicon glyphicon-ok-circle"></span> 
    Click Confirm for Registration
    </button>   
</div>

<div class="col-md-12">
  <!-- general form elements -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Available course  for Registration</h3>
	</div>
<table class="table  table-bordered">

			<tbody id="data_load_list">
			<?php foreach($assing_course_data as $course_assing_day_info): ?>
			<?php
			//$i=1;
			
			
			//$sql_day=mysql_query("select * from fbs_assign_course where semester_id='$txt_semister_id' and revised='//$batch_code'  group by course_date");
			//while($row_day=mysql_fetch_assoc($sql_day)){
				?>
			 <tr>
				<td valign="middle"><b><?php echo $day[$course_assing_day_info['day']]; ?></b></td>
				<td colspan="7">
			 
		   <table class="table table-striped table-bordered table-hover" width="100%">
			 
			
			<?php
			//$sql=mysql_query("select * from fbs_assign_course where semester_id='$txt_semister_id' and course_date='".$row_day['course_date']."'  and revised='$batch_code'");
			//while($row=mysql_fetch_assoc($sql)){
				
			//$SQLCEHCKCOURSE=mysql_query("select * from  fbs_tabulation_sheet WHERE course_code='".$row['course_id']."' AND //student_id='$student_id'");
			//$check_row_when_while_loop=mysql_fetch_assoc($SQLCEHCKCOURSE);
			//echo $check_row_when_while_loop['course_code'];
			//if($check_row_when_while_loop['course_code']!=$row['course_id']){
            $sl=1;
            foreach($course_assing_day_info['assing_course'] as $assing_course): ?>
					<tr class="odd gradeA">
							<td width="5%">

							 <input type="button" class="btn btn-success" value="Add" onclick="fnc_course_registration('<?php echo $assing_course['course_code']?>,<?php echo $semester?>,<?php echo $student_id?>,<?php echo $assing_course['section']?>,<?php echo $course_assing_day_info['day']; ?>,<?php echo $assing_course['course']?>')">
							</td>

							<td width="5%"><?php echo $sl; ?></td>
							<td align="center" width="10%"><?php echo $assing_course['course_code']; ?> </td>
							<td width="40%"><?php echo $assing_course['course_title'] ?> </td>					
							<td align="center" width="10%"><?php echo $assing_course['section_title']; ?> </td>
							<td align="center" width="10%"><?php echo $assing_course['credit']; ?> </td>
					</tr>
			  
					<?php
                     $sl++;
                    endforeach;
					 
					 // }
				   
					?>
					 </table>
				</td>
				</tr>
			<?php endforeach; ?>
			
		 </tbody>
	</table>
</div>
</div>