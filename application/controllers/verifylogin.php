<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model','',TRUE);
	}

	public function index()
	{
		 
		 $this->load->library('form_validation');
		 $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		 $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
		 if($this->form_validation->run() == FALSE)
		 {
			 
			$data['pathPrefix']="../";
			$data['pid']=-1;
			$this->load->model('General_model','',TRUE);
			$data['dates']=$this ->General_model->loadImportantDates();
			$data['title']="Login";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/login');
			$this->load->view('templates/footer', $data);
		 }
	}
	function check_database($password)
	{
		$userType=-1;
		$username = $this->input->post('username');
		$result = $this->User_Model->login($username, $password);
		if($result)
		{
			$sess_array = array();
			foreach($result as $row)
			{
				$sess_array = array(
				'id' => $row->usrID,
				'username' => $row->usrName,
				'userType' => $row->usrType
				);
				$userType = $row->usrType;
				$this->session->set_userdata('logged_in', $sess_array);
			}
			if($userType==1)
			{
				redirect('adminarea/userList', 'refresh');
			}
			else if($userType==2)
			{
				redirect('userarea/myprofile', 'refresh');
			}
			else if($userType==3)
			{
				redirect('reviewerarea/paperList', 'refresh');
			}
		}
		else
		{
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return false;
		}
	}

}
