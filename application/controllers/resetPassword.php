<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class resetPassword extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model','',TRUE);
	}

	public function index()
	{
		 
		 $this->load->library('form_validation');
		 $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean|callback_check_database');
		 if($this->form_validation->run() == FALSE)
		 {
			 
			$data['pathPrefix']="../";
			$data['pid']=-1;
			$this->load->model('General_model','',TRUE);
			$data['dates']=$this ->General_model->loadImportantDates();
			$data['title']="Login";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/forgotPassword');
			$this->load->view('templates/footer', $data);
		 }
	}
	function check_database()
	{
		$username = $this->input->post('username');
		$result = $this->User_Model->forgotPassword($username);
		if($result)
		{
			$sess_array = array();
			foreach($result as $row)
			{
				$this->load->library('email');
				$config['mailtype'] = 'html';
		
				$this->email->initialize($config);
		
		
				$this->email->from('info@example.in', 'ACO Event');
				$this->email->to($username); 
				
				$this->email->subject('Password Reset Request');
				$this->email->message('<HTML>
				<BODY>
				<h4 style="color:#00F;">Password Reset</h4>
				<br/>
				Dear '.$username.',<br/><br/>
					&emsp;You have requested to reset your login password. Please Follow the below link to reset your password. Please ignore this mail if you didn\'t request and let us know the same at help@example.in <a href="http://example.in/index.php/resetPassword/'.md5($row->usrID).'">Click here to reset password</a><br/><br/>
					For any technical assistance contact us : help@example.in<br/><br/><br/><br/>
					With Thanks,<br/>
					Event Team,<br/>
					Institute, Location.
				</BODY>
				</HTML>');	
				
				$this->email->send();
				
				redirect('login', 'refresh');
			}
		}
		else
		{
			$this->form_validation->set_message('check_database', 'Invalid username');
			return false;
		}
	}
	function resetMyPassword($userID)
	{
		$this->load->library('form_validation');
		$data['pathPrefix']="../../";
		$data['pid']=-1;
		$this->load->model('General_model','',TRUE);
		$data['dates']=$this ->General_model->loadImportantDates();
		$data['title']="Reset Password";
		$data['userID']=$userID;
		$this->load->view('templates/header', $data);
		$this->load->view('pages/newPassword');
		$this->load->view('templates/footer', $data);
	}
	function setNewPassword()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|matches[passconf]|xss_clean|');
		 $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|xss_clean');
		 if($this->form_validation->run() == FALSE)
		 {
			$data['pathPrefix']="../../";
			$data['pid']=-1;
			$this->load->model('General_model','',TRUE);
			$data['dates']=$this ->General_model->loadImportantDates();
			$data['title']="Reset Password";
			$data['userID']=$this->input->post('user');;
			$this->load->view('templates/header', $data);
			$this->load->view('pages/newPassword');
			$this->load->view('templates/footer', $data);
		}
		else
		{
			$result = $this->User_Model->setNewPasword();
			//echo "rules ok";
		}
			
	}

}