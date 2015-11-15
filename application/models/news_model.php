<?php
class News_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function get_news($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$query = $this->db->query("SELECT * FROM tblnews ORDER BY(nwsID) DESC LIMIT 0,5");
			return $query->result_array();
		}
	
		$query = $this->db->get_where('news', array('slug' => $slug));
		return $query->row_array();
	}
	public function set_news()
	{
		$this->load->helper('url');
	
		$slug = url_title($this->input->post('newsTitle'), 'dash', TRUE);
	
		$data = array(
			'nwsTitle' => $this->input->post('newsTitle'),
			'nwsSlug' => $slug,
			'nwsDesc' => $this->input->post('newsDesc')
		);
	
		return $this->db->insert('tblnews', $data);
	}
}
