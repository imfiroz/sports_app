<?php

class User extends CI_Controller
{
	
	public function index()
	{
		$this->load->helper('form');
		$this->load->view('user_signup');
	}
}