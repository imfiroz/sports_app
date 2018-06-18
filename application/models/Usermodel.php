<?php

class Usermodel extends CI_Model
{
	
	public function add(array $admin_data)
	{
		//echo '<pre>';
		//print_r($admin_data); exit;
		return $this->db->insert('users', $admin_data);
	}
	
}