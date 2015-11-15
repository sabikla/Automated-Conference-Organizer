<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Registration extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		 $this->load->helper(array('form'));
	}
	public function index()
	{
		$data['title'] = 'Registration';
		$data['pid'] = 5;
		$data['pathPrefix']="../";
		$this->load->model('General_model','',TRUE);
		$data['dates']=$this ->General_model->loadImportantDates();
		$this->load->view('templates/header',$data);
		$this->load->view('pages/registration',$data);
		$this->load->view('templates/footer',$data);
		
	}

	
}

?>