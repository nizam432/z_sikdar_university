<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Backend user controller for Nanosoft user List
 */
class Backend_user extends CI_Controller 
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
	   $this->load->model('model_user');
	}

	public function index()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url().'backend_user/index';
		$config['total_rows'] =$this->db->count_all('users');
		$config['per_page'] = 5;
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
		$data['register_list'] =$this->model_user->get_user_list_data($config['per_page'],$offset);
		$data['content'] = $this->load->view('admin/user/list',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	
	public function add()
	{
		$data = array();
		$data['content']=$this->load->view('admin/user/add','', TRUE);
		$this->load->view('admin/index', $data);
	}
	
	public function save()
	{
		$data=array();
		$data['name']=$this->input->post('name', TRUE);
		$data['email_id']=$this->input->post('email_id', TRUE);
		$data['password']=md5($this->input->post('password', TRUE));
		$data['user_type']=$this->input->post('user_type', TRUE);
		$data['status']=$this->input->post('status', TRUE);
		$this->model_user->save_user_data($data);
		$result=array();
		$result['message']="Data insert successfully";
		$this->session->set_userdata($result);
		redirect('backend_user/index');
	}
}