<?php
class Student_model extends  CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}
	function Get_Exam()
	{
		$this->db->select('*');
		$this->db->where('exam_deleted',0);
		$this->db->from('tbl_exam');
		$exam=$this->db->get();
		return $exam->result();
	}
	function Get_levels(){
		$this->db->select('*');
		//$this->db->where('level_exam_id',1);
		$this->db->from('tbl_exam_level');
		$exam_level=$this->db->get();
		return $exam_level->result();
	}
	function GetAll_Schools(){
		$this->db->select('*');
		$this->db->join('tbl_exam_schoolvenue','tbl_exam_school.school_id = tbl_exam_schoolvenue.v_school_id');
		$this->db->where('school_deleted',0);
		$this->db->from('tbl_exam_school');
		$allexam_schools=$this->db->get();
		return $allexam_schools->result();
	}
	function GetAll_Students($exam_id,$level_id,$school_id){
		
		// $this->output->enable_profiler('true');
		$this->db->select('*');
		$this->db->from('tbl_exam_students');
		$this->db->join('tbl_exam_levelstudents','tbl_exam_levelstudents.student_id = tbl_exam_students.stu_id');
		$this->db->join('tbl_exam_schoolvenue','tbl_exam_schoolvenue.v_school_id = tbl_exam_students.stu_school_id');
		$this->db->join('tbl_exam_school','tbl_exam_school.school_id = tbl_exam_schoolvenue.v_school_id');
		$this->db->join('tbl_exam_level','tbl_exam_level.level_id = tbl_exam_levelstudents.level_id');
		$this->db->join('tbl_exam','tbl_exam.exam_id = tbl_exam_level.level_exam_id');
		$this->db->where('tbl_exam_students.stu_school_id',$school_id);
		$this->db->where('tbl_exam_levelstudents.level_id',$level_id);
		$this->db->where('tbl_exam.exam_id',$exam_id);
		$this->db->order_by('stu_id',"DESC");
		$allstudent=$this->db->get();
		return $allstudent;

	}
	function Print_Hallticket(){

	}
	function Upload_Students(){

	}
	

}
?>