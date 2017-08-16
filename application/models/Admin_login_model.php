<?php
class  Admin_login_model extends CI_Model{
    public function check($email,$password)
    {   
	 $sql="select * from su_users where email_id='$email' and password='$password'";
     $query_result=$this->db->query($sql);
     $result=$query_result->row();
     return $result;
    }
}