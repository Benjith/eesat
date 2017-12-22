<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class School extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('security');
	}
	

function index(){
	$this->load->view('student_view');
}








}