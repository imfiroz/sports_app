<?php

class Admin extends CI_Controller
{
	
	public function index()
	{
		$this->load->helper('form');
		$this->load->view('admin_signup');
	}
	public function signup_form()
	{
		$this->load->library('form_validation');
		//set rule
		$this->form_validation->set_rules('adminname','User Name','required|alpha|trim');
		$this->form_validation->set_rules('number','Number','required|numeric');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('cnfpassword', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
			
		if ($this->form_validation->run() == FALSE)
		{	

			$this->load->view('admin_signup');
		}
		else
		{	
				echo 'success';
				//$this->load->view('formsuccess');
		}
		
	}
	
}