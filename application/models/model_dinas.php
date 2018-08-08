<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_dinas extends CI_Model{

    public function create(){
        $data = array(
        'kelembagaan' => $this->input->post('kelembagaan'),
        'wilayah' => $this->input->post('wilayah'),
        'pimpinan'=>$this->input->post('pimpinan'),
        'alamat'=>$this->input->post('alamat'),
        'latitude'=>$this->input->post('latitude'),
        'longitude'=>$this->input->post('longitude'),
        'telepon'=>$this->input->post('telepon'),
        'fax'=>$this->input->post('fax')
        );
        $query = $this->db->insert('tbl_dinas', $data);
        return $query;
    }
    public function getAll(){
        $query = $this->db->get('tbl_dinas');
        return $query;
    }
    public function read($id){
        $this->db->where('id_dinas', $id);
        $query = $this->db->get('tbl_dinas');
        return $query;
    }
    public function delete($id){
        $this->db->where('id_dinas', $id);
        $query = $this->db->delete('tbl_dinas');
        return $query;
    }
    public function update($id){
        $data = array(
        'kelembagaan' => $this->input->post('kelembagaan'),
        'wilayah' => $this->input->post('wilayah'),
        'pimpinan'=>$this->input->post('pimpinan'),
        'alamat'=>$this->input->post('alamat'),
        'latitude'=>$this->input->post('latitude'),
        'longitude'=>$this->input->post('longitude'),
        'telepon'=>$this->input->post('telepon'),
        'fax'=>$this->input->post('fax')
        );
        $this->db->where('id_dinas', $id);
        $query = $this->db->update('tbl_dinas', $data);
        return $query;
    }

}
