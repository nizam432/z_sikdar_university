<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Backend Category controller for Nanosoft News Site
 */
class Backend_category extends CI_Controller 
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
	  $this->load->model('model_backend_category');
	   date_default_timezone_set('Asia/Dhaka');
	}
 	/**
	 * Show Category List
	 *
	 * @return void
	 */	
	public function index()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url().'backend_category/index';
		$config['total_rows'] =$this->db->count_all('category');
		$config['per_page'] = 4;
		$offset = $this->uri->segment(3);
		$config['full_tag_open'] = '<ul class="pagination pull-right">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';		
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous ';
		$config['num_links'] = 10;
		$this->pagination->initialize($config);
		
		$data = array();
		$data['category_list'] =$this->model_backend_category->get_category_list_data($config['per_page'],$offset);
		$data['content'] = $this->load->view('admin/category/list',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	 /**
	 * Add Category 
	 *
	 * @return void
	 */	
	public function add()
	{
		$data = array();
		$data['content']=$this->load->view('admin/category/add','', TRUE);
		$this->load->view('admin/index', $data);
	}

	 /**
	 * Edit Category 
	 *
     * @param int $id
	 * @return void
	 */	
	public function edit($id)
	{
		$data = array();
		$data['category_edit']= $this->model_backend_category->get_category_row($id);
		$data['content']=$this->load->view('admin/category/edit',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	
	/**
	 * Update Category
	 *
	 * @param int $id
	 * @return void
	 */	
	 
	public function update($id)
	{
		$data = array();
		$data['category_name']=$this->input->post('category_name', TRUE);
		$data['update_by']=$this->session->userdata('admin_id');
		$data['update_date']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		$this->model_backend_category->update_category_data($data,$id);
		$sdata=array();
		$sdata['message']="update insert successfully";
		$this->session->set_userdata($sdata);
		redirect('backend_category');
	}
	/**
	 * Save Category
	 *
	 * @return void
	 */	
	public function save()
	{
		$this->load->library('form_validation');
		$this->load->library('session');
		
		$data=array();
		$data['category_name']=$this->input->post('category_name', TRUE);
		$data['entry_by']=$this->session->userdata('admin_id');
		$data['entry_date']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('category_name', 'Category Name', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('category_form_validation',validation_errors());
			redirect('backend_category/add');
		}
		else
		{
			//save category
			$this->model_backend_category->save_category_data($data);
			$result=array();
			$result['message']="Data insert successfully";
			$this->session->set_userdata($result);
			redirect('backend_category');
		}
	}

	/**
	 * publish Category
	 *
	 * @return void
	 */		
	public function publish()
	{
		$data=array();
		$data['status']=1;
		 $ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_category->publish_data($data,$ids);
	}

	/**
	 * Unpublish Category
	 *
	 * @return void
	 */	
	public function unpublish()
	{
		$data=array();
		$data['status']=0;
		$ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_category->unpublish_data($data,$ids);
	}
}
