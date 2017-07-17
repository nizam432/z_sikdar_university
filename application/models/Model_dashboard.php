<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Model_dashboard extends  CI_Model
{
	public function get_total_category()
	{
		$result=$this->db->count_all('category');
		return $result;
	}
	
	public function get_total_article()
	{
		$result=$this->db->count_all('article');
		return $result;
	}	
	
	public function get_total_user()
	{
		$result=$this->db->count_all('users');
		return $result;
	}
}

