<div class="panel-body">
<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                <th  colspan="9"><h4 style="margin:0px; font-weight:bolder; color:#ff0000; padding:0px;"> Completed Courses</h4></th>
                                </tr>
                                <tr style="font-size:12px; text-align:center;">
                                    <th  width="25">Sl</th>
                                    <th>Name of the course</th>
                                    <th  align="center">Course ID </th>
                                    <th  align="center">Course type</th>
                                    <th  align="center">Credit</th>
                                    <th  align="center" width="100">Grade</th>
									<th  align="center" width="100">Action</th>
                                    
                                </tr>
                            </thead>
                               
                        <tbody id="data_load_list">
                        <?php
                        //$i=1;
                
                       // $SQlCompleteCourse_Select=mysql_query("select * from  fbs_tabulation_sheet WHERE student_id='$student_id' AND status=2");
                       // while($SQlCompleteCourse=mysql_fetch_assoc($SQlCompleteCourse_Select)){
                        ?>
                                <tr class="odd gradeA">
                                  
                                        <td width="25"><?php //echo $i; ?></td>
                                        <td><?php //echo $course_name_array[$SQlCompleteCourse['course_code']]; ?> </td>
                                        <td align="left"><?php //echo $course_name_arrays[$SQlCompleteCourse['course_code']]; ?> </td>
                                        <td align="left"><?php  //echo  $course_type_Arr[$course_name_arrays_type[$SQlCompleteCourse['course_code']]];?> </td>
                                        
                                        <td align="center"><?php //echo $course_name_arrays_credit[$SQlCompleteCourse['course_code']]; ?> </td>
                                        <td align="center" width="100" style="font-weight:bolder;"><?php  //if($SQlCompleteCourse['later_grade']=='F' || $SQlCompleteCourse['later_grade']=='I' || $SQlCompleteCourse['later_grade']=='WH'){ echo '<span style="color:red;">'.$SQlCompleteCourse['later_grade'].'</span>';} else { echo $SQlCompleteCourse['later_grade'];}?> </td>
										
									    <td align="center" width="100"><button onclick='fnc_retake_registration_form("<?php //echo $SQlCompleteCourse['id'] ?>")'> Retake</button> </td>
                                         
                                </tr>
                                <?php
                                  //$i++;
                                  //}
                                ?>
                                </tbody>
                           </table>     
 
</div> 
 <div class="panel-body">
<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                <th  colspan="11"><h4 style="margin:0px; font-weight:bolder; color:#006600; padding:0px;"> In-Progress Courses</h4></th>
                                </tr>
                                <tr style="font-size:12px; text-align:center;">
                                    <th  width="25">Sl</th>
                                    <th>Name of the course</th>
                                    <th  align="center">Course ID </th>
                                    <th  align="center">Semester </th>
                                    <th  align="center">Course type</th>
                                    <th  align="center">Day</th>
									<th  align="center">Section</th>
                                    <th  align="center">Action</th>
                                    
                                </tr>
                            </thead>
                               
                        <tbody id="data_load_list">
                        <?php
                        //$i=1;
                
                       // $SQlInCourse_Select=mysql_query("select * from  fbs_tabulation_sheet  WHERE student_id='$student_id' AND semester!='$txt_semister_id' AND status in (0,1)");
                        //while($SQlInCourse=mysql_fetch_assoc($SQlInCourse_Select)){
                        ?>
                                <tr class="odd gradeA">
                                  
                                        <td width="25"><?php //echo $i; ?></td>
                                        <td><?php //echo $course_name_array[$SQlInCourse['course_code']]; ?> </td>
                                        <td align="left"><?php  //echo $course_name_arrays[$SQlInCourse['course_code']]; ?> </td>
                                        <td align="left"><?php  //echo $semester_array[$SQlInCourse['semester']]; ?> </td>
                                        <td align="left"><?php  //echo $course_type_Arr[$course_name_arrays_type[$SQlInCourse['course_code']]];  ?></td>
                                        <?php
                                       // $sql_day=mysql_query("SELECT course_date from fbs_assign_course where semester_id='".$SQlInCourse['semester']."' AND course_id='".$SQlInCourse['course_code']."' AND section='".$SQlInCourse['section']."'");
										//$SqlROWDAY=mysql_fetch_assoc($sql_day);
										
										?>
                                        <td align="left"><?php //echo $SqlROWDAY['course_date']; ?> </td>
										<td align="left"><?php //echo $Section_Arr[$SQlInCourse['section']]; ?> </td>
                                     <td align="center" width="100"><button onclick='fnc_retake_registration_form("<?php //echo $SQlInCourse['id'] ?>")>Retake</button> </td>
                                </tr>
                                <?php
                                 // $i++;
                                 // }
                                ?>
								
							
							<tr>
							   <th colspan='8'  style='color:red; background:#E0EDFA;'> Taken This Semester  </th>
							</tr>
							
					   <?php
                       // $w=1;
                
                       // $SQlInCourse_Select_Running=mysql_query("select * from  fbs_tabulation_sheet  WHERE student_id='$student_id' AND  semester='$txt_semister_id' AND later_grade!='W' AND status='0'");
                       // while($SQlInCourse_Running=mysql_fetch_assoc($SQlInCourse_Select_Running)){
                        ?>	
								 <tr class="odd gradeA">
                                  
                                        <td width="25"><?php // echo $w; ?></td>
                                        <td><?php //echo $course_name_array[$SQlInCourse_Running['course_code']]; ?> </td>
                                        <td align="left"><?php  //echo $course_name_arrays[$SQlInCourse_Running['course_code']]; ?> </td>
                                        <td align="left"><?php  //echo $semester_array[$SQlInCourse_Running['semester']]; ?> </td>
                                        <td align="left"><?php  //echo $course_type_Arr[$course_name_arrays_type[$SQlInCourse_Running['course_code']]];  ?></td>
                                        <?php
                                        //$sql_dayXXX=mysql_query("SELECT course_date from fbs_assign_course where semester_id='".$SQlInCourse_Running['semester']."' AND course_id='".$SQlInCourse_Running['course_code']."' AND section='".$SQlInCourse_Running['section']."'");
										//$SqlROWDAYxxx=mysql_fetch_assoc($sql_dayXXX);
										
										?>
                                        <td align="left"><?php// echo $SqlROWDAYxxx['course_date']; ?> </td>
										<td align="left"><?php //echo $Section_Arr[$SQlInCourse_Running['section']]; ?> </td>
                                       <td align="left"> <button class="btn btn-danger" onclick="fnc_course_cancel_account('<?php //echo $SQlInCourse_Running['id']; ?>')"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button></td>
                                </tr>	
						<?php //$w++; } ?>
								
                                </tbody>
                           </table>     
 
</div>  

 <div class="panel-body">
<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr  style="background:#0072C6;">
                                <th colspan="8"><h4 style="margin:0px; font-weight:bolder; color:#fff; padding:0px;"> Added Courses</h4></th>
                                </tr>
                                <tr style="font-size:12px; text-align:center;">
                                    <th  width="25">Sl</th>
                                    <th>Name of the course</th>
                                    <th  align="center">Course Code </th>
                                    <th  align="center">Semester </th>
                                    <th  align="center">Course type</th>
                                    <th  align="center">Day</th>
                                    <th  align="center">Section</th>
									<th  align="center">Action</th>
                              
                                </tr>
                            </thead>
                               
                        <tbody id="data_load_list">
                        <?php
                       // $i=1;
                           //echo $SQlInCourse['semester'];
                        //$SQLNewAddedCourse=mysql_query("select id,semester,course_id,course_date,student_id,section from fbs_check_day  WHERE student_id='$student_id' AND semester='".$txt_semister_id."'  and status='0'");
                       // while($RowNewAddedCourse=mysql_fetch_assoc($SQLNewAddedCourse)){
						
                        ?>
                                <tr class="odd gradeA">
                                  
                                        <td width="25"><?php //echo $i; ?></td>
                                        <td><?php //echo $course_name_array[$RowNewAddedCourse['course_id']]; ?> </td>
                                        <td align="left"><?php //echo $course_name_arrays[$RowNewAddedCourse['course_id']]; ?> </td>
                                        <td align="left"><?php //echo $semester_array[$RowNewAddedCourse['semester']]; ?> </td>
                                        <td align="left"> <?php //echo $course_type_Arr[$course_name_arrays_type[$RowNewAddedCourse['course_id']]]; ?> </td>
                                        
                                        <td align="left"><?php //echo $RowNewAddedCourse['course_date']; ?> </td>
                                        <td align="left" style="text-align:center;"><?php //echo  $Section_Arr[$RowNewAddedCourse['section']]; ?> </td>
										<td align="left" style="text-align:center;"> <button class="btn btn-danger" onclick="fnc_day_cancel('<?php //echo $RowNewAddedCourse['id']; ?>')">Delete</button></td>

                                       
                                  
                                  
                                </tr>
                                <?php
                                 // $i++;
                                 // }
								 
                                ?>
                                </tbody>
                           </table>     
 
</div> 

<div class="panel-body" align="left">
    
    <?php 
    //$SQLMinandMax_CourseCheck=mysql_query("SELECT semester,student_id,uid FROM fbs_check_day WHERE semester ='$txt_semister_id' and student_id='$student_id' and status='0'");
    //$final_confirm=mysql_fetch_assoc($SQLMinandMax_CourseCheck);
    ?>
      
    <button type="button" class="btn btn-primary" style="background:green; font-weight:bolder;"  onclick="fnc_course_registration_final('<?php //echo $final_confirm['semester'].'##'.$final_confirm['student_id']; ?>')">
    <span class="glyphicon glyphicon-ok-circle"></span> 
    Click Confirm for Registration
    </button>   
</div>

<table class="table table-striped table-bordered table-hover">

            <input type="hidden" value="<?php //echo $txt_semister_id; ?>" name="txt_semister_id" id="txt_semister_id" />
            <input type="hidden" value="<?php //echo $txt_semister_id; ?>" name="student_id" id="student_id" />

        <thead>
            <tr>
                <th  colspan="8"><h4 style="margin:0px; color:#3276B1; padding:0px;">Available course  for Registration</h4></th>
            </tr>
    
        </thead>
<div id="course_add_drop"></div>

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

							 <input type="button" class="btn btn-success" value="Add" onclick="fnc_course_registration('<?php echo $assing_course['course_code'].','.$semester.','.$student_id.','.$assing_course['section'].','.$course_assing_day_info['day']; ?>')">
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