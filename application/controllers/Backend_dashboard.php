<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Backend Dashboard controller for Apparel Television
 */
class Backend_dashboard extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		$check_admin_id = $this->session->userdata('admin_id');
		if ($check_admin_id == NULL) {
		  redirect('backend_login/check_login', "refresh");
		}
		$this->load->model('model_dashboard');
		$this->load->library('session');
    }
	
	/**
	  * show on dashboard totat category,article,user
	 */
	public function index()
	{
			
		$data = array();
		//get total category
		//$data['total_category']=$this->model_dashboard->get_total_category();
		//get total article
		//$data['total_article']=$this->model_dashboard->get_total_article();	
		//get total user
		//$data['total_user']=$this->model_dashboard->get_total_user();
		$data['content'] = $this->load->view('admin/dashboard/dashboard','', TRUE);
	
		$this->load->view('admin/index',$data);
	}
}
