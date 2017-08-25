<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Model_backend_course extends  CI_Model
{
	public function get_course_list_data()
	{
		$this->db->select('course.course_id as course_id,course.course_title as course_title,course.status as status,course.entry_date_time as entry_date_time,users.name as entry_by');
		$this->db->from('course');
		$this->db->join('users', 'users.id = course.entry_by');
		$this->db->order_by("course.course_id", "DESC");
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}	
	
	public function save_course_data($data)
	{
		$this->db->insert('course',$data);
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

	public function get_department_edit_data($faculty)
	{
		$this->db->select('department_id,department_title');
		$this->db->from('department');
		$this->db->where('faculty',$faculty);
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}

	public function get_program_edit_data($department)
	{
		$this->db->select('program_id,program_title');
		$this->db->from('program');
		$this->db->where('department',$department);
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}
	
	public function get_course_row($id)
	{
		$this->db->select('*');
		$this->db->from('course');
		$this->db->where('course_id',$id);
		$query=$this->db->get();
		$result=$query->row();
		return $result;
	}
	
	public function update_course_data($data, $id)
	{
		$this->db->where('course_id', $id);
		$result=$this->db->update('course', $data);
		return $result;		
	}
	
		public function publish_data($data,$ids)
	{
		echo $data;
		echo $ids;
		$count = 0;
        foreach ($ids as $id){
           $did = intval($id).'<br>';
            $this->db->where('course_id',$id);
			$this->db->update('course',$data);
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
            $this->db->where('course_id',$id);
			$this->db->update('course',$data);
            $count = $count+1;
       }
       
        echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
            '.$count.' Item UnPublished successfully
            </div>';
        $count = 0;
	}
	
}