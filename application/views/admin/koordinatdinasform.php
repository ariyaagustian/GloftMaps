<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCXx-VS9x3x47zG9IBFgvdqUSs0WOL972k">
</script>


<div class="container">
    <div class="row">

            <!-- <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-globe"></span> Peta</div>
                <div class="panel-body" style="height:500px;" id="map-canvas">
            </div>
        </div> -->

            <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-th-list">
                    </span> Daftar Koordinat marker Data dinas
                </div>
                <div class="panel-body" style="min-height:400px">
                    <table id="DataTable" class="table table-bordered " style="width:100%">
                        <thead>
                            <th>No</th>
                            <th>Data dinas</th>
                            <th>Alamat</th>
                            <th>Jarak (KM)</th>
                            <th>Status</th>
                            <th></th>
                        </thead>
                        <tbody id="daftarkoordinatdinas">
                            <?php
                            if ($itemdinas->num_rows()!=null) {
                                $no = 1;
                                foreach ($itemdinas->result() as $dinas) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <td><?php echo $dinas->kelembagaan." - ".$dinas->wilayah;?></td>
                                        <td><?php echo $dinas->alamat;?></td>
                                        <td><?php
                                        $center_lat = -6.983354;
                                        $center_lng = 107.632154;
                                        $distance = ( 6371 * acos((cos(deg2rad($center_lat)) ) * (cos(deg2rad($dinas->latitude))) * (cos(deg2rad($dinas->longitude) - deg2rad($center_lng)) )+ ((sin(deg2rad($center_lat))) * (sin(deg2rad($dinas->latitude))))) );
                                        echo $distance;
                                        ?></td>
                                        <td><span class="label label-success">
                                          <?php
                                            if ($dinas->status == 0) {
                                              echo "Belum Dikunjungi";
                                            } else {
                                              echo "Sudah Dikunjungi";
                                            }
                                          ?>
                                        </span>
                                        </td>
                                        <td>
                                            <button class="btn-danger btn btn-sm" id="gantistatusdinas" data-iddatadinas=<?php echo $dinas->id_dinas?>><span class="glyphicon glyphicon-cog"></span> Batal</button>
                                        </td>
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



<!--script google map-->

<script>

var table;
$(document).ready(function() {
table = $('#DataTable').DataTable( {
    responsive: true,
    "lengthMenu": [ 5, 10, 25, 50, 75, 100 ]
  } );

} );

$(document).on('click','#clearmap',clearmap)
.on('click','#hapusmarkerdinas',hapusmarkerdinas)
.on('click','#gantistatusdinas',gantistatusdinas)
.on('click','#viewmarkerdinas',viewmarkerdinas);

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

    /**
     * Handles click events on a map, and adds a new point to the marker.
     * @param {google.maps.MouseEvent} event
     */
    var marker;
    var markers = [];
    function addLatLng(event) {
      if (marker) {
        marker.setPosition(event.latLng);
      } else {
        marker = new google.maps.Marker({
          position: event.latLng,
          title: 'GloftMaps',
          map: map
          });
      }

    }
    //membersihkan peta dari marker
    function clearmap(e){
        e.preventDefault();
        $('#latitude').val('');
        $('#longitude').val('');
        setMapOnAll(null);
    }
    //buat hapus marker
    function setMapOnAll(map) {
      for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
      }
      markers = [];
    }
    //end buat hapus marker
    // Menampilkan marker lokasi dinas
    function addMarker(id,location,ket) {
      var infowindow = new google.maps.InfoWindow({
          content: ket,
          maxWidth: 200
        });

        var marker = new google.maps.Marker({
            position: location,
            map: map
        });

        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });

        marker.id = id;
        markers.push(marker);
    }

    google.maps.event.addDomListener(window, 'load', initialize);

    function hapusmarkerdinas(){
        var id = $(this).data('iddatadinas');
        for (var i = 0; i < markers.length; i++) {
          if (markers[i].id == id) {
            markers[i].setMap(null);
            //Hapus DAri Array
             markers.splice(i, 1);
          }
        }

    }
    function viewmarkerdinas(){
        var id = $(this).data('iddatadinas');
        var datamarker = {'id_dinas':id};
        $.ajax({
            url : '<?php echo site_url("admin/koordinatdinas/viewmarkerdinas") ?>',
            data : datamarker,
            dataType : 'json',
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    //load marker
                    $.each(data.msg,function(k,v){

                        var myLatLng = {lat: parseFloat(v['latitude']), lng: parseFloat(v['longitude'])};
                        addMarker((v['id_dinas']),myLatLng,"<b>"+v['kelembagaan']+", "+v['wilayah']+"</b> <br><br>"+v['alamat'] );
                    })
                    //end load marker
                }else{
                    alert(data.msg);
                }
            }
        })

    }


    function gantistatusdinas() {//delete jalan
        if (confirm("Anda yakin akan Membatalkan Dinas ini?")) {
            var id = $(this).data('iddatadinas');
            var datadinas = {'id_dinas':id};
            $.ajax({
                url : '<?php echo site_url("admin/koordinatdinas/gantistatusdinas");?>',
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

</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>


<!--end script google map-->
