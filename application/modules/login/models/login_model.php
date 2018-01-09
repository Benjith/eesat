<?php
class login_model extends  CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		//$this->load->library('session');
		//$this->load->helper('security');
	}
	function login()
	{
		$user=$this->input->post('username');
		$password= $this->input->post('password');
		$this->db->select('*');
		$this->db->from('tbl_employees');
//		$this->db->join('employee','employee.employee_id=login.user_id');
		$this->db->where('username',$user);
		$this->db->where('password',md5($password));
		$this->db->where('deleted',0);
		$query=$this->db->get();
		return $query; 
	}
	

}
?>