<?php

class Login extends CI_Controller
{
	
	public function __construct() 
	{
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata'); 
		$date = date('Y-M-d h:i:s A', time());
		$this->load->model('Usermodel');
    }
	public function index()
	{
		//Sesstion has set then go to deshbord
		if($this->session->userdata('user_id')) //preventing loggedin user to access this page
		{return $this->load->view('Admin/dashboard'); }
		$this->load->helper('form');
		$this->load->view('login');
	}
	public function login_form(){
		
		$this->load->library('form_validation');
		//set rule
		$this->form_validation->set_rules('email','User Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');
		
		if($this->form_validation->run() )
		{ //form validation test
			//Passed
			$username = $this->input->post('email');
			
			$password = $this->input->post('password');
			
			
			
			//Getting login user id
			$user_data = $this->Usermodel->login_check( $username );
			if($user_data)
			{
				//cradentials Password checking
				$this->load->library('encryption');
				$user_pw = $this->encryption->decrypt($user_data->password);
				if($password === $user_pw)
				{
					//setting session  user_id variable
					$this->session->set_userdata('user_id',$user_data->id);
					//flashing message for success login
					$this->session->set_flashdata('loggin_success', 'Loggin successful');
				}
				else
				{
					$this->session->set_flashdata('loggin_invalid', 'Invalid Username and Password');
				}
			}else{
				//cradentials not valid
				//flashing invalid login message to login page 
				$this->session->set_flashdata('loggin_invalid', 'Invalid Username and Password');
			}
		}
		
			return $this->index();
	}
	
	
	
	
	
	
}