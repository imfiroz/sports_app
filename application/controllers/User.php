<?php

class User extends CI_Controller
{
	
	public function index()
	{
		$this->load->helper('form');
		$this->load->view('user_signup');
	}
	public function signup_form_user()
	{
		$this->load->library('form_validation');
		//set rule
		$this->form_validation->set_rules('username','User Name','required|alpha|trim');
		$this->form_validation->set_rules('number','Number','required|numeric');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('cnfpassword', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('location', 'Enter City Name', 'required');
			
		if ($this->form_validation->run() == FALSE)
		{	

			$this->load->view('user_signup');
		}
		else
		{	
				echo 'success';
				//$this->load->view('formsuccess');
		}
		
	}
}