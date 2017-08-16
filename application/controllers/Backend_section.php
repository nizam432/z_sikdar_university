<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Backend section controller 
 */
class Backend_section extends CI_Controller 
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
	  $this->load->model('model_backend_section');
	  //load form validation
	  $this->load->library('form_validation');
	  //load session
	  $this->load->library('session');
	   date_default_timezone_set('Asia/Dhaka');
	}
 	/**
	 * Show section List
	 *
	 * @return void
	 */	
	public function index()
	{
		$data = array();
		$data['section_list'] =$this->model_backend_section->get_section_list_data();
		$data['content'] = $this->load->view('admin/section/list',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	 /**
	 * Add section 
	 *
	 * @return void
	 */	
	public function add()
	{
		$data = array();
		$data['content']=$this->load->view('admin/section/add','', TRUE);
		$this->load->view('admin/index', $data);
	}

	 /**
	 * Edit section 
	 *
     * @param int $id
	 * @return void
	 */	
	public function edit($id)
	{
		$data = array();
		$data['section_edit']= $this->model_backend_section->get_section_row($id);
		$data['content']=$this->load->view('admin/section/edit',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	

	
	/**
	 * Save section
	 *
	 * @return void
	 */	
	public function save()
	{
		$data=array();
		$data['section_title']=$this->input->post('section_title', TRUE);
		$data['entry_by']=$this->session->userdata('admin_id');
		$data['entry_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('section_title', 'section Title', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('section_form_validation',validation_errors());
			redirect('backend_section/add');
		}
		else
		{
			//save section
			$this->model_backend_section->save_section_data($data);
			
			// Redirect with flash message
			$result=array();
			$result['message']="Data insert successfully";
			$this->session->set_userdata($result);
			redirect('backend_section');
		}
	}

	
	/**
	 * Update section
	 *
	 * @param int $id
	 * @return void
	 */	
	 
	public function update($id)
	{
		$data = array();
		$data['section_title']=$this->input->post('section_title', TRUE);
		$data['update_by']=$this->session->userdata('admin_id');
		$data['update_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('section_title', 'section Title', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('section_form_validation',validation_errors());
			redirect("backend_section/edit/$id");
		}
		else
		{
			//update section data
			$this->model_backend_section->update_section_data($data,$id);
			
			// Redirect with flash message
			$sdata=array();
			$sdata['message']="update insert successfully";
			$this->session->set_userdata($sdata);
			redirect('backend_section');
		}
	}
	/**
	 * publish section
	 *
	 * @return void
	 */		
	public function publish()
	{
		$data=array();
		$data['status']=1;
		 $ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_section->publish_data($data,$ids);
	}

	/**
	 * Unpublish section
	 *
	 * @return void
	 */	
	public function unpublish()
	{
		$data=array();
		$data['status']=0;
		$ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_section->unpublish_data($data,$ids);
	}
}
