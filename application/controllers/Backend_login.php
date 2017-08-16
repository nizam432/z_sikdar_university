<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Backend login controller for Nanosoft News Site
 */
class Backend_login extends CI_Controller{

    public function __construct() {
		
	
        parent::__construct();
        $check_admin_id = $this->session->userdata('admin_id');
        if ($check_admin_id != NULL) {
          redirect('backend_dashboard', "refresh");
        }
    }
    /**
     * Add Login Page
     *
     * @return void
     */
    public function index()
    {
		
        $this->load->view('admin/login');
    }

    /**
     * check_login
     *
     * @return void
     */
    public function check_login()
    {
        //$email=$_POST['email'];
         $email=  $this->input->post('email',TRUE);
        $password= $this->input->post('password',TRUE);
        $this->load->model('admin_login_model');
        $result=$this->admin_login_model->check($email,$password);

        if($result)
        {
             $sdata=array();
             $sdata['admin_id']=$result->id; 
             $sdata['admin_name']=$result->name;
			 $sdata['admin_user_type']=$result->user_type;
             $this->session->set_userdata($sdata);
             redirect('backend_dashboard');          
        }
        else
		{
            $sdata=array();
            $sdata['message']="Invalid Email Or Password";
            $this->session->set_userdata($sdata);
            redirect('backend_login/index');
        }        
        
    }
    
 
}
















