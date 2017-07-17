<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
/**
 * Backend article Model for Nanosoft News Site
 */
class Model_backend_article extends  CI_Model
{

	/**
	 * Get all article list
	 * 
	 * @return array
	 */
	public function get_article_list_data()
	{
		$this->db->select('article.article_id as article_id,article.title as title,article.status as status,article.entry_date as entry_date,article.article_image	 as article_image	,users.name as entry_by');
		$this->db->from('article');
		$this->db->join('users', 'users.id = article.entry_by');
		$this->db->order_by("article.article_id", "DESC");
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}
	
	/**
	 * Get all article list
	 * 
	 * @return $insert_id
	 */	
	public function save_article_data($data)
	{
		$this->db->insert('article',$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	
	/**
	 * Get all article ro by id
	 * 
     * @param int $id
	 * @return array
	 */
	public function get_article_row($id)
	{
		$this->db->select('*');
		$this->db->from('article');
		$this->db->where('article_id',$id);
		$query=$this->db->get();
		$result=$query->row();
		return $result;
	}


	/**
	 * Update article data 
	 * 
     * @param int $id
     * @param array
	 * @return array
	 */
	public function update_article_data($data, $id)
	{
		$this->db->where('article_id', $id);
		$result=$this->db->update('article', $data);
		return $result;		
	}

	/**
	 * Get all Category 
	 * 
     * @param array
	 * @return array
	 */	
	public function get_category_data()
	{
		$this->db->select('category_id,category_name');
		$this->db->from('category');
		$this->db->order_by("category_id", "DESC");
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}

	/**
	 * Save Category Assing Data
	 * 
	 * @return array
	 */		
	public function save_article_category_assing_data($data)
	{
		$this->db->insert('category_assing',$data);
	}
	
    /**
	 * get Category Assing Data
	 * 
	 * @return array
	 */	
	public function get_category_asssing_data($id)
	{
		$this->db->select('*');
		$this->db->from('category_assing');
		$this->db->where('article_id',$id);
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}

    /**
	 * Delete Category Assing Data
	 * 
     * @param int $id
	 * @return void
	 */		
	public function delete_assing_category($id)
	{
		$this->db->where('article_id',$id);
        $this->db->delete('category_assing');
	}

    /**
	 * Publish_data Article 
	 * 
     * @param array $data
     * @param int $ids
	 * @return void
	 */			
	public function publish_data($data,$ids)
	{
		echo $data;
		echo $ids;
		$count = 0;
        foreach ($ids as $id){
           $did = intval($id).'<br>';
            $this->db->where('article_id',$id);
			$this->db->update('article',$data);
            $count = $count+1;
       }
       
        echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
            '.$count.' Item Published successfully
            </div>';
        $count = 0;
	}

    /**
	 * unPublish_data Article 
	 * 
     * @param array $data
     * @param int $ids
	 * @return void
	 */	
	public function unpublish_data($data,$ids)
	{
		echo $data;
		echo $ids;
		$count = 0;
        foreach ($ids as $id){
           $did = intval($id).'<br>';
            $this->db->where('article_id',$id);
			$this->db->update('article',$data);
            $count = $count+1;
       }
       
        echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
            '.$count.' Item UnPublished successfully
            </div>';
        $count = 0;
	}
}