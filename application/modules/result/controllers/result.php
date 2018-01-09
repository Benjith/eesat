<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Result extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('security');
		$this->load->model('result_model');
$this->load->helper('url');
	}
	


  public function index(){
    // load base_url 
    
   
    //load model 
   
    // get SCHOOL 
    $data['school'] = $this->result_model->get_school();
   $data['exam'] = $this->result_model->get_exam();
    // load view 
    $this->load->view('result_view',$data); 
  }

  public function get_level(){ 
    // POST data 
$postData = $this->input->post('exam');

    
    // get data 
    $data = $this->result_model->get_level($postData);
    echo json_encode($data); 
  }
function get_table(){
	$level=$this->input->post('level');
	$exam=$this->input->post('exam');
	$school=$this->input->post('school');
	$data['qry']=$this->result_model->get_table($level,$school,$exam);
	//print_r($data['qry']);
    echo $this->load->view('get_table',$data); 
	



}
function ins_result(){
//$this->output->enable_profiler('true');

	$school=$this->input->post('school');
	$exam  =$this->input->post('exam');
	$level =$this->input->post('level');
	$student=$this->input->post('student');
	$mark=$this->input->post('mark');
	$data['qry']=$this->result_model->ins_result($school,$exam,$level,$student,$mark);
	
}


function download(){
	    $data['school'] = $this->result_model->get_school();
   		$data['exam'] = $this->result_model->get_exam();
 		 $this->load->view('download_view',$data); 

}
function get_file(){

}


 function mypdf(){


	$this->load->library('pdf');


  	$this->pdf->load_view('sample_pdf');
  	$this->pdf->render();


  	$this->pdf->stream("welcome.pdf");

	}
	function generate_to_pdf(){
		$html=$this->load->view('sample_pdf',true);
        $this->load->library('m_pdf'); 
        $this->m_pdf->pdf->WriteHTML($html); 
        $this->m_pdf->pdf->Output('kgfest_itemwise_participant_list.pdf', 'I');


		}

}