<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Backend logout controller for nanosoft news site
 */
class Backend_logout extends CI_Controller
{
    /**
      * Logout user
      *
      * @return void
     */            
    public function logout() 
	{
        $this->session->unset_userdata('admin_id');
        $sdata = array();
        $sdata['logout'] = "Successfully Logout";
        $this->session->set_userdata($sdata);
        redirect('backend_login');
    }
}
















