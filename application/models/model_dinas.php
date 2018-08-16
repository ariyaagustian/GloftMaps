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
        'jarak'=>$this->input->post('jarak'),
        'fax'=>$this->input->post('fax')
        );
        $query = $this->db->insert('tbl_dinas', $data);
        return $query;
    }
    public function getAll(){
        $query = $this->db->get('tbl_dinas');
        return $query;
    }
    public function getbyStatus(){
        $query = $this->db->get_where('tbl_dinas', array('status' => '0'));
        return $query;
    }
    public function getDistance(){
        $this->db->select('id_dinas, kelembagaan, latitude, longitude');
        $query = $this->db->get('tbl_dinas');
        return $query;
    }

    public function getRoute(){
        $this->db->select('id_dinas, latitude, longitude');
        $query = $this->db->get('tbl_dinas');
        return $query;
        // SELECT id_dinas, kelembagaan, latitude, longitude, 111.045 * DEGREES(ACOS(COS(RADIANS(latpoint)) * COS(RADIANS(latitude)) * COS(RADIANS(longpoint) - RADIANS(longitude)) + SIN(RADIANS(latpoint)) * SIN(RADIANS(latitude)))) AS distance_in_km FROM tbl_dinas JOIN ( SELECT -6.983354 AS latpoint, 107.632154 AS longpoint ) AS p ON 1=1 ORDER BY distance_in_km
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
        'jarak'=>$this->input->post('jarak'),
        'fax'=>$this->input->post('fax')
        );
        $this->db->where('id_dinas', $id);
        $query = $this->db->update('tbl_dinas', $data);
        return $query;
    }



}
