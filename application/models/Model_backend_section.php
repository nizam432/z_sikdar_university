<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Model_backend_section extends  CI_Model
{
	public function get_section_list_data()
	{
		$this->db->select('section.section_id as section_id,section.section_title as section_title,section.status as status,section.entry_date_time as entry_date_time,users.name as entry_by');
		$this->db->from('section');
		$this->db->join('users', 'users.id = section.entry_by');
		$this->db->order_by("section.section_id", "DESC");
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}	
	
	public function save_section_data($data)
	{
		$this->db->insert('section',$data);
	}
	

	public function get_section_row($id)
	{
		$this->db->select('*');
		$this->db->from('section');
		$this->db->where('section_id',$id);
		$query=$this->db->get();
		$result=$query->row();
		return $result;
	}
	
	public function update_section_data($data, $id)
	{
		$this->db->where('section_id', $id);
		$result=$this->db->update('section', $data);
		return $result;		
	}
	
		public function publish_data($data,$ids)
	{
		echo $data;
		echo $ids;
		$count = 0;
        foreach ($ids as $id){
           $did = intval($id).'<br>';
            $this->db->where('section_id',$id);
			$this->db->update('section',$data);
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
            $this->db->where('section_id',$id);
			$this->db->update('section',$data);
            $count = $count+1;
       }
       
        echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
            '.$count.' Item UnPublished successfully
            </div>';
        $count = 0;
	}
	
}