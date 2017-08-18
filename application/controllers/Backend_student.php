<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Backend student controller 
 */
class Backend_student extends CI_Controller 
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
	  $this->load->model('model_backend_student');
	  //load form validation
	  $this->load->library('form_validation');
	  //load session
	  $this->load->library('session');
	   date_default_timezone_set('Asia/Dhaka');
	}
 	/**
	 * Show student List
	 *
	 * @return void
	 */	
	public function index()
	{
		$data = array();
		$data['student_list'] =$this->model_backend_student->get_student_list_data();
		$data['content'] = $this->load->view('admin/student/list',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	 /**
	 * Add student 
	 *
	 * @return void
	 */	
	public function add()
	{
		$data = array();
		$data['faculty']= $this->model_backend_student->get_faculty_data();
		$data['session']= $this->model_backend_student->get_session_data();
		$data['content']=$this->load->view('admin/student/add',$data, TRUE);
		$this->load->view('admin/index', $data);
	}

	 /**
	 * Edit student 
	 *
     * @param int $id
	 * @return void
	 */	
	public function edit($id)
	{
		$data = array();
		$data['student_edit']= $this->model_backend_student->get_student_row($id);
		$data['content']=$this->load->view('admin/student/edit',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	

	
	/**
	 * Save student
	 *
	 * @return void
	 */	
	public function save()
	{
		$data=array();
		$data['student_full_name']=$this->input->post('student_full_name', TRUE);
		$data['entry_by']=$this->session->userdata('admin_id');
		$data['entry_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('student_full_name', 'Student Name', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('student_form_validation',validation_errors());
			redirect('backend_student/add');
		}
		else
		{
			//save student
			$this->model_backend_student->save_student_data($data);
			
			// Redirect with flash message
			$result=array();
			$result['message']="Data insert successfully";
			$this->session->set_userdata($result);
			redirect('backend_student');
		}
	}

	
	/**
	 * Update student
	 *
	 * @param int $id
	 * @return void
	 */	
	 
	public function update($id)
	{
		$data = array();
		$data['student_full_name']=$this->input->post('student_full_name', TRUE);
		$data['update_by']=$this->session->userdata('admin_id');
		$data['update_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('student_full_name', 'student Name', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('student_form_validation',validation_errors());
			redirect("backend_student/edit/$id");
		}
		else
		{
			//update student data
			$this->model_backend_student->update_student_data($data,$id);
			
			// Redirect with flash message
			$sdata=array();
			$sdata['message']="update insert successfully";
			$this->session->set_userdata($sdata);
			redirect('backend_student');
		}
	}
	/**
	 * publish student
	 *
	 * @return void
	 */		
	public function publish()
	{
		$data=array();
		$data['status']=1;
		 $ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_student->publish_data($data,$ids);
	}

	/**
	 * Unpublish student
	 *
	 * @return void
	 */	
	public function unpublish()
	{
		$data=array();
		$data['status']=0;
		$ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_student->unpublish_data($data,$ids);
	}
	
	/**
	 * Get Department Data
	 *
	 * @return array
	 */		
	Public function get_department()
	{
		

		  $result=$this->db->where('faculty',$_POST['id'])
						->get('department')
						->result();
     
        $data=array();
		foreach($result as $r)
		{
			$data['value']=$r->department_id;
			$data['label']=$r->department_title;
			$json[]=$data;
		}
		echo json_encode($json);
	}	

	/**
	 * Get Department Data
	 *
	 * @return array
	 */		
	Public function get_program()
	{
		

		  $result=$this->db->where('department',$_POST['id'])
						->get('program')
						->result();
     
        $data=array();
		foreach($result as $r)
		{
			$data['value']=$r->program_id;
			$data['label']=$r->program_title;
			$json[]=$data;
		}
		echo json_encode($json);
	}	
}
