<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>/backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li class="active">Add New Result</li>
		</ol>
	</div>
</div>

<div class="col-md-12">
  <!-- general form elements -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Result Entry</h3>
	</div>
		<div class="box-body">
			<form class="form-horizontal" action="" method="post">
						<table class="table">
							<tr>
								<th width="20%">Faculty Member</th>
								<th width="20%">Semester</th>
								<th width="20%">Couse</th>
								<th width="20%">Student ID</th>
								<th width="20%">Action</th>
							</tr>
							<tr>
								<td>
								  <select  class="form-control" id="faculty_member">
									<option value="">Please select</option>
										<?php 
											foreach($faculty_member as $faculty_member_data)
											{		
												 echo '<option value="'.$faculty_member_data->faculty_member_id.'">'.$faculty_member_data->faculty_member_name.'</option>';
											}
										?>
								</td>
								<td>
								  <select  class="form-control" id="semester">
									<option value="">Please select</option>
										<?php 
											foreach($semester_info as $semester_data)
											{		
												 echo '<option value="'.$semester_data->semester_id.'">'.$semester_data->semester_title.'</option>';
											}
										?>
								  </select>
							</td>
							<td>
								  <select  class="form-control" id="course">
									<option value="">Please select</option>
								  </select>
							</td>
							<td>
								  <input type="text" id="student_id" class="form-control">
							</td>

							<td>
								<input type="button" class="btn btn-primary" value="Search" onclick="fnc_search_course()"><br><br>
							</td>
						</tr>
					</table>
			</form>
		</div>
	</div>
</div>
<div id="add_result"></div>
<script type="text/javascript">
	
  $(document).ready(function(){
    /*Get the Department list */

    $('.semester').change(function(){
	
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>backend_program/get_course_info",
        data:{
			semester:$(this).val(),
			faculty_member:$('#faculty_member').val()
		}, 
        beforeSend :function(){
		$("#course option:gt(0)").remove(); 
		$('#course').find("option:eq(0)").html("Please wait..");

        },                         
        success: function (data) {
          /*get response as json */
           $('#course').find("option:eq(0)").html("Please Select");
          var obj=jQuery.parseJSON(data);
          $(obj).each(function()
          {
			   var option = $('<option />');
			   option.attr('value', this.value).text(this.label);           
			   $('#course').append(option);
         });  

          /*ends */

        }
      });
    });
});
</script>

<script>
	
	 function fnc_search_course()
	 {

        $.ajax({
            url:"<?php echo base_url();?>backend_course_result/add_result",
            type:"POST",
			data:{
                semester:$('#semester').val(),
				student_id:$('#student_id').val()
			},
            success: function(response) {
                $("#add_result").html(response);
            }
        }); 
	return false;
        
    }

</script>

