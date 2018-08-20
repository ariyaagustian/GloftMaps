<?php
defined('BASEPATH') OR exit ('No direct access allowed');

/**
 *
 */
class Rute extends CI_Controller
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
    $data = array('content' => 'admin/rute',
    'datadinas' => $this->model_dinas->getAll(),
    'rutedinas' => $this->model_dinas->getAll()
  );
    $this->load->view('templates/template-admin', $data);

  }

}
