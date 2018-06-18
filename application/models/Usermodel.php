<?php

class Usermodel extends CI_Model
{
	
	public function add(array $admin_data)
	{
		//echo '<pre>';
		//print_r($admin_data); exit;
		return $this->db->insert('users', $admin_data);
	}
	public function login_check($username)
	{
		//fetch data from users database
		$q = $this->db
						->where(['email'=>$username])
						->get('users');
		if($q->num_rows()){ //return number for rows
			
			return $q->row(); //returning row
			
		}else{
			return FALSE; 
		}
	}
	
}