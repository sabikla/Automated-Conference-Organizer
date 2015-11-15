<?php
class Ajax_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
	}
	
	public function loadPapers($dept)
	{	
		$query = $this -> db -> get_where('tblfullpaper',array('absDept' => $dept));
		return $query->result_array();
	}
}
?>