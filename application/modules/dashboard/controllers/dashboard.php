<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_controller{

	
	
	function __construct()
	{
		parent:: __construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('user_model');
		
	}

	public function index(){
		if(!empty($_SESSION['user_id'])){
			$this->load->view('dashboard_view');
		}
		else{
			$this->load->view('login_view');
		}
	}
	public function modules(){
		$this->user_model->get_allowed_modules();
	}
	}
	?>