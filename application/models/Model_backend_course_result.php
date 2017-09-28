<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Model_backend_course_result extends  CI_Model
{
	public function get_course_result_entry_data($student_id,$semester)
	{
		$this->db->select('*,course.course_title as course_title,course.course_code as course_code,course.credit as credit,section.section_title as section_title,course.course_id as course,semester.semester_title as semester_title');
		$this->db->from('tabulation_sheet');
        $this->db->join('course', 'course.course_id = tabulation_sheet.course', 'left');
        $this->db->join('section', 'section.section_id = tabulation_sheet.section','left');
		$this->db->join('semester', 'semester.semester_id = tabulation_sheet.semester','left');
        $this->db->where(array('tabulation_sheet.semester'=>$semester,'tabulation_sheet.student_id'=>$student_id,'tabulation_sheet.status'=>1));
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}

	public function get_student_taken_course($student_id,$semester)
	{
		$this->db->select('*,course.course_title as course_title,course.course_code as course_code,course.credit as credit,section.section_title as section_title,course.course_id as course,semester.semester_title as semester_title');
		$this->db->from('tabulation_sheet');
        $this->db->join('course', 'course.course_id = tabulation_sheet.course', 'left');
        $this->db->join('section', 'section.section_id = tabulation_sheet.section','left');
		$this->db->join('semester', 'semester.semester_id = tabulation_sheet.semester','left');
		//$this->db->join('course_allocation', 'semester.semester_id = tabulation_sheet.course','left');
        $this->db->where(array('tabulation_sheet.semester'=>$semester,'tabulation_sheet.student_id'=>$student_id,'tabulation_sheet.status'=>0));
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}	
	
	public function save_course_registration_data($data)
	{
		$this->db->insert('course_add_drop',$data);
	}

	public function save_final_registration_data($data2)
	{
		$this->db->insert('tabulation_sheet',$data2);
	}

	public function update_added_course_status($course_add_drop_id,$data3)
	{
		$this->db->where('course_add_drop_id',$course_add_drop_id);
		$this->db->update('course_add_drop',$data3);
	}
	
	public function get_course_data($data)
	{
		$this->db->select('course_id,course_title,course_code');
		$this->db->from('course');
		$this->db->where($data);
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}	
	
	public function get_course_allocation_data($course_id)
	{
		$this->db->select('*,faculty_member.faculty_member_name as faculty_member_name,section.section_title as section_title');
		$this->db->from('course_allocation');
		$this->db->join('faculty_member', 'faculty_member.faculty_member_id = course_allocation.faculty_member');
		$this->db->join('section', 'section.section_id = course_allocation.section');
		$this->db->where('course',$course_id);
		$this->db->order_by('course_allocation_id', "DESC");
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}
	public function get_course_allocation_row_data($course_allocation_id)
	{
		$this->db->select('*,course.course_title as course_title,course.course_code as course_code');
		$this->db->from('course_allocation');
		$this->db->join('course', 'course.course_id = course_allocation.course');
		$this->db->where('course_allocation_id',$course_allocation_id);
		$query=$this->db->get('');
		$result=$query->row();
		return $result;
	}		
	
	public function get_faculty_member_data()
	{
		$this->db->select('faculty_member_id,faculty_member_name');
		$this->db->from('faculty_member');
		$this->db->where('status',1);
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}

	public function get_course_info_data($data)
	{
		$this->db->select('course_allocation.course_allocation_id as course_allocation_id,course.course_title as course_title');
		$this->db->from('course_allocation');
		$this->db->join('course', 'course.course_id = course_allocation.course','left');
		$this->db->where($data);
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}		
	
	public function delete_registerd_course_row_data($course_add_drop_id)
	{
		$this->db->where('course_add_drop_id', $course_add_drop_id);
		$this->db->delete('course_add_drop'); 
	}	
	
	public function get_section_data()
	{
		$this->db->select('section_id,section_title');
		$this->db->from('section');
		$this->db->where('status',1);
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}	
	
	public function get_semester_data()
	{
		$this->db->select('semester_id,semester_title');
		$this->db->from('semester');
		$this->db->where('status',1);
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}
	
	public function get_faculty_data()
	{
		$this->db->select('faculty_id,faculty_title');
		$this->db->from('faculty');
		$this->db->where('status',1);
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}	
	

}