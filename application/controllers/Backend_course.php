<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Backend course controller 
 */
class Backend_course extends CI_Controller 
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
	  $this->load->model('model_backend_course');
	  //load form validation
	  $this->load->library('form_validation');
	  //load session
	  $this->load->library('session');
	   date_default_timezone_set('Asia/Dhaka');
	}
 	/**
	 * Show course List
	 *
	 * @return void
	 */	
	public function index()
	{
		$data = array();
		$data['course_list'] =$this->model_backend_course->get_course_list_data();
		$data['content'] = $this->load->view('admin/course/list',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	 /**
	 * Add course 
	 *
	 * @return void
	 */	
	public function add()
	{
		$data = array();
		$data['content']=$this->load->view('admin/course/add','', TRUE);
		$this->load->view('admin/index', $data);
	}

	 /**
	 * Edit course 
	 *
     * @param int $id
	 * @return void
	 */	
	public function edit($id)
	{
		$data = array();
		$data['course_edit']= $this->model_backend_course->get_course_row($id);
		$data['content']=$this->load->view('admin/course/edit',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	

	
	/**
	 * Save course
	 *
	 * @return void
	 */	
	public function save()
	{
		$data=array();
		$data['course_title']=$this->input->post('course_title', TRUE);
		$data['course_code']=$this->input->post('course_code', TRUE);
		$data['course_type']=$this->input->post('course_type', TRUE);
		$data['credit']=$this->input->post('credit', TRUE);
		$data['entry_by']=$this->session->userdata('admin_id');
		$data['entry_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('course_title', 'Course Title', 'required');
		$this->form_validation->set_rules('course_code', 'Course Code', 'required');
		$this->form_validation->set_rules('course_type', 'Course Type', 'required');
		$this->form_validation->set_rules('credit', 'Course Credit', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('course_form_validation',validation_errors());
			redirect('backend_course/add');
		}
		else
		{
			//save course
			$this->model_backend_course->save_course_data($data);
			
			// Redirect with flash message
			$result=array();
			$result['message']="Data insert successfully";
			$this->session->set_userdata($result);
			redirect('backend_course');
		}
	}

	
	/**
	 * Update course
	 *
	 * @param int $id
	 * @return void
	 */	
	 
	public function update($id)
	{
		$data = array();
		$data['course_title']=$this->input->post('course_title', TRUE);
		$data['course_code']=$this->input->post('course_code', TRUE);
		$data['course_type']=$this->input->post('course_type', TRUE);
		$data['credit']=$this->input->post('credit', TRUE);
		$data['update_by']=$this->session->userdata('admin_id');
		$data['update_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('course_title', 'Course Title', 'required');
		$this->form_validation->set_rules('course_code', 'Course Code', 'required');
		$this->form_validation->set_rules('course_type', 'Course Type', 'required');
		$this->form_validation->set_rules('credit', 'Course Credit', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('course_form_validation',validation_errors());
			redirect("backend_course/edit/$id");
		}
		else
		{
			//update course data
			$this->model_backend_course->update_course_data($data,$id);
			
			// Redirect with flash message
			$sdata=array();
			$sdata['message']="update insert successfully";
			$this->session->set_userdata($sdata);
			redirect('backend_course');
		}
	}
	/**
	 * publish course
	 *
	 * @return void
	 */		
	public function publish()
	{
		$data=array();
		$data['status']=1;
		 $ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_course->publish_data($data,$ids);
	}

	/**
	 * Unpublish course
	 *
	 * @return void
	 */	
	public function unpublish()
	{
		$data=array();
		$data['status']=0;
		$ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_course->unpublish_data($data,$ids);
	}
}
