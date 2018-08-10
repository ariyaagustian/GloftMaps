<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&key=AIzaSyCXx-VS9x3x47zG9IBFgvdqUSs0WOL972k">
</script>


<div class="container">
    <div class="row">
        
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-globe"></span> Peta</div>
                <div class="panel-body" style="height:500px;" id="map-canvas">
            </div>
        </div>
        <!-- <div class="col-md-4 col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-list"></span> Daftar Koordinat</div>
                <div class="panel-body" style="min-height:300px;">
                    <form action="#">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" class="form-control" name="latitude" id="latitude">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="longitude">Longitude</label>
                                    <input type="text" class="form-control" name="longitude" id="longitude">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="datadinas">Data dinas</label>
                            <?php if ($itemdinas->num_rows()!=null) {
                                echo '<select name="id_dinas" id="id_dinas" class="form-control">';
                                foreach ($itemdinas->result() as $datadinas) {
                                    echo "<option value='".$datadinas->id_dinas."'>".$datadinas->kelembagaan." ".$datadinas->wilayah."</option>";
                                }
                                echo '</select>';
                            }else{
                                echo anchor('admin/dinas', '<span class="glyphicon glyphicon-plus"></span> Tambah Data dinas', 'class="btn btn-info form-control"');
                            } ?>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info btn-sm" id="simpandaftarkoordinatdinas"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                            <button class="btn btn-info btn-sm" id="clearmap"><span class="glyphicon glyphicon-globe"></span> ClearMap</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
        
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-th-list">
                    </span> Daftar Koordinat marker Data dinas
                </div>
                <div class="panel-body" style="min-height:400px">
                <div class="table-responsive">
                    <table id="DataTable" class="table table-bordered " style="width:100%">
                        <th>No</th>
                        <th>Data dinas</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Action</th>
                        <tbody id="daftarkoordinatdinas">
                            <?php
                            if ($itemdinas->num_rows()!=null) {
                                $no = 1;
                                foreach ($itemdinas->result() as $dinas) {
                                    echo "<tr>";
                                    echo "<td>";
                                    echo $no++;
                                    echo "</td>";
                                    echo "<td>";
                                    echo $dinas->kelembagaan;
                                    echo "</td>";
                                    echo "<td>";
                                    foreach ($itemdinas->result() as $koordinat) {
                                        if ($koordinat->id_dinas==$dinas->id_dinas) {
                                            echo $koordinat->latitude."</br>";
                                        }
                                    }
                                    echo "</td>";
                                    echo "<td>";
                                    foreach ($itemdinas->result() as $koordinat) {
                                        if ($koordinat->id_dinas==$dinas->id_dinas) {
                                            echo $koordinat->longitude."</br>";
                                        }
                                    }
                                    echo "</td>";
                                    echo "<td>";
                                    echo '<button class="btn-info btn btn-sm" id="viewmarkerdinas" data-iddatadinas="'.$dinas->id_dinas.'"><span class="glyphicon-globe glyphicon"></span> View marker</button> ';
                                    echo '<button class="btn-danger btn btn-sm" id="hapusmarkerdinas" data-iddatadinas="'.$dinas->id_dinas.'"><span class="glyphicon-remove glyphicon"></span></button>';
                                    echo "</td>";
                                    echo "</tr>";
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

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

<!--script google map-->

<script>
$(document).on('click','#clearmap',clearmap)
.on('click','#simpandaftarkoordinatdinas',simpandaftarkoordinatdinas)
.on('click','#hapusmarkerdinas',hapusmarkerdinas)
.on('click','#viewmarkerdinas',viewmarkerdinas);
    var map;
    var markers = [];

    function initialize() {
        var mapOptions = {
        zoom: 17,
        // Center di kantor
        center: new google.maps.LatLng(-6.984034, 107.632257)
        };

        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        // Add a listener for the click event
        google.maps.event.addListener(map, 'rightclick', addLatLng);
        google.maps.event.addListener(map, "rightclick", function(event) {
          var lat = event.latLng.lat();
          var lng = event.latLng.lng();
          $('#latitude').val(lat);
          $('#longitude').val(lng);
          //alert(lat +" dan "+lng);
        });
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
        var datakoordinat = {'id_koordinatdinas':$(this).data('id_koordinatdinas')};
        $.ajax({
            url : '<?php echo site_url("admin/koordinatdinas/delete") ?>',
            data : datakoordinat,
            dataType : 'json',
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    alert(data.msg);
                    $('#daftarkoordinatdinas').load('<?php echo current_url()."/ #daftarkoordinatdinas > *" ?>');
                    clearmap(e);
                }else{
                    alert(data.msg);
                }
            }
        })
    }
    function viewmarkerdinas(e){
        e.preventDefault();
        var datakoordinat = {'id_dinas':$(this).data('iddatadinas')};
        $.ajax({
            url : '<?php echo site_url("admin/koordinatdinas/view") ?>',
            data : datakoordinat,
            dataType : 'json',
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    clearmap(e);
                    //load marker
                    $.each(data.msg,function(m,n){
                        var myLatLng = {lat: parseFloat(n["latitude"]), lng: parseFloat(n["longitude"])};
                        console.log(m,n);
                        $.each(data.datadinas,function(k,v){
                            addMarker(v['namadinas'],myLatLng);
                        })
                        return false;
                    })
                    //end load marker
                }else{
                    alert(data.msg);
                }
            }
        })
    }
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
</script>
<!--end script google map-->