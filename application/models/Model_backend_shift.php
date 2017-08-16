<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Model_backend_shift extends  CI_Model
{
	public function get_shift_list_data()
	{
		$this->db->select('shift.shift_id as shift_id,shift.shift_title as shift_title,shift.status as status,shift.entry_date_time as entry_date_time,users.name as entry_by');
		$this->db->from('shift');
		$this->db->join('users', 'users.id = shift.entry_by');
		$this->db->order_by("shift.shift_id", "DESC");
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}	
	
	public function save_shift_data($data)
	{
		$this->db->insert('shift',$data);
	}
	

	public function get_shift_row($id)
	{
		$this->db->select('*');
		$this->db->from('shift');
		$this->db->where('shift_id',$id);
		$query=$this->db->get();
		$result=$query->row();
		return $result;
	}
	
	public function update_shift_data($data, $id)
	{
		$this->db->where('shift_id', $id);
		$result=$this->db->update('shift', $data);
		return $result;		
	}
	
		public function publish_data($data,$ids)
	{
		echo $data;
		echo $ids;
		$count = 0;
        foreach ($ids as $id){
           $did = intval($id).'<br>';
            $this->db->where('shift_id',$id);
			$this->db->update('shift',$data);
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
            $this->db->where('shift_id',$id);
			$this->db->update('shift',$data);
            $count = $count+1;
       }
       
        echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
            '.$count.' Item UnPublished successfully
            </div>';
        $count = 0;
	}
	
}