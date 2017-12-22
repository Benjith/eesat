<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Result extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('security');
	}
	

function index(){
	$this->load->view('result_view');
}








}