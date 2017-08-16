<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Model_backend_faculty extends  CI_Model
{
	public function get_faculty_list_data()
	{
		$this->db->select('faculty.faculty_id as faculty_id,faculty.faculty_title as faculty_title,faculty.status as status,faculty.entry_date_time as entry_date_time,users.name as entry_by');
		$this->db->from('faculty');
		$this->db->join('users', 'users.id = faculty.entry_by');
		$this->db->order_by("faculty.faculty_id", "DESC");
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}	
	
	public function save_faculty_data($data)
	{
		$this->db->insert('faculty',$data);
	}
	

	public function get_faculty_row($id)
	{
		$this->db->select('*');
		$this->db->from('faculty');
		$this->db->where('faculty_id',$id);
		$query=$this->db->get();
		$result=$query->row();
		return $result;
	}
	
	public function update_faculty_data($data, $id)
	{
		$this->db->where('faculty_id', $id);
		$result=$this->db->update('faculty', $data);
		return $result;		
	}
	
		public function publish_data($data,$ids)
	{
		echo $data;
		echo $ids;
		$count = 0;
        foreach ($ids as $id){
           $did = intval($id).'<br>';
            $this->db->where('faculty_id',$id);
			$this->db->update('faculty',$data);
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
            $this->db->where('faculty_id',$id);
			$this->db->update('faculty',$data);
            $count = $count+1;
       }
       
        echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
            '.$count.' Item UnPublished successfully
            </div>';
        $count = 0;
	}
	
}