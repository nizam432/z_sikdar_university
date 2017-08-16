<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Backend shift controller 
 */
class Backend_shift extends CI_Controller 
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
	  $this->load->model('model_backend_shift');
	  //load form validation
	  $this->load->library('form_validation');
	  //load session
	  $this->load->library('session');
	   date_default_timezone_set('Asia/Dhaka');
	}
 	/**
	 * Show shift List
	 *
	 * @return void
	 */	
	public function index()
	{
		$data = array();
		$data['shift_list'] =$this->model_backend_shift->get_shift_list_data();
		$data['content'] = $this->load->view('admin/shift/list',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	 /**
	 * Add shift 
	 *
	 * @return void
	 */	
	public function add()
	{
		$data = array();
		$data['content']=$this->load->view('admin/shift/add','', TRUE);
		$this->load->view('admin/index', $data);
	}

	 /**
	 * Edit shift 
	 *
     * @param int $id
	 * @return void
	 */	
	public function edit($id)
	{
		$data = array();
		$data['shift_edit']= $this->model_backend_shift->get_shift_row($id);
		$data['content']=$this->load->view('admin/shift/edit',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	

	
	/**
	 * Save shift
	 *
	 * @return void
	 */	
	public function save()
	{
		$data=array();
		$data['shift_title']=$this->input->post('shift_title', TRUE);
		$data['entry_by']=$this->session->userdata('admin_id');
		$data['entry_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('shift_title', 'shift Title', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('shift_form_validation',validation_errors());
			redirect('backend_shift/add');
		}
		else
		{
			//save shift
			$this->model_backend_shift->save_shift_data($data);
			
			// Redirect with flash message
			$result=array();
			$result['message']="Data insert successfully";
			$this->session->set_userdata($result);
			redirect('backend_shift');
		}
	}

	
	/**
	 * Update shift
	 *
	 * @param int $id
	 * @return void
	 */	
	 
	public function update($id)
	{
		$data = array();
		$data['shift_title']=$this->input->post('shift_title', TRUE);
		$data['update_by']=$this->session->userdata('admin_id');
		$data['update_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('shift_title', 'shift Title', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('shift_form_validation',validation_errors());
			redirect("backend_shift/edit/$id");
		}
		else
		{
			//update shift data
			$this->model_backend_shift->update_shift_data($data,$id);
			
			// Redirect with flash message
			$sdata=array();
			$sdata['message']="update insert successfully";
			$this->session->set_userdata($sdata);
			redirect('backend_shift');
		}
	}
	/**
	 * publish shift
	 *
	 * @return void
	 */		
	public function publish()
	{
		$data=array();
		$data['status']=1;
		 $ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_shift->publish_data($data,$ids);
	}

	/**
	 * Unpublish shift
	 *
	 * @return void
	 */	
	public function unpublish()
	{
		$data=array();
		$data['status']=0;
		$ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_shift->unpublish_data($data,$ids);
	}
}
