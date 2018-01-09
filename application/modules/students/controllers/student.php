<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Student extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('student_model');
		
	}
	

function index(){
		
	$student['exam']=$this->student_model->Get_Exam();
	$student['exam_level']=$this->student_model->Get_levels();
	$student['allexam_schools']=$this->student_model->GetAll_Schools();
	
	$this->load->view('student_view',$student);
}
function All_Student(){

		$exam_id=$this->input->post('exam');
		$level_id=$this->input->post('level');
		$school_id=$this->input->post('school');
		$data['allstudent']=$this->student_model->GetAll_Students($exam_id,$level_id,$school_id);
		
		$this->load->view('allstudents',$data);
}
function Get_Hall_ticket(){
	$this->student_model->Print_Hallticket();
}


}
?>