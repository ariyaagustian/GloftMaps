<?php
defined('BASEPATH') OR exit ('No direct access allowed');

/**
 *
 */
class Koordinatdinas extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model(array('model_dinas'));
    $this->load->helper('url');
    $this->load->library('form_validation');

  }

  function index()
  {
    $data = array('content' => 'admin/koordinatdinasform',
    'itemdinas' => $this->model_dinas->getbyStatus()
  );
    $this->load->view('templates/template-admin', $data);

  }

  function viewmarkerdinas(){
        if (!$this->input->is_ajax_request()) {
            show_404();
        }else{
            if ($this->model_dinas->getbyiddinas($this->input->post('id_dinas'))->num_rows()!=null){
                $status = 'success';
                $msg = $this->model_dinas->getbyiddinas($this->input->post('id_dinas'))->result();
                $datadinas = $this->model_dinas->read($this->input->post('id_dinas'))->result();
            }else{
                $status = 'error';
                $msg = 'data tidak ditemukan';
                $datadinas = null;
            }
            $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg,'datadinas'=>$datadinas)));
        }
    }

    function gantistatusdinas(){
          if (!$this->input->is_ajax_request()) {
              show_404();
          }else{
              $id = $this->input->post('id_dinas');
              if ($id!=null){
                  $status = 'success';
                  $msg = $this->model_dinas->gantistatusdinas($id);
                  $datadinas = $this->model_dinas->read($this->input->post('id_dinas'))->result();
              }else{
                  $status = 'error';
                  $msg = 'data tidak ditemukan';
                  $datadinas = null;
              }
              $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg,'datadinas'=>$datadinas)));
          }
      }






}
