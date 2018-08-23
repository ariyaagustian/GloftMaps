<script src="//maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCXx-VS9x3x47zG9IBFgvdqUSs0WOL972k">
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.25/gmaps.min.js" charset="utf-8"></script>

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

                      <table id="rutedinas" class="table table-bordered " style="width:100%">
                          <thead>
                              <th>No</th>
                              <th>Data dinas</th>
                              <th>Latitude</th>
                              <th>Longitude</th>
                              <th>Jarak</th>
                              <th></th>
                          </thead>
                          <tbody>

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
  maps = null ;
  maps = new GMaps({
        div: '#map-canvas',
        lat: -6.984034,
        lng: 107.632257
  });
  maps.addMarker({
    lat: -6.984034,
    lng: 107.632257,
    title: 'Kantor',
    icon : "https://gloftech.co.id/assets/favicon.ico"
  });
  maps.setZoom(12);
  table_main = $("#rutedinas").DataTable({
    ajax:"<?= base_url("index.php/admin/rute/datarute") ?>"
  })

});
</script>
