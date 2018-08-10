<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&key=AIzaSyCXx-VS9x3x47zG9IBFgvdqUSs0WOL972k">
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
                            <th>Latitude</th>
                            <th>Longitude</th>
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
                                        <td><?php echo $dinas->kelembagaan;?></td>
                                        <td><?php echo $dinas->alamat;?></td>
                                        <td><?php echo $dinas->latitude;?></td>
                                        <td><?php echo $dinas->longitude;?></td>
                                        <td>
                                            <button class="btn-info btn btn-sm" id="viewmarkerdinas" data-iddatadinas=<?php echo $dinas->id_dinas?>><span class="glyphicon glyphicon-eye-open"></span></button>
                                            <button class="btn-danger btn btn-sm" id="hapusmarkerdinas" data-iddatadinas=<?php $dinas->id_dinas?>><span class="glyphicon glyphicon-eye-close"></span></button>
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
.on('click','#simpandaftarkoordinatdinas',simpandaftarkoordinatdinas)
.on('click','#hapusmarkerdinas',hapusmarkerdinas)
.on('click','#viewmarkerdinas',viewmarkerdinas);

$(document).ready(function() {
var table = $('#DataTable').DataTable( {
    responsive: true,
    "lengthMenu": [ 5, 10, 25, 50, 75, 100 ]
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
    function addMarker(nama,location) {
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            title : nama
        });
        markers.push(marker);
    }

    google.maps.event.addDomListener(window, 'load', initialize);

    function simpandaftarkoordinatdinas(e){
        e.preventDefault();
        var datakoordinat = {'id_dinas':$('#id_dinas').val(),'latitude':$('#latitude').val(),'longitude':$('#longitude').val()};
        console.log(datakoordinat);
        $.ajax({
            url : '<?php echo site_url("admin/koordinatdinas/create") ?>',
            dataType : 'json',
            data : datakoordinat,
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    $('#daftarkoordinatdinas').load('<?php echo current_url()."/ #daftarkoordinatdinas > *" ?>');
                    alert(data.msg);
                    clearmap(e);
                }else{
                    alert(data.msg);
                }
            }
        })
    }
    function hapusmarkerdinas(e){
        e.preventDefault();
        var id = $(this).data('iddatadinas');
        var datamarker = {'id_dinas':id};
        console.log(datamarker);
        clearmap(e);

        // $.ajax({
        //     url : '<?php echo site_url("admin/koordinatdinas/hapusmarkerdinas") ?>',
        //     data : datakoordinat,
        //     dataType : 'json',
        //     type : 'POST',
        //     success : function(data,status){
        //         if (data.status!='error') {
        //             alert(data.msg);
        //             $('#daftarkoordinatdinas').load('<?php echo current_url()."/ #daftarkoordinatdinas > *" ?>');
        //         }else{
        //             alert(data.msg);
        //         }
        //     }
        // })
    }
    function viewmarkerdinas(){
        var id = $(this).data('iddatadinas');
        var datamarker = {'id_dinas':id};
        console.log(datamarker);
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
                        console.log(k,v);
                        addMarker((v['id_dinas']),myLatLng);
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
