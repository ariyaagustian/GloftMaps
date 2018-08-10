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
    $this->load->model(array('model_dinas','model_koordinatdinas'));
    $this->load->helper('url');
    $this->load->library('form_validation');

  }

  function index()
  {
    $data = array('content' => 'admin/koordinatdinasform',
    'itemdinas' => $this->model_dinas->getAll(),
    'itemkoordinatdinas' => $this->model_koordinatdinas->getAll()
  );
    $this->load->view('templates/template-admin', $data);

  }

  function viewmarkerdinas(){
        if (!$this->input->is_ajax_request()) {
            show_404();
        }else{
            if ($this->model_koordinatdinas->getbyiddinas($this->input->post('id_dinas'))->num_rows()!=null){
                $status = 'success';
                $msg = $this->model_koordinatdinas->getbyiddinas($this->input->post('id_dinas'))->result();
                $datadinas = $this->model_koordinatdinas->read($this->input->post('id_dinas'))->result();
            }else{
                $status = 'error';
                $msg = 'data tidak ditemukan';
                $datadinas = null;
            }
            $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg,'datadinas'=>$datadinas)));
        }
    }


  function create(){
          if (!$this->input->is_ajax_request()) {
              show_404();
          }else{
              //kita validasi inputnya dulu
              $this->form_validation->set_rules('id_dinas', 'kelembagaan', 'trim|required');
              $this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
              $this->form_validation->set_rules('longitude', 'longitude', 'trim|required');
              if ($this->form_validation->run()==false) {
                  $status = 'error';
                  $msg = validation_errors();
              }else{
                  if ($this->model_koordinatdinas->create()) {
                      $status = 'success';
                      $msg = "Data Dinas berhasil disimpan";
                  }else{
                      $status = 'error';
                      $msg = "terjadi kesalahan saat menyimpan data dinas";
                  }
              }
              $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
          }
      }



}
