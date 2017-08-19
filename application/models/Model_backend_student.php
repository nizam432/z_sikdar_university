<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Model_backend_student extends  CI_Model
{
	public function get_student_list_data()
	{
		$this->db->select('student.std_row_id as std_row_id,student.student_full_name as student_full_name,student.status as status,student.entry_date_time as entry_date_time,users.name as entry_by');
		$this->db->from('student');
		$this->db->join('users', 'users.id = student.entry_by');
		$this->db->order_by("student.std_row_id", "DESC");
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}	
	
	public function save_student_data($data)
	{
		$this->db->insert('student',$data);
	}
	

	public function get_student_row($id)
	{
		$this->db->select('*');
		$this->db->from('student');
		$this->db->where('std_row_id',$id);
		$query=$this->db->get();
		$result=$query->row();
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

	public function get_semester_data()
	{
		$this->db->select('semester_id,semester_title');
		$this->db->from('semester');
		$this->db->where('status',1);
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}
	
	public function get_session_data()
	{
		$this->db->select('session_id,session_title');
		$this->db->from('session');
		$this->db->where('status',1);
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
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
	
	public function get_shift_data()
	{
		$this->db->select('shift_id,shift_title');
		$this->db->from('shift');
		$this->db->where('status',1);
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}	
	public function update_student_data($data, $id)
	{
		$this->db->where('std_row_id', $id);
		$result=$this->db->update('student', $data);
		return $result;		
	}
	
		public function publish_data($data,$ids)
	{
		echo $data;
		echo $ids;
		$count = 0;
        foreach ($ids as $id){
           $did = intval($id).'<br>';
            $this->db->where('std_row_id',$id);
			$this->db->update('student',$data);
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
            $this->db->where('std_row_id',$id);
			$this->db->update('student',$data);
            $count = $count+1;
       }
       
        echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
            '.$count.' Item UnPublished successfully
            </div>';
        $count = 0;
	}
	
}