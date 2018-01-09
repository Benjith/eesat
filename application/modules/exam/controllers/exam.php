<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Exam extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('security');
		$this->load->model('exam_model');
	}
	

function index(){
	$dataexam['result_exam']=$this->exam_model->Get_Exam();
	// $dataexam['result_level']=$this->exam_model->Get_level();
	$this->load->view('exam_view',$dataexam);
}

function delete_exam(){
	$exam_id=$this->input->post('id');
	$this->exam_model->del_exam($exam_id);
}

function edit_exam(){
	$exam_id=$this->input->post('exam_id');
	$exam_name=$this->input->post('exam_name');
	$level_num=$this->input->post('level');
	$this->exam_model->edit_exam($exam_name,$level_num,$exam_id);
	//$this->exam_model->del_prev_level_data($exam_id,$level_num);
	//$this->exam_model->add_edit_level($exam_id,$level_num);

	}

function newexam(){
	$exam_name=$this->input->post('exam_name');
	$level_num=$this->input->post('level');

	$this->exam_model->add_new_exam($exam_name,$level_num);
	
}
}
