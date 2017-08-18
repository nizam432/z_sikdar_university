<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Backend department controller 
 */
class Backend_department extends CI_Controller 
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
	  $this->load->model('model_backend_department');
	  //load form validation
	  $this->load->library('form_validation');
	  //load session
	  $this->load->library('session');
	   date_default_timezone_set('Asia/Dhaka');
	}
 	/**
	 * Show department List
	 *
	 * @return void
	 */	
	public function index()
	{
		$data = array();
		$data['department_list'] =$this->model_backend_department->get_department_list_data();
		$data['content'] = $this->load->view('admin/department/list',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	 /**
	 * Add department 
	 *
	 * @return void
	 */	
	public function add()
	{
		$data = array();
		$data['faculty']=$this->model_backend_department->get_faculty_data();
		$data['content']=$this->load->view('admin/department/add',$data, TRUE);
		$this->load->view('admin/index', $data);
	}

	 /**
	 * Edit department 
	 *
     * @param int $id
	 * @return void
	 */	
	public function edit($id)
	{
		$data = array();
		$data['department_edit']= $this->model_backend_department->get_department_row($id);
		$data['faculty']=$this->model_backend_department->get_faculty_data();
		$data['content']=$this->load->view('admin/department/edit',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	

	
	/**
	 * Save department
	 *
	 * @return void
	 */	
	public function save()
	{
		$data=array();
		$data['department_title']=$this->input->post('department_title', TRUE);
		$data['faculty']=$this->input->post('faculty', TRUE);
		$data['entry_by']=$this->session->userdata('admin_id');
		$data['entry_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('department_title', 'Department Title', 'required');
		$this->form_validation->set_rules('faculty', 'Faculty', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('department_form_validation',validation_errors());
			redirect('backend_department/add');
		}
		else
		{
			//save department
			$this->model_backend_department->save_department_data($data);
			
			// Redirect with flash message
			$result=array();
			$result['message']="Data insert successfully";
			$this->session->set_userdata($result);
			redirect('backend_department');
		}
	}

	
	/**
	 * Update department
	 *
	 * @param int $id
	 * @return void
	 */	
	 
	public function update($id)
	{
		$data = array();
		$data['department_title']=$this->input->post('department_title', TRUE);
		$data['faculty']=$this->input->post('faculty', TRUE);
		$data['update_by']=$this->session->userdata('admin_id');
		$data['update_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('department_title', 'department Title', 'required');
		$this->form_validation->set_rules('faculty', 'Faculty', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('department_form_validation',validation_errors());
			redirect("backend_department/edit/$id");
		}
		else
		{
			//update department data
			$this->model_backend_department->update_department_data($data,$id);
			
			// Redirect with flash message
			$sdata=array();
			$sdata['message']="update insert successfully";
			$this->session->set_userdata($sdata);
			redirect('backend_department');
		}
	}
	/**
	 * publish department
	 *
	 * @return void
	 */		
	public function publish()
	{
		$data=array();
		$data['status']=1;
		 $ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_department->publish_data($data,$ids);
	}

	/**
	 * Unpublish department
	 *
	 * @return void
	 */	
	public function unpublish()
	{
		$data=array();
		$data['status']=0;
		$ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_department->unpublish_data($data,$ids);
	}
}
