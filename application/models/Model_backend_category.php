<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Model_backend_category extends  CI_Model
{
	public function get_category_list_data($per_page,$offset)
	{
		$this->db->select('category.category_id as category_id,category.category_name as category_name,category.status as status,category.entry_date as entry_date,users.name as entry_by');
		$this->db->from('category');
		$this->db->join('users', 'users.id = category.entry_by');
		$this->db->order_by("category.category_id", "DESC");
		$query=$this->db->get('',$per_page,$offset);
		$result=$query->result();
		return $result;
	}	
	
	public function save_category_data($data)
	{
		$this->db->insert('category',$data);
	}
	

	public function get_category_row($id)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('category_id',$id);
		$query=$this->db->get();
		$result=$query->row();
		return $result;
	}
	
	public function update_category_data($data, $id)
	{
		$this->db->where('category_id', $id);
		$result=$this->db->update('category', $data);
		return $result;		
	}
	
		public function publish_data($data,$ids)
	{
		echo $data;
		echo $ids;
		$count = 0;
        foreach ($ids as $id){
           $did = intval($id).'<br>';
            $this->db->where('category_id',$id);
			$this->db->update('category',$data);
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
            $this->db->where('category_id',$id);
			$this->db->update('category',$data);
            $count = $count+1;
       }
       
        echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
            '.$count.' Item UnPublished successfully
            </div>';
        $count = 0;
	}
	
}