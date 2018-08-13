<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_koordinatdinas extends CI_Model {

    public function create(){
        $data = array(
            'id_dinas' => $this->input->post('id_dinas'),
            'latitude'=>$this->input->post('latitude'),
            'longitude'=>$this->input->post('longitude'));
        $query = $this->db->insert('tbl_dinas', $data);
        return $query;
    }
    public function getAll(){
        $query = $this->db->get('tbl_dinas');//mengambil semua data koordinat dinas
        return $query;
    }
    public function getbyiddinas($id){
        $this->db->where('id_dinas', $id);
        $query = $this->db->get('tbl_dinas');
        return $query;
    }
    public function read($id){
        $this->db->where('id_dinas', $id);//mengambil data koordinat dinas berdasarkan id_koordinatdinas
        $query = $this->db->get('tbl_dinas');
        return $query;
    }
    public function update(){
        $data = array('id_dinas'=>$this->input->post('id_dinas'),
            'latitude'=>$this->input->post('latitude'),
            'longitude'=>$this->input->post('longitude'));
        $this->db->where('id_dinas', $this->input->post('id_dinas'));//mengupdate berdasarkan id_koordinatdinas
        $query = $this->db->update('tbl_dinas', $data);
        return $query;
    }
    public function delete(){
        $this->db->where('id_koordinatdinas', $this->input->post('id_dinas'));//menghapus berdasarkan id_koordinatdinas
        $query = $this->db->delete('tbl_dinas');
        return $query;
    }
    public function deletebyiddinas($id){
        $this->db->where('id_dinas', $id);
        $query = $this->db->delete('tbl_dinas');
        return $query;
    }

}

/* End of file model_koordinatdinas.php */
/* Location: ./application/models/model_koordinatdinas.php */
