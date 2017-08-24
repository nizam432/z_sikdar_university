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
		return $this->db->insert_id();
	}
	
	public function save_student_credit_data($credit)
	{
		
		$this->db->insert('student_credit_transfer',$credit);
	}
	
	public function save_student_qualification_data($qualification,$std_row_id)
	{
		$data=array();
		foreach($qualification['degree_title'] as $key=>$value)
		{
			$data['std_row_id']=$std_row_id;
			$data['degree_title']=$qualification['degree_title'][$key];
			$data['passing_year']=$qualification['passing_year'][$key]; 
			$data['div_or_cgpa']=$qualification['div_or_cgpa'][$key];
			$data['board_or_institiute']=$qualification['board_or_institiute'][$key]; 
			$this->db->insert('student_qualification',$data);
		}
	}
	

	public function get_student_row($id)
	{
		$this->db->select('*');
		$this->db->from('student');
		$this->db->where('student.std_row_id',$id);
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

	public function get_student_credit($std_row_id)
	{
		$this->db->select('*');
		$this->db->from('student_credit_transfer');
		$this->db->where('std_row_id',$std_row_id);
		$query=$this->db->get('');
		$result=$query->row();
		return $result;
	}

	public function get_student_qualification($std_row_id)
	{
		$this->db->select('*');
		$this->db->from('student_qualification');
		$this->db->where('std_row_id',$std_row_id);
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
	
	public function delete_student_credit_data($std_row_id)
	{
		$this->db->where('std_row_id', $std_row_id);
		$this->db->delete('student_credit_transfer');	
	}
	
	public function delete_student_qualification_data($std_row_id)
	{
		$this->db->where('std_row_id', $std_row_id);
		$this->db->delete('student_qualification');
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
	
	public function get_view_data($std_row_id)
	{
		$this->db->select('*');
		$this->db->from('student');
		$this->db->where('std_row_id',$std_row_id);
		$this->db->order_by("student.std_row_id", "DESC");
		$query=$this->db->get('');
		$result=$query->row();
		return $result;
	}
}