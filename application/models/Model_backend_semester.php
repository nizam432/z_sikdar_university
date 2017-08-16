<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Model_backend_semester extends  CI_Model
{
	public function get_semester_list_data()
	{
		$this->db->select('semester.semester_id as semester_id,semester.semester_title as semester_title,semester.status as status,semester.entry_date_time as entry_date_time,users.name as entry_by');
		$this->db->from('semester');
		$this->db->join('users', 'users.id = semester.entry_by');
		$this->db->order_by("semester.semester_id", "DESC");
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}	
	
	public function save_semester_data($data)
	{
		$this->db->insert('semester',$data);
	}
	

	public function get_semester_row($id)
	{
		$this->db->select('*');
		$this->db->from('semester');
		$this->db->where('semester_id',$id);
		$query=$this->db->get();
		$result=$query->row();
		return $result;
	}
	
	public function update_semester_data($data, $id)
	{
		$this->db->where('semester_id', $id);
		$result=$this->db->update('semester', $data);
		return $result;		
	}
	
		public function publish_data($data,$ids)
	{
		echo $data;
		echo $ids;
		$count = 0;
        foreach ($ids as $id){
           $did = intval($id).'<br>';
            $this->db->where('semester_id',$id);
			$this->db->update('semester',$data);
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
            $this->db->where('semester_id',$id);
			$this->db->update('semester',$data);
            $count = $count+1;
       }
       
        echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
            '.$count.' Item UnPublished successfully
            </div>';
        $count = 0;
	}
	
}