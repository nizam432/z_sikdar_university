<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Backend course_allocation controller 
 */
class Backend_course_add_drop extends CI_Controller 
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
	  $this->load->model('model_backend_course_add_drop');
	  //load form validation
	  $this->load->library('form_validation');
	  //load session
	  $this->load->library('session');
	   date_default_timezone_set('Asia/Dhaka');
	}
 	/**
	 * Show search 
	 *
	 * @return void
	 */	
	public function index()
	{
		$data = array();
		$data['faculty']= $this->model_backend_course_add_drop->get_faculty_data();
		$data['semester']=$this->model_backend_course_add_drop->get_semester_data();		
		$data['content'] = $this->load->view('admin/course_add_drop/add',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	 /**
	 * Get Assigned course
	 *
	 * @return void
	 */	
	public function get_assigned_course()
	{
        $data = array();
		$data['faculty']= $this->model_backend_course_add_drop->get_faculty_data();
		$data['semester']=$this->model_backend_course_add_drop->get_semester_data();		
		$data['day']=array(1=>'Saturday',2=>'Sunday',3=>'Monday',4=>'Tuesday',5=>'Wednesday',6=>'Thusday',7=>'Friday');	
		$data['semester']=$semester=$this->input->post('semester');
        $data['student_id']=$student_id=$this->input->post('student_id');
		$data['get_assing_course_day_wise']=$this->model_backend_course_add_drop->get_assing_course_day_wise($semester);

        $assing_course_data = json_decode(json_encode($data['get_assing_course_day_wise']), True);

		foreach($assing_course_data as $key=>$value)
		{
			  $day=$assing_course_data[$key]['day'];
              $semester=$assing_course_data[$key]['semester'];  
			
			$data['get_assing_course_data']=$this->model_backend_course_add_drop->get_assing_course_data($semester,$day);
			$get_assing_course_data = json_decode(json_encode($data['get_assing_course_data']), True);
			$assing_course_data[$key]['assing_course']=$get_assing_course_data;
		 }
        $data['assing_course_data']=$assing_course_data ;
		$data['content'] = $this->load->view('admin/course_add_drop/add',$data, TRUE);
		$this->load->view('admin/course_add_drop/course_add_drop_form',$data);
    }

	/**
	 * get registerd course
	 *
	 * @return void
	 */	
	public function get_student_registerd_course()
	{
        $data = array();	
		$data['day']=array(1=>'Saturday',2=>'Sunday',3=>'Monday',4=>'Tuesday',5=>'Wednesday',6=>'Thusday',7=>'Friday');	
		$semester=$this->input->post('semester');
        $student_id=$this->input->post('student_id');
        $data['student_registerd_course']=$this->model_backend_course_add_drop->get_student_registerd_course($student_id,$semester);
		$data['content'] = $this->load->view('admin/course_add_drop/add',$data, TRUE);
		$this->load->view('admin/course_add_drop/student_registerd_course',$data);
    }
	
	
	/**
	 * get inprogress course
	 *
	 * @return void
	 */	
	public function get_student_inprogress_course()
	{
        $data = array();		
		$data['day']=array(1=>'Saturday',2=>'Sunday',3=>'Monday',4=>'Tuesday',5=>'Wednesday',6=>'Thusday',7=>'Friday');	
		$semester=$this->input->post('semester');
        $student_id=$this->input->post('student_id');
        $data['student_inprogress_course']=$this->model_backend_course_add_drop->get_student_inprogress_course($student_id,$semester);
        $data['student_taken_course']=$this->model_backend_course_add_drop->get_student_taken_course($student_id,$semester);
		
		
		$data['content'] = $this->load->view('admin/course_add_drop/add',$data, TRUE);
		$this->load->view('admin/course_add_drop/student_inprogress_course',$data);
    }	

/**
	 * get completed course
	 *
	 * @return void
	 */	
	public function get_student_completed_course() 
	{
        $data = array();		
		$data['day']=array(1=>'Saturday',2=>'Sunday',3=>'Monday',4=>'Tuesday',5=>'Wednesday',6=>'Thusday',7=>'Friday');	
		$semester=$this->input->post('semester');
        $student_id=$this->input->post('student_id');
        $data['student_completed_course']=$this->model_backend_course_add_drop->get_student_completed_course($student_id,$semester);

		$data['content'] = $this->load->view('admin/course_add_drop/add',$data, TRUE);
		$this->load->view('admin/course_add_drop/student_completed_course',$data);
    }

	/**
	 * Cancel registerd course
	 *
	 * @return void
	 */	
	public function cancel_registerd_courses()
	{
        $data = array();
		$trabulation_sheet_id=$this->input->get_post('trabulation_sheet_id');
        $data['student_inprogress_course']=$this->model_backend_course_add_drop->cancel_registerd_courses($trabulation_sheet_id);
		$data['content'] = $this->load->view('admin/course_add_drop/add',$data, TRUE);
		$this->load->view('admin/course_add_drop/student_inprogress_course',$data);
    }
	

	
	
	/**
	 * Save course_allocation
	 *
	 * @return void
	 */	
	public function save_course_registration()
	{
		$data=array();
		$data['course_code']=$this->input->get_post('course_code', TRUE);
		$data['student_id']=$this->input->get_post('student_id', TRUE);
		$data['semester']=$this->input->get_post('semester', TRUE);
		$data['section']=$this->input->get_post('section', TRUE);
		$data['day']=$this->input->get_post('day', TRUE);
		$data['course']=$this->input->get_post('course', TRUE);
		$data['course_allocation_id']=$this->input->get_post('course_allocation_id', TRUE);		
   
		$data['entry_by']=$this->session->userdata('admin_id');
		$data['entry_date_time']=date('Y-m-d H:i:s');
		$this->model_backend_course_add_drop->save_course_registration_data($data);
	}
	
	/**
	 * Save final registration
	 *
	 * @return void
	 */	
	public function final_registration()
	{
		$data=array();
		$data['semester']=$this->input->get_post('semester', TRUE);
		$data['student_id']=$this->input->get_post('student_id', TRUE);
		$data['student_registerd_course']=$this->model_backend_course_add_drop->get_student_registerd_course($data['student_id'],$data['semester']);
		$student_registerd_course_data = json_decode(json_encode($data['student_registerd_course']), True);
		$data2=array();
		
		foreach($student_registerd_course_data as $key=>$value)
		{
            $data2['course_add_drop_id']=$student_registerd_course_data[$key]['course_add_drop_id'];
			$data2['student_id']=$student_registerd_course_data[$key]['student_id'];
            $data2['semester']=$student_registerd_course_data[$key]['semester_id'];  
			$data2['section']=$student_registerd_course_data[$key]['section'];
			$data2['course']=$student_registerd_course_data[$key]['course'];
			$data2['course_allocation_id']=$student_registerd_course_data[$key]['course_allocation_id'];
			$data2['entry_by']=$this->session->userdata('admin_id');
			$data2['entry_date_time']=date('Y-m-d H:i:s');
			$data2['status']=0;	
			$this->model_backend_course_add_drop->save_final_registration_data($data2);
			
            $course_add_drop_id=$student_registerd_course_data[$key]['course_add_drop_id'];
			$data3=array();
			$data3['status']=1;
			$this->model_backend_course_add_drop->update_added_course_status($course_add_drop_id,$data3); 
		}
	}	
		
	/**
	 * Delete course defend on Program  
	 *
	 * 
	 * @return success
	 */	
	public function delete_registerd_course_row()
	{
		 $data=array();
		 $course_add_drop_id=$this->input->get_post('course_add_drop_id');
		 $data['course_add_drop_id']=$this->model_backend_course_add_drop->delete_registerd_course_row_data($course_add_drop_id);
	}
}
