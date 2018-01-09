<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Login extends CI_Controller{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent:: __construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('login_model');
		$this->load->model('dashboard/user_model');
		$this->load->database();
		$this->load->helper('url');
	}
	
	

 function index()
	{

		$this->load->view('login_view');
		
	
	}
	
	
 function login_check()
	{
	//
		
		$query=$this->login_model->login();
		
		if($query->num_rows()>0)
		{
		 
			$result=$query->row();
			$user_name=$result->username;
			
			$user_type=$this->session->set_userdata('username',$user_name);
			$user_ids=$this->session->set_userdata('user_id',$result->user_id);
			
			
		
		
			$results=$this->user_model->get_allowed_modules($user_type,$user_ids);
			$data['details']=$results;

			$this->load->view('dashboard/dashboard_view',$data);
			//redirect('base_url()');
		}
		else
		{ 
	
			$this->load->view('login_view');
			
		}
	
	}
	public function logout()
	{
	
		
			$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		$this->load->view('login_view');
	
	}
	

}

