<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class School extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	
		$this->load->model('school_model');


	}
	

function index(){
	$datas['results']=$this->school_model->Getall_School();
		$this->load->view('school_view',$datas);
}
function UploadAction(){
	$this->school_model->Upload_School();
	
}
// function SchoolView(){
	
	
// }
function ManualInsert(){
	$this->school_model->Insert_School();
	

 
}
function Delete(){
	$this->school_model->Delete_School();
	

}








}
?>