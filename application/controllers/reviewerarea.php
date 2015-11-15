<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class ReviewerArea extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Reviewer_model','',TRUE);
		$this->load->model('General_model','',TRUE);
	}
	function checkLoginStatus()
	{
		if(!$this->session->userdata('logged_in'))
		{
				redirect('login', 'refresh');
		}		
		else
		{
			$session_data = $this->session->userdata('logged_in');
			if($session_data['userType']!=3)
				redirect('login', 'refresh');
		}	
	}

	public function view($page = 'index')
	{
	
		if ( ! file_exists('application/views/reviewerarea/'.$page.'.php') && $page!='index')
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
		if($page=='paperList')
		{
			$data['pid']=0;
			$data['title']="Paper List";
			$data['papers']=$this->Reviewer_model->loadPapers($data['userID']);
		} //myprofie
		else if($page=='index')
		{
			$data['pid']=0;
			$data['pathPrefix']="";
			$page='home';
			$data['title']="ACO Event Organizer";
		}
		else if($page=='message')
		{
			$data['pid']=1;
			$data['messages'] = $this->Reviewer_model->loadMessages();
		}	
		else if($page=='reviewList')
		{
			$data['title']='Review List';
			$data['reviews']= $this->Reviewer_model->loadReview($data['userID']);
			$data['pid']=2;
		}
		$this->load->view('templates/reviewerheader', $data);
		$this->load->view('reviewerarea/'.$page, $data);
		$this->load->view('templates/reviewerfooter', $data);

	}
	
	
	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('home', 'refresh');
	}
	
	function postReview($paperID)
	{
		$this->checkLoginStatus();		
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['userID'] = $session_data['id'];
	
		$data['dates']=$this ->General_model->loadImportantDates();
		$data['title'] = "Post Review";
		$data['pathPrefix']="../../../";
		$data['pid']=-11;			
		$this->load->helper(array('form','url'));
		$data['paperID']=$paperID;
		$this->load->view('templates/reviewerheader', $data);
		$this->load->view('reviewerarea/postReview', $data);
		$this->load->view('templates/reviewerfooter', $data);
	}
	
	function reviewInDetail($reviewHash)
	{
		$this->checkLoginStatus();	
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['userID'] = $session_data['id'];
		
		$data['dates']=$this ->General_model->loadImportantDates();
		$data['title'] = "Post Review";
		$data['pathPrefix']="../../../";
		$data['pid']=-11;
		$data['review']= $this->Reviewer_model->loadReviewInDetail($reviewHash);
		$this->load->view('templates/reviewerheader', $data);
		$this->load->view('reviewerarea/reviewInDetail', $data);
		$this->load->view('templates/reviewerfooter', $data);
	}
	
	public function doAction($onWhat="", $action="", $hashID="")
	{
		$this->checkLoginStatus();		
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['userID'] = $session_data['id'];
		
		
		if($onWhat=='review')
		{
			if($action='delete')
			{
				$this->Reviewer_model->deleteReview($hashID, $data['userID']);
				redirect("reviewerarea/reviewList","refresh");
			}
			
		}
	}
	function setReview()
	{
		$this->checkLoginStatus();		
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['userID'] = $session_data['id'];
		
		 $this->load->library('form_validation');
		$this->form_validation->set_rules('review', 'Review', 'trim|required|xss_clean');
		$this->form_validation->set_rules('paper', 'Paper', 'trim|required|xss_clean');
		
				
		$data['dates']=$this ->General_model->loadImportantDates();
		$this->load->helper(array('form','url'));
		if($this->form_validation->run() == FALSE)
		{
			$data['pathPrefix']="../../../";
			$data['title'] = "Review";
			$data['pid']=-11;	
			$data['paperID']=$this->input->post('paper');
			$this->load->view('templates/reviewerheader', $data);
			$this->load->view('reviewerarea/postReview', $data);
			$this->load->view('templates/reviewerfooter', $data);
		}
		else
		{
			$this->Reviewer_model->setReview($data['userID']);
			$data['pid']=0;	
			$data['pathPrefix']="../../";
			$data['title'] = "Paper List";
			$data['papers']=$this->Reviewer_model->loadPapers($data['userID']);
			$this->load->view('templates/reviewerheader', $data);
			$this->load->view('reviewerarea/paperList', $data);
			$this->load->view('templates/reviewerfooter', $data);
		}
		
	}
	
}