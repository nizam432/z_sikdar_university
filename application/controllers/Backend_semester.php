<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Backend semester controller 
 */
class Backend_semester extends CI_Controller 
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
	  $this->load->model('model_backend_semester');
	  //load form validation
	  $this->load->library('form_validation');
	  //load semester
	  $this->load->library('session');
	   date_default_timezone_set('Asia/Dhaka');
	}
 	/**
	 * Show semester List
	 *
	 * @return void
	 */	
	public function index()
	{
		$data = array();
		$data['semester_list'] =$this->model_backend_semester->get_semester_list_data();
		$data['content'] = $this->load->view('admin/semester/list',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	 /**
	 * Add semester 
	 *
	 * @return void
	 */	
	public function add()
	{
		$data = array();
		$data['content']=$this->load->view('admin/semester/add','', TRUE);
		$this->load->view('admin/index', $data);
	}

	 /**
	 * Edit semester 
	 *
     * @param int $id
	 * @return void
	 */	
	public function edit($id)
	{
		$data = array();
		$data['semester_edit']= $this->model_backend_semester->get_semester_row($id);
		$data['content']=$this->load->view('admin/semester/edit',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	

	
	/**
	 * Save semester
	 *
	 * @return void
	 */	
	public function save()
	{
		$data=array();
		$data['semester_title']=$this->input->post('semester_title', TRUE);
		$data['entry_by']=$this->session->userdata('admin_id');
		$data['entry_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('semester_title', 'semester Title', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->semester->set_flashdata('semester_form_validation',validation_errors());
			redirect('backend_semester/add');
		}
		else
		{
			//save semester
			$this->model_backend_semester->save_semester_data($data);
			
			// Redirect with flash message
			$result=array();
			$result['message']="Data insert successfully";
			$this->session->set_userdata($result);
			redirect('backend_semester');
		}
	}

	
	/**
	 * Update semester
	 *
	 * @param int $id
	 * @return void
	 */	
	 
	public function update($id)
	{
		$data = array();
		$data['semester_title']=$this->input->post('semester_title', TRUE);
		$data['update_by']=$this->session->userdata('admin_id');
		$data['update_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('semester_title', 'semester Title', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('semester_form_validation',validation_errors());
			redirect("backend_semester/edit/$id");
		}
		else
		{
			//update semester data
			$this->model_backend_semester->update_semester_data($data,$id);
			
			// Redirect with flash message
			$sdata=array();
			$sdata['message']="update insert successfully";
			$this->session->set_userdata($sdata);
			redirect('backend_semester');
		}
	}
	/**
	 * publish semester
	 *
	 * @return void
	 */		
	public function publish()
	{
		$data=array();
		$data['status']=1;
		 $ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_semester->publish_data($data,$ids);
	}

	/**
	 * Unpublish semester
	 *
	 * @return void
	 */	
	public function unpublish()
	{
		$data=array();
		$data['status']=0;
		$ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_semester->unpublish_data($data,$ids);
	}
}
