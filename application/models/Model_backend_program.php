<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Model_backend_program extends  CI_Model
{
	public function get_program_list_data()
	{
		$this->db->select('program.program_id as program_id,program.program_title as program_title,program.status as status,program.entry_date_time as entry_date_time,users.name as entry_by');
		$this->db->from('program');
		$this->db->join('users', 'users.id = program.entry_by');
		$this->db->order_by("program.program_id", "DESC");
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}	
	
	public function save_program_data($data)
	{
		$this->db->insert('program',$data);
	}
	
	public function get_department_data($faculty_id)
	{
		$this->db->select('department_id,department_title');
		$this->db->from('department');
		$this->db->where('status',1);
		$this->db->where('faculty',$faculty_id);
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

	public function get_program_row($id)
	{
		$this->db->select('*');
		$this->db->from('program');
		$this->db->where('program_id',$id);
		$query=$this->db->get();
		$result=$query->row();
		return $result;
	}
	
	public function update_program_data($data, $id)
	{
		$this->db->where('program_id', $id);
		$result=$this->db->update('program', $data);
		return $result;		
	}
	
		public function publish_data($data,$ids)
	{
		echo $data;
		echo $ids;
		$count = 0;
        foreach ($ids as $id){
           $did = intval($id).'<br>';
            $this->db->where('program_id',$id);
			$this->db->update('program',$data);
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
            $this->db->where('program_id',$id);
			$this->db->update('program',$data);
            $count = $count+1;
       }
       
        echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
            '.$count.' Item UnPublished successfully
            </div>';
        $count = 0;
	}
	
}