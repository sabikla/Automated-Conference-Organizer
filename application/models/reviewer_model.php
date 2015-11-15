<?php
class Reviewer_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->library('session');
	}
	function loadPapers($userID)
	{
		//$result = $this->db->get_where('tblpapersforreview',array('usrID' => $userID));
		$result = $this->db->query("SELECT * FROM tblfullpaper WHERE absID in(SELECT paperId as absID FROM tblpapersforreview WHERE usrID=".$userID.")");
		return $result->result_array();
	}
	public function loadMessages()
	{
		$this->db->order_by("msgID", "desc");
		$query = $this -> db -> get('tblmessage');		
		return $query->result_array();
	}
	public function loadReview($userID)
	{
		$this->db->order_by("rvwID", "desc");
		$this->db->where("rvwBy",$userID);
		$query = $this -> db -> get('tblreview');		
		return $query->result_array();
	}
	public function loadReviewInDetail($reviewHash)
	{
		$this->db->where("md5(rvwID)",$reviewHash);
		$query = $this -> db -> get('tblreview');		
		return $query->row_array();
	}
	public function deleteReview($reviewHash,$userID)
	{
		$this -> db -> where('md5(rvwID)' , $reviewHash);
		$this -> db -> where('rvwBy' , $userID);
		$query = $this -> db -> delete('tblreview');
	}
	
	public function setReview($userID)
	{
		$reviewID=$this->db->query('SELECT MAX(rvwID)+1 AS `maxid` FROM tblreview')->row()->maxid;
		$review_data = array(
			'rvwID' => $reviewID,
			'rvwBy' => $userID,
			'rvwDesc' => $this->input->post('review'),
			'rvwPaperID' => $this->input->post('paper'),
			'rvwStatus' => 0
		);
		return $this->db->insert('tblreview', $review_data);
	}
}
?>