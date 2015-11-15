<?php
class User_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->library('session');
	}
	public function login($username,$password)
	{
		$this -> db -> select('usrID, usrName, usrPword, usrType');
		$this -> db -> from('tblusers');
		$this -> db -> where('usrName', $username);
		$this -> db -> where('usrPword', MD5($password));
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		
		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
		
	}
	public function setNewPasword()
	{
		$data = array(
			'usrPword' => md5($this->input->post('password'))
		);
		

		$this->db->where('md5(usrID)', $this->input->post('user'));
		$this->db->update('tblusers', $data); 
		redirect('login', 'refresh');
	}
	public function forgotPassword($username)
	{
		$this -> db -> select('usrID, usrName, usrPword, usrType');
		$this -> db -> from('tblusers');
		$this -> db -> where('usrName', $username);
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		
		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
		
	}
	public function loadProfile($userID)
	{
		$query = $this -> db -> get_where('tblmemberdetails',array('usrID' => $userID));
		return $query->row_array();
	}
	public function loadPapers($userID)
	{
		$query = $this -> db -> get_where('tblfullpaper',array('usrID' => $userID));
		return $query->result_array();
	}
	public function loadAbstract($userID)
	{
		$query = $this -> db -> get_where('tblabstract',array('usrID' => $userID));
		return $query->result_array();
	}
	public function loadCameraPapers($userID)
	{
		$query = $this -> db -> get_where('tblcamerapaper',array('usrID' => $userID));
		return $query->result_array();
	}
	public function loadMessages($userID)
	{
		/*$this->db->or_where(array(
			'msgTo' => 1,
			'msgTo' => 3,
			'msgTo in' =>  $this->db->get_where('tblmessageroutes',array('usrID'=>$userID));
		)
		)
		$this->db->order_by("msgID", "desc");*/
		$query = $this->db->query('SELECT msgID,msgTitle,msgDate,msgContent FROM `tblmessage` WHERE msgTo=1 OR msgTo=3 OR msgID in (SELECT msgID FROM tblmessageroutes WHERE usrID='.$userID.') ORDER BY(msgID) DESC');		
		return $query->result_array();
	}
	
	public function set_payment_info($userID)
	{
	
		$pmtID = $this->db->query('SELECT MAX(pmtID)+1 AS `maxid` FROM tblpaymentinfo')->row()->maxid;
		$data = array(
			'pmtID' => $pmtID,
			'usrID' => $userID,
			'pmtBank' => $this->input->post('bank'),
			'pmtBranch' => $this->input->post('branch'),
			'pmtAmount' => $this->input->post('amount'),
			'pmtTransactionNo' => $this->input->post('transactionNo'),
			'pmtType' => $this->input->post('paymentType')
		);
		return $this->db->insert('tblpaymentinfo', $data);
	}
	public function set_paper_details($fileDetails, $userID)
	{
	
		$data = array(
			'usrID' => $userID,
			'absTitle' => $this->input->post('paperTitle'),
			'absFile' => $fileDetails['full_path'],
			'absDept' => $this->input->post('department'),
			'absStatus' => 0
		);
		if($this->input->post('paperType')==1)	//it is abstract
			return $this->db->insert('tblabstract', $data);
		if($this->input->post('paperType')==2)	//it is  fullpaper
			return $this->db->insert('tblfullpaper', $data);
		if($this->input->post('paperType')==3)	//it is  camera ready paper
			return $this->db->insert('tblcamerapaper', $data);
	}
	public function check_user_availability($username)
	{
		return $this->db->query("SELECT COUNT(usrID) AS `userCount` FROM tblusers WHERE usrName='".$username."'")->row()->userCount;
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
			$this->set_member($userID);
		else
			return false;
		
		
	}
	
	
	public function set_member($userID)
	{
			$memID = $this->db->query('SELECT MAX(memID)+1 AS `maxid` FROM tblmemberdetails')->row()->maxid;
			$member_data = array(
			'memID' => $memID,
			'usrID' => $userID,
			'memFirstName' => $this->input->post('fname'),
			'memLastName' => $this->input->post('lname'),
			'memEmail' => $this->input->post('email'),
			'memHouseName' => $this->input->post('hname'),
			'memStreet' => $this->input->post('street'),
			'memCity' => $this->input->post('city'),
			'memDistrict' => $this->input->post('district'),
			'memState' => $this->input->post('state'),
			'memPincode' => $this->input->post('pincode'),
			'memMobile' => $this->input->post('mobile'),
			'memType' => $this->input->post('iam')
		);
		
		
		

		return $this->db->insert('tblmemberdetails', $member_data);
		
		
	}
	public function removeAbstract($hashID)
	{
		$this->db->delete('tblabstract', array('md5(absID)' => $hashID)); 
	}
	public function removeFullpaper($hashID)
	{
		$this->db->delete('tblfullpaper', array('md5(absID)' => $hashID)); 
	}
	public function removeCamerapaper($hashID)
	{
		$this->db->delete('tblcamerapaper', array('md5(absID)' => $hashID)); 
	}
	public function getLastDates()
	{
		$lastDate = $this->db->query('SELECT  `gstLastDateOfAbstract` AS  `AbsLastDate` ,  `gstLastDateOfFullPaper` AS  `flpLastDate` ,  `gstLastDateOfCameraReadyPaper` AS  `cmrLastDate` ,  `gstLastDateOfRegistration` AS `rgsLastDate` 
FROM  `tblgeneralsettings` ');
		return $lastDate->row_array();
	}
	
	public function getAbstractCount($userID, $status)
	{
		return $this->db->query("SELECT COUNT(absID) AS `absCount` FROM tblabstract WHERE usrID=".$userID." AND absStatus=".$status)->row()->absCount;
	}
}