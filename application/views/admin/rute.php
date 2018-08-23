<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCXx-VS9x3x47zG9IBFgvdqUSs0WOL972k">
</script>

<div class="container">
  <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><span class="glyphicon glyphicon-globe"></span> Peta</div>
            <div class="panel-body" style="height:500px;" id="map-canvas">
        </div>
        </div>
                  <div class="panel panel-default">
                  <div class="panel-heading"><span class="glyphicon glyphicon-th-list">
                  </span> Hitung Jarak
                  </div>
                  <div class="panel-body" style="min-height:400px">
                    <form class="form-inline" action="" method="post">
                      <div class="form-group mb-2 ">
                        <input type="text" class="form-control" name="generate_rute" id="generate_rute" placeholder="Jumlah Rute">
                      </div>
                      <div class="form-group mb-2">
                        <button type="button" class="btn btn-danger" name="button_generate_rute">Generate</button>
                      </div>
                    </form>
                    <br>

                      <table id="DataTable" class="table table-bordered " style="width:100%">
                          <thead>
                              <th>No</th>
                              <th>Data dinas</th>
                              <th>Latitude</th>
                              <th>Longitude</th>
                              <th>Jarak</th>
                              <th></th>
                          </thead>
                          <tbody id="rutedinas">
                            <?php
                            $center_lat_temp = -6.983354;
                            $center_lng_temp = 107.632154;
                            $objArr = array();
                            $minObj = new stdClass();
                            if ($rutedinas->num_rows()!=null) {
                                $no = 1;
                                $distanceArray = array();
                                $min = -1;
                                foreach ($rutedinas->result() as $key => $dinas) {
                                  $obj = new stdClass();
                                  $center_lat = $center_lat_temp;
                                  $center_lng = $center_lng_temp;
                                  $distance = ( 6371 * acos((cos(deg2rad($center_lat)) ) * (cos(deg2rad($dinas->latitude))) * (cos(deg2rad($dinas->longitude) - deg2rad($center_lng)) )+ ((sin(deg2rad($center_lat))) * (sin(deg2rad($dinas->latitude))))) );
                                  // echo $no."-".$distance."<br>";
                                  if ($key<1) {
                                    $min = $distance;
                                    $minObj->id = $dinas->id_dinas;
                                    $minObj->distance = $distance;
                                    $minObj->latitude = $dinas->latitude;
                                    $minObj->longitude = $dinas->longitude;
                                  }else{
                                    if ($distance<$minObj->distance) {
                                      $min = $distance;
                                      $minObj->id = $dinas->id_dinas;
                                      $minObj->distance = $distance;
                                      $minObj->latitude = $dinas->latitude;
                                      $minObj->longitude = $dinas->longitude;
                                    }
                                  }
                                  $obj->id = $dinas->id_dinas;
                                  $obj->distance = $distance;
                                  $objArr[$key] = $obj;
                                  array_push($distanceArray, $distance);

                                  $no++;
                                }
                                $min = 0;
                                // print_r($objArr);
                                // $objMin = new stdClass();
                                // foreach($objArr as $i => $o){
                                //   if ($i<1) {
                                //     $objMin->id = $o->id;
                                //     $objMin->distance = $o->distance;
                                //   }
                                //   else{
                                //     if ($o->distance < $objMin->distance) {
                                //       $objMin->id = $o->id;
                                //       $objMin->distance = $o->distance;
                                //     }
                                //   }
                                //   // echo $i.':'.$o->distance.'<br>';
                                // }
                                print_r($minObj);
                                 // $jarak_min = min($distanceArray);
                                 // $lokasi_min = array_search($jarak_min,$distanceArray);
                                 // echo $lokasi_min." - ".$jarak_min;
                                 // unset($distanceArray[$lokasi_min]);
                                 // print_r($distanceArray);
                            }
                            ?>
                          </tbody>
                      </table>
                  </div>
              </div>


      </div>
    </div>
  </div>
</div>

<script>

$(document).ready(function() {
var table = $('#DataTable').DataTable( {
    responsive: true,
    "lengthMenu": [ 5, 10, 25, 50, 75, 100 ],
    "order": [["3","asc"]]
} );

new $.fn.dataTable.FixedHeader( table );
} );

var map;
var markers = [];

function initialize() {
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    var mapOptions = {
    zoom: 12,
    // Center di kantor
    center: new google.maps.LatLng(-6.984034, 107.632257)

    };

    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    var image = 'https://gloftech.co.id/assets/favicon.ico';
    var label = 'Gloftech';
    var markerKantor = new google.maps.Marker({
        position: new google.maps.LatLng(-6.984034, 107.632257),
        map: map,
        icon: image
    });
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>
