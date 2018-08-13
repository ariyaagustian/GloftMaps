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
                                        $latitude1 = -6.983354;
                                        $longitude1 = 107.632154;
                                        $dataJson = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=".$latitude1.",".$longitude1."&destinations=".$dinas->latitude.",".$dinas->longitude."&key=%20AIzaSyCWpwVwu1hO6TJW1H8x_zlhrLfbSbQ2r3o");
                                        $data = json_decode($dataJson,true);
                                        $nilaiJarak = $data['rows'][0]['elements'][0]['distance']['text'];
                                        echo floatval($nilaiJarak);
                                        ?></td>
                                        <td>
                                          <?php
                                            if ($dinas->status == 0) {
                                              echo "Belum Dikunjungi";
                                            }
                                          ?>
                                        </td>
                                        <td>
                                            <button class="btn-info btn btn-sm" id="viewmarkerdinas" data-iddatadinas=<?php echo $dinas->id_dinas?>><span class="glyphicon glyphicon-eye-open"></span> Check</button>
                                            <button class="btn-danger btn btn-sm" id="hapusmarkerdinas" data-iddatadinas=<?php echo $dinas->id_dinas?>><span class="glyphicon glyphicon-eye-close"></span> Uncheck</button>
                                            <button class="btn-success btn btn-sm" id="gantistatusdinas" data-iddatadinas=<?php echo $dinas->id_dinas?>><span class="glyphicon glyphicon-cog"></span> Done</button>
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
$(document).on('click','#clearmap',clearmap)
.on('click','#hapusmarkerdinas',hapusmarkerdinas)
.on('click','#viewmarkerdinas',viewmarkerdinas);

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
        var mapOptions = {
        zoom: 12,
        // Center di kantor
        center: new google.maps.LatLng(-6.984034, 107.632257)

        };

        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        var label = 'Gloftech';
        var markerKantor = new google.maps.Marker({
            position: new google.maps.LatLng(-6.984034, 107.632257),
            map: map,
            label: label
        });
        // Add a listener for the click event
        // google.maps.event.addListener(map, 'rightclick', addLatLng);
        // google.maps.event.addListener(map, "rightclick", function(event) {
        //   var lat = event.latLng.lat();
        //   var lng = event.latLng.lng();
        //   $('#latitude').val(lat);
        //   $('#longitude').val(lng);
        //   //alert(lat +" dan "+lng);
        // });
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

</script>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<!--end script google map-->
