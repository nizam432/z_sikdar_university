<ul class="sidebar-menu"> <br>
	<li class="header">HEADER</li>
	<!-- Optionally, you can add icons to the links -->
	<li class="active"><a href="<?php echo base_url()?>backend_dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
	<li><a href="<?php echo base_url()?>backend_student"><i class="fa fa-user"></i> <span>Student</span></a></li>
	<li><a href="<?php echo base_url()?>backend_user"><i class="fa fa-user"></i> <span>User</span></a></li>
	<li class="treeview">
	  <a href="#"><i class="fa fa-link"></i> <span>System Settings</span>
		<span class="pull-right-container">
		  <i class="fa fa-angle-left pull-right"></i>
		</span>
	  </a>
	  <ul class="treeview-menu">
		<li><a href="<?php echo base_url()?>backend_session"><i class="fa fa-user"></i> <span>session</span></a></li>
		<li><a href="<?php echo base_url()?>backend_semester"><i class="fa fa-user"></i> <span>semester</span></a></li>	  
		<li><a href="<?php echo base_url()?>backend_faculty"><i class="fa fa-user"></i> <span>Faculty</span></a></li>
		<li><a href="<?php echo base_url()?>backend_department"><i class="fa fa-user"></i> <span>Department</span></a></li>		
		<li><a href="<?php echo base_url()?>backend_program"><i class="fa fa-user"></i> <span>Program</span></a></li>
		<li><a href="<?php echo base_url()?>backend_section"><i class="fa fa-user"></i> <span>Section</span></a></li>
		<li><a href="<?php echo base_url()?>backend_shift"><i class="fa fa-user"></i> <span>Shift</span></a></li>
	  </ul>
	</li>
</ul>