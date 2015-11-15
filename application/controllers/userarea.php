<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class UserArea extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model','',TRUE);
		$this->load->model('General_model','',TRUE);
	}
	function checkLoginStatus()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect('login', 'refresh');
		}		
	}

	public function view($page = 'index')
	{
		if ( ! file_exists('application/views/userarea/'.$page.'.php') && $page!='index')
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$this->checkLoginStatus();		
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['userID'] = $session_data['id'];
	
		$data['dates']=$this ->General_model->loadImportantDates();
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['pathPrefix']="../../";
		$data['pid']=-1;
		if($page=='myprofile')
		{
			$data['pid']=0;
			$data['title']="User Profile";
			$data['profile'] = $this->User_Model->loadProfile($session_data['id']);
		} //myprofie
		else if($page=='index')
		{
			$data['pid']=0;
			$data['pathPrefix']="";
			$page='home';
			$data['title']="ACO Event Oganizer";
		}
		else if($page=='mypapers')
		{
			$data['pid']=1;			
		 	$this->load->helper(array('form','url'));
			$data['papers'] = $this->User_Model->loadAbstract($data['userID']);
			$data['fullpapers'] = $this->User_Model->loadPapers($data['userID']); // for loading full paper
			$data['cameraPapers'] = $this->User_Model->loadCameraPapers($data['userID']); // for loading cameraReady paper
			$data["message"]='';
			$data['lastDates']=$this->User_Model->getLastDates();
			$data['abstractCount']=$this->getPaperCount($data['userID']);
		} //mypapers
		else if($page=='message')
		{
			$data['pid']=2;
			$data['messages'] = $this->User_Model->loadMessages($data['userID']);
		}
		else if($page=='paymentInfo')
		{
		 	$this->load->helper(array('form','url'));
			$data['pid']=4;
		}
		else if($page=='contact')
			$data['pid']=4;
	
		$this->load->view('templates/userheader', $data);
		$this->load->view('userarea/'.$page, $data);
		$this->load->view('templates/userfooter', $data);

	}
	
	
	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('home', 'refresh');
	}
	function addPaymentInfo()
	{
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		
		$this->checkLoginStatus();
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['userID'] = $session_data['id'];
		
		
		$data['dates']=$this ->General_model->loadImportantDates();
		$this->form_validation->set_rules('bank', 'Bank', 'required');
		$this->form_validation->set_rules('branch', 'Branch', 'required');
		$this->form_validation->set_rules('amount', 'Amount', 'required');
		$this->form_validation->set_rules('transactionNo', 'Transaction No', 'required');
		$this->form_validation->set_rules('paymentType', 'Payment Method', 'required');
		
		if (!$this->form_validation->run() === FALSE)
		{
			
			$this->User_Model->set_payment_info($data['userID']);
		}
		$data['title'] = 'Payment Info';
		$data['pid']=4;			
		$data['pathPrefix']="../../";
		$this->load->view('templates/userheader', $data);
		$this->load->view('userarea/paymentInfo', $data);
		$this->load->view('templates/userfooter', $data);
	}
	function postPaper()
	{
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		
		$this->checkLoginStatus();
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['userID'] = $session_data['id'];
		
		
		$data['dates']=$this ->General_model->loadImportantDates();
		$config['upload_path']='./uploads/';//.$data['userID'].'/';
		$config['allowed_types']='pdf|doc|docx';
		$config['max_size']='3000';
		$config['overwrite']= FALSE;
		$this->load->library('upload',$config);
		$this->form_validation->set_rules('paperTitle', 'Paper Title', 'required');
		$data["message"] = '';
		if (!$this->form_validation->run() === FALSE)
		{
			if(!$this->upload->do_upload())
			{
				$data["message"]=$this->upload->display_errors();
		//"HERE";
			}
			else
			{
				
				$data["message"]='<b style="color:#4F4;">File Uploaded Successfully </b>'; //
				$fileDetails = $this->upload->data();
				$this->User_Model->set_paper_details($fileDetails, $data['userID']);
			}
		}
		$data['title'] = 'My Papers';
		$data['pid']=1;			
		$data['pathPrefix']="../../";
		
		$data['lastDates']=$this->User_Model->getLastDates();
		$this->load->helper(array('form','url'));
		$data['papers'] = $this->User_Model->loadAbstract($session_data['id']);
		$data['fullpapers'] = $this->User_Model->loadPapers($data['userID']); // for loading full paper
		$data['cameraPapers'] = $this->User_Model->loadCameraPapers($data['userID']); // for loading cameraReady paper
		
		$data['abstractCount']=$this->getPaperCount($data['userID']);
		$this->load->view('templates/userheader', $data);
		$this->load->view('userarea/mypapers', $data);
		$this->load->view('templates/userfooter', $data);
	}
	public function doActionOnFullpaper($action="", $hashID="")
	{			
		$this->checkLoginStatus();		
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['userID'] = $session_data['id'];
	
	
	
		$data['dates'] = $this->General_model->loadImportantDates();
		$data['pathPrefix']="../../../../";
		$data['pid']=3;
		$data['title'] = 'Paper Status Updated Successfully';
		if($action=='download')
		{
			$this->load->helper('download');
			$paperDetails=$this->General_model->loadSingleFullPaper($hashID);
			redirect('../../'.substr($paperDetails['absFile'],27),'refresh');
		}
		if($action=='remove')
		{
			$paperDetails=$this->User_Model->removeFullpaper($hashID);
			
			redirect('userarea/mypapers','refresh');
			
		}
	}
	public function doActionOnCamerapaper($action="", $hashID="")
	{			
		$this->checkLoginStatus();		
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['userID'] = $session_data['id'];
	
	
	
		$data['dates'] = $this->General_model->loadImportantDates();
		$data['pathPrefix']="../../../../";
		$data['pid']=3;
		$data['title'] = 'Paper Status Updated Successfully';
		if($action=='download')
		{
			$this->load->helper('download');
			$paperDetails=$this->General_model->loadSingleCameraPaper($hashID);
			redirect('../../'.substr($paperDetails['absFile'],27),'refresh');
		}
		if($action=='remove')
		{
			$paperDetails=$this->User_Model->removeCamerapaper($hashID);
			 
			redirect('userarea/mypapers','refresh');
			
		}
	}
	
	public function doActionOnAbstract($action="", $hashID="")
	{			
		$this->checkLoginStatus();		
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['userID'] = $session_data['id'];
	
	
	
		$data['dates'] = $this->General_model->loadImportantDates();
		$data['pathPrefix']="../../../../";
		$data['pid']=3;
		$data['title'] = 'Paper Status Updated Successfully';
		if($action=='download')
		{
			$this->load->helper('download');
			$paperDetails=$this->General_model->loadSinglePaper($hashID);
			redirect('../../'.substr($paperDetails['absFile'],27),'refresh');
		}
		if($action=='remove')
		{
			$paperDetails=$this->User_Model->removeAbstract($hashID);
			
			redirect('userarea/mypapers','refresh');
			
		}
	}
	
	public function getPaperCount($userID)
	{
		$paperCount['accepted']=$this->User_Model->getAbstractCount($userID,1);
		
		$paperCount['rejected']=$this->User_Model->getAbstractCount($userID,2);
		$paperCount['pending']=$this->User_Model->getAbstractCount($userID,0);
		
		return $paperCount;
	}
}