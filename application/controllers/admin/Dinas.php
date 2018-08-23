<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dinas extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        //kita load model yang dibutuhkan, yaitu model jalan
        $this->load->model(array('model_dinas'));
        $this->load->helper('url');
        $this->load->library(array('form_validation','ion_auth'));
        if (!$this->ion_auth->logged_in()) {//cek login ga?
    		redirect('login','refresh');
    	}else{
            if (!$this->ion_auth->in_group('admin')) {//cek admin ga?
                redirect('login','refresh');
            }
        }
    }

    function index()
    {
        $data = array('content' => 'admin/formdinas',//kita buat file formjalan di dalam folder views/admin
        'itemdinas'=>$this->model_dinas->getAll());
        $this->load->view('templates/template-admin', $data);
    }

    public function datadinas()
    {
      // FETCH DATA DINAS
       $d = $this->model_dinas->getAll()->result();
       $data = [];
       $data["data"] = [];
       $i = 1;
       foreach ($d as $key => $value) {
         $obj =
         $data["data"][] = [$i++,$value->kelembagaan." - ".$value->wilayah,$value->alamat,$value->telepon,$value->fax,'<button type="button" class="btn btn-sm btn-info" data-iddinas="'.$value->id_dinas.'" name="editdinas'.$value->id_dinas.'" id="editdinas" ><span class="glyphicon glyphicon-edit"></span></button> <button type="button" class="btn btn-sm btn-danger" data-iddinas="'.$value->id_dinas.'" name="deletedinas'.$value->id_dinas.'" id="deletedinas" ><span class="glyphicon glyphicon-trash"></span></button>'];
       }
       header('Content-Type: application/json');
       echo json_encode($data);
    }

    function create(){
            if (!$this->input->is_ajax_request()) {
                show_404();
            }else{
                //kita validasi inputnya dulu
                $this->form_validation->set_rules('kelembagaan', 'kelembagaan', 'trim|required');
                $this->form_validation->set_rules('wilayah', 'wilayah', 'trim|required');
                $this->form_validation->set_rules('pimpinan', 'pimpinan', 'trim|required');
                $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
                $this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
                $this->form_validation->set_rules('longitude', 'longitude', 'trim|required');
                $this->form_validation->set_rules('telepon', 'telepon', 'trim|required');
                $this->form_validation->set_rules('fax', 'fax', 'trim|required');
                if ($this->form_validation->run()==false) {
                    $status = 'error';
                    $msg = validation_errors();
                }else{
                    if ($this->model_dinas->create()) {
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

        function edit(){
                if (!$this->input->is_ajax_request()) {
                    show_404();
                }else{
                    //kita validasi inputnya dulu
                    $this->form_validation->set_rules('id_dinas', 'ID Dinas', 'trim|required');
                    if ($this->form_validation->run()==false) {
                        $status = 'error';
                        $msg = validation_errors();
                    }else{
                        $id = $this->input->post('id_dinas');
                        if ($this->model_dinas->read($id)->num_rows()!=null) {
                            $status = 'success';
                            $msg = $this->model_dinas->read($id)->result();
                        }else{
                            $status = 'error';
                            $msg = "Data Dinas tidak ditemukan";
                        }
                    }
                    $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
                }
            }


        function update(){
        if (!$this->input->is_ajax_request()) {
            show_404();
        }else{
            //kita validasi inputnya dulu
            $this->form_validation->set_rules('kelembagaan', 'kelembagaan', 'trim|required');
            $this->form_validation->set_rules('wilayah', 'wilayah', 'trim|required');
            $this->form_validation->set_rules('pimpinan', 'pimpinan', 'trim|required');
            $this->form_validation->set_rules('alamat', 'ID alamat', 'trim|required');
            $this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
            $this->form_validation->set_rules('longitude', 'longitude', 'trim|required');
            $this->form_validation->set_rules('telepon', 'telepon', 'trim|required');
            $this->form_validation->set_rules('fax', 'fax', 'trim|required');
            if ($this->form_validation->run()==false) {
                $status = 'error';
                $msg = validation_errors();
            }else{
                $id = $this->input->post('id_dinas');
                if ($this->model_dinas->update($id)) {
                    $status = 'success';
                    $msg = "Data Dinas berhasil diupdate";
                }else{
                    $status = 'error';
                    $msg = "terjadi kesalahan saat mengupdate data Dinas";
                }
            }
            $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
        }
    }

    function delete(){
        if (!$this->input->is_ajax_request()) {
            show_404();
        }else{
            //kita validasi inputnya dulu
            $this->form_validation->set_rules('id_dinas', 'ID Dinas', 'trim|required');
            if ($this->form_validation->run()==false) {
                $status = 'error';
                $msg = validation_errors();
            }else{
                $id = $this->input->post('id_dinas');
                if ($this->model_dinas->delete($id)) {
                    $status = 'success';
                    $msg = "Data dinas berhasil dihapus";
                }else{
                    $status = 'error';
                    $msg = "terjadi kesalahan saat menghapus data jalan";
                }
            }
            $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
        }
    }




}
