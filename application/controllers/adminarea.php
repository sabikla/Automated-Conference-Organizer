<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class AdminArea extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model','',TRUE);
		$this->load->model('General_model','',TRUE);
		//$this->load->library('session');	
	}
	function checkLoginStatus()
	{
		if(!$this->session->userdata('logged_in'))
		{
				redirect('login?msg', 'refresh');
			//echo 	$this->session->userdata('logged_in')."hhhh";
		}		
		else
		{
			$session_data = $this->session->userdata('logged_in');
			if($session_data['userType']!=1)
				redirect('login', 'refresh');
		}
	}

	public function view($page = 'index',$reqItem="")
	{
		if ( ! file_exists('application/views/adminarea/'.$page.'.php') && $page!='index')
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$this->checkLoginStatus();		
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['userID'] = $session_data['id'];
	
		$data['dates'] = $this->General_model->loadImportantDates();
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['pathPrefix']="../../";
		$data['pid']=-1;
		if($page=='userList')
		{
			$data['pid']=0;
			//$data['pathPrefix']="";
			$data['title']="User's List";
			$data['profiles'] = $this->Admin_model->loadProfiles($session_data['id']);
			
			
		} //myprofie
		else if($page=='index')
		{
			$data['pid']=0;
			$data['pathPrefix']="";
			$page='home';
			$data['title']="Casting Institute";
		}
		else if($page=='postNews')
		{
			$data['pid']=1;			
		 	$this->load->helper(array('form','url'));
			$data["message"]='';
		} //mypapers
		else if($page=='postMessage')
		{
			$data['pid']=1;
		 	$this->load->helper(array('form','url'));
			$data['profiles'] = $this->Admin_model->loadProfiles($session_data['id']);
		}
		else if($page=='reviewerList')
		{
			$data['pid']=0;
		 	$this->load->helper(array('form','url'));
			$data['reviewers'] = $this->Admin_model->loadReviewer();
		}
		else if($page=='abstractList')
		{
			$data['pid']=3;
			$data['title']="Abstract List";
			$data['pathPrefix']="../../../";
			if(!empty($reqItem))
			{
				switch($reqItem)
				{
				case 'pending':				
					$data['abstracts'] = $this->Admin_model->loadAbstracts(0);
					break;
				case 'accepted':			
					$data['abstracts'] = $this->Admin_model->loadAbstracts(1);
					break;
				case 'rejected':			
					$data['abstracts'] = $this->Admin_model->loadAbstracts(2);
					break;
					
				}
			}
			else
				show_404();
		}		
		else if($page=='fullPaperList')
		{
			$data['pid']=4;
			$data['title']="Full Paper List";
			$data['pathPrefix']="../../../";
			if(!empty($reqItem))
			{
				switch($reqItem)
				{
				case 'pending':				
					$data['abstracts'] = $this->Admin_model->loadPapers(0);
					break;
				case 'accepted':			
					$data['abstracts'] = $this->Admin_model->loadPapers(1);
					break;
				case 'rejected':			
					$data['abstracts'] = $this->Admin_model->loadPapers(2);
					break;
					
				}
			}
			else
				show_404();
		}		
		else if($page=='cameraReadyPaperList')
		{
			$data['pid']=0;
			$data['title']="Full Paper List";
			$data['pathPrefix']="../../../";		
			$data['abstracts'] = $this->Admin_model->loadCameraPapers();
		}
		else if($page=='newsAndEvents')
		{
			$data['pid']=0;
			$data['title']="News And Events";
			$this->load->model('News_model','',TRUE);
			$data['news'] = $this->News_model->get_news();
		}
		else if($page=='messagesList')
		{
			$data['pid']=0;
			$data['title']="Messages";
			$data['messages'] = $this->Admin_model->get_messages();
		}
		else if($page=='dateList')
		{
			$data['pid']=0;
			$data['title']="Date";
			$this->load->helper(array('form','url'));
		}
		else if($page=='createReviewer')
		{
			$data['pid']=2;
		 	$this->load->helper(array('form','url'));
		}
	
		else if($page=='createCommittee')
		{
			$data['pid']=5;
		 	$this->load->helper(array('form','url'));
		}
		else if($page=='addMembersToCommittee')
		{
			$data['pid']=5;
			$data['committees']=$this->Admin_model->getAllCommittee();
		 	$this->load->helper(array('form','url'));
		}
		else if($page=='addTrack')
		{
			$data['pid']=5;
		 	$this->load->helper(array('form','url'));
		}
		else if($page=='addImageSlides')
		{
			$data['pid']=5;
		 	$this->load->helper(array('form','url'));
		}
		else if($page=='addToAbout')
		{
			$data['pid']=5;
		 	$this->load->helper(array('form','url'));
		}
		else if($page=='generalSettings')
		{
			$data['pid']=5;
		 	$this->load->helper(array('form','url'));
		}	
		else if($page=='submitPaperForReview')
		{
			$data['pid']=2;
		 	$this->load->helper(array('form','url'));
			$data['reviewers'] = $this->Admin_model->loadReviewer();
			$data['papers'] = $this->Admin_model->loadPapers();
		}
		else if($page=='reviewList')
		{
			$data['pid']=1;
		 	$this->load->helper(array('form','url'));
			$data['reviews'] = $this->Admin_model->loadReview();
		}
		else if($page=='postDate')
		{
			$data['pid']=1;
		 	$this->load->helper(array('form','url'));
		}
		else if($page=='contact')
			$data['pid']=4;
	
		$this->load->view('templates/adminheader', $data);
		$this->load->view('adminarea/'.$page, $data);
		$this->load->view('templates/adminfooter', $data);

	}
	
	
	function setReviewer()
	{
		 $this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Userame', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|xss_clean');
		$this->form_validation->set_rules('passconf', 'Confirm Password', 'trim|required|matches[password]|xss_clean');
		if($this->form_validation->run() == FALSE)
		 {			 
			$data['pathPrefix']="../../";
			$data['pid']=2;
			$data['dates'] = $this->General_model->loadImportantDates();
	
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/createReviewer', $data);
			$this->load->view('templates/adminfooter', $data);
		 }
		 else
		 {
			 $this->create_user(3);
		 }
	}
		/*   Satrt   25-12-14 -----------------------------------*/
	function setCommittee()
	{
				
		$this->checkLoginStatus();		
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['userID'] = $session_data['id'];
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('committeeName', 'Committee Name', 'trim|required|xss_clean');
			$data['dates'] = $this->General_model->loadImportantDates();
			$data['title']="Committee";
		if($this->form_validation->run() == FALSE)
		 {			 
			$data['pathPrefix']="../../";
			$data['pid']=5;
	
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/createCommittee', $data);
			$this->load->view('templates/adminfooter', $data);
		 }
		 else
		 {
			
			$this->Admin_model->create_committee();
			$data['pathPrefix']="../../";
			$data['pid']=5;
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/success');
			$this->load->view('templates/adminfooter');
		 }
	}
	function setTrack()
	{	
		$this->checkLoginStatus();		
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['userID'] = $session_data['id'];
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('trackName', 'Track Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
			$data['dates'] = $this->General_model->loadImportantDates();
			$data['title']="Track creation";
		if($this->form_validation->run() == FALSE)
		{			 
			$data['pathPrefix']="../../";
			$data['pid']=5;
	
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/addTrack', $data);
			$this->load->view('templates/adminfooter', $data);
		 }
		 else
		 {
			
			$this->Admin_model->set_track();
			$data['pathPrefix']="../../";
			$data['pid']=5;
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/success');
			$this->load->view('templates/adminfooter');
		 }
	}
	
	function setAboutContent()
	{	
		$this->checkLoginStatus();		
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['userID'] = $session_data['id'];
		
		 $this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
			$data['dates'] = $this->General_model->loadImportantDates();
			$data['title']="About content creation";
		if($this->form_validation->run() == FALSE)
		 {			 
			$data['pathPrefix']="../../";
			$data['pid']=5;
	
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/addToAbout', $data);
			$this->load->view('templates/adminfooter', $data);
		 }
		 else
		 {
	
			$data['pathPrefix']="../../";
			$data['pid']=5;
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/success');
			$this->load->view('templates/adminfooter');
		 }
	}
	
	
	
	
	
	
	function postponeDate()
	{	
		$this->checkLoginStatus();		
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['userID'] = $session_data['id'];
		
		 $this->load->library('form_validation');
		$this->form_validation->set_rules('dateID', 'Date', 'trim|required|xss_clean');
			$data['dates'] = $this->General_model->loadImportantDates();
			$data['title']="Datelist";
		if($this->form_validation->run() == FALSE)
		 {			 
			$data['pathPrefix']="../../";
			$data['pid']=5;
	
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/dateList', $data);
			$this->load->view('templates/adminfooter', $data);
		 }
		 else
		 {
			
			$this->Admin_model->postponeDate();
			$data['pathPrefix']="../../";
			$data['pid']=0;
			$data['dates'] = $this->General_model->loadImportantDates();//Loading twice becuase special case of date updation
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/success');
			$this->load->view('templates/adminfooter');
		 }
	}
	
	
	
	function setMemberToCommittee()
	{	
		$this->checkLoginStatus();		
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['userID'] = $session_data['id'];
		
		 $this->load->library('form_validation');
		$this->form_validation->set_rules('committeeID', 'Committee Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('memberName', 'Member Name', 'trim|required|xss_clean');
			$data['dates'] = $this->General_model->loadImportantDates();
			$data['title']="New Member to committee";
		if($this->form_validation->run() == FALSE)
		 {			 
			$data['pathPrefix']="../../";
			$data['pid']=5;
			$data['committees']=$this->Admin_model->getAllCommittee();
			
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/addMembersToCommittee', $data);
			$this->load->view('templates/adminfooter', $data);
		 }
		 else
		 {
			
			$this->Admin_model->set_member_to_committee();
			$data['pathPrefix']="../../";
			$data['pid']=5;
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/success');
			$this->load->view('templates/adminfooter');
		 }
	}

	
	
	
	/*end 25-12-14  ------------------------------------*/
	function setDate()
	{
	
		$this->checkLoginStatus();			
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['userID'] = $session_data['id'];
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('date', 'Date', 'trim|required|xss_clean');
		$this->form_validation->set_rules('desc', 'Description', 'trim|required|xss_clean');
		$data['pathPrefix']="../../";
		$data['pid']=2;
		$data['dates'] = $this->General_model->loadImportantDates();
		if($this->form_validation->run() == FALSE)
		 {			 
	
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/postDate', $data);
			$this->load->view('templates/adminfooter', $data);
		 }
		 else
		 {
			 if($this->Admin_model->setDate())
			 {
				$this->load->view('templates/adminheader', $data);
				$this->load->view('adminarea/success');
				$this->load->view('templates/adminfooter');
			 }
		 }
	}
	
	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('home', 'refresh');
	}
	
	
	function loadUserProfile($userHashID = "")
	{
		
		$this->checkLoginStatus();		
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['userID'] = $session_data['id'];
	
		$data['dates'] = $this->General_model->loadImportantDates();
	
		$data['pathPrefix']="../../../";
		$data['pid']=0;
		$data['title']="User Profile";
		
		$data['profile'] = $this->Admin_model->getSingleMemberDetails($userHashID);
	
		$this->load->view('templates/adminheader', $data);
		$this->load->view('adminarea/userProfile', $data);
		$this->load->view('templates/adminfooter', $data);
	}
	
	public function setNews()
	{
		$this->checkLoginStatus();
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['userID'] = $session_data['id'];	
		
		$this->load->helper('form');
		$this->load->library('form_validation');
	
			
		$data['dates'] = $this->General_model->loadImportantDates();
		
		$data['title'] = 'Create a news item';
		$data['pathPrefix']="../../";
		$data['pid']=1;		
	
		$this->form_validation->set_rules('newsTitle', 'Title', 'required');
		$this->form_validation->set_rules('newsDesc', 'Description', 'required');
	
		if ($this->form_validation->run() === FALSE)
		{
			
			$data['profiles'] = $this->Admin_model->loadProfiles($session_data['id']);
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/postNews', $data);
			$this->load->view('templates/adminfooter');
	
		}
		else
		{
			
			$this->load->model('News_model','',TRUE);
			$this->News_model->set_news();
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/success');
			$this->load->view('templates/adminfooter');
		}
	}
	
	
	public function setPaperForReview()
	{
		$this->checkLoginStatus();
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['userID'] = $session_data['id'];	
		
		$this->load->helper('form');
		$this->load->library('form_validation');
	
	
		$data['dates'] = $this->General_model->loadImportantDates();
		$data['title'] = '-';
		$data['pathPrefix']="../../";
		$data['pid']=2;	
			
			$this->load->model('Admin_model','',TRUE);
			$this->Admin_model->set_paper_for_review();
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/success');
			$this->load->view('templates/adminfooter');/**/
		
	}
	
	public function setMessage()
	{
		$this->checkLoginStatus();
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['userID'] = $session_data['id'];	
		
		$this->load->helper('form');
		$this->load->library('form_validation');
	
	
		$data['dates'] = $this->General_model->loadImportantDates();
		$data['title'] = 'Create a new Message';
		$data['pathPrefix']="../../";
		$data['pid']=1;		
	
		$this->form_validation->set_rules('msgTitle', 'Title', 'required');
		$this->form_validation->set_rules('msgDesc', 'Description', 'required');
		$this->form_validation->set_rules('msgTo', 'Message To', 'required');
	
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/postMessage');
			$this->load->view('templates/adminfooter');
	
		}
		else
		{
			
			$this->load->model('Admin_model','',TRUE);
			$this->Admin_model->set_message();
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/success');
			$this->load->view('templates/adminfooter');
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
		if($action=='accept')
		{
			$this->Admin_model->changePaperStatus(1,$hashID,1); //(paperType="abs/full",id,changeValue)
			
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/success');
			$this->load->view('templates/adminfooter');
		}
		if($action=='reject')
		{
			$this->Admin_model->changePaperStatus(1,$hashID,2); //(paperType="abs/full",id,changeValue)
			
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/success');
			$this->load->view('templates/adminfooter');
		}
		if($action=='download')
		{
			$this->load->helper('download');
			$paperDetails=$this->General_model->loadSinglePaper($hashID);
			redirect('../../'.substr($paperDetails['absFile'],27),'refresh');
		}
	}
	
	
	
	
	
	public function doActionOnFullPaper($action="", $hashID="")
	{			
		$this->checkLoginStatus();		
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['userID'] = $session_data['id'];
	
	
	
		$data['dates'] = $this->General_model->loadImportantDates();
		$data['pathPrefix']="../../../../";
		$data['pid']=4;
		$data['title'] = 'Paper Status Updated Successfully';
		if($action=='accept')
		{
			$this->Admin_model->changePaperStatus(2,$hashID,1); //(paperType="abs/full",id,changeValue)
			
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/success');
			$this->load->view('templates/adminfooter');
		}
		if($action=='reject')
		{
			$this->Admin_model->changePaperStatus(2,$hashID,2); //(paperType="abs/full",id,changeValue)
			
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/success');
			$this->load->view('templates/adminfooter');
		}
		if($action=='download')
		{
			$this->load->helper('download');
			$paperDetails=$this->General_model->loadSingleFullPaper($hashID);
			redirect('../../'.substr($paperDetails['absFile'],27),'refresh');
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
		$data['pid']=0;
		$data['title'] = 'Paper Status Updated Successfully';
		if($action=='accept')
		{
			/*
				Do something Here
			*/
		}
		if($action=='reject')
		{		
			/*
				Do something Here
			*/	
		}
		if($action=='download')
		{
			$this->load->helper('download');
			$paperDetails=$this->General_model->loadSingleCameraPaper($hashID);
			redirect('../../'.substr($paperDetails['absFile'],27),'refresh');
		}
	}	
	
	
	public function deleteItem($item="", $hashID="")
	{	
		
		$this->checkLoginStatus();		
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['userID'] = $session_data['id'];
	
	
	
		$data['dates'] = $this->General_model->loadImportantDates();
		$data['pathPrefix']="../../../../";
		$data['pid']=0;
		$data['title'] = 'Successfully Deleted';
		if($item=='news')
		{
			$this->Admin_model->deleteNews($hashID);
			
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/success');
			$this->load->view('templates/adminfooter');
		}
		else if($item=='message')
		{
			$this->Admin_model->deleteMessage($hashID);
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/success');
			$this->load->view('templates/adminfooter');
		}
		else if($item=='reviewer')
		{
			$this->Admin_model->deleteReviewer($hashID);
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/success');
			$this->load->view('templates/adminfooter');
		}
		else if($item=='date')
		{
			$this->Admin_model->deleteDate($hashID);
			$this->load->view('templates/adminheader', $data);
			$this->load->view('adminarea/success');
			$this->load->view('templates/adminfooter');
		}
		
	}
	
	
	function create_user($userType)
	{
		
		
		$this->checkLoginStatus();		
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['userID'] = $session_data['id'];
	
		$data['dates'] = $this->General_model->loadImportantDates();
		
		$result = $this->Admin_model->create_user($userType);
		$data['pathPrefix']="../../";
		$data['pid']=2;
		$this->load->view('templates/adminheader', $data);
		$this->load->view('adminarea/success');
		$this->load->view('templates/adminfooter');
	}
}