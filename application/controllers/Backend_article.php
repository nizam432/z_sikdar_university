<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Backend article controller for Nanosoft News Site
 */
class Backend_article extends CI_Controller 
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
	   $this->load->model('model_backend_article');
	   date_default_timezone_set('Asia/Dhaka');
	    $this->load->helper(array('form', 'url')); 
	}
	
	/**
	 * Show list
	 *
	 * @return void
	 */	
	public function index()
	{
		
		$data = array();
		$data['article_list'] =$this->model_backend_article->get_article_list_data();
		$data['content'] = $this->load->view('admin/article/list',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	
	/**
	 * Add Form
	 *
	 * @return void
	 */	
	public function add()
	{
		$data = array();
		$data['category_data']= $this->model_backend_article->get_category_data();
		$data['content']=$this->load->view('admin/article/add',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	
	/**
	 * Edit Form
	 *
	 * @return void
	 */		
	public function edit($id)
	{
		$data = array();
		$data['article_edit']= $this->model_backend_article->get_article_row($id);
		$data['category_data']= $this->model_backend_article->get_category_data();
		$data['category_assing_data']= $this->model_backend_article->get_category_asssing_data($data['article_edit']->article_id);
		$data['content']=$this->load->view('admin/article/edit',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	
	/**
	 * Update article
	 *
	 *@param int $id
	 * @return void
	 */	
	public function update($id)
	{
		$data=array();
	    //call photo upload function
		$result=$this->do_upload('article_image');
		if(!empty($result[0]))
		{
			$data['article_image'] = "/uplaod_file/article_image/$result[0]" ;	
		}
		
		$data['title']=$this->input->post('title', TRUE);
		$data['top_articles']=$this->input->post('top_articles', TRUE);
		$data['slide']=$this->input->post('slide', TRUE);
		$data['description']=$this->input->post('description', TRUE);
		$data['update_by']=$this->session->userdata('admin_id');
		$data['update_date']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		
		// update article data 
		$this->model_backend_article->update_article_data($data,$id);
		
		//delete assing category data
		$this->model_backend_article->delete_assing_category($id);
		
		//insert assing category data
		$category=$this->input->post('category_id', TRUE);
		foreach($category as $category_id)
		{
			$data2=array();
			$data2['article_id']=$id;
			$data2['category_id']=$category_id;
			$this->model_backend_article->save_article_category_assing_data($data2);
		}
		
		$sdata=array();
		$sdata['message']="update insert successfully";
		$this->session->set_userdata($sdata);
		redirect('backend_article');
	}
	
	public function save()
	{
		$this->load->library('form_validation');
		$data=array();	
	    //call photo upload function
		$result=$this->do_upload('article_image');
		if(!empty($result[0]))
		{
			$data['article_image'] = "/uplaod_file/article_image/$result[0]" ;	
		}

		$data['title']=$this->input->post('title', TRUE);
		$data['top_articles']=$this->input->post('top_articles', TRUE);
		$data['slide']=$this->input->post('slide', TRUE);
		$data['description']=$this->input->post('description', TRUE);
		$this->input->post('article_image', TRUE);
		$data['entry_by']=$this->session->userdata('admin_id');
		$data['entry_date']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Article Description', 'required');
		
		if (empty($_FILES['article_image']['name']))
		{
			$this->form_validation->set_rules('article_image', 'Article Image', 'required');
		}
		
		if (empty($_POST['category_id'])) 
		{
			$this->form_validation->set_rules('category_id[]','Category', 'required');
		}

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('article_form_validation',validation_errors());
			redirect('backend_article/add');
		}

		else
		{
			// insert article data
			$insert_id=$this->model_backend_article->save_article_data($data);
			
			if($insert_id)
			{
				//insert assing category data
				$category=$this->input->post('category_id', TRUE);
				foreach($category as $category_id)
				{
					$data2=array();
					$data2['article_id']=$insert_id;
					$data2['category_id']=$category_id;
					$this->model_backend_article->save_article_category_assing_data($data2);
				}
			}
			
			$result=array();
			$result['message']="Data insert successfully";
			$this->session->set_userdata($result);
			redirect('backend_article');
		}
	}

	public function publish()
	{
		$data=array();
		$data['status']=1;
		 $ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_article->publish_data($data,$ids);
	}
	
	public function unpublish()
	{
		$data=array();
		$data['status']=0;
		$ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_article->unpublish_data($data,$ids);
	}
	
	public function do_upload($article_image)
	{
	    // photo upload
		$config = array();
		$config['upload_path'] = './uplaod_file/article_image/';
		$config['allowed_types'] = 'gif|jpg|png|';
		$config['max_size'] = '5000';	
		
		$this->load->library('upload', $config,'article_image');
		$this->article_image->initialize($config);
		$article_image = $this->article_image->do_upload('article_image');
	
	    // Check uploads success
		if ($article_image) 
		{
			$file_name=array();
		   if($article_image)
		  { // Both Upload Success
			
		  // Data of your cover file
		  $article_image = $this->article_image->data();
		  $file_name[0]=$article_image['file_name']; 
		  }
		  
		  return $file_name;
		} 
		else {
		 echo 'Cover upload Error : ' . $this->article_image->display_errors() . '<br/>';
		
		}
	}
}