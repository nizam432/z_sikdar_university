<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Backend student controller 
 */
class Backend_student extends CI_Controller 
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
	  $this->load->model('model_backend_student');
	  //load form validation
	  $this->load->library('form_validation');
	  //load session
	  $this->load->library('session');
	   date_default_timezone_set('Asia/Dhaka');
	}
 	/**
	 * Show student List
	 *
	 * @return void
	 */	
	public function index()
	{
		$data = array();
		$data['student_list'] =$this->model_backend_student->get_student_list_data();
		$data['content'] = $this->load->view('admin/student/list',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	 /**
	 * Add student 
	 *
	 * @return void
	 */	
	public function add()
	{
		$data = array();
		$data['blood_group']=array(1=>'A+',2=>'A-',3=>'B+',4=>'B-',5=>'O+',6=>'O-',7=>'AB+',8=>'AB-');
		$data['semester']= $this->model_backend_student->get_semester_data();
		$data['session']= $this->model_backend_student->get_session_data();
		$data['section']= $this->model_backend_student->get_section_data();
		$data['shift']= $this->model_backend_student->get_shift_data();
		$data['faculty']= $this->model_backend_student->get_faculty_data();
		$data['content']=$this->load->view('admin/student/add',$data, TRUE);
		$this->load->view('admin/index', $data);
	}

	 /**
	 * Edit student 
	 *
     * @param int $id
	 * @return void
	 */	
	public function edit($id)
	{
		$data = array();
		$data['student_edit']= $this->model_backend_student->get_student_row($id);
		$std_row_id=$data['student_edit']->std_row_id;
		$data['qualification']= $this->model_backend_student->get_student_qualification($std_row_id);
		$data['blood_group']=array(1=>'A+',2=>'A-',3=>'B+',4=>'B-',5=>'O+',6=>'O-',7=>'AB+',8=>'AB-');
		$data['semester']= $this->model_backend_student->get_semester_data();
		$data['session']= $this->model_backend_student->get_session_data();
		$data['section']= $this->model_backend_student->get_section_data();
		$data['shift']= $this->model_backend_student->get_shift_data();
		$data['faculty']= $this->model_backend_student->get_faculty_data();		
		$data['content']=$this->load->view('admin/student/edit',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	

	
	/**
	 * Save student
	 *
	 * @return void
	 */	
	public function save()
	{
		//student table field;
		$data=array();
		
		$data['student_full_name']=$this->input->post('student_full_name', TRUE);
		$data['father_name']=$this->input->post('father_name', TRUE);
		$data['mother_name']=$this->input->post('mother_name', TRUE);
		$data['marital_status']=$this->input->post('marital_status', TRUE);
		$data['marital_status']=$this->input->post('marital_status', TRUE);
		$data['sex']=$this->input->post('sex', TRUE);
		$data['dob']=$this->input->post('dob', TRUE);
		$data['blood_group']=$this->input->post('blood_group', TRUE);
		$data['contact_self']=$this->input->post('contact_self', TRUE);
		$data['contact_family']=$this->input->post('contact_family', TRUE);
		$data['present_address']=$this->input->post('present_address', TRUE);
		$data['permanent_address']=$this->input->post('permanent_address', TRUE);
		$data['nationality']=$this->input->post('nationality', TRUE);
		$data['email_id']=$this->input->post('email_id', TRUE);
		$data['physical_challenge']=$this->input->post('physical_challenge', TRUE);
		$data['credit_transfer']=$this->input->post('credit_transfer', TRUE);
		$data['student_id']=$this->input->post('student_id', TRUE);
		$data['reg_no']=$this->input->post('reg_no', TRUE);
		$data['semester']=$this->input->post('semester', TRUE);
		$data['session']=$this->input->post('session', TRUE);
		$data['faculty']=$this->input->post('faculty', TRUE);
		$data['department']=$this->input->post('department', TRUE);
		$data['program']=$this->input->post('program', TRUE);
		$data['section']=$this->input->post('section', TRUE);
		$data['shift']=$this->input->post('shift', TRUE);
		$data['admission_date']=$this->input->post('admission_date', TRUE);
		$data['graduation_type']=$this->input->post('graduation_type', TRUE);
		
		//call photo upload function
		$result=$this->do_upload('student_photo');
		if(!empty($result[0]))
		{
			echo $data['student_photo'] = "/uplaod_file/student_photo/$result[0]" ;	
		}

		$data['entry_by']=$this->session->userdata('admin_id');
		$data['entry_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
			
		// Qtalification table field
		$qualification=array();
		$qualification['degree_title']= $this->input->post('degree_title',TRUE);
		$qualification['passing_year']= $this->input->post('passing_year',TRUE);
		$qualification['div_or_cgpa']= $this->input->post('div_or_cgpa',TRUE);
		$qualification['board_or_institiute']= $this->input->post('board_or_institiute',TRUE);
		
		// Credit table field
		$credit= array();
		$credit['credit']= $this->input->post('credit',TRUE);
		$credit['cgpa']= $this->input->post('cgpa',TRUE);
		
		//Form Validation
		
		//student table field
		$this->form_validation->set_rules('student_full_name', 'Student Name', 'required');
		/*$this->form_validation->set_rules('father_name', 'Father\'s Name', 'required');
		$this->form_validation->set_rules('mother_name', 'Mother\'s Name', 'required');
		$this->form_validation->set_rules('marital_status', 'Marital Status', 'required');
		$this->form_validation->set_rules('sex', 'Sex', 'required');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
		$this->form_validation->set_rules('blood_group', 'Blood Group', 'required');
		$this->form_validation->set_rules('email_id', 'Email ID', 'required');
		$this->form_validation->set_rules('contact_self', 'Contact Self', 'required');
		$this->form_validation->set_rules('contact_family', 'Contact Family', 'required');
		$this->form_validation->set_rules('present_address', 'Present Address', 'required');
		$this->form_validation->set_rules('permanent_address', 'Permanent Address', 'required');
		$this->form_validation->set_rules('student_id', 'Student ID', 'required');
		$this->form_validation->set_rules('reg_no', 'Registration ID', 'required');
		$this->form_validation->set_rules('semester', 'Semester', 'required');
		$this->form_validation->set_rules('session', 'session', 'required');
		$this->form_validation->set_rules('faculty', 'Faculty', 'required');
		$this->form_validation->set_rules('department', 'Dpartment', 'required');
		$this->form_validation->set_rules('program', 'program', 'required');
		$this->form_validation->set_rules('section', 'section', 'required');
		$this->form_validation->set_rules('shift', 'shift', 'required');
		$this->form_validation->set_rules('admission_date', 'Admission Date', 'required');
		$this->form_validation->set_rules('status', 'status', 'required');
		//Qualification table field
		$this->form_validation->set_rules('degree_title[]', 'Degree required', 'required');
		$this->form_validation->set_rules('passing_year[]', 'Passing Year', 'required');
		$this->form_validation->set_rules('div_or_cgpa[]', 'Divition', 'required');
		$this->form_validation->set_rules('board_or_institiute[]', 'Marital Status', 'required');
		*/
		//Credit table field
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('student_form_validation',validation_errors());
			redirect('backend_student/add');
		}
		else
		{
			$this->db->trans_begin();

			//save student data
			$insert_id=$this->model_backend_student->save_student_data($data);
			
			if(!empty($credit['credit']))
			{
				$credit['std_row_id']=$insert_id;
				//save student credit
				$this->model_backend_student->save_student_credit_data($credit);
			}
			
			
			if(!empty($qualification['degree_title'][0]))
			{
				$std_row_id=$insert_id;
				//save student qalification
				$this->model_backend_student->save_student_qualification_data($qualification,$std_row_id);
			}
			
			
			if ($this->db->trans_status() === FALSE)
			{
					$this->db->trans_rollback();
			}
			else
			{
					$this->db->trans_commit();
			}		
			
			// Redirect with flash message
			$result=array();
			$result['message']="Data insert successfully";
			$this->session->set_userdata($result);
			redirect('backend_student');
		}
	}

	
	/**
	 * Update student
	 *
	 * @param int $id
	 * @return void
	 */	
	 
	public function update($id)
	{
		$data = array();
		$data['student_full_name']=$this->input->post('student_full_name', TRUE);
		$data['update_by']=$this->session->userdata('admin_id');
		$data['update_date_time']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		
		//Form Validation
		$this->form_validation->set_rules('student_full_name', 'student Name', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('student_form_validation',validation_errors());
			redirect("backend_student/edit/$id");
		}
		else
		{
			//update student data
			$this->model_backend_student->update_student_data($data,$id);
			
			// Redirect with flash message
			$sdata=array();
			$sdata['message']="update insert successfully";
			$this->session->set_userdata($sdata);
			redirect('backend_student');
		}
	}
	/**
	 * publish student
	 *
	 * @return void
	 */		
	public function publish()
	{
		$data=array();
		$data['status']=1;
		 $ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_student->publish_data($data,$ids);
	}

	/**
	 * Unpublish student
	 *
	 * @return void
	 */	
	public function unpublish()
	{
		$data=array();
		$data['status']=0;
		$ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->model_backend_student->unpublish_data($data,$ids);
	}
	
	/**
	 * Get Department Data
	 *
	 * @return array
	 */		
	Public function get_department()
	{
		

		  $result=$this->db->where('faculty',$_POST['id'])
						->get('department')
						->result();
     
        $data=array();
		foreach($result as $r)
		{
			$data['value']=$r->department_id;
			$data['label']=$r->department_title;
			$json[]=$data;
		}
		echo json_encode($json);
	}	

	/**
	 * Get Department Data
	 *
	 * @return array
	 */		
	Public function get_program()
	{
		

		  $result=$this->db->where('department',$_POST['id'])
						->get('program')
						->result();
     
        $data=array();
		foreach($result as $r)
		{
			$data['value']=$r->program_id;
			$data['label']=$r->program_title;
			$json[]=$data;
		}
		echo json_encode($json);
	}	
	
	public function do_upload($student_photo)
	{
	    // photo upload
		$config = array();
		$config['upload_path'] = './uplaod_file/student_photo/';
		$config['allowed_types'] = 'gif|jpg|png|';
		$config['max_size'] = '200';	
		
		$this->load->library('upload', $config,'student_photo');
		$this->student_photo->initialize($config);
		$student_photo = $this->student_photo->do_upload('student_photo');
	
	    // Check uploads success
		if ($student_photo) 
		{
			$file_name=array();
		   if($student_photo)
		  { // Both Upload Success
			
		  // Data of your cover file
		  $student_photo = $this->student_photo->data();
		  $file_name[0]=$student_photo['file_name']; 
		  }
		  
		  return $file_name;
		} 
		else {
		 echo 'Cover upload Error : ' . $this->student_photo->display_errors() . '<br/>';
		
		}
	}
}
