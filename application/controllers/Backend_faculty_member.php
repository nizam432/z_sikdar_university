<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Backend faculty_member controller 
 */
class Backend_faculty_member extends CI_Controller 
{ 
	public function __construct()
	{
		parent::__construct();
		$check_admin_id = $this->session->userdata('admin_id');
		if ($check_admin_id == NULL) {
		  redirect('backend_login/check_login', "refresh");
		}
		if($this->session->userdata('admin_user_type')!='1')
		{
			exit;
		}

	  //load model
	  $this->load->model('model_backend_faculty_member');
	  //load form validation
	  $this->load->library('form_validation');
	  //load session
	  $this->load->library('session');
	   date_default_timezone_set('Asia/Dhaka');	
	}
 	/**
	 * Show faculty_member List
	 *
	 * @return void
	 */	
	public function index()
	{
		
		$data = array();
		$data['faculty_member_list'] =$this->model_backend_faculty_member->get_faculty_member_list_data();
		$data['content'] = $this->load->view('admin/faculty_member/list',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	 /**
	 * Add faculty_member 
	 *
	 * @return void
	 */	
	public function add()
	{
		$data = array();
		$data['faculty']= $this->model_backend_faculty_member->get_faculty_data();
		$data['blood_group']=array(1=>'A+',2=>'A-',3=>'B+',4=>'B-',5=>'O+',6=>'O-',7=>'AB+',8=>'AB-');
		$data['content']=$this->load->view('admin/faculty_member/add',$data, TRUE);
		$this->load->view('admin/index', $data);
	}

	 /**
	 * Edit faculty_member 
	 *
     * @param int $id
	 * @return void
	 */	
	public function edit($id)
	{
		$data = array();
		$data['faculty_member_edit']= $this->model_backend_faculty_member->get_faculty_member_row($id);
		$data['faculty']= $this->model_backend_faculty_member->get_faculty_data();
		$data['blood_group']=array(1=>'A+',2=>'A-',3=>'B+',4=>'B-',5=>'O+',6=>'O-',7=>'AB+',8=>'AB-');
		$data['content']=$this->load->view('admin/faculty_member/edit',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	

	
	/**
	 * Save faculty_member
	 *
	 * @return void
	 */	
	public function save()
	{
		$data=array();
		
		
		//call photo upload function
		$result=$this->do_upload('faculty_member_photo');	
		$data['faculty_member_name']=$this->input->post('faculty_member_name', TRUE);
		$data['faculty']=$this->input->post('faculty', TRUE);
		$data['sex']=$this->input->post('sex', TRUE);
		$data['dob']=$this->input->post('dob', TRUE);
		$data['blood_group']=$this->input->post('blood_group', TRUE);
		$data['email_id']=$this->input->post('email_id', TRUE);		
		$data['contact_no']=$this->input->post('contact_no', TRUE);
		$data['designation']=$this->input->post('designation', TRUE);
		$data['qualification']=$this->input->post('qualification', TRUE);
		$data['join_date']=$this->input->post('join_date', TRUE);
		$data['present_address']=$this->input->post('present_address', TRUE);
		$data['permanent_address']=$this->input->post('permanent_address', TRUE);
		//call photo upload function
		$result=$this->do_upload('faculty_member_photo');
		if(!empty($result[0]))
		{
			echo $data['faculty_member_photo'] = "uplaod_file/faculty_member_photo/$result[0]" ;	
		}		
		$data['entry_by']=$this->session->userdata('admin_id');
		$data['entry_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		

		//Form Validation
		$this->form_validation->set_rules('faculty_member_name', 'Faculty Member Name Title', 'required');
		$this->form_validation->set_rules('faculty', 'faculty', 'required');
		$this->form_validation->set_rules('sex', 'sex', 'required');
		$this->form_validation->set_rules('dob', 'dob', 'required');
		$this->form_validation->set_rules('blood_group', 'Blood Group', 'required');
		$this->form_validation->set_rules('email_id', 'Email ID', 'required');
		$this->form_validation->set_rules('contact_no', 'Contact No', 'required');
		$this->form_validation->set_rules('designation', 'designation', 'required');
		$this->form_validation->set_rules('qualification', 'qualification', 'required');
		$this->form_validation->set_rules('join_date', 'Joining Date', 'required');
		$this->form_validation->set_rules('present_address', 'Present Address', 'required');
		$this->form_validation->set_rules('permanent_address', 'Permanent Address', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('faculty_member_form_validation',validation_errors());
			redirect('backend_faculty_member/add');
		}
		else
		{
			//save faculty_member
			$this->model_backend_faculty_member->save_faculty_member_data($data);
			
			// Redirect with flash message
			$result=array();
			$result['message']="Data insert successfully";
			$this->session->set_userdata($result);
			redirect('backend_faculty_member');
		}
	}

	
	/**
	 * Update faculty_member
	 *
	 * @param int $id
	 * @return void
	 */	
	 
	public function update($id)
	{	

		$data = array();
		$data['faculty_member_name']=$this->input->post('faculty_member_name', TRUE);
		$data['faculty']=$this->input->post('faculty', TRUE);
		$data['sex']=$this->input->post('sex', TRUE);
		$data['dob']=$this->input->post('dob', TRUE);
		$data['blood_group']=$this->input->post('blood_group', TRUE);
		$data['email_id']=$this->input->post('email_id', TRUE);		
		$data['contact_no']=$this->input->post('contact_no', TRUE);
		$data['designation']=$this->input->post('designation', TRUE);
		$data['qualification']=$this->input->post('qualification', TRUE);
		$data['join_date']=$this->input->post('join_date', TRUE);
		$data['present_address']=$this->input->post('present_address', TRUE);
		$data['permanent_address']=$this->input->post('permanent_address', TRUE);	
		//call photo upload function
		$result=$this->do_upload('faculty_member_photo');
		if(!empty($result[0]))
		{
			echo $data['faculty_member_photo'] = "uplaod_file/faculty_member_photo/$result[0]" ;	
		}				
		$data['update_by']=$this->session->userdata('admin_id');
		$data['update_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
	
		//Form Validation
		$this->form_validation->set_rules('faculty_member_name', 'Faculty Member Name Title', 'required');
		$this->form_validation->set_rules('faculty', 'faculty', 'required');
		$this->form_validation->set_rules('sex', 'sex', 'required');
		$this->form_validation->set_rules('dob', 'dob', 'required');
		$this->form_validation->set_rules('blood_group', 'Blood Group', 'required');
		$this->form_validation->set_rules('email_id', 'Email ID', 'required');
		$this->form_validation->set_rules('contact_no', 'Contact No', 'required');
		$this->form_validation->set_rules('designation', 'Designation No', 'required');
		$this->form_validation->set_rules('qualification', 'Qualification No', 'required');
		$this->form_validation->set_rules('join_date', 'Joining Date', 'required');
		$this->form_validation->set_rules('present_address', 'Present Address', 'required');
		$this->form_validation->set_rules('permanent_address', 'Permanent Address', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('faculty_member_form_validation',validation_errors());
			redirect("backend_faculty_member/edit/$id");
		}
		else
		{
			//update faculty_member data
			$this->model_backend_faculty_member->update_faculty_member_data($data,$id);
			
			
			// Redirect with flash message
			$sdata=array();
			$sdata['message']="update insert successfully";
			$this->session->set_userdata($sdata);
			redirect('backend_faculty_member');
		}
	}
	/**
	 * publish faculty_member
	 *
	 * @return void
	 */		
	public function publish()
	{
		$data=array();
		$data['status']=1;
		 $ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_faculty_member->publish_data($data,$ids);
	}

	/**
	 * Unpublish faculty_member
	 *
	 * @return void
	 */	
	public function unpublish()
	{
		$data=array();
		$data['status']=0;
		$ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_faculty_member->unpublish_data($data,$ids);
	}
	
	
	public function do_upload($faculty_member_photo)
	{
	    // photo upload
		$config = array();
		$config['upload_path'] = './uplaod_file/faculty_member_photo/';
		$config['allowed_types'] = 'gif|jpg|png|';
		$config['max_size'] = '200';	
		
		$this->load->library('upload', $config,'faculty_member_photo');
		$this->faculty_member_photo->initialize($config);
		$faculty_member_photo = $this->faculty_member_photo->do_upload('faculty_member_photo');
	
	    // Check uploads success
		if ($faculty_member_photo) 
		{
			$file_name=array();
		   if($faculty_member_photo)
		  { // Both Upload Success
			
		  // Data of your cover file
		  $faculty_member_photo = $this->faculty_member_photo->data();
		  $file_name[0]=$faculty_member_photo['file_name']; 
		  }
		  
		  return $file_name;
		} 
		else {
		 echo 'Cover upload Error : ' . $this->faculty_member_photo->display_errors() . '<br/>';
		
		}
	}
}
