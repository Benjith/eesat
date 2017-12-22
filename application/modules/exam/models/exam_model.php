<?php
class school_model extends  CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('security');
	}
	
	function _result(){
		
		
	}
	 

}
?>