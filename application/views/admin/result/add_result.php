<div class="col-md-12">
  <!-- general form elements -->
	<div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">Result Entry<h3>
		</div>
		<div class="box-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered  table-responsive" width="100%">   
					<tbody>
						<tr>
							<th colspan="7"></th>
						   <td colspan="7" rowspan="4">
								<table rules="all" align="right" class="table table-striped table-bordered table-responsive" style="width:300px; padding:0px; margin:0px;">
									<tbody>
										<tr>
										   <td>Absent  </td>
										   <th>Abs </th>
										</tr>
										<tr>
										   <td>Incomplete </td>
										   <th>I</th>
										</tr>
										<tr>
										<td>Withheld </td>
										<th>WH</th>
										</tr>
										<tr>
										   <td> Waiver </td>
										   <th>W</th>
										</tr>
										<tr>
										   <td> Fail </td>
										   <th>F</th>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
										   
						<tr>
							<td colspan="7"> <b>Faculty: Prof. M. Muzahidul Islam </b> </td>
						</tr>
						<tr>
							<td colspan="7"><b>Course name:</b> Management Fundamentals -(FB-504)</td>
						</tr>
						<tr>
							<td colspan="7"><b>Semester:</b> FALL-2017 </td>
						</tr>
											  
											
						<tr style="font-size:10px;">
							<th width="15">Sl</th>
							<th data-orderable="false" width="250">Name of student</th>
							<th data-orderable="false" width="50">#ID</th>
							<th data-orderable="false" width="50">Batch</th>
							<th data-orderable="false" width="60">Attendence (10%)</th>
							<th data-orderable="false" width="60">1st mid (15%)</th>
							<th data-orderable="false" width="60">2nd mid (15%)</th>
							<th data-orderable="false" width="60">Presentation (10%)</th>
							<th data-orderable="false" width="60">Term paper (10%)</th>
							<th data-orderable="false" width="60">Course final (40%)</th>
							<th data-orderable="false" width="60">Grand total (100%)</th>
							<th data-orderable="false" width="60">Leter grade</th>
							<th data-orderable="false" width="60">GPA</th>
							<th data-orderable="false" width="120">Remarks</th>									
							<th data-orderable="false" width="70">Action</th>
						</tr>
											
					</tbody>
				
					<tbody id="data_load_list">	
						
						<tr class="odd gradeA" style="font-size:12px;">
							<td width="15">41                                            
							<input type="hidden" name="update_id41" id="update_id41" value="29151"></td>
							<td style="font-weight:bolder; text-transform: uppercase;">OLIUDDIN MOHAMMAD TAYAB </td>
							<td style="font-weight:bolder;">51736067</td>
							<td>36</td>
							<td><input type="text" class="form-control" id="attendence41" maxlength="10" min="0" value="" onkeyup="fnc_mark(this.value,'41')" name="attendence41" style="width:60px;"></td>
							<td><input type="text" class="form-control" value="" onkeyup="fnc_mark(this.value,'41')" id="fst_mid41" name="fst_mid41" style="width:60px;"></td>
							<td><input type="text" class="form-control" value="" onkeyup="fnc_mark(this.value,'41')" id="snd_mid41" name="snd_mid41" style="width:60px;"></td>
							<td><input type="text" class="form-control" value="" onkeyup="fnc_mark(this.value,'41')" id="presentation41" name="presentation41" style="width:60px;"></td>
							<td><input type="text" class="form-control" value="" onkeyup="fnc_mark(this.value,'41')" id="term_paper41" name="term_paper41" style="width:60px;"></td>
							<td><input type="text" class="form-control" value="" onkeyup="fnc_mark(this.value,'41')" id="course_final41" name="course_final41" style="width:60px;"></td>
							<td><input type="text" class="form-control" value="" readonly="readonly" id="grand_total41" name="grand_total41" style="width:60px;"></td>
							<td><input type="text" class="form-control" readonly="readonly" id="letter_grade41" name="letter_grade41" value="" style="width:60px;"></td>
							<td><input type="text" class="form-control" value="" readonly="readonly" id="cgpa41" name="cgpa41" style="width:60px;"></td>
							<td>
								<select class="form-control" onchange="fnc_remark(this.value,'41')" id="remarks41" name="remarks41" style="width:120px;">
									<option value=""> &gt;--select--&lt; </option>
									<option value="I"> Incomplete </option>
									<option value="WH"> Withheld </option>
								</select>
							</td>
							<td> 
								<button class="btn btn-danger" type="button" onclick="fnc_delete_row('29151')">
									<span class="glyphicon glyphicon-remove-sign"></span>  
								</button>
							</td>
						</tr> 
						<input type="hidden" id="total_countData" value="42">
					</tbody>
					<tbody>
						<tr>
							<td colspan="15" class="table-responsive">
								<table>
									<tbody>
										<tr>
											<td> <button class="btn btn-defult" type="button" onclick="print_sheet()"><span class="glyphicon glyphicon-print"></span> Print Office Copy (Landscape) </button></td>
											<td> <button class="btn btn-defult" type="button" onclick="print_sheet_office()"><span class="glyphicon glyphicon-print"></span> Print Notice Copy (Portrait) </button></td>
											<td> <button class="btn btn-defult" type="button" onclick="print_sheet_exel()"><span class="glyphicon glyphicon-print"></span> Print Excel (Landscape) </button></td>
											<td width="30"></td>
											<input type="hidden" class="form-control" value="42" name="data_val" id="data_val">
											<td>
												<button type="submit" onclick="fnc_data_save_temporary()" name="save_data_temporary" class="btn btn-defult">
													<span class="glyphicon glyphicon-plus-sign"></span> Temporary Save
												</button>
											</td>
											<td width="30"></td>
											<td>
												<button type="button" name="save_data_permanent" onclick="fnc_data_save_permanent()" class="btn btn-defult">
													<span class="glyphicon glyphicon-plus-sign"></span> Permanent Save
												</button>
											</td>	
										</tr>
								   </tbody>
								</table> 
							</td>                                   
						</tr>
					</tbody>
					
				</table>
			</div>
		</div>
	</div>
</div>