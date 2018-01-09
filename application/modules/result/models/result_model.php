<?php
class result_model extends  CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('security');
	}
	function login()
	{
		$user=$this->input->post('username');
		$password= $this->input->post('password');
		$this->db->select('*');
		$this->db->from('tbl_login');
//		$this->db->join('employee','employee.employee_id=login.user_id');
		$this->db->where('username',$user);
		$this->db->where('password',md5($password));
		$this->db->where('deleted',0);
		$query=$this->db->get();
		return $query; 
	}

//get school here//
	function get_school(){
		//$response =array();
		//select data
		//$this->db_>select('*');
		return $q= $this->db->get('tbl_exam_schoolvenue');
//response= $qr->esult_array();

		//return $response;
	}


	//get exam//
	function get_exam(){
		//$response = array();
		//$this->db->select('exam_name');
	return	$q= $this->db->get('tbl_exam');
		//$response = $q->result_array();

	//	return $response;
	}

	//get level//
	function get_level($id){
		//$response = array();
		//$this->db->select('level_name');
		$this->db->where('level_exam_id',$id);
	 $q = $this->db->get('tbl_exam_level');
	$response = $q->result_array();

	return $response;
	}
	function get_table($level,$school,$exam)
	{
		//$this->output->enable_profiler('true');
//$qry=$this->check_result($level,$school,$exam);

		return $this->db->query("SELECT *
FROM `tbl_exam_students`
JOIN `tbl_exam_levelstudents` ON `tbl_exam_levelstudents`.`student_id` = `tbl_exam_students`.`stu_id`
JOIN `tbl_exam_level` ON `tbl_exam_level`.`level_id` = `tbl_exam_levelstudents`.`level_id`
JOIN `tbl_exam` ON `tbl_exam`.`exam_id` = `tbl_exam_level`.`level_exam_id`
LEFT JOIN `tbl_result` ON `tbl_exam_students`.`stu_id`=`tbl_result`.`stud_id` and `tbl_exam_levelstudents`.`level_id`=`tbl_result`.`level_id` 
WHERE `tbl_exam_level`.`level_id` =".$level."
AND `tbl_exam_students`.`stu_school_id` = ".$school."
AND `tbl_exam`.`exam_id` =".$exam);	
		/*$this->db->select('*');
		$this->db->from('tbl_exam_students');
		$this->db->join('tbl_exam_levelstudents','tbl_exam_levelstudents.student_id = tbl_exam_students.stu_id');
		$this->db->join('tbl_exam_level','tbl_exam_level.level_id = tbl_exam_levelstudents.level_id');
		$this->db->join('tbl_exam','tbl_exam.exam_id = tbl_exam_level.level_exam_id');
//if($qry->num_rows()>0){
	$this->db->join('tbl_result','tbl_exam_students.stu_id=tbl_result.stud_id','tbl_exam_levelstudents.level_id=tbl_result.level_id','left');
	//$this->db->where('tbl_result.level_id',$level);
		//$this->db->where('tbl_result.school_id',$school);
		//$this->db->where('tbl_result.exam_id',$exam);
	
	
//}
		$this->db->where('tbl_exam_level.level_id',$level);
		$this->db->where('tbl_exam_students.stu_school_id',$school);
		$this->db->where('tbl_exam.exam_id',$exam);
		
		$query = $this->db->get();*/
		//return $query;
	}
	function ins_result($school,$exam,$level,$student,$mark){
$grade='A+';
		 $data = array('exam_id' =>$exam,
					'level_id' =>$level,
					'school_id'=>$school,
					'stud_id'=>$student,
					'mark'	   =>$mark,
					'grade'	   =>$grade,
					'status'   =>1,	
					);

return $this->db->insert('tbl_result', $data);



	}
	function check_result($level,$school,$exam)
{

		$this->db->where('tbl_result.level_id',$level);
		$this->db->where('tbl_result.school_id',$school);
		$this->db->where('tbl_result.exam_id',$exam);
	return	$this->db->get('tbl_result');

}

}
?>