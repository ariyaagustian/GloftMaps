<?php
defined('BASEPATH') OR exit ('No direct access allowed');
require ("./vendor/autoload.php");
/**
 *
 */
class Rute extends CI_Controller
{
  public $curl;
  function __construct()
  {
    parent::__construct();
    $this->load->model(array('model_dinas'));
    $this->load->helper('url');
    $this->load->library('form_validation');
    $this->load->library('curl_lib');
    $this->curl = $this->curl_lib;
  }

  function index()
  {
    $data = array('content' => 'admin/rute',
    'datadinas' => $this->model_dinas->getAll(),
    'rutedinas' => $this->model_dinas->getbyStatus()
  );
    $this->load->view('templates/template-admin', $data);

  }
  public function datarute()
  {
    // FETCH DATA DINAS
     $d = $this->model_dinas->getbyStatus()->result();
     $data = [];
     $data["data"] = [];
     $i = 1;
     foreach ($d as $key => $value) {
       $obj =
       $data["data"][] = [$i++,$value->kelembagaan." - ".$value->wilayah,$value->latitude,$value->longitude,"",""];
     }
     header('Content-Type: application/json');
     echo json_encode($data);
  }
  public function datarutemaps()
  {
    $d = $this->model_dinas->getbyStatus()->result();
    $data = [];
    $i = 1;
    $data[] = (object)  ["lat"=>"-6.984034","lng"=>"107.632257"];
    foreach ($d as $key => $value) {
      $data[] = (object)["lat"=>$value->latitude,"lng"=>$value->longitude];
    }
    $temp = [];
    $min = [];
    $tes = null;
    foreach ($data as $key1 => $value1) {
      $origin = $value1;
      foreach ($data as $key2 => $value2) {
        if($key2 > $key1){
          // $distance = ( 6371 * acos((cos(deg2rad($origin->lat) ) * (cos(deg2rad($value2->lat))) * (cos(deg2rad($value2->lng) - deg2rad($origin->lng)) )+ ((sin(deg2rad($origin->lat)) * (sin(deg2rad($value2->lat))))))));
            $distance = ( 6371 * acos((cos(deg2rad($origin->lat)) ) * (cos(deg2rad($value2->lat))) * (cos(deg2rad($value2->lng) - deg2rad($origin->lng)) )+ ((sin(deg2rad($origin->lat))) * (sin(deg2rad($value2->lat))))) );
          if ($tes == null) {
            $tes = $distance;
          }else {
            if ($tes > $distance) {
              $tes = $distance;
            }
          }
          $temp[$key1][] = ["origin"=>$origin->lat.",".$origin->lng,"dest"=>$value2->lat.",".$value2->lng,"jarak"=>$distance];
        }
      }
      $min[] = $tes;
      // usort($temp[$key1], function($a, $b) {
      //   return $a['jarak'] <=> $b['jarak'];
      // });
    }
    foreach ($temp as $k => &$v) {
      foreach ($v as $k2 => &$v2) {
          $distance = ( 6371 * acos((cos(deg2rad(explode(",",$v2["origin"])[0])) ) * (cos(deg2rad(explode(",",$v2["dest"])[0]))) * (cos(deg2rad(explode(",",$v2["dest"])[1]) - deg2rad(explode(",",$v2["origin"])[1])) )+ ((sin(deg2rad(explode(",",$v2["origin"])[0]))) * (sin(deg2rad(explode(",",$v2["dest"])[0]))))) );
          $v2["jarak"] = $distance;
      }
      usort($v, function($a, $b) {
        return $a['jarak'] <=> $b['jarak'];
      });
    }
    // $temp = $temp[0];
    // foreach ($temp as $key => &$value) {
    //   foreach ($value as $ey => &$alue) {
    //     unset($temp[$key][$ey]["origin"]);
    //     unset($temp[$key][$ey]["dest"]);
    //   }
    //
    // }
    // $num = function($no = 1,$string="I"){
    //   $temp = [];
    //   for ($n=0; $n < $no ; $n++) {
    //     $temp[$n] = $string;
    //   }
    //   return implode("",$temp);
    // };
    // $as = [];
    // foreach ($temp as $key => $value) {
    //   $a = [];
    //   foreach ($value as $ky => $vlue) {
    //     $a[$num(($ky+1),"O")] = $vlue["jarak"];
    //   }
    //   $as[$num(($key+1),"I")] = $a;
    // }
    // $ax = $temp[0];
    // usort($ax, function($a, $b) {
    //   return $a['jarak'] <=> $b['jarak'];
    // });
    // $temp = [$ax];
    // // $temp = array(
    // //   'A' => array('B' => 9, 'D' => 14, 'F' => 7),
    // //   'B' => array('A' => 9, 'C' => 11, 'D' => 2, 'F' => 10),
    // //   'C' => array('B' => 11, 'E' => 6, 'F' => 15),
    // //   'D' => array('A' => 14, 'B' => 2, 'E' => 9),
    // //   'E' => array('C' => 6, 'D' => 9),
    // //   'F' => array('A' => 7, 'B' => 10, 'C' => 15),
    // //   'G' => array()
    // // );
    // $algorithm = new \Fisharebest\Algorithm\Dijkstra($as);
    // $path = $algorithm->shortestPaths("III", "II");

    header('Content-Type: application/json');
    echo json_encode($min);
  }
  private function jarak($origin,$dest)
  {
    // $data  = $this->curl->get("https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=-6.913198,107.609009&destinations=-6.913522,107.633659&key=AIzaSyD1cM44pjtWnEej7CgCeCVtYx5D70ImTdQ");
    $data  = $this->curl->get("https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=".$origin."&destinations=".$dest."&key=AIzaSyD1cM44pjtWnEej7CgCeCVtYx5D70ImTdQ");
    $data = json_decode($data->body);
    $jarak = $data->rows[0]->elements[0]->distance->text;
    $jarak = (double) (explode(" ",$jarak))[0];
    return $jarak;
    // header('Content-Type: application/json');
    // echo json_encode($jarak);
  }
}
