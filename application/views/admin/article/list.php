<?php 
	/*$message_success=$this->session->userdata('message');
	if(isset($message_success))
	{
		echo '<div class="alert alert-success" role="alert">'.$message_success.'</div>';
		$this->session->unset_userdata('message');
	}*/
?>

<div class="col-md-12">

	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li class="active">Article</li>
		</ol>
	</div>
	
	<div class="submit_btn_all">
		<a href="<?php echo base_url()?>backend_article/add"> 
			<button type="button" class="btn btn-primary ">Add new</button>
		</a>
		
		<button  type="submit" name="publish" id="publish" class="btn btn-success addrecord">
			<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Publish
		</button>
		
		<button type="submit" name="unpublish" id="unpublish" class="btn btn-warning  addrecord">
			<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Unpublish
		</button>

	</div>

	<div class="box box-primary col-xs-12" >
		<div class="box-header ">
		  <h3 class="box-title">Article List</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body no-padding">
		  <table id="example1"  class="table table-bordered  table-striped ">
			<thead>
			<tr>
				<th><input type="checkbox"  id="selecctall" /></th>
				<th>#</th>
				<th>Picture</th>
				<th>Title</th>
				<th>Entry By</th>
				<th>Entry Date</th>
				<th>status</th>
				<th>Edit</th>
			</tr>
			</thead>
			<?php 	
				$sl=1;
				foreach($article_list as $article_list_data)
				{
					
					
					echo '<tr>
					<td><input type="checkbox" name="checkbox[]" value="' . $article_list_data->article_id . '" id="checkbox[]" class="checkbox1""></td>
					<td>' . $sl++. '</td>
					<td> <img class="img-circle" width="50" height="50" src="' .base_url().$article_list_data->article_image. '"></td>
					<td>' . $article_list_data->title. '</td>
					<td>' . $article_list_data->entry_by. '</td>
					<td>' . $article_list_data->entry_date. '</td>	
					<td>' . (($article_list_data->status==1)? 
					'<span class="label label-success">Publish</span>' :  '<span class="label label-warning">Unpublish</span>'). '</td>	
					<td><a href="'.base_url().'backend_article/edit/'.$article_list_data->article_id.'"><i class="fa fa-edit"></i> Edit</a></td>	
					</tr>';
				}  
			?> 
		  </table > 
		</div>       <!-- /.box-body -->
		<?php //echo $this->pagination->create_links(); ?>
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
				url: '<?php echo base_url() ?>backend_article/publish',
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
				url: '<?php echo base_url() ?>backend_article/unpublish',
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
