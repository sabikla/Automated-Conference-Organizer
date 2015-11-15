<?php
class Admin_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->library('session');
	}
	
	public function loadProfiles()
	{
		$this->db->order_by("usrID", "desc");
		$query = $this -> db -> get('tblmemberdetails');
		return $query->result_array();
	}
	
	public function loadReviewer()
	{
		$this->db->order_by("usrID", "desc");
		$query = $this -> db -> get_where('tblusers', array('usrType' => 3) );
		return $query->result_array();
	}
	
	
	public function loadAbstracts($statusValue=-1)
	{
		$this->db->order_by("absDept", "asc");
		if($statusValue!=-1)
			$this->db->where('absStatus',$statusValue);
		$query = $this -> db -> get('tblabstract');
		return $query->result_array();
	}
	public function loadReview()
	{
		$this->db->order_by("rvwID", "desc");
		$query = $this -> db -> query('Select rvwID,rvwDesc,rvwStatus, tblfullpaper.absTitle, tblusers.usrName,tblmemberdetails.memFirstName FROM tblreview
INNER JOIN tblfullpaper
ON tblreview.rvwPaperID=md5(tblfullpaper.absID)
INNER JOIN tblusers
ON tblreview.rvwBy=tblusers.usrID
INNER JOIN tblmemberdetails
ON tblfullpaper.usrID=tblmemberdetails.usrID');
		return $query->result_array();
	}
	public function loadPapers($statusValue=-1)
	{
		$this->db->order_by("absDept", "asc");
		if($statusValue!=-1)
			$this->db->where('absStatus',$statusValue);
		$query = $this -> db -> get('tblfullpaper');
		return $query->result_array();
	}
	
	public function loadCameraPapers()
	{
		$this->db->order_by("absDept", "asc");
		$query = $this -> db -> get('tblcamerapaper');
		return $query->result_array();
	}
	
	public function get_messages()
	{
		
		$this->db->order_by("msgID", "desc"); 
		$query = $this -> db -> get('tblmessage');
		return $query->result_array();
	}
	
	
	public function set_message()
	{
		$messageTo = $this->input->post('msgTo');
		$messageID= $this->db->query('SELECT MAX(msgID)+1 AS `maxid` FROM tblmessage')->row()->maxid;
		if($messageTo==4)
		{
			
			$msgUsers = $this->input->post('msgUsers');
			foreach($msgUsers as  $User):
				//$messageTo = $messageTo.$User.",";
				$message_route = array(
				'msgID' => $messageID,
				'usrID' => $User
				);
				$this->db->insert('tblmessageroutes', $message_route);
			endforeach;
				
			//$messageTo = $this->input->post('msgUsers');
		}
		$currentDate = date('Y-m-d');
			$message_data = array(
			'msgID' => $messageID,
			'msgTitle' => $this->input->post('msgTitle'),
			'msgContent' => $this->input->post('msgDesc'),
			'msgDate' => $currentDate,
			'msgTo' => $messageTo
			);/**/
		
		return $this->db->insert('tblmessage', $message_data);
		
		
	}
	
	public function getSingleMemberDetails($userHashID)
	{		
		$query = $this -> db -> get_where('tblmemberdetails',array('md5(usrID)' => $userHashID));
		return $query->row_array();
	}
	
	
	
	public function deleteNews($hashID)
	{		
		$this -> db -> where('md5(nwsID)' , $hashID);
		$query = $this -> db -> delete('tblnews');
		return $query;
	}
	public function deleteMessage($hashID)
	{	
		$this -> db -> where('md5(msgID)' , $hashID);
		$query = $this -> db -> delete('tblmessage');
		return $query;
	}
	public function deleteReviewer($hashID)
	{	
		$this -> db -> where('md5(usrID)' , $hashID);
		$query = $this -> db -> delete('tblusers');
		
		$this -> db -> where('md5(usrID)' , $hashID);
		$query = $this -> db -> delete('tblpapersforreview');
		return $query;
	}
	public function deleteDate($hashID)
	{	
		$this -> db -> where('md5(dtsID)' , $hashID);
		$query = $this -> db -> delete('tblimportantdates');
		return $query;
	}
	
	
	
	public function changePaperStatus($paperType,$hashID,$statusValue)
	{	
		$updateData = array(
               'absStatus' => $statusValue
            );
		$this -> db -> where('md5(absID)' , $hashID);
		if($paperType==1)
		{
			$query = $this -> db -> update('tblabstract',$updateData);
		}
		else if($paperType==2)
		{
			$query = $this -> db -> update('tblfullpaper',$updateData);			
		}
		
		return $query;
	}
	
	
	public function create_user($userType)
	{
		$userID = $this->db->query('SELECT MAX(usrID)+1 AS `maxid` FROM tblusers')->row()->maxid;
		
	
		$user_data = array(
			'usrID' => $userID,
			'usrName' => $this->input->post('email'),
			'usrPword' => md5($this->input->post('password')),
			'usrType' => $userType
		);
		if($this->db->insert('tblusers', $user_data))
			return $userID;
		else
			return 0;		
		
	}
	
		/*  Starts     25-12-14------------------------------------------------------------------------------------------*/
	
	
	public function set_member_to_committee()
	{
		$cmmID = $this->db->query('SELECT MAX(cmmID)+1 AS `maxid` FROM tblcommitteemembers')->row()->maxid;
		$member_data = array(
			'cmmID' => $cmmID,
			'cmtID' => $this->input->post('committeeID'),
			'cmmName' => $this->input->post('memberName'),
			'cmmDesignation' => $this->input->post('designation')
		);
		if($this->db->insert('tblcommitteemembers', $member_data))
			return true;
		else
			return false;		
		
		
	}
	
	public function postponeDate()
	{
		$date_data = array(
			'dtsPostponed' => $this->input->post('newDate')
		);
		
			$this->db->where('md5(dtsID)',$this->input->post('dateID'));
		if($this->db->update('tblimportantdates', $date_data))
			return true;
		else
			return false;		
		
		
	}
	
	
	
	public function set_track()
	{
		$trkID = $this->db->query('SELECT MAX(trkID)+1 AS `maxid` FROM tbltracks')->row()->maxid;
		$track_data = array(
			'trkID' => $trkID,
			'trkTitle' => $this->input->post('trackName'),
			'trkDesc' => $this->input->post('description'),
			'trkTags' => $this->input->post('tags')
		);
		if($this->db->insert('tbltracks', $track_data))
			return true;
		else
			return false;		
		
		
	}
	
	
	public function getAllCommittee()
	{		
		$query = $this -> db -> get('tblcommittee');
		return $query->result_array();
	}
	
	
	
	public function create_committee()
	{
		$cmtID = $this->db->query('SELECT MAX(cmtID)+1 AS `maxid` FROM tblcommittee')->row()->maxid;
	
		$committee_data = array(
			'cmtID' => $cmtID,
			'cmtName' => $this->input->post('committeeName')
		);
		if($this->db->insert('tblcommittee', $committee_data))
			return true;
		else
			return false;		
		
	}
	/*-------------------------------------------------------------------------------- 25-12-14               Ends*/
	public function create_reviewer_in_review_list($userID)
	{		
	
		$user_data = array(
			'usrID' => $userID,
			'paperList' => ""
		);
		if($this->db->insert('tblpapersforreview', $user_data))
			return true;
		else
			return false;		
		
	}
	
	
	public function setDate()
	{
		$dtsID = $this->db->query('SELECT MAX(dtsID)+1 AS `maxid` FROM tblimportantdates')->row()->maxid;
	
		$user_data = array(
			'dtsID' => $dtsID,
			'dtsTitle' => $this->input->post('date'),
			'dtsDesc' => $this->input->post('desc'),
		);
		if($this->db->insert('tblimportantdates', $user_data))
			return true;
		else
			return false;		
		
	}
	
	
	public function set_paper_for_review()
	{
		$reviewerList = $this->input->post('reviewer');
		foreach($reviewerList as  $reviewer):	
			//$paperID=$this->db->query('SELECT `paperList` FROM tblpapersforreview where usrID='.$reviewer)->row()->paperList;
			$paperList = $this->input->post('paper');
			foreach($paperList as $paper):	
				$rvpID=$this->db->query('SELECT max(`rvpID`) as rvpID FROM tblpapersforreview')->row()->rvpID;
				$rvpID +=1;
				//$paperID = $paperID.$paper.",";
				
				$paper_data = array(
					'rvpID' => $rvpID,
					'usrID' => $reviewer,
					'paperID' => $paper
				);
				$this->db->insert('tblpapersforreview', $paper_data );
			endforeach;
			//$this->db->where('usrID',$reviewer);
			//$this->db->update('tblpapersforreview', $paper_data );
		endforeach;
		
		return true;	
		
	}
	
}