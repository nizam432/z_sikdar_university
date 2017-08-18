<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Backend program controller 
 */
class Backend_program extends CI_Controller 
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
	  $this->load->model('model_backend_program');
	  //load form validation
	  $this->load->library('form_validation');
	  //load session
	  $this->load->library('session');
	   date_default_timezone_set('Asia/Dhaka');
	}
 	/**
	 * Show program List
	 *
	 * @return void
	 */	
	public function index()
	{
		$data = array();
		$data['program_list'] =$this->model_backend_program->get_program_list_data();
		$data['content'] = $this->load->view('admin/program/list',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	 /**
	 * Add program 
	 *
	 * @return void
	 */	
	public function add()
	{
		$data = array();
		$data['faculty']=$this->model_backend_program->get_faculty_data();
		$data['content']=$this->load->view('admin/program/add',$data, TRUE);
		$this->load->view('admin/index', $data);
	}

	 /**
	 * Edit program 
	 *
     * @param int $id
	 * @return void
	 */	
	public function edit($id)
	{
		$data = array();
		$data['program_edit']= $this->model_backend_program->get_program_row($id);
		$data['content']=$this->load->view('admin/program/edit',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	

	
	/**
	 * Save program
	 *
	 * @return void
	 */	
	public function save()
	{
		$data=array();
		$data['program_title']=$this->input->post('program_title', TRUE);
		$data['entry_by']=$this->session->userdata('admin_id');
		$data['entry_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('program_title', 'program Title', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('program_form_validation',validation_errors());
			redirect('backend_program/add');
		}
		else
		{
			//save program
			$this->model_backend_program->save_program_data($data);
			
			// Redirect with flash message
			$result=array();
			$result['message']="Data insert successfully";
			$this->session->set_userdata($result);
			redirect('backend_program');
		}
	}

	
	/**
	 * Update program
	 *
	 * @param int $id
	 * @return void
	 */	
	 
	public function update($id)
	{
		$data = array();
		$data['program_title']=$this->input->post('program_title', TRUE);
		$data['update_by']=$this->session->userdata('admin_id');
		$data['update_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('program_title', 'program Title', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('program_form_validation',validation_errors());
			redirect("backend_program/edit/$id");
		}
		else
		{
			//update program data
			$this->model_backend_program->update_program_data($data,$id);
			
			// Redirect with flash message
			$sdata=array();
			$sdata['message']="update insert successfully";
			$this->session->set_userdata($sdata);
			redirect('backend_program');
		}
	}
	/**
	 * publish program
	 *
	 * @return void
	 */		
	public function publish()
	{
		$data=array();
		$data['status']=1;
		 $ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_program->publish_data($data,$ids);
	}

	/**
	 * Unpublish program
	 *
	 * @return void
	 */	
	public function unpublish()
	{
		$data=array();
		$data['status']=0;
		$ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_program->unpublish_data($data,$ids);
	}
}
