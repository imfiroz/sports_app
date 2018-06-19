<?php

class Admin extends CI_Controller
{
	
	public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata'); 
		$date = date('Y-M-d h:i:s A', time());
		$this->load->model('Usermodel');
		$this->load->helper('form');
		$this->load->library('form_validation');
		 
    }
	public function index()
	{
		$this->load->view('admin_signup');
	}
	public function signup_form()
	{
		
		//set rule
		$this->form_validation->set_rules('name','User Name','required|alpha|trim');
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
			$this->save_admin();
		}
	}
	public function save_admin()
	{
		$date = date('Y-M-d h:i:s A', time());
		$admin_data = $this->input->post();
		$admin_data['created'] = $date;
		//Setting admin role 1 and 0 for User
		$admin_data['role'] = 1;
		unset($admin_data['cnfpassword']);
		unset($admin_data['submit']);
		//Encrypting Password
		$this->load->library('encryption');
		$admin_data['password'] = $this->encryption->encrypt($admin_data['password']);
		//Save admin data
		return $this->_falshAndRedirect($this->Usermodel->add($admin_data), 'Successfully Registered, Now you can login.', 'Registration Error, Try Again');
		
	}
	public function add_location()
	{
		if($user_id = $this->session->userdata('user_id')) //preventing loggedin user to access this page
		{
			$user_data = $this->Usermodel->get_user($user_id);
			return $this->load->view('admin/addlocation_1', compact('user_data')); }
		$this->load->helper('form');
		$this->load->view('login');
	}
	public function save_location()
	{
		if($user_id = $this->session->userdata('user_id')) //preventing loggedin user to access this page
			{$user_data = $this->Usermodel->get_user($user_id);}
		$step_data = $this->input->post();
		
		if( $step_data['step'] == 1)
		{
			
			$this->form_validation->set_rules('place_type','Place type','required');
			
			if($this->form_validation->run() == FALSE)
			{
				//echo 'Error';
				return $this->load->view('admin/addlocation_1', compact('user_data'));
			}
			else
			{
				//Save and Redirect to next
				$this->load->model('Venuemodel');
				$step1_data = $this->input->post();
				$step1_data['user_id'] = $user_id;
				unset($step1_data['step']);
				unset($step1_data['submit']);
				//print_r($this->input->post()); exit;
				$venue_id = $this->Venuemodel->add_details($step1_data);
				return $this->load->view('admin/addlocation_2', compact('user_data', 'venue_id')); 

			}
		}
		
		
		if( $step_data['step'] == 2 )
		{
			$this->form_validation->set_rules('city','Pick location from Map','required|trim');
			
			if($this->form_validation->run() == FALSE)
			{
				//echo 'Error';
				$venue_data = $this->input->post();
				$venue_id = $venue_data['venue_id'];
				return $this->load->view('admin/addlocation_2', compact('user_data', 'venue_id'));
			}
			else
			{
				//Save and Redirect to next
				$this->load->model('Venuemodel');
				$step2_data = $this->input->post();
				$step2_data['user_id'] = $user_id;
				$step2_data['lat_long'] = implode(',',[$step2_data['latitude'],$step2_data['longitude']]);
				unset($step2_data['latitude']);
				unset($step2_data['longitude']);
				unset($step2_data['step']);
				unset($step2_data['submit']);
				$venue_id = $this->Venuemodel->update_details($step2_data);
				return $this->load->view('admin/addlocation_3', compact('user_data', 'venue_id')); 
			}
			
		}
		if( $step_data['step'] == 3 )
		{
			$this->form_validation->set_rules('images','Upload Image','required');
			if($this->form_validation->run() == FALSE)
			{
				//echo 'Error';
				//print_r($image_name);
				$venue_data = $this->input->post();
				$venue_id = $venue_data['venue_id'];
				return $this->load->view('admin/addlocation_3', compact('user_data', 'venue_id'));
			}
			else
			{
				//Save and Redirect to next
				$step3_data = $this->input->post();
				$step3_data['user_id'] = $user_id;
				unset($step3_data['step']);
				unset($step3_data['files']);
				unset($step3_data['submit']);
				$this->load->model('Venuemodel');
				$venue_id = $this->Venuemodel->update_details($step3_data);
				return $this->load->view('admin/addlocation_4', compact('user_data', 'venue_id')); 
			}
			
		}
		if( $step_data['step'] == 4 )
		{
			$this->form_validation->set_rules('owner_name','Owner Name','required|alpha|trim');
			$this->form_validation->set_rules('owner_phone','Owner Contact Number','required|numeric');
			$this->form_validation->set_rules('owner_email','Owner Email','required|valid_email');
			$this->form_validation->set_rules('owner_address','Owner Address','required');
			
			if($this->form_validation->run() == FALSE)
			{
				//echo 'Error';
				//print_r($image_name);
				$venue_data = $this->input->post();
				$venue_id = $venue_data['venue_id'];
				return $this->load->view('admin/addlocation_4', compact('user_data', 'venue_id'));
			}
			else
			{
				//Save and Redirect to next
				echo '<pre>';
				print_r($this->input->post());
				
				
			}
			
		}
		
		
	}
	public function upload()
	{
	  sleep(3);
	  if($_FILES["files"]["name"] != '')
	  {
	   $output = '';
	   $config["upload_path"] = './upload/';
	   $config["allowed_types"] = 'gif|jpg|png';
	   $this->load->library('upload', $config);
	   $this->upload->initialize($config);
	   for($count = 0; $count<count($_FILES["files"]["name"]); $count++)
	   {
		$_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
		$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
		$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
		$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
		$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
			if($this->upload->do_upload('file'))
			{
			 $data = $this->upload->data();
			 $image_name[] = $data["file_name"];
			 $output .= '
			 <div class="card">
			  <img src="'.base_url().'upload/'.$data["file_name"].'" class="img-responsive img-thumbnail" />
			 </div>
			 ';
			//file Name
			}
		
	   }
		$image_names = implode(',',$image_name);
	   echo '<input type="hidden" name="images" value="'.$image_names.'"/>';
	   echo $output;   
	  }
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
			return redirect('Admin');
		}
		
	}
	
	
}