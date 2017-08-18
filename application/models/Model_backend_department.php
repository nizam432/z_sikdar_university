<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Model_backend_department extends  CI_Model
{
	public function get_department_list_data()
	{
		$this->db->select('department.department_id as department_id,department.department_title as department_title,department.status as status,department.entry_date_time as entry_date_time,users.name as entry_by');
		$this->db->from('department');
		$this->db->join('users', 'users.id = department.entry_by');
		$this->db->order_by("department.department_id", "DESC");
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}	
	
	public function save_department_data($data)
	{
		$this->db->insert('department',$data);
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
	
	public function get_department_row($id)
	{
		$this->db->select('*');
		$this->db->from('department');
		$this->db->where('department_id',$id);
		$query=$this->db->get();
		$result=$query->row();
		return $result;
	}
	
	public function update_department_data($data, $id)
	{
		$this->db->where('department_id', $id);
		$result=$this->db->update('department', $data);
		return $result;		
	}
	
		public function publish_data($data,$ids)
	{
		echo $data;
		echo $ids;
		$count = 0;
        foreach ($ids as $id){
           $did = intval($id).'<br>';
            $this->db->where('department_id',$id);
			$this->db->update('department',$data);
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
            $this->db->where('department_id',$id);
			$this->db->update('department',$data);
            $count = $count+1;
       }
       
        echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
            '.$count.' Item UnPublished successfully
            </div>';
        $count = 0;
	}
	
}