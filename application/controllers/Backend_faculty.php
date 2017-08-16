<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Backend faculty controller 
 */
class Backend_faculty extends CI_Controller 
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
	  $this->load->model('model_backend_faculty');
	  //load form validation
	  $this->load->library('form_validation');
	  //load session
	  $this->load->library('session');
	   date_default_timezone_set('Asia/Dhaka');
	}
 	/**
	 * Show faculty List
	 *
	 * @return void
	 */	
	public function index()
	{
		$data = array();
		$data['faculty_list'] =$this->model_backend_faculty->get_faculty_list_data();
		$data['content'] = $this->load->view('admin/faculty/list',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	 /**
	 * Add faculty 
	 *
	 * @return void
	 */	
	public function add()
	{
		$data = array();
		$data['content']=$this->load->view('admin/faculty/add','', TRUE);
		$this->load->view('admin/index', $data);
	}

	 /**
	 * Edit faculty 
	 *
     * @param int $id
	 * @return void
	 */	
	public function edit($id)
	{
		$data = array();
		$data['faculty_edit']= $this->model_backend_faculty->get_faculty_row($id);
		$data['content']=$this->load->view('admin/faculty/edit',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	

	
	/**
	 * Save faculty
	 *
	 * @return void
	 */	
	public function save()
	{
		$data=array();
		$data['faculty_title']=$this->input->post('faculty_title', TRUE);
		$data['entry_by']=$this->session->userdata('admin_id');
		$data['entry_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('faculty_title', 'faculty Title', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('faculty_form_validation',validation_errors());
			redirect('backend_faculty/add');
		}
		else
		{
			//save faculty
			$this->model_backend_faculty->save_faculty_data($data);
			
			// Redirect with flash message
			$result=array();
			$result['message']="Data insert successfully";
			$this->session->set_userdata($result);
			redirect('backend_faculty');
		}
	}

	
	/**
	 * Update faculty
	 *
	 * @param int $id
	 * @return void
	 */	
	 
	public function update($id)
	{
		$data = array();
		$data['faculty_title']=$this->input->post('faculty_title', TRUE);
		$data['update_by']=$this->session->userdata('admin_id');
		$data['update_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('faculty_title', 'faculty Title', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('faculty_form_validation',validation_errors());
			redirect("backend_faculty/edit/$id");
		}
		else
		{
			//update faculty data
			$this->model_backend_faculty->update_faculty_data($data,$id);
			
			// Redirect with flash message
			$sdata=array();
			$sdata['message']="update insert successfully";
			$this->session->set_userdata($sdata);
			redirect('backend_faculty');
		}
	}
	/**
	 * publish faculty
	 *
	 * @return void
	 */		
	public function publish()
	{
		$data=array();
		$data['status']=1;
		 $ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_faculty->publish_data($data,$ids);
	}

	/**
	 * Unpublish faculty
	 *
	 * @return void
	 */	
	public function unpublish()
	{
		$data=array();
		$data['status']=0;
		$ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_faculty->unpublish_data($data,$ids);
	}
}
