<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
		$data['title'] = ucfirst('login');
		$data['pathPrefix']="../";
		$data['pid']=-1;
		 $this->load->helper(array('form'));
		 $this->load->view('templates/header',$data);
		  $this->load->view('pages/login');
		 $this->load->view('templates/footer');
	}

}
