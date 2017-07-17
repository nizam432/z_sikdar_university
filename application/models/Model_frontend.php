<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Frontend Model for Nanosoft News Site
 */ 
class Model_frontend extends  CI_Model
{
    /**
	 * Get all category list 
	 * 
	 * @return void
	 */	
	public function catgory()
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('status','1');
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}
	
    /**
	 * Get home article list 
	 * 
	 * @return void
	 */	
	public function get_home_article_data($per_page,$offset)
	{
		$this->db->select('*');
		$this->db->from('article');
		$this->db->order_by("article_id", "DESC");
		$this->db->where('status','1');
		$query=$this->db->get('',$per_page,$offset);
		$result=$query->result();
		return $result;
	}

    /**
	 * Get home article list 
     *
	 * @param int $category_id
	 * @return array
	 */	
	
	public function get_category_article_data($category_id)
	{
		$this->db->select('article.article_id as article_id,article.title as title,article.article_image as article_image');
		$this->db->from('category_assing');
		$this->db->join('article', 'article.article_id=category_assing.article_id');
		$this->db->where('category_assing.category_id',$category_id);
		$this->db->order_by("article.article_id", "DESC");
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}
    
    /**
	 * Get top article 
     *
	 * @return array
	 */	
	public function top_article()
	{
		$this->db->select('*');
		$this->db->from('article');
		$this->db->where(array('top_articles' => '1','status' => '1'));
		$this->db->order_by("article_id", "DESC");
		$this->db->limit(3);
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}

    /**
	 * Get home slider
     *
	 * @return array
	 */		
	public function home_slide_article()
	{
		$this->db->select('*');
		$this->db->from('article');
		$this->db->where(array('slide' => '1','status' => '1'));
		$this->db->order_by("article_id", "DESC");
		$this->db->limit(3);
		$query=$this->db->get('');
		$result=$query->result();
		return $result;	
	}	

    /**
	 * Get individual article data 
     *
     * @param int $article_id
	 * @return array
	 */	
	public function get_individual_article_data($article_id)
	{
		$this->db->select('*');
		$this->db->from('article');
		$this->db->order_by("article_id", "DESC");
		$this->db->where(array('article_id' => $article_id, 'status' => '1'));
		$query=$this->db->get('');
		$result=$query->row();
		return $result;	
	}

    /**
	 * Get individual category data 
     *
     * @param int $article_id
	 * @return array
	 */	
	public function  get_individual_category_data($article_id)
	{
		$this->db->select('category_id');
		$this->db->from('category_assing');
		$this->db->where('article_id',$article_id);
		$query=$this->db->get('');
		$result=$query->row();
		return $result;
	}

    /**
	 * save comment
     *
     * @param array $data
	 * @return void
	 */	
	public function save_comment_data($data)
	{
		$this->db->insert('comments',$data);
	}

    /**
	 * get individual article comments
     *
     * @param int $article_id
	 * @return array
	 */	
	public function get_comments_article_data($article_id)
	{
		$this->db->select('comments.comment as comment,register.register_image as register_image,register.full_name as full_name,comments.entry_date as entry_date');
		$this->db->from('comments');
		$this->db->join('register', 'register.id=comments.register_id','left');
		$this->db->where('comments.article_id',$article_id);
		$this->db->order_by("comments.id", "DESC");
		$query=$this->db->get('');
		$result=$query->result();
		
		//print_r($result); exit;
		return $result;		
	}

    /**
	 * iser authenticaiton
     *
     * @param string $email
     * @param string $password
	 * @return array
	 */		
	public function check($email,$password)
    {   
     $sql="select * from nanosoft_register where email_id='$email' and password='$password'";
     $query_result=$this->db->query($sql);
     $result=$query_result->row();
     return $result;
    }

    /**
	 * save register data  
     *

     * @param array $data
	 * @return array
	 */		
	public function save_register_data($data)
	{
		$this->db->insert('register',$data);
	}
	
}