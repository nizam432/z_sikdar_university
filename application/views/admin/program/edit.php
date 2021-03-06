<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li><a href="<?php echo base_url(); ?>backend_program">Program</a></li>
		  <li class="active">Update Program</li>
		</ol>
	</div>
</div>

<div class="col-md-6 col-md-offset-3">
  <!-- general form elements -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Update Program</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form action="<?php echo base_url(); ?>backend_program/update/<?php echo $program_edit->program_id ?>" method="post">
	  <div class="box-body">
		<?php 
			if(!empty($this->session->flashdata('program_form_validation')))
			{?>
				<div class="alert alert-danger">
					<?php echo $this->session->flashdata('program_form_validation'); ?>
				</div>
		<?php }?>	  
		<div class="form-group ">
		  <label>Program Title</label>
		  <input type="text" name="program_title" value="<?php echo $program_edit->program_title ?>" class="form-control">
		</div>
		<div class="form-group">
		  <label>Faculty</label>
		  <select name="faculty" class="form-control faculty">
			<option value="">Please select</option>
			<?php 
				foreach($faculty as $faculty_data)
				{		
					 echo '<option '.(($program_edit->faculty==$faculty_data->faculty_id)? 'selected="selected"':'').' value="'.$faculty_data->faculty_id.'">'.$faculty_data->faculty_title.'</option>';
				}
			?>
		  </select>
		</div>
		
		<div class="form-group">
		  <label>Department</label>
		  <select name="department" class="form-control department">
			<?php 
				foreach($department as $department_data)
				{		
					 echo '<option '.(($program_edit->department==$department_data->department_id)? 'selected="selected"':'').' value="'.$department_data->department_id.'">'.$department_data->department_title.'</option>';
				}
			?>		  
		  </select>
		</div>		
		<div class="form-group">
		  <label>Status</label>
		  <select name="status" class="form-control">
			<option <?php if($program_edit->status==1) echo ' selected="selected" ';?> value="1">Publish</option>
			<option <?php if($program_edit->status==2) echo ' selected="selected" ';?> value="2">Unpublish</option>
		  </select>
		</div>
	  </div>
	  <!-- /.box-body -->
	  <div class="box-footer">
		<button type="submit" class="btn btn-primary">Submit</button>
	  </div>
	</form>
  </div>
  <!-- /.box -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
	
  $(document).ready(function(){
    /*Get the Department list */

    $('.faculty').change(function(){
	
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>backend_program/get_department",
        data:{id:$(this).val()}, 
        beforeSend :function(){
		$(".department option:gt(0)").remove(); 
		$('.department').find("option:eq(0)").html("Please wait..");

        },                         
        success: function (data) {
          /*get response as json */
           $('.department').find("option:eq(0)").html("Please Select");
          var obj=jQuery.parseJSON(data);
          $(obj).each(function()
          {
           var option = $('<option />');
           option.attr('value', this.value).text(this.label);           
           $('.department').append(option);
         });  

          /*ends */

        }
      });
    });
});
</script>
