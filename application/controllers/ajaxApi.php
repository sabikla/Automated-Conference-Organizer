<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajaxApi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index($reqType,$reqValue)
	{
		if($reqType=='papers')
		{
			$this->load->model('Ajax_model','',TRUE);
			$data['papers']=$this ->Ajax_model->loadPapers($reqValue);
			$content = '<select class="form-control" name="paper[]" multiple="multiple">';
			foreach($data['papers'] as $paper):
				$content = $content.'<option value="'.$paper['absID'].'">'.$paper['absTitle'].'</option>';
			endforeach;
			$content = $content. "</select>";
			//echo json_encode(array("paper_data"=>$content));
			echo $content;
			
			
		}
	}

}
?>