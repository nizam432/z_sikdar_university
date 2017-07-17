<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Model_user extends  CI_Model
{
	public function get_user_list_data($per_page,$offset)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by("id", "DESC");
		$query=$this->db->get('',$per_page,$offset);
		$result=$query->result();
		return $result;
	}
	
	public function save_user_data($data)
	{
		$this->db->insert('users',$data);
	}
}