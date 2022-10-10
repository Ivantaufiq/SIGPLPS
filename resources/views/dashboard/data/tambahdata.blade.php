<!DOCTYPE html>
<html lang="en">

@include('dashboard.layout.header')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  @include('dashboard.layout.navbar')
  <!-- Main Sidebar Container -->

  @include('dashboard.layout.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
  @include('dashboard.layout.breadcrumb')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="col-8">
            <div class="card">
              <div class="card-body">
                <form action="/dashboard/insertdata" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="namasekolah" class="form-label">Nama Sekolah</label>
                    <input type="text" name="nama_sekolah" class="form-control @error ('nama_sekolah') is-invalid @enderror" id="namasekolah" placeholder="Contoh : SMA Negeri 1" >
                  </div>
                  <div class="mb-3">
                    <label for="jenis_sekolah" class="form-label">Jenis Sekolah</label>
                    <select class="form-select col-5 @error ('jenis_sekolah') is-invalid @enderror" name="jenis_sekolah" aria-label="Default select example">
                      <option selected>Pilih</option>
                      <option value="SMA">SMA</option>
                      <option value="SMK">SMK</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="status" class="form-label">Status Sekolah</label>
                    <select class="form-select col-5" name="status" aria-label="Default select example">
                      <option selected>Pilih</option>
                      <option value="Negeri">Negeri</option>
                      <option value="Swasta">Swasta</option>
                    </select>
                  <div class="mb-3">
                    <label for="npsn" class="form-label">Nomor Pokok Sekolah Nasional (NPSN)</label>
                    <input type="number" name="npsn" class="form-control @error ('npsn') is-invalid @enderror" id="npsn">
                  </div>
                  </div>
                  <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control @error ('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="3"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="kecamatan" class="form-label">Kecamatan</label>
                    <select class="form-select col-5 @error ('kecamatan') is-invalid @enderror" name="kecamatan" aria-label="Default select example">
                      <option selected>Pilih Kecamatan</option>
                      <option value="Pontianak Barat">Pontianak Barat</option>
                      <option value="Pontianak Kota">Pontianak Kota</option>
                      <option value="Pontianak Selatan">Pontianak Selatan</option>
                      <option value="Pontianak Tenggara">Pontianak Tenggara</option>
                      <option value="Pontianak Timur">Pontianak Timur</option>
                      <option value="Pontianak Utara">Pontianak Utara</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="kelurahan" class="form-label">Kelurahan</label>
                    <select class="form-select col-5 @error ('kelurahan') is-invalid @enderror" name="kelurahan" aria-label="Default select example">
                      <option selected>Pilih Kelurahan</option>
                      <option value="Pal Lima">Pal Lima</option>
                      <option value="Sungai Beliung">Sungai Beliung</option>
                      <option value="Sungaijawi Dalam">Sungaijawi Dalam</option>
                      <option value="Sungaijawi Luar">Sungaijawi Luar</option>
                      <option value="Daratsekip">Daratsekip</option>
                      <option value="Mariana">Mariana</option>
                      <option value="Sungaibangkong">Sungaibangkong</option>
                      <option value="Sungaijawi">Sungaijawi</option>
                      <option value="Tengah">Tengah</option>
                      <option value="Akcaya">Akcaya</option>
                      <option value="Benuamelayu Darat">Benuamelayu Darat</option>
                      <option value="Benuamelayu Laut">Benuamelayu Laut</option>
                      <option value="Kotabaru">Kotabaru</option>
                      <option value="Parittokaya">Parittokaya</option>
                      <option value="Bangka Belitung Darat">Bangka Belitung Darat</option>
                      <option value="2Bangka Belitung Laut4">Bangka Belitung Laut</option>
                      <option value="Bansir Darat">Bansir Darat</option>
                      <option value="Bansir Laut">Bansir Laut</option>
                      <option value="Banjar Serasan">Banjar Serasan</option>
                      <option value="Dalambugis">Dalambugis</option>
                      <option value="Paritmayor">Paritmayor</option>
                      <option value="Saigon">Saigon</option>
                      <option value="Tambelansampit">Tambelansampit</option>
                      <option value="Tanjunghulu">Tanjunghulu</option>
                      <option value="Tanjunghilir">Tanjunghilir</option>
                      <option value="Batulayang">Batulayang</option>
                      <option value="Siantan Hilir">Siantan Hilir</option>
                      <option value="Siantan Hulu">Siantan Hulu</option>
                      <option value="Siantan Tengah">Siantan Tengah</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="jumlahsiswa" class="form-label">Jumlah Siswa</label>
                    <input type="number" name="jumlah_siswa" class="form-control @error ('jumlah_siswa') is-invalid @enderror" id="jumlahsiswa" >
                  </div>
                  <div class="mb-3">
                    <label for="jumlahguru" class="form-label">Jumlah Guru</label>
                    <input type="number" name="jumlah_guru" class="form-control @error ('jumlah_guru') is-invalid @enderror" id="jumlahguru" >
                  </div>
                  <div class="mb-3">
                    <label for="jumlahkelas" class="form-label">Jumlah Kelas</label>
                    <input type="number" name="jumlah_kelas" class="form-control @error ('jumlah_kelas') is-invalid @enderror" id="jumlahkelas" >
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Koordinat Sekolah</label>
                    <br>
                    <label for="latitude" class="form-label">Latitude</label>
                    <input type="text" name="latitude" class="form-control @error ('latitude') is-invalid @enderror" id="latitude" >
                  </div>
                  <div class="mb-3">
                    <label for="longitude" class="form-label">Longitude</label>
                    <input type="text" name="longitude" class="form-control @error ('longitude') is-invalid @enderror" id="longitude" >
                  </div>
                  <div class="mb-1">
                    <label >Pilih Koordinat</label>
                    </div>
                  
                  <div id="map" style="height: 400px"></div>
                  <div class="coordinate"></div>

                  <button type="submit" class="btn btn-primary mt-3">Submit</button>
                  <a href="/dashboard/profil" class="btn btn-secondary mt-3">Batal</a>
                </form>
              </div>
            </div>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('dashboard.layout.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('dashboard.layout.script')
<script>           
  var map = L.map('map').setView([-0.0285867, 109.3357431], 15);
  var osm = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
  });

  var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
  });

  var googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
  });

  var latInput = document.querySelector("[name=latitude]");
  var lngInput = document.querySelector("[name=longitude]");

  var curLocation = [-0.0285867, 109.3357431];
  map.attributionControl.setPrefix(false);

  var markerIcon = L.icon({
    iconUrl: '/marker48.png',
    iconSize:     [56, 56], // size of the icon
  });


  var marker = new L.marker(curLocation, {
    draggable:'true',
    icon: markerIcon 
  });

  marker.on('dragend', function(event) {
    var position = marker.getLatLng();
    marker.setLatLng(position, {
      draggable:'true'
    }).bindPopup(position).update();
    $("#latitude").val(position.lat);
    $("#longitude").val(position.lng);
  });
  map.addLayer(marker);

  //leaflet search
  L.Control.geocoder().addTo(map);

  //leaflet layer control
  var baseMaps = {
    'Open Street Map': osm,
    'Terrain': googleTerrain,
    'Satelite': googleSat,
    'Hybrid': googleHybrid
  }
  L.control.layers(baseMaps).addTo(map);

  //scale
  L.control.scale({ position: 'bottomright' }).addTo(map);
</script>
</body>


</html>
