<div class="container">
  <div class="container">

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
                            <!-- <?php
                            $center_lat_temp = -6.983354;
                            $center_lng_temp = 107.632154;
                            if ($rutedinas->num_rows()!=null) {
                                $no = 1;
                                $distanceArray = array();

                                foreach ($rutedinas->result() as $dinas) {
                                  $center_lat = $center_lat_temp;
                                  $center_lng = $center_lng_temp;
                                  $distance = ( 6371 * acos((cos(deg2rad($center_lat)) ) * (cos(deg2rad($dinas->latitude))) * (cos(deg2rad($dinas->longitude) - deg2rad($center_lng)) )+ ((sin(deg2rad($center_lat))) * (sin(deg2rad($dinas->latitude))))) );
                                  // echo $no."-".$distance."<br>";
                                  array_push($distanceArray, $distance);

                                  $no++;
                                }

                                 $jarak_min = min($distanceArray);
                                 $lokasi_min = array_search($jarak_min,$distanceArray);
                                 echo $lokasi_min." - ".$jarak_min;
                                 unset($distanceArray[$lokasi_min]);
                                 print_r($distanceArray);
                            }
                            ?> -->
                          </tbody>
                      </table>
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
</script>
