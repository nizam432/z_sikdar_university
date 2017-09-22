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
                        $sl=1;
                           //echo $SQlInCourse['semester'];
                        //$SQLNewAddedCourse=mysql_query("select id,semester,course_id,course_date,student_id,section from fbs_check_day  WHERE student_id='$student_id' AND semester='".$txt_semister_id."'  and status='0'");
                       // while($RowNewAddedCourse=mysql_fetch_assoc($SQLNewAddedCourse)){
                        foreach($student_registerd_course as $student_registerd_course) : ?>
                                <tr class="odd gradeA">
                                  
                                        <td width="25"><?php //echo $i; ?></td>
                                        <td><?php echo $student_registerd_course->course_title; ?> </td>
                                        <td align="left"><?php echo $student_registerd_course->course_code;?> </td>
                                        <td align="left"><?php //echo $semester_array[$RowNewAddedCourse['semester']]; ?> </td>
                                        <td align="left"> <?php //echo $course_type_Arr[$course_name_arrays_type[$RowNewAddedCourse['course_id']]]; ?> </td>
                                        
                                        <td align="left"><?php //echo $RowNewAddedCourse['course_date']; ?> </td>
                                        <td align="left" style="text-align:center;"><?php //echo  $Section_Arr[$RowNewAddedCourse['section']]; ?> </td>
										<td align="left" style="text-align:center;"> <button class="btn btn-danger" onclick="fnc_day_cancel('<?php //echo $RowNewAddedCourse['id']; ?>')">Delete</button></td>

                                       
                                  
                                  
                                </tr>
                                <?php
                                  $sl++;
                                 endforeach;
								 
                                ?>
                                </tbody>
                           </table>     
 
</div> 