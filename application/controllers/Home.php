<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct(){
      parent::__construct();
      //Codeigniter : Write Less Do More
      $this->load->model(array('model_dinas'));
      $this->load->helper('url');
      $this->load->library('form_validation');
  }

  function index(){
      $data = array('content'=>'home/formlogin',
          'itemdinas' => $this->model_dinas->getAll());
      $this->load->view('templates/template-home',$data);//edit pada bagian ini untuk memanggil content
  }
  function loaddata(){
      if (!$this->input->is_ajax_request()) {
          show_404();
      }else{
          $status = 'success';
          $jalan = $this->model_jalan->getAll()->num_rows();
          $jembatan = $this->model_jembatan->getAll()->num_rows();
          $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'dinas'=>$dinas)));
      }
  }

}
