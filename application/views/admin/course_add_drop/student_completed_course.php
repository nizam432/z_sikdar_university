<div class="col-md-12">
  <!-- general form elements -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Completed Courses</h3>
	</div>
 <div class="panel

div class="panel-body">
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
                        $sl=1;
                
                       // $SQlCompleteCourse_Select=mysql_query("select * from  fbs_tabulation_sheet WHERE student_id='$student_id' AND status=2");
                       // while($SQlCompleteCourse=mysql_fetch_assoc($SQlCompleteCourse_Select)){
                        foreach($student_completed_course as $student_completed_course_data):

                        ?>
                                <tr class="odd gradeA">
                                  
                                        <td width="25"><?php echo $sl; ?></td>
                                        <td><?php //echo $student_completed_course_data->ourse_code; ?> </td>
                                        <td align="left"><?php //echo $course_name_arrays[$SQlCompleteCourse['course_code']]; ?> </td>
                                        <td align="left"><?php echo  $student_completed_course_data->course_code;;?> </td>
                                        
                                        <td align="center"><?php //echo $course_name_arrays_credit[$SQlCompleteCourse['course_code']]; ?> </td>
                                        <td align="center" width="100" style="font-weight:bolder;"><?php  //if($SQlCompleteCourse['later_grade']=='F' || $SQlCompleteCourse['later_grade']=='I' || $SQlCompleteCourse['later_grade']=='WH'){ echo '<span style="color:red;">'.$SQlCompleteCourse['later_grade'].'</span>';} else { echo $SQlCompleteCourse['later_grade'];}?> </td>
										
									    <td align="center" width="100"><button onclick='fnc_retake_registration_form("<?php //echo $SQlCompleteCourse['id'] ?>")'> Retake</button> </td>
                                         
                                </tr>
                                <?php
                                  $sl++;
                                 endforeach;
                                ?>
                                </tbody>
                           </table>     
 
</div>  
</div> 
</div> 
</div> 