<div class="container">
  <div class="container">

              <div class="panel panel-default">
                  <div class="panel-heading"><span class="glyphicon glyphicon-th-list">
                  </span> Hitung Jarak
                  </div>
                  <div class="panel-body" style="min-height:400px">
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
                              if ($rutedinas->num_rows()!=null) {
                                  $no = 1;
                                  foreach ($rutedinas->result() as $dinas) {
                                      ?>
                                      <tr>
                                          <td><?php echo $no;?></td>
                                          <td><?php echo $dinas->id_dinas;?></td>
                                          <td><?php echo $dinas->latitude;?></td>
                                          <td><?php echo $dinas->longitude;?></td>
                                          <td><?php
                                        $center_lat = -6.983354;
                                        $center_lng = 107.632154;
                                        $distance =( 6371 * acos((cos(deg2rad($center_lat)) ) * (cos(deg2rad($dinas->latitude))) * (cos(deg2rad($dinas->longitude) - deg2rad($center_lng)) )+ ((sin(deg2rad($center_lat))) * (sin(deg2rad($dinas->latitude))))) );
                                        echo $distance;
                                          ?></td>
                                      </tr>
                                      <?php
                                      $no++;

                                  }
                              }
                              ?>
                          </tbody>
                      </table>
                  </div>
              </div>
      </div>
  </div>
</div>
