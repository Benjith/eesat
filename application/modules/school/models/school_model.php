<?php

//require_once APPPATH.'third_party/PHPExcel.php';
//require_once APPPATH.'third_party/PHPExcel/Autoloader.php';
class School_model extends  CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}
	function Getall_School(){
		$this->db->select('*');
		$this->db->from('tbl_exam_school');
		$this->db->where('school_deleted',0);
		$results=$this->db->get();
		return $results->result();
	}
	// excel uploads
	function Upload_School()
	{
        $data['error'] = '';    //initialize image upload error array to empty
 
        $config['upload_path'] = './uploads/school_excel/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size'] = '2000';
 
        $this->load->library('upload', $config);
        $flag=0;
        // If upload failed, display error
        if (!$this->upload->do_upload()) 

        {
        $data['error'] = $this->upload->display_errors();
        $flag=2;   
        } 
        else 
        {
          $file_data = $this->upload->data();
          $file_path =  './uploads/school_excel/'.$file_data['file_name'];
          $objReader = new PHPExcel_Reader_Excel2007();
          $data = $objReader->load($file_path);
          $objWorksheet = $data->getActiveSheet();
          //$inputFileName = $upload_path . $filename;
			$objReader1 = PHPExcel_IOFactory::createReader('Excel2007');
			$objReader1->setReadDataOnly(true);
			$objPHPExcel = $objReader1->load($file_path);
			$objWorksheet1 = $objPHPExcel->getActiveSheet();

			$highestRow = $objWorksheet1->getHighestRow();
			$highestColumn = $objWorksheet1->getHighestColumn();
			$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
			$rows = array();
			$img="";

			for ($row = 3; $row <= $highestRow; ++$row) 
			{
			  for ($col = 1; $col <= $highestColumnIndex; ++$col)
			   {
			    $rows[$col] = $objWorksheet1->getCellByColumnAndRow($col, $row)->getValue();
			   }

		//	$reg_no=$this->mdl_students->check_esat_no($rows[2]);

			   $school_data=array('school_name'=>$rows[1], //Student Name
			   	'school_address'=>$rows[2], //Student Name
		          );
		   $this->db->insert('tbl_exam_school',$school_data);
		   
			}
        }
        
	}
// manual school add
	function Insert_School(){
		//$this->output->enable_profiler(TRUE);
		$school_name=$this->input->post('school_name');
		$school_address=$this->input->post('school_address');
		$in=0;

		$schooldata = array('school_name' => $school_name,'school_address'=>$school_address,'school_deleted'=>$in, );
		// $encodedata= json_encode($schooldata);
		$this->db->insert('tbl_exam_school',$schooldata);
		redirect(base_url(),'refresh'); 

	}
	// Delete school/ update school_deleted value 
	function Delete_School(){
		$school_id = $this->input->get('school_id');
		foreach ($school_id as $value) {
			$data = array('school_deleted' => 1);
			$this->db->where_in('school_id',$value);
			$this->db->update('tbl_exam_school',$data);
		}

	}


}
?>