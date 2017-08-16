<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Model_backend_session extends  CI_Model
{
	public function get_session_list_data()
	{
		$this->db->select('session.session_id as session_id,session.session_title as session_title,session.status as status,session.entry_date_time as entry_date_time,users.name as entry_by');
		$this->db->from('session');
		$this->db->join('users', 'users.id = session.entry_by');
		$this->db->order_by("session.session_id", "DESC");
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}	
	
	public function save_session_data($data)
	{
		$this->db->insert('session',$data);
	}
	

	public function get_session_row($id)
	{
		$this->db->select('*');
		$this->db->from('session');
		$this->db->where('session_id',$id);
		$query=$this->db->get();
		$result=$query->row();
		return $result;
	}
	
	public function update_session_data($data, $id)
	{
		$this->db->where('session_id', $id);
		$result=$this->db->update('session', $data);
		return $result;		
	}
	
		public function publish_data($data,$ids)
	{
		echo $data;
		echo $ids;
		$count = 0;
        foreach ($ids as $id){
           $did = intval($id).'<br>';
            $this->db->where('session_id',$id);
			$this->db->update('session',$data);
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
            $this->db->where('session_id',$id);
			$this->db->update('session',$data);
            $count = $count+1;
       }
       
        echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
            '.$count.' Item UnPublished successfully
            </div>';
        $count = 0;
	}
	
}