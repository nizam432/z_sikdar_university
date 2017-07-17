<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li class="active">User</li>
		</ol>
	</div>
	
	<div class="submit_btn_all">
		<a href="<?php echo base_url()?>backend_user/add"> 
			<button type="button" class="btn btn-primary ">Add new</button>
		</a>
	</div>
	
	<div class="box box-primary">
	<div class="box-header">
	  <h3 class="box-title">User List</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
	  <table id="example1" class="table table-bordered table-striped">
		<thead>
		<tr>
		  <th>#</th>
		  <th>Name</th>
		  <th>Email</th>
		  <th>User Type</th>
		</tr>
		</thead>
		<tbody>
		   <?php 	
				$sl=1;
				foreach($register_list as $register_list_data)
				{
					echo '<tr class="odd gradeX">
					<td>' . $sl++. '</td>';
					echo '<td>' . $register_list_data->name . '</td>
					<td>' . $register_list_data->email_id . '</td>';
					echo '<td>';
						if($register_list_data->user_type=='1') echo 'Admin';
						if($register_list_data->user_type=='2') echo 'User';
					echo '</td>';
				}  
		?>
		</tbody>
		<!--<tfoot>
		<tr>
		  <th>Rendering engine</th>
		  <th>Browser</th>
		  <th>Platform(s)</th>
		  <th>Engine version</th>
		</tr>
		</tfoot>-->
	  </table>
	</div>
	<!-- /.box-body -->
	</div>
</div>