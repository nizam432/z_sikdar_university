<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li class="active">faculty Member</li>
		</ol>
	</div>
	
	<div class="submit_btn_all">
		<a href="<?php echo base_url()?>backend_faculty_member/add"> 
			<button type="button" class="btn btn-primary ">Add new</button>
		</a>
		<button  type="submit" name="publish" id="publish" class="btn btn-success addrecord">
			<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Publish
		</button>
		
		<button type="submit" name="unpublish" id="unpublish" class="btn btn-warning  addrecord">
			<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Unpublish
		</button>		
	</div>
	
	<div class="box box-primary">
	<div class="box-header">
	  <h3 class="box-title">Faculty Member List</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
	  <table id="example1" class="table table-bordered table-striped">
		<thead>
		<tr>
		  <th><input type="checkbox"  id="selecctall" /></th> 	
		  <th>#</th>
		  <th>Faculty Member Name</th>
		  <th>Entry By</th>
		  <th>Entry Date & Time</th>
		  <th>Status</th>
		  <th>Edit</th>
		</tr>
		</thead>
		<tbody>
		   <?php 	
				$sl=1;
				foreach($faculty_member_list as $faculty_member_list_data)
				{
					echo '<tr class="odd gradeX">
					<td><input type="checkbox" name="checkbox[]" value="' . $faculty_member_list_data->faculty_member_id . '" id="checkbox[]" class="checkbox1"></td>
					<td>' . $sl++. '</td>
					<td>'.$faculty_member_list_data->faculty_member_name . '</td>
					<td>' . $faculty_member_list_data->entry_by . '</td>
					<td>' . $faculty_member_list_data->entry_date_time . '</td>
					<td>' . (($faculty_member_list_data->status==1)? 
					'<span class="label label-success">Publish</span>' :  '<span class="label label-warning">Unpublish</span>'). '</td>	
					<td> <a href="'.base_url().'backend_faculty_member/edit/'.$faculty_member_list_data->faculty_member_id.'"><span class="fa fa-edit"></span> Edit</a></td>					
					</tr>';
				}  
		?>
		</tbody>
	  </table>
	</div>
	<!-- /.box-body -->
	</div>
</div>

<script>
	$(document).ready(function() {
		resetcheckbox();
		$('#selecctall').click(function(event) {  //on click
			if (this.checked) { // check select status
				$('.checkbox1').each(function() { //loop through each checkbox
					this.checked = true;  //select all checkboxes with class "checkbox1"              
				});
			} else {
				$('.checkbox1').each(function() { //loop through each checkbox
					this.checked = false; //deselect all checkboxes with class "checkbox1"                      
				});
			}
		});

		//Publish data
		$("#publish").on('click', function(e) {
			e.preventDefault();
			var checkValues = $('.checkbox1:checked').map(function()
			{
				return $(this).val();
			}).get();
			console.log(checkValues);
			
			$.each( checkValues, function( i, val ) {
				$("#"+val).remove();
				});
//                    return  false;
			$.ajax({
				url: '<?php echo base_url() ?>backend_faculty_member/publish',
				type: 'post',
				data: 'ids=' + checkValues
			}).done(function(data) {
				$(".respose").html(data);
				$('#selecctall').attr('checked', false);
			});
		});
		
		// Unpublish data  
		$("#unpublish").on('click', function(e) {
			e.preventDefault();
			var checkValues = $('.checkbox1:checked').map(function()
			{
				return $(this).val();
			}).get();
			console.log(checkValues);
			
			$.each( checkValues, function( i, val ) {
				$("#"+val).remove();
				});
//                    return  false;
			$.ajax({
				url: '<?php echo base_url() ?>backend_faculty_member/unpublish',
				type: 'post',
				data: 'ids=' + checkValues
			}).done(function(data) {
				$(".respose").html(data);
				$('#selecctall').attr('checked', false);
			});
		});
		


		$(".addrecord").click(function(e) {
			e.preventDefault();
			var url = $(this).attr('href');
			$.ajax({
				type: 'POST',
				url: url
			}).done(function() {
				window.location.reload();
			});
		});
		
		function  resetcheckbox(){
		$('input:checkbox').each(function() { //loop through each checkbox
		this.checked = false; //deselect all checkboxes with class "checkbox1"                      
		   });
		}
	});
</script>
