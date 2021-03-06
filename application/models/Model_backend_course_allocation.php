<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Model_backend_course_allocation extends  CI_Model
{
	public function get_course_allocation_list_data()
	{
		$this->db->select('course_allocation.course_allocation_id as course_allocation_id,course_allocation.entry_date_time as entry_date_time,users.name as entry_by');
		$this->db->from('course_allocation');
		$this->db->join('users', 'users.id = course_allocation.entry_by');
		$this->db->order_by("course_allocation.course_allocation_id", "DESC");
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}	
	
	public function save_course_allocation_data($data)
	{
		$this->db->insert('course_allocation',$data);
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
	
	public function delete_course_data($delete_course_data)
	{
		$this->db->where('course_allocation_id', $delete_course_data);
		$this->db->delete('course_allocation'); 
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

	public function get_course_allocation_row($id)
	{
		$this->db->select('*');
		$this->db->from('course_allocation');
		$this->db->where('course_allocation_id',$id);
		$query=$this->db->get();
		$result=$query->row();
		return $result;
	}
	
	public function update_course_allocation_data($data, $course_allocation_id)
	{
		$this->db->where('course_allocation_id', $course_allocation_id);
		$result=$this->db->update('course_allocation', $data);
		echo 'ddddd'; exit;
		
		return $result;		
	}
	
		public function publish_data($data,$ids)
	{
		echo $data;
		echo $ids;
		$count = 0;
        foreach ($ids as $id){
           $did = intval($id).'<br>';
            $this->db->where('course_allocation_id',$id);
			$this->db->update('course_allocation',$data);
            $count = $count+1;
       }
       
        echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
            '.$count.' Item Published successfully
            </div>';
        $count = 0;
	}
	
	public function unpublish_data($data,$ids)
	{
		echo $data;
		echo $ids;
		$count = 0;
        foreach ($ids as $id){
           $did = intval($id).'<br>';
            $this->db->where('course_allocation_id',$id);
			$this->db->update('course_allocation',$data);
            $count = $count+1;
       }
       
        echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
            '.$count.' Item UnPublished successfully
            </div>';
        $count = 0;
	}
	
}