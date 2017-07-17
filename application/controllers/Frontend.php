<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Backend Frontend controller for Naniosoft News site
 */
class Frontend extends CI_Controller {


	public function __construct() 
	{
		parent::__construct();
		$this->load->model('model_frontend');
		$this->load->library('session');
		date_default_timezone_set('Asia/Dhaka');
	}
	
 	/**
	 * Show list
	 *
	 * @return void
	 */	   
	public function index()
	{
		$data=array();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'frontend/index';
		$config['total_rows'] =$this->db->count_all('article');
		$config['per_page'] = 8;
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
		$data['home_article']=$this->model_frontend->get_home_article_data($config['per_page'],$offset);
		$data['slide_article']=$this->model_frontend->home_slide_article();
		$data['top_article']=$this->model_frontend->top_article();
		$data['content']=$this->load->view('home/home',$data, TRUE);
		$data['category']=$this->model_frontend->catgory();
		$this->load->view('index',$data);
	}
	 

    /**
	 * Show list
	 * @param int $id
	 * @return void
	 */	   
	public function category($category_id)
	{
		$data=array();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'frontend/category';
		$config['total_rows'] =$this->db->count_all('article');
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
		$data['category_article']= $this->model_frontend->get_category_article_data($category_id);
		$data['content']=$this->load->view('category/category',$data, TRUE);
		$data['category']=$this->model_frontend->catgory();
		$this->load->view('index',$data);
	}
	 
    /**
	 * Show list
	 * @param int $id
	 * @return void
	 */	  
	public function article($article_id)
	{
		$data = array();
		$data['individual_article']= $this->model_frontend->get_individual_article_data($article_id);
		$data['individual_category']= $this->model_frontend->get_individual_category_data($article_id);
		$data['related_article']=$this->model_frontend->get_category_article_data($data['individual_category']->category_id);
		$data['comments']=$this->model_frontend->get_comments_article_data($article_id);
		$data['content']=$this->load->view('pages/show_article',$data, TRUE);
		$data['category']=$this->model_frontend->catgory();
		$this->load->view('index',$data);	
	}

    /**
	 * save comment
     *   
	 * @param int $article_id
	 * @return void
	 */	  	
	public function save_comment($article_id)
	{
		$data=array();
		$data['comment']=$this->input->post('comment');
		$data['article_id']=$article_id;
		$data['register_id']=$this->input->post('register_id');
		$data['entry_date']=date('Y-m-d H:i:s');
		$data['status']=1;
		$data['content']=$this->model_frontend->save_comment_data($data);
		redirect('/frontend/article/'.$article_id);
	}

    /**
	 * save register data
     *
	 * @param int $article_id
	 * @return void
	 */	 	
	public function register_save($article_id)
	{
		$data=array();
		//call photo upload function
		$result=$this->do_upload('register_image');
		if(!empty($result[0]))
		{
			$data['register_image'] = "/uplaod_file/register_image/$result[0]" ;	
		}
		$data['full_name']=$this->input->post('full_name');
		$data['email_id']=$this->input->post('email_id');
		$data['password']=md5($this->input->post('password'));
		
		$data['entry_date']=date('Y-m-d H:i:s');
		$data['status']=1;
		$data['content']=$this->model_frontend->save_register_data($data);
		redirect('/frontend/article/'.$article_id);
	}

    /**
	 * image upload function
     *
	 * @param string $register_image
	 * @return void
	 */	 	
	public function do_upload($register_image)
	{
	    // photo upload
		$config = array();
		$config['upload_path'] = './uplaod_file/register_image/';
		$config['allowed_types'] = 'gif|jpg|png|';
		$config['max_size'] = '5000';	
		
		$this->load->library('upload', $config,'register_image');
		$this->register_image->initialize($config);
		$register_image = $this->register_image->do_upload('register_image');
	
	    // Check uploads success
		if ($register_image) 
		{
			$file_name=array();
		   if($register_image)
		  { // Both Upload Success
			
		  // Data of your cover file
		  $register_image = $this->register_image->data();
		  $file_name[0]=$register_image['file_name']; 
		  }
		  
		  return $file_name;
		} 
		else {
		 echo 'Cover upload Error : ' . $this->register_image->display_errors() . '<br/>';
		
		}
	}

    /**
	 * image upload function
     *
	 * @param int $article_id
	 * @return void
	 */	
	 public function check_register_login($article_id)
    {
         $email=  $this->input->post('email_id',TRUE);
        $password=  md5($this->input->post('password',TRUE));
        $result=$this->model_frontend->check($email,$password);

		
		
        if($result)
        {
             $userData=array();
             $userData['register_id']=$result->id; 
             $userData['register_name']=$result->full_name;
			 $userData['register_image']=$result->register_image;
			 $this->session->set_userdata('userData',$userData);
             redirect("frontend/article/$article_id");          
        }
        else
		{
            $sdata=array();
            $sdata['message']="Invalid Email Or Password";
            $this->session->set_userdata($sdata);
            //redirect('backend_login/index');
        }        
        
    }

    /**
	 * logout register user
     *
	 * @return void
	 */		
	public function logout_register() 
	{
		$this->session->sess_destroy();
        $userData = array();
        $userData['logout'] = "Successfully Logout";
        $this->session->set_userdata($userData);
        redirect('frontend');
    }

    /**
	 * Add bbc feeds
     *
	 * @return void
	 */		
	public function bbc()
	{				
		$data['content']=$this->load->view('pages/bbc','', TRUE);
		$data['category']=$this->model_frontend->catgory();
		$this->load->view('index',$data);
	}

    /**
	 * Add cnn feeds
     *
	 * @return void
	 */		
	public function cnn()
	{				
		$data['content']=$this->load->view('pages/cnn','', TRUE);
		$data['category']=$this->model_frontend->catgory();
		$this->load->view('index',$data);
	}

}
