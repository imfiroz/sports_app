<?php

class User extends CI_Controller
{
	public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata'); 
		$date = date('Y-M-d h:i:s A', time());
		$this->load->model('Usermodel');
		 
    }
	public function index()
	{
		$this->load->helper('form');
		$this->load->view('user_signup');
	}
	public function signup_form_user()
	{
		$this->load->library('form_validation');
		//set rule
		$this->form_validation->set_rules('name','User Name','required|alpha|trim');
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
	public function save_user()
	{
		$date = date('Y-M-d h:i:s A', time());
		$admin_data = $this->input->post();
		$admin_data['created'] = $date;
		unset($admin_data['cnfpassword']);
		unset($admin_data['submit']);
		//Encrypting Password
		$this->load->library('encryption');
		$admin_data['password'] = $this->encryption->encrypt($admin_data['password']);
		//Save admin data
		return $this->_falshAndRedirect($this->Usermodel->add($admin_data), 'Successfully Registered, Now you can login.', 'Registration Error, Try Again');
	}
	private function _falshAndRedirect($successful, $successMessage, $failureMessage)
	{
		//Created flash message and redirect function
		if(	$successful	)
		{
			$this->session->set_flashdata('feedback', $successMessage);
			$this->session->set_flashdata('feedback_class','alert-success');
			return redirect('Login');
		}
		else
		{
			$this->session->set_flashdata('feedback', $failureMessage);
			$this->session->set_flashdata('feedback_class','alert-danger');
			return redirect('User');
		}
		
	}
}