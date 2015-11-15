<?php
class General_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
	}
	
	public function loadImportantDates()
	{	
		$query = $this -> db -> get('tblimportantdates');
		return $query->result_array();
	}
	
	public function loadSinglePaper($paperHash)
	{	
		$query = $this -> db -> get_where('tblabstract',array('md5(absID)' => $paperHash));
		return $query->row_array();
	}
	
	public function loadSingleFullPaper($paperHash)
	{	
		$query = $this -> db -> get_where('tblfullpaper',array('md5(absID)' => $paperHash));
		return $query->row_array();
	}
	public function loadSingleCameraPaper($paperHash)
	{	
		$query = $this -> db -> get_where('tblcamerapaper',array('md5(absID)' => $paperHash));
		return $query->row_array();
	}
	
	public function loadOrganizers(){
		$query = $this -> db -> query("SELECT A.cmmID,A.cmtID,A.cmmName,A.cmmDesignation,B.cmtName FROM `tblcommitteemembers` as A
INNER JOIN tblcommittee as B on A.cmtID=B.cmtID ORDER BY cmtID ASC");
		return $query->result_array();
	}
	
	public function loadTracks(){
		$query = $this -> db -> get("tbltracks");
		return $query->result_array();
	}
}
?>