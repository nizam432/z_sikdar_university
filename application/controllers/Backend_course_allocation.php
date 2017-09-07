<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Backend course_allocation controller 
 */
class Backend_course_allocation extends CI_Controller 
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
	  $this->load->model('model_backend_course_allocation');
	  //load form validation
	  $this->load->library('form_validation');
	  //load session
	  $this->load->library('session');
	   date_default_timezone_set('Asia/Dhaka');
	}
 	/**
	 * Show course_allocation List
	 *
	 * @return void
	 */	
	public function index()
	{
		$data = array();
		$data['course_allocation_list'] =$this->model_backend_course_allocation->get_course_allocation_list_data();
		$data['content'] = $this->load->view('admin/course_allocation/list',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	 /**
	 * Add course_allocation 
	 *
	 * @return void
	 */	
	public function add()
	{
		$data = array();
		$data['faculty']= $this->model_backend_course_allocation->get_faculty_data();
		$data['semester']=$this->model_backend_course_allocation->get_semester_data();		
		$data['content']=$this->load->view('admin/course_allocation/add',$data, TRUE);
		$this->load->view('admin/index', $data);
	}

	 /**
	 * Edit course_allocation 
	 *
     * @param int $id
	 * @return void
	 */	
	public function edit($id)
	{
		$data = array();
		$data['course_allocation_edit']= $this->model_backend_course_allocation->get_course_allocation_row($id);
		$data['content']=$this->load->view('admin/course_allocation/edit',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	

	
	/**
	 * Save course_allocation
	 *
	 * @return void
	 */	
	public function save()
	{
		$data=array();
		$data['course']=$this->input->post('course', TRUE);
		$data['faculty_member']=$this->input->post('faculty_member', TRUE);
		$data['semester']=$this->input->post('semester', TRUE);
		$data['room_no']=$this->input->post('room_no', TRUE);
		$data['section']=$this->input->post('section', TRUE);
		$data['day']=$this->input->post('day', TRUE);
		$data['start_time']=$this->input->post('start_time', TRUE);
		$data['end_time']=$this->input->post('end_time', TRUE);
		$data['entry_by']=$this->session->userdata('admin_id');
		$data['entry_date_time']=date('Y-m-d H:i:s');
		$this->model_backend_course_allocation->save_course_allocation_data($data);
	}

	
	/**
	 * Update course_allocation
	 *
	 * @param int $id
	 * @return void
	 */	
	 
	public function update($id)
	{
		$data = array();
		$data['course_allocation_title']=$this->input->post('course_allocation_title', TRUE);
		$data['update_by']=$this->session->userdata('admin_id');
		$data['update_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('course_allocation_title', 'course_allocation Title', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('course_allocation_form_validation',validation_errors());
			redirect("backend_course_allocation/edit/$id");
		}
		else
		{
			//update course_allocation data
			$this->model_backend_course_allocation->update_course_allocation_data($data,$id);
			
			// Redirect with flash message
			$sdata=array();
			$sdata['message']="update insert successfully";
			$this->session->set_userdata($sdata);
			redirect('backend_course_allocation');
		}
	}
	/**
	 * publish course_allocation
	 *
	 * @return void
	 */		
	public function publish()
	{
		$data=array();
		$data['status']=1;
		 $ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_course_allocation->publish_data($data,$ids);
	}

	/**
	 * Unpublish course_allocation
	 *
	 * @return void
	 */	
	public function unpublish()
	{
		$data=array();
		$data['status']=0;
		$ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_course_allocation->unpublish_data($data,$ids);
	}
	/**
	 * Get course defend on Program  
	 *
	 * 
	 * @return array
	 */	
	public function get_course()
	{
		 $data=array();
		 $data['faculty']=$this->input->get_post('faculty');
		 $data['department']=$this->input->get_post('department'); 
		 $data['program']=$this->input->get_post('program'); 
		 $data['course']=$this->model_backend_course_allocation->get_course_data($data);
		 $course_info = json_decode(json_encode($data['course']), True);
		 
		 foreach($course_info as $key=>$value)
		 {
			$couse_id=$course_info[$key]['course_id'];
			$data['allocated_course']=$this->model_backend_course_allocation->get_course_allocation_data($couse_id);
			$allocated_course = json_decode(json_encode($data['allocated_course']), True);
			$course_info[$key]['course_allocated']=$allocated_course;
		 }
		 
		 $data['course_info']=$course_info ;
		 echo '<pre>'; print_r($data['course_info']); echo '</pre>';
	//	 exit;
		 $data['faculty_member']=$this->model_backend_course_allocation->get_faculty_member_data();
		 $data['semester']=$this->model_backend_course_allocation->get_semester_data();
		 $data['section']=$this->model_backend_course_allocation->get_section_data();
		 $data['day']=array(1=>'Saturday',2=>'Sunday',3=>'Monday',4=>'Tuesday',5=>'Wednesday',6=>'Thusday',7=>'Friday');
		 $this->load->view('admin/course_allocation/course',$data);
	}
}
