<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Backend session controller 
 */
class Backend_session extends CI_Controller 
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
	  $this->load->model('model_backend_session');
	  //load form validation
	  $this->load->library('form_validation');
	  //load session
	  $this->load->library('session');
	   date_default_timezone_set('Asia/Dhaka');
	}
 	/**
	 * Show session List
	 *
	 * @return void
	 */	
	public function index()
	{
		$data = array();
		$data['session_list'] =$this->model_backend_session->get_session_list_data();
		$data['content'] = $this->load->view('admin/session/list',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	 /**
	 * Add session 
	 *
	 * @return void
	 */	
	public function add()
	{
		$data = array();
		$data['content']=$this->load->view('admin/session/add','', TRUE);
		$this->load->view('admin/index', $data);
	}

	 /**
	 * Edit session 
	 *
     * @param int $id
	 * @return void
	 */	
	public function edit($id)
	{
		$data = array();
		$data['session_edit']= $this->model_backend_session->get_session_row($id);
		$data['content']=$this->load->view('admin/session/edit',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	

	
	/**
	 * Save session
	 *
	 * @return void
	 */	
	public function save()
	{
		$data=array();
		$data['session_title']=$this->input->post('semester_title', TRUE);
		$data['entry_by']=$this->session->userdata('admin_id');
		$data['entry_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('session_title', 'session Title', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('session_form_validation',validation_errors());
			redirect('backend_session/add');
		}
		else
		{
			//save session
			$this->model_backend_session->save_session_data($data);
			
			// Redirect with flash message
			$result=array();
			$result['message']="Data insert successfully";
			$this->session->set_userdata($result);
			redirect('backend_session');
		}
	}

	
	/**
	 * Update session
	 *
	 * @param int $id
	 * @return void
	 */	
	 
	public function update($id)
	{
		$data = array();
		$data['session_title']=$this->input->post('session_title', TRUE);
		$data['update_by']=$this->session->userdata('admin_id');
		$data['update_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('session_title', 'session Title', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('session_form_validation',validation_errors());
			redirect("backend_session/edit/$id");
		}
		else
		{
			//update session data
			$this->model_backend_session->update_session_data($data,$id);
			
			// Redirect with flash message
			$sdata=array();
			$sdata['message']="update insert successfully";
			$this->session->set_userdata($sdata);
			redirect('backend_session');
		}
	}
	/**
	 * publish session
	 *
	 * @return void
	 */		
	public function publish()
	{
		$data=array();
		$data['status']=1;
		 $ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_session->publish_data($data,$ids);
	}

	/**
	 * Unpublish session
	 *
	 * @return void
	 */	
	public function unpublish()
	{
		$data=array();
		$data['status']=0;
		$ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_session->unpublish_data($data,$ids);
	}
}
