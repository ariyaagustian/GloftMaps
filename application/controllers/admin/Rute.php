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
    'rutedinas' => $this->model_dinas->getbyStatus(0)
  );
    $this->load->view('templates/template-admin', $data);

  }
  public function datarute()
  {
    // FETCH DATA DINAS
     $d = $this->model_dinas->getbyStatus(0)->result();
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

  function gantistatusdinas(){
        // if (!$this->input->is_ajax_request()) {
        //     show_404();
        // }else{
            $id = $this->input->post('id_dinas');
            if ($id!=null){
                $status = 'success';
                $msg = $this->model_dinas->donestatusdinas($id);
                $datadinas = $this->model_dinas->read($this->input->post('id_dinas'))->result();
            }else{
                $status = 'error';
                $msg = 'data tidak ditemukan';
                $datadinas = null;
            }
            $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg,'datadinas'=>$datadinas)));
        // }
    }


  public function datarutemaps()
  {
    $d = $this->model_dinas->getbyStatus(0)->result();
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
  public function generateRute()
  {
    $d = $this->model_dinas->getbyStatus(0)->result();
    if ($this->input->post('generate_rute')!=null) {
      $jmlRute = $this->input->post('generate_rute');
    }else{
      $jmlRute = 0;
    }
    $dis = function($latitude1, $longitude1, $latitude2, $longitude2) {
        $earth_radius = 6371;
        $dLat = deg2rad($latitude2 - $latitude1);
        $dLon = deg2rad($longitude2 - $longitude1);
        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * asin(sqrt($a));
        $d = $earth_radius * $c;
        return $d;
    };
    $latLng = [];
    $latLng[] = ["id"=>0,"lat"=>"-6.984034","lng"=>"107.632257"];
    foreach ($d as $key => $value) {
      $latLng[] = ["id"=>$value->id_dinas,"lat"=>$value->latitude,"lng"=>$value->longitude];
    }
    $complete = [];
    $i = 0;
    foreach ($latLng as $key => &$value) {
        if ($key < $jmlRute) {
          $di = $value;
        $completed = [];
        $s = 1;
        foreach ($latLng as $key1 => $value1) {
          if ($key1 > $key) {
            $jarak = $dis($di["lat"],$di["lng"],$value1["lat"],$value1["lng"]);
            $completed[] = ["key"=>$key1,"id_origin"=>$value["id"],"id_dest"=>$value1["id"],"origin_lat"=>$di["lat"],"origin_lng"=>$di["lng"],"dest_lat"=>$value1["lat"],"dest_lng"=>$value1["lng"],"jarak"=>$jarak];
          }elseif ($key1 == $key) {
            if (!isset($latLng[($key1+1)])) {
              $s = 0;
            }
          }
        }
        $swap =  function (&$array,$swap_a,$swap_b){
           list($array[$swap_a],$array[$swap_b]) = array($array[$swap_b],$array[$swap_a]);
        };
        if ($s == 1) {
          usort($completed, function($a, $b) {
            return $a['jarak'] <=> $b['jarak'];
          });
          $min = $completed[0];
          $keys = $min["key"];
          if (isset($latLng[$key+1])) {
            $temp = $latLng[($key+1)];
            $latLng[$keys] = $temp;
            $latLng[($key+1)] = ["id"=>$min["id_dest"],"lat"=>$min["dest_lat"],"lng"=>$min["dest_lng"]];
          }
          $complete[] = $completed[0];
        }
        }
        // if (isset($completed[0]["id_dest"])) {
          // $latLng[$key+1] = ["id"=>$completed[0]["id_dest"],"lat"=>$completed[0]["dest_lat"],"lng"=>$completed[0]["dest_lng"]];
        // }

    }
    //header('Content-Type: application/json');
    //$dinas = [];
    if ($jmlRute > 0) {
    foreach ($complete as $key => $value) {
      $dinas = $this->model_dinas->getbyiddinas($value["id_dest"], 0)->row();
      $dinasTable[] = $this->model_dinas->getidstatus($value["id_dest"], 0)->row();
    }
    }else{
      $dinas = null;
    }
    $data = array('content' => 'admin/rute',
    'data' => $complete,
    'dinas' => $dinas,
    'dinasTable' => $dinasTable );
    $this->load->view('templates/template-admin', $data);
  }
}
