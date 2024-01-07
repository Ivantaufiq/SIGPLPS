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
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <form action="/dashboard/editdata/{{ $data->id }}}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="col-8 mb-3">
                    <label for="namasekolah" class="form-label">Nama Sekolah</label>
                    <input type="text" name="nama_sekolah" required class="form-control @error ('nama_sekolah') is-invalid @enderror" id="namasekolah" value="{{ $data->nama_sekolah }}">
                  </div>
                  <div class="col-8 mb-3">
                    <label for="npsn" class="form-label">Nomor Pokok Sekolah Nasional (NPSN)</label>
                    <input type="number" name="npsn" required class="form-control @error ('npsn') is-invalid @enderror" id="npsn" value="{{ $data->npsn }}">
                  </div>
                  <div class="col-8 mb-3">
                    <label for="akreditasi" class="form-label">Akreditasi </label>
                    <input type="text" name="akreditasi" class="form-control @error ('akreditasi') is-invalid @enderror" id="akreditasi" value="{{ $data->akreditasi }}">
                  </div>
                  <div class="col-8 mb-3">
                    <label for="jenis_sekolah" class="form-label">Jenis Sekolah</label>
                    <select class="form-select col-8" name="jenis_sekolah" @error ('jenis_sekolah') is-invalid @enderror aria-label="Default select example">
                      <option selected value="" disabled>{{ $data->jenis_sekolah }}</option>
                      <option value="SMA">SMA</option>
                      <option value="SMK">SMK</option>
                    </select>
                  </div>
                  <div class="col-8 mb-3">
                    <label for="status" class="form-label">Status Sekolah</label>
                    <select class="form-select col-8 @error ('status') is-invalid @enderror"" name="status" aria-label="Default select example">
                      <option selected value="" disabled>{{ $data->status }}</option>
                      <option value="Negeri">Negeri</option>
                      <option value="Swasta">Swasta</option>
                    </select>
                  </div>
                  <div class="col-8 mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea required class="form-control @error ('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="3" >{{ $data->alamat }}</textarea>
                  </div>
                  <div class="col-8 mb-3">
                    <label for="kecamatan" class="form-label">Kecamatan</label>
                    <select class="form-select col-8 @error ('kecamatan') is-invalid @enderror" name="kecamatan" aria-label="Default select example">
                      <option selected value="" disabled>{{ $data->kecamatan }}</option>
                      <option value="Pontianak Barat">Pontianak Barat</option>
                      <option value="Pontianak Kota">Pontianak Kota</option>
                      <option value="Pontianak Selatan">Pontianak Selatan</option>
                      <option value="Pontianak Tenggara">Pontianak Tenggara</option>
                      <option value="Pontianak Timur">Pontianak Timur</option>
                      <option value="Pontianak Utara">Pontianak Utara</option>
                    </select>
                  </div>
                  <div class="col-8 mb-3">
                    <label for="kelurahan" class="form-label">Kelurahan</label>
                    <select class="form-select col-8 @error ('kelurahan') is-invalid @enderror" name="kelurahan" aria-label="Default select example">
                      <option selected value="" disabled>{{ $data->kelurahan }}</option>
                      <option value="Pal Lima">Pal Lima</option>
                      <option value="Sungai Beliung">Sungai Beliung</option>
                      <option value="Sungai Jawi Dalam">Sungai Jawi Dalam</option>
                      <option value="Sungai Jawi Luar">Sungai Jawi Luar</option>
                      <option value="Daratsekip">Darat Sekip</option>
                      <option value="Mariana">Mariana</option>
                      <option value="Sungai Bangkong">Sungai Bangkong</option>
                      <option value="Sungai Jawi">Sungai Jawi</option>
                      <option value="Tengah">Tengah</option>
                      <option value="Akcaya">Akcaya</option>
                      <option value="Benua Melayu Darat">Benua Melayu Darat</option>
                      <option value="Benua Melayu Laut">Benua Melayu Laut</option>
                      <option value="Kotabaru">Kota Baru</option>
                      <option value="Parittokaya">Parit Tokaya</option>
                      <option value="Bangka Belitung Darat">Bangka Belitung Darat</option>
                      <option value="Bangka Belitung Laut">Bangka Belitung Laut</option>
                      <option value="Bansir Darat">Bansir Darat</option>
                      <option value="Bansir Laut">Bansir Laut</option>
                      <option value="Banjar Serasan">Banjar Serasan</option>
                      <option value="Dalam Bugis">Dalam Bugis</option>
                      <option value="Parit Mayor">Parit Mayor</option>
                      <option value="Saigon">Saigon</option>
                      <option value="Tambelan Sampit">Tambelan Sampit</option>
                      <option value="Tanjung Hulu">Tanjung Hulu</option>
                      <option value="Tanjung Hilir">Tanjung Hilir</option>
                      <option value="Batulayang">Batulayang</option>
                      <option value="Siantan Hilir">Siantan Hilir</option>
                      <option value="Siantan Hulu">Siantan Hulu</option>
                      <option value="Siantan Tengah">Siantan Tengah</option>
                    </select>
                  </div>
                  <div class="col-8 mb-3">
                    <label for="jumlahsiswa" class="form-label">Jumlah Siswa</label>
                    <input type="number" name="jumlah_siswa" required class="form-control @error ('jumlah_siswa') is-invalid @enderror" id="jumlahsiswa" value="{{ $data->jumlah_siswa }}">
                  </div>
                  <div class="col-8 mb-3">
                    <label for="jumlahguru" class="form-label">Jumlah Guru</label>
                    <input type="number" name="jumlah_guru" required class="form-control @error ('jumlah_guru') is-invalid @enderror" id="jumlahguru" value="{{ $data->jumlah_guru }}">
                  </div>
                  <div class="col-8 mb-3">
                    <label for="jumlahkelas" class="form-label">Jumlah Kelas</label>
                    <input type="number" name="jumlah_kelas" required class="form-control @error ('jumlah_kelas') is-invalid @enderror" id="jumlahkelas" value="{{ $data->jumlah_kelas }}">
                  </div>
                  <div class="col-8 mb-3">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <textarea required class="form-control @error ('jurusan') is-invalid @enderror" name="jurusan" id="jurusan" rows="3" >{{ $data->jurusan }}</textarea>
                  </div>
                  <div class="col-8 mb-3">
                    <label class="form-label">Koordinat Sekolah</label>
                    <br>
                    <label for="latitude" class="form-label">Latitude</label>
                    <input type="text" name="latitude" required class="form-control @error ('latitude') is-invalid @enderror" id="latitude" value="{{ $data->latitude }}" readonly>
                  </div>
                  <div class="col-8 mb-3">
                    <label for="longitude" class="form-label">Longitude</label>
                    <input type="text" name="longitude" required class="form-control @error ('longitude') is-invalid @enderror" id="longitude" value="{{ $data->longitude }}" readonly>
                  </div>

                  <div id="map" style="height:400px"></div>
              
                  <button type="submit" class="btn btn-primary mt-3">Simpan</button>
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
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script>           
  var map = L.map('map').setView([{{ $data->latitude }}, {{ $data->longitude }}], 18);
  var osm = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
  });

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
  }).addTo(map);

  var latInput = document.querySelector("[name=latitude]");
  var lngInput = document.querySelector("[name=longitude]");

  var curLocation = [{{ $data->latitude }}, {{ $data->longitude }}];
  map.attributionControl.setPrefix(false);

  var markerIcon = L.icon({
    iconUrl: '/marker48.png',
    iconSize: [56, 56],
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
    // 'Open Street Map': osm,
    'Terrain': googleTerrain,
    // 'Satelite': googleSat,
    'Hybrid': googleHybrid
  }
  L.control.layers(baseMaps).addTo(map);

  //scale
  L.control.scale({ position: 'bottomright' }).addTo(map);
</script>
</body>

</html>
