<?php

class Pages extends CI_Controller {

	public function view($page = 'index')
	{
		if ( ! file_exists('application/views/pages/'.$page.'.php') && $page!='index')
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$this->load->model('General_model','',TRUE);
		$data['dates']=$this ->General_model->loadImportantDates();
		$data['metaDescription'] = "";
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['pathPrefix']="../";
		$data['pid']=-1;
		$this->load->model('News_model','',TRUE);
		if($page=='home')
		{
			$data['pid']=0;
			$data['news'] = $this->News_model->get_news();
			//$data['pathPrefix']="";
			$data['title']="Institute";
			$data['metaDescription'] = "Sample Event Description";
		}
		else if($page=='index')
		{
			$data['pid']=0;
			$data['pathPrefix']="";
			$page='home';
			$data['title']="Institute";
			$data['news'] = $this->News_model->get_news();
			$data['metaDescription'] = "Sample Event Description";
		}
		else if($page=='aboutOur Event')
		{
			$data['pid']=1;
			$data['title']="About Conference ";
			$data['metaDescription'] = "Sample Event Description";
		}
		else if($page=='guidelines')
		{
			$data['pid']=2;
			
			$data['metaDescription'] = "Sample Event Description";
		}
		else if($page=='organizers')
		{
			$data['organizers'] = $this ->General_model->loadOrganizers();
			$data['pid']=3;
			$data['metaDescription'] = "Sample Event Description";
		}
		else if($page=='contact')
		{
			$data['pid']=4;
			$data['metaDescription'] = "Sample Event Description";
		}
		else if($page=='newsAndEvents')
		{
			$data['pid']=6;
			$data['news'] = $this->News_model->get_news();
			
			$data['metaDescription'] = "Latest News Updates fromSample Event Description";
		}
		else if($page=='login')
		{
			$data['pid']=-1;
			$this->load->helper(array('form'));
			$data['metaDescription'] = "Sample Event Description";
		}
		else if($page=='forgotPassword')
		{
			$data['pid']=-1;
			$this->load->helper(array('form'));
		}
		else if($page=='track'){
			$data['tracks'] = $this ->General_model->loadTracks();
			$data['pid']=7;
		}
		
	
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);

	}
}