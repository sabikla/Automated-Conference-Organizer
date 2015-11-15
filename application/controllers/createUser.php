<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class createUser extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model','',TRUE);
		 $this->load->library('form_validation');
	}

	public function index()
	{
		 
		 $this->form_validation->set_rules('fname', 'First Name', 'trim|required|xss_clean');
		 $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|xss_clean');
		 $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|callback_check_user_availability');
		 $this->form_validation->set_rules('hname', 'House Name', 'trim|required|xss_clean');
		 $this->form_validation->set_rules('street', 'Street', 'trim|required|xss_clean');
		 $this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');
		 $this->form_validation->set_rules('district', 'District', 'trim|required|xss_clean');
		 $this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean');
		 $this->form_validation->set_rules('pincode', 'Pincode', 'trim|required|xss_clean');
		 $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|xss_clean');
		 $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|matches[passconf]|xss_clean|');
		 $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|xss_clean');
		 $this->form_validation->set_rules('iam', 'I am', 'trim|required|xss_clean');
		 //$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
		 if($this->form_validation->run() == FALSE)
		 {
			 
			$data['pathPrefix']="../";
			$data['pid']=5;
			$this->load->model('General_model','',TRUE);
			$data['dates']=$this ->General_model->loadImportantDates();
			$data['title']="Registration";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/registration');
			$this->load->view('templates/footer', $data);
		 }
		 else
		 {
			 $this->create_user();
		 }
		 
	}
	function check_user_availability()
	{
		if($this->User_Model->check_user_availability($this->input->post('email')))
		{
			$this->form_validation->set_message('check_user_availability', 'This Email ID Already exist');
			return false;
		}
		else
			return true;
	}
	function create_user()
	{
		$userType=2;
		
		$result = $this->User_Model->create_user($userType);
		
		$this->load->library('email');
		$config['mailtype'] = 'html';

		$this->email->initialize($config);


		$this->email->from('info@sabikla.in', 'ACO Mail');
		$this->email->to($this->input->post('email')); 
		
		$this->email->subject('Registration Completed');
		$this->email->message('<HTML>
		<BODY>
		<h4 style="color:#00F;">Registration Completed Successfully</h4>
		<br/>
		Dear '.$this->input->post('fname').',<br/><br/>
			&emsp;You have successfully registered for the Conference.  Now you can upload your papers by login into our site. <a href="http://example.com/index.php/login">Click here to login Now</a><br/><br/>
			For any technical assistance contact us : help@example.in<br/><br/><br/><br/>
			With Thanks,<br/>
			Conference Team,<br/>
			Our Institute, Location.
		</BODY>
		</HTML>');	
		
		$this->email->send();
		
		redirect('login', 'refresh');
	}

}