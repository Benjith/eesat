<?php
class Exam_model extends  CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('security');
	}
	
	function Get_Exam(){
	return	$this->db->query("SELECT exam_id,exam_name,GROUP_CONCAT(level_name SEPARATOR ' ') as level FROM tbl_exam JOIN tbl_exam_level ON tbl_exam.exam_id=tbl_exam_level.level_exam_id WHERE tbl_exam.exam_deleted =0 GROUP BY exam_id");
		
		
	}
	 function del_exam($exam_id){
	 	// $this->db->delete('tbl_exam_level');
	 	//$this->db->where('level_exam_id',$exam_id);
	 	$this->db->where('exam_id',$exam_id);
	 	$this->db->update('tbl_exam',array('exam_deleted'=> 1)); 
	 	
	 	return true;

	 }

	function edit_exam($exam_name,$level_num,$exam_id){

		//edit_exam_name
		$this->db->where('exam_id',$exam_id);
	 	$this->db->update('tbl_exam',array('exam_name'=> $exam_name)); 
	 	$this->del_prev_level_data($exam_id,$level);
	 	$this->add_edit_level($exam_id,$level_num);
		
		return true;


}	
 	function del_prev_level_data($exam_id,$level){
 		
 		
		//delete all previus data associated with exam_id
 		$this->db->where('level_exam_id',$exam_id);
		$this->db->delete('tbl_exam_level');
 		
 		


 	}
 	function add_edit_level($exam_id,$level_num){

		for($i=1;$i<=$level_num;$i++){
			$this->db->insert('tbl_exam_level',array('level_name'=>'LEVEL'.$i,'level_exam_id'=>$level_num
		));
 			
 		}
 		return true;

 	}
 	

	function add_new_exam($exam_name,$level){
		$this->db->insert('tbl_exam',array('exam_name'=>$exam_name));
		 

		$id=$this->db->insert_id();
		
		for($i=1;$i<=$level;$i++){
			$this->db->insert('tbl_exam_level',array('level_name'=>'LEVEL'.$i,'level_exam_id'=>$id
		));
 			
 		}
 		return true;


	}

	
}
?>