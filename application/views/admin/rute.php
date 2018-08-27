<script src="//maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyD1cM44pjtWnEej7CgCeCVtYx5D70ImTdQ">
</script>
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.25/gmaps.min.js" charset="utf-8"></script> -->

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
                    <form class="form-inline" action="<?php echo site_url('/admin/rute/generateRute'); ?>" method="post">
                      <div class="form-group mb-2 ">
                        <input type="text" class="form-control" name="generate_rute" id="generate_rute" placeholder="Jumlah Rute">
                      </div>
                      <div class="form-group mb-2">
                        <button type="submit" class="btn btn-danger" name="button_generate_rute">Generate</button>
                      </div>
                    </form>
                    <br>
                      <table id="rutedinas" class="table table-bordered " style="width:100%">
                          <thead>
                              <th>No</th>
                              <th>Data dinas</th>
                              <th>Alamat</th>
                              <th>Status</th>
                              <th>Action</th>
                          </thead>
                          <tbody>
                            <?php
                            if (isset($dinasTable)) { ?>
                             <?php foreach ($dinasTable as $key => $value) { ?>
                              <tr>
                                <td><?php echo $key+1; ?></td>
                                <td><?php echo $value->kelembagaan." - ".$value->wilayah; ?></td>
                                <td><?php echo $value->alamat; ?></td>
                                <td><span class="label label-danger">
                                  <?php
                                    if ($dinas->status == 0) {
                                      echo "Belum Dikunjungi";
                                    } else {
                                      echo "Sudah Dikunjungi";
                                    }
                                  ?>
                                </span></td>

                                  <td>
                                      <button class="btn-success btn btn-sm" id="gantistatusdinas" data-iddatadinas=<?php echo $value->id_dinas?>><span class="glyphicon glyphicon-cog"></span> Done </button>
                                  </td>

                              </tr>
                            <?php }
                            } ?>
                          </tbody>
                      </table>
                  </div>
              </div>


      </div>
    </div>
  </div>
</div>



<script>
$(document).on('click','#gantistatusdinas',gantistatusdinas);


var table;
$(document).ready(function() {
table = $('#rutedinas').DataTable( {
    responsive: true,
    "lengthMenu": [ 10, 20, 30, 40, 50, 100 ]
  } );

} );

function gantistatusdinas() {//delete jalan
    if (confirm("Anda yakin sudah mengunjungi Dinas ini?")) {
        var id = $(this).data('iddatadinas');
        var datadinas = {'id_dinas':id};
        $.ajax({
            url : '<?php echo site_url("admin/rute/gantistatusdinas");?>',
            data : datadinas,
            dataType : 'json',
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    // $('#daftarkoordinatdinas').load('<?php echo current_url()." #daftarkoordinatdinas > *";?>');
                    alert("Dinas Telah Dikunjungi");
                    location.reload();
                }else{
                    alert(data.msg);
                }
            },

            error : function(x,t,m){
                alert(x.responseText);
            }
        })
    }
}

$(document).ready(function(){
  var dinas = '<?php echo isset($dinasTable) ? json_encode($dinasTable) : 0 ?>';
  if (dinas!=null) {
      dinas =JSON.parse(dinas);
  }


    var directionsService = new google.maps.DirectionsService();
        var directionsDisplay = new google.maps.DirectionsRenderer();
        var infowindow = new google.maps.InfoWindow({

              maxWidth: 500
        });
        var request = { travelMode: google.maps.TravelMode.DRIVING };
        // var mapOptions = {
        // zoom: 12,
        // // Center di kantor
        // center: new google.maps.LatLng(-6.984034, 107.632257)

        // };

       //var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
      var map = new google.maps.Map(document.getElementById('map-canvas'), {
        zoom: 12,
        center: new google.maps.LatLng(-6.984034, 107.632257),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
      directionsDisplay.setMap(map);
        var image = 'https://gloftech.co.id/assets/favicon.ico';
        var label = 'Gloftech';
        var markerKantor = new google.maps.Marker({
            position: new google.maps.LatLng(-6.984034, 107.632257),
            map: map,
            icon: image
        });


    var marker, i;

    var x = dinas.length+1;
    for (i = 0; i < x; i++) {
      if (i==0) {
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(-6.984034, 107.632257),
        });
      }else{
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(dinas[i-1]['latitude'], dinas[i-1]['longitude']),
      });
      }

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent("<b>"+dinas[i-1]['kelembagaan']+", "+dinas[i-1]['wilayah']+"</b> <br><br>"+dinas[i-1]['alamat']);
          infowindow.open(map, marker);
        }
      })(marker, i));

      if (i == 0){
        request.origin = marker.getPosition();
      } else if (i == x - 1){
        request.destination = marker.getPosition();
      }
      else {
        if (!request.waypoints) request.waypoints = [];
      request.waypoints.push({
        location: marker.getPosition(),
        stopover: true
      });
      }
    }

    directionsService.route(request, function(result, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(result);
      }
    });
});




</script>
