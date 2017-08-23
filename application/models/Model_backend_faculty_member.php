<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Model_backend_faculty_member extends  CI_Model
{
	
	public function get_faculty_member_list_data()
	{

		$this->db->select('faculty_member.faculty_member_id as faculty_member_id,faculty_member.faculty_member_name as faculty_member_name,faculty_member.status as status,faculty_member.entry_date_time as entry_date_time,users.name as entry_by');
		$this->db->from('faculty_member');
		$this->db->join('users', 'users.id = faculty_member.entry_by');
		$this->db->order_by("faculty_member.faculty_member_id", "DESC");
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
		
		
	}	
	
	public function save_faculty_member_data($data)
	{
		$this->db->insert('faculty_member',$data);
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
	public function get_faculty_member_row($id)
	{
		$this->db->select('*');
		$this->db->from('faculty_member');
		$this->db->where('faculty_member_id',$id);
		$query=$this->db->get();
		$result=$query->row();
		return $result;
	}
	
	public function update_faculty_member_data($data, $id)
	{
		$this->db->where('faculty_member_id', $id);
		$result=$this->db->update('faculty_member', $data);
		return $result;		
	}
	
		public function publish_data($data,$ids)
	{
		echo $data;
		echo $ids;
		$count = 0;
        foreach ($ids as $id){
           $did = intval($id).'<br>';
            $this->db->where('faculty_member_id',$id);
			$this->db->update('faculty_member',$data);
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
            $this->db->where('faculty_member_id',$id);
			$this->db->update('faculty_member',$data);
            $count = $count+1;
       }
       
        echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
            '.$count.' Item UnPublished successfully
            </div>';
        $count = 0;
	}
	
}