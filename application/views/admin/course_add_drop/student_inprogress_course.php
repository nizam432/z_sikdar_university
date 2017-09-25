<div class="col-md-12">
  <!-- general form elements -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">In-Progress Courses</h3>
	</div>
 <div class="panel-body">
<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr style="font-size:12px; text-align:center;">
                                    <th  width="25">Sl</th>
                                    <th>Name of the course</th>
                                    <th  align="center">Course Code</th>
                                    <th  align="center">Semester </th>
                                    <th  align="center">Day</th>
									<th  align="center">Section</th>
                                    <th  align="center">Action</th>
                                    
                                </tr>
                            </thead>
                               
                        <tbody id="data_load_list">
                        <?php
                        $sl=1;
                
                       // $SQlInCourse_Select=mysql_query("select * from  fbs_tabulation_sheet  WHERE student_id='$student_id' AND semester!='$txt_semister_id' AND status in (0,1)");
                        //while($SQlInCourse=mysql_fetch_assoc($SQlInCourse_Select)){
							foreach($student_inprogress_course as $student_inprogress_course_data) : ?>
                                <tr class="odd gradeA">
                                        <td width="25"><?php echo $sl; ?></td>
                                        <td><?php echo $student_inprogress_course_data->course_title; ?> </td>
                                        <td align="left"><?php  echo  $student_inprogress_course_data->course_code; ?> </td>
                                        <td align="left"><?php   echo  $student_inprogress_course_data->semester_title; ?> </td>
                                       <!-- <td align="left"><?php  //echo $course_type_Arr[$course_name_arrays_type[$SQlInCourse['course_code']]];  ?></td>-->
                                        <?php
                                       // $sql_day=mysql_query("SELECT course_date from fbs_assign_course where semester_id='".$SQlInCourse['semester']."' AND course_id='".$SQlInCourse['course_code']."' AND section='".$SQlInCourse['section']."'");
										//$SqlROWDAY=mysql_fetch_assoc($sql_day);
										
										?>
                                        <td align="left"><?php //echo $student_inprogress_course_data->day; ?> </td>
										<td align="left"><?php echo  $student_inprogress_course_data->section_title; ?> </td>
										<td></td>
                                     <td align="center" width="100"><button onclick='fnc_retake_registration_form("<?php //echo $SQlInCourse['id'] ?>")>Retake</button> </td>
                                </tr>
                                <?php
                                  $sl++;
                                 endforeach;
								 
                                ?>
								
							
							<tr>
							   <th colspan='8'  style='color:red; background:#E0EDFA;'> Taken This Semester  </th>
							</tr>
							
					   <?php
					   $sl=1;
					  foreach($student_taken_course as $student_taken_course_data){
                       
               echo '<pre>'; print_r($student_taken_course_data); echo '</pre>';
                       // $SQlInCourse_Select_Running=mysql_query("select * from  fbs_tabulation_sheet  WHERE student_id='$student_id' AND  semester='$txt_semister_id' AND later_grade!='W' AND status='0'");
                       // while($SQlInCourse_Running=mysql_fetch_assoc($SQlInCourse_Select_Running)){
                        ?>	
								 <tr class="odd gradeA">
                                  
                                        <td width="25"><?php  echo $sl; ?></td>
                                        <td><?php echo $student_taken_course_data->course_title;  ?> </td>
                                        <td align="left"><?php  echo $student_taken_course_data->course_code;?> </td>
                                        <td align="left"><?php  echo $student_taken_course_data->semester_title; ?> </td>
                                       <!-- <td align="left"><?php  //echo $course_type_Arr[$course_name_arrays_type[$SQlInCourse_Running['course_code']]];  ?></td>-->
                                        <?php
                                        //$sql_dayXXX=mysql_query("SELECT course_date from fbs_assign_course where semester_id='".$SQlInCourse_Running['semester']."' AND course_id='".$SQlInCourse_Running['course_code']."' AND section='".$SQlInCourse_Running['section']."'");
										//$SqlROWDAYxxx=mysql_fetch_assoc($sql_dayXXX);
										
										?>
                                        <td align="left"><?php echo $student_taken_course_data->day; ?> </td>
										<td align="left"><?php echo  $student_taken_course_data->section_title; ?>  </td>
                                       <td align="left"> <button class="btn btn-danger" onclick="fnc_course_cancel_account('<?php //echo $SQlInCourse_Running['id']; ?>')"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button></td>
                                </tr>	
						<?php $sl++;
					   } ?>
								
                                </tbody>
                           </table>     
 
</div>  
</div> 
</div> 
</div>