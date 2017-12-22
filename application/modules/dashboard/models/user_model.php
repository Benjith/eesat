<?php
class User_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('security');
		
	}
	public function is_login()
	{
		
		$ID=$this->session->userdata('user_id',$user_ids);
		
		if($ID)
		{
		return true;
		}
		else
		{
			return false;
		}
		
	
	}
	
	

	function is_logged_in()
	{


		return $this->session->userdata('user_id')!=false;
			
	}
	
	/*
	Gets information about the currently logged in employee.
	*/
	function get_logged_in_employee_info()
	{
		if($this->is_logged_in())
		{

		 
			return $this->get_info($this->session->userdata('user_id'));
		}
		
		return false;
	}
		function get_allowed_modules($person_id,$user_type)

{ 
		$this->db->from('tbl_usermodules');
		$this->db->join('tbl_userpermissions','tbl_userpermissions.up_module_id=tbl_usermodules.module_id');
		$this->db->where("tbl_userpermissions.up_user_id",$person_id);
		$this->db->or_where("tbl_userpermissions.user_type",$user_type);
		$this->db->order_by("module_order", "asc");
		return $this->db->get();		
	}
	 function select_module()
	{
		$this->db->select('*');
		$this->db->from('tbl_usermodules');
		$query=$this->db->get();
		return $query; 
	
	}


}

?>