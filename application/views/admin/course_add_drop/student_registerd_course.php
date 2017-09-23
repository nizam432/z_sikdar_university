<div class="col-md-12">
  <!-- general form elements -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Added Courses</h3>
	</div>
<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr style="font-size:12px; text-align:center;">
                                    <th  width="25">Sl</th>
                                    <th>Name of the course</th>
                                    <th  align="center">Course Code </th>
                                    <th  align="center">Semester </th>
                                    <th  align="center">Day</th>
                                    <th  align="center">Section</th>
									<th  align="center">Action</th>
                              
                                </tr>
                            </thead>
                               
                        <tbody id="data_load_list">
                        <?php
                        $sl=1;
                           //echo $SQlInCourse['semester'];
                        //$SQLNewAddedCourse=mysql_query("select id,semester,course_id,course_date,student_id,section from fbs_check_day  WHERE student_id='$student_id' AND semester='".$txt_semister_id."'  and status='0'");
                       // while($RowNewAddedCourse=mysql_fetch_assoc($SQLNewAddedCourse)){
                        foreach($student_registerd_course as $student_registerd_course) : ?>
                                <tr class="odd gradeA">
                                  
                                        <td width="25"><?php echo $sl; ?></td>
                                        <td><?php echo $student_registerd_course->course_title; ?> </td>
                                        <td align="left"><?php echo $student_registerd_course->course_code;?> </td>
                                        <td align="left"><?php echo $student_registerd_course->semester_title;?> </td>
                                        <td align="left"> <?php echo $day[$student_registerd_course->day]; ?> </td>
                                        
                                        <td align="left"><?php echo $student_registerd_course->section_title;?> </td>
										<td align="left" style="text-align:center;"> <button class="btn btn-danger" onclick="student_assing_course_delete('<?php echo $student_registerd_course->course_add_drop_id;?>')">Delete</button></td>

                                       
                                  
                                  
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