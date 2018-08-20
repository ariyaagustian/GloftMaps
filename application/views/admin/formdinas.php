<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> Daftar Dinas</h3>
              </div>
              <div class="panel-body">
                  <table id="DataTable" class="table table-bordered " style="width:100%">
                    <thead>
                      <th>No</th>
                      <th>Nama Kelembagaan</th>
                      <th>Alamat</th>
                      <th>Telepon</th>
                      <th>Fax</th>
                      <th>Action</th>
                    </thead>
                      <tbody id="daftardinas">
                          <?php
                          $no = 1;
                          foreach ($itemdinas->result() as $dinas) {
                              ?>
                              <tr>
                                  <td><?php echo $no;?></td>
                                  <td><?php echo $dinas->kelembagaan." - ".$dinas->wilayah;?></td>
                                  <td><?php echo $dinas->alamat;?></td>
                                  <td><?php echo $dinas->telepon;?></td>
                                  <td><?php echo $dinas->fax;?></td>
                                  <td>
                                      <button type="button" class="btn btn-sm btn-info" data-iddinas="<?php echo $dinas->id_dinas;?>" name="editdinas<?php echo $dinas->id_dinas;?>" id="editdinas" ><span class="glyphicon glyphicon-edit"></span></button>
                                      <button type="button" class="btn btn-sm btn-danger" data-iddinas="<?php echo $dinas->id_dinas;?>" name="deletedinas<?php echo $dinas->id_dinas;?>" id="deletedinas" ><span class="glyphicon glyphicon-trash"></span></button>
                                  </td>
                              </tr>
                              <?php
                              $no++;
                          }
                           ?>
                      </tbody>
                  </table>
              </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-4">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Form Dinas</h3>
              </div>
              <div class="panel-body">
                  <form action="#">
                      <div class="form-group">
                        <label for="kelembagaan">Nama Kelembagaan</label>
                        <input type="text" class="form-control" id="kelembagaan" placeholder="">
                        <input type="hidden" name="id_dinas" id="id_dinas" value="">
                      </div>
                      <div class="form-group">
                        <label for="provinsi">Provinsi/Kota/Kabupaten</label>
                        <select class="form-control" name="wilayah" id="wilayah">
                          <option value="Kota Bandung">Kota Bandung</option>
                          <option value="Kota Cimahi">Kota Cimahi</option>
                          <option value="Kabupaten Bandung Barat">Kabupaten Bandung Barat</option>
                          <option value="Provinsi Jawa Barat">Provinsi Jawa Barat</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="pimpinan">Pimpinan</label>
                        <input type="text" class="form-control" id="pimpinan" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input name="alamat" class="form-control" id="alamat"> </input>
                      </div>
                      <div class="form-group">
                          <div class="panel panel-primary">
                            <div class="panel-body" style="height:300px;" id="map-canvas">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="koordinat">Koordinat</label>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" id="latitude" placeholder="latitude" disabled="true">
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" id="longitude" placeholder="longitude" disabled="true">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <input type="text" class="form-control" id="jarak" placeholder="jarak" disabled="true">
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control" id="telepon" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="fax">Fax</label>
                        <input type="text" class="form-control" id="fax" placeholder="">
                      </div>
                      <div class="form-group">
                        <button type="button" name="simpandinas" id="simpandinas" class="btn btn-primary">Simpan</button>
                        <button type="button" name="resetdinas"  id="resetdinas" class="btn btn-warning">Reset</button>
                        <button type="button" name="updatedinas" id="updatedinas" class="btn btn-info" disabled="true">Update</button>
                      </div>
                  </form>
              </div>
            </div>
        </div>
    </div>
</div>


<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyCXx-VS9x3x47zG9IBFgvdqUSs0WOL972k"></script>

<script>
    $(document).on('click','#simpandinas',simpandinas)
    .on('click','#resetdinas',resetdinas)
    .on('click','#updatedinas',updatedinas)
    .on('click','#editdinas',editdinas)
    .on('click','#deletedinas',deletedinas);


    var table;
    $(document).ready(function() {
    table = $('#DataTable').DataTable( {
        responsive: true,
        "lengthMenu": [ 5, 10, 25, 50, 75, 100 ],
    } );


    new $.fn.dataTable.FixedHeader( table );
    } );



   /*MAPS*/

   function initMap() {

  var mapOptions = {
        zoom: 17,
        // Center di kantor
        center: new google.maps.LatLng(-6.984034, 107.632257)
        };

        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var input = /** @type {!HTMLInputElement} */ (
    document.getElementById('alamat'));

  //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  var autocomplete = new google.maps.places.Autocomplete(input);

  var marker = new google.maps.Marker({
    map: map,
    anchorPoint: new google.maps.Point(0, -29)
  });

  autocomplete.addListener('place_changed', function() {

    marker.setVisible(false);
    var place = autocomplete.getPlace();
    var alamat = place.formatted_address;
    var lat = place.geometry.location.lat();
    var long = place.geometry.location.lng();
    $('#latitude').val(lat);
    $('#longitude').val(long);
    if (!place.geometry) {
      window.alert("Autocomplete's returned place contains no geometry");
      return;
    }

    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17); // Why 17? Because it looks good.
    }

    marker.setPosition(place.geometry.location);
    marker.setVisible(true);
    $("#alamat").val(alamat);

    var center_lat = -6.983354;
    var center_lng = 107.632154;

    var JariJari = 6371;
    var x1 = center_lat - lat;
    var dLat = x1 * Math.PI / 180;
    var x2 = center_lng - long;
    var dLon = x2 * Math.PI / 180;

    var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
        Math.cos(lat*Math.PI/180) * Math.cos(center_lat*Math.PI/180) *
        Math.sin(dLon/2) * Math.sin(dLon/2);

    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
    var jarak = JariJari * c;

    $("#jarak").val(jarak);

    // <?php
    // $lat = $_POST['latitude'];
    // $long = $_POST['longitude'];
    // $center_lat = -6.983354;
    // $center_lng = 107.632154;
    // $distance =( 6371 * acos((cos(deg2rad($center_lat)) ) * (cos(deg2rad($lat))) * (cos(deg2rad($long) - deg2rad($center_lng)) )+ ((sin(deg2rad($center_lat))) * (sin(deg2rad($lat))))) );
    //
    // ?>

  });

}

initMap();

    function simpandinas() {//simpan jalan
        var datadinas = {
          'kelembagaan':$('#kelembagaan').val(),
          'wilayah':$('#wilayah').val(),
          'pimpinan':$('#pimpinan').val(),
          'alamat':$('#alamat').val(),
          'latitude':$('#latitude').val(),
          'longitude':$('#longitude').val(),
          'jarak':$('#jarak').val(),
          'telepon':$('#telepon').val(),
          'fax':$('#fax').val()
        };

        $.ajax({
            url : '<?php echo site_url("admin/dinas/create");?>',
            data : datadinas,
            dataType : 'json',
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    $('#daftardinas').load('<?php echo current_url()." #daftardinas > *";?>');
                    resetdinas();//form langsung dikosongkan pas selesai input data
                }else{
                    alert(data.msg);
                }
            },
            error : function(x,t,m){
                alert(x.responseText);
            }
        })
    }
    function resetdinas() {//reset form jalan
        $('#kelembagaan').val('');
        $('#wilayah').val('');
        $('#pimpinan').val('');
        $('#alamat').val('');
        $('#latitude').val('');
        $('#longitude').val('');
        $('#jarak').val('');
        $('#telepon').val('');
        $('#fax').val('');
        $('#simpandinas').attr('disabled',false);
        $('#updatedinas').attr('disabled',true);
    }

        function editdinas() {//edit jalan
        var id = $(this).data('iddinas');
        var datadinas = {'id_dinas':id};
        $('input[name=editdinas'+id+']').attr('disabled',true);//biar ga di klik dua kali, maka di disabled
        $.ajax({
            url : '<?php echo site_url("admin/dinas/edit");?>',
            data : datadinas,
            dataType : 'json',
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    $('input[name=editdinas'+id+']').attr('disabled',false);//disabled di set false, karena transaksi berhasil
                    $('#simpandinas').attr('disabled',true);
                    $('#updatedinas').attr('disabled',false);
                    $.each(data.msg,function(k,v){
                        $('#id_dinas').val(v['id_dinas']);
                        $('#kelembagaan').val(v['kelembagaan']);
                        $('#wilayah').val(v['wilayah']);
                        $('#pimpinan').val(v['pimpinan']);
                        $('#alamat').val(v['alamat']);
                        $('#latitude').val(v['latitude']);
                        $('#longitude').val(v['longitude']);
                        $('#jarak').val(v['jarak']);
                        $('#telepon').val(v['telepon']);
                        $('#fax').val(v['fax']);
                    })
                }else{
                    alert(data.msg);
                    $('input[name=editdinas'+id+']').attr('disabled',false);//disabled di set false, karena transaksi berhasil
                }
            },
            error : function(x,t,m){
                alert(x.responseText);
                $('input[name=editdinas'+id+']').attr('disabled',false);//disabled di set false, karena transaksi berhasil
            }
        })
    }


    function updatedinas() {//update jalan
        var datadinas = {
        'kelembagaan':$('#kelembagaan').val(),
        'wilayah':$('#wilayah').val(),
        'pimpinan':$('#pimpinan').val(),
        'alamat':$('#alamat').val(),
        'latitude':$('#latitude').val(),
        'longitude':$('#longitude').val(),
        'jarak':$('#jarak').val(),
        'telepon':$('#telepon').val(),
        'fax':$('#fax').val(),
        'id_dinas':$('#id_dinas').val()
      };
        $.ajax({
            url : '<?php echo site_url("admin/dinas/update");?>',
            data : datadinas,
            dataType : 'json',
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    // $('#daftardinas').load('<?php echo current_url()." #daftardinas > *";?>');
                    resetdinas();//form langsung dikosongkan pas selesai input data
                    table.draw();
                }else{
                    alert(data.msg);
                }
            },
            error : function(x,t,m){
                alert(x.responseText);
            }
        })
    }


    function deletedinas() {//delete jalan
        if (confirm("Anda yakin akan menghapus data Dinas ini?")) {
            var id = $(this).data('iddinas');
            var datadinas = {'id_dinas':id};
            $.ajax({
                url : '<?php echo site_url("admin/dinas/delete");?>',
                data : datadinas,
                dataType : 'json',
                type : 'POST',
                success : function(data,status){
                    if (data.status!='error') {
                        $('#daftardinas').load('<?php echo current_url()." #daftardinas > *";?>');
                        resetdinas();//form langsung dikosongkan pas selesai input data
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
