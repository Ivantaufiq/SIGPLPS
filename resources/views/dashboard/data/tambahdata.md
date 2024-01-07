<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

      {{-- leaflet --}}
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
      integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14="
      crossorigin=""/>
  
  {{-- searchbox --}}
  <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
</head>
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
                <form action="/dashboard/insertdata" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="col-8 mb-3">
                    <label for="namasekolah" class="form-label">Nama Sekolah</label>
                    <input type="text" name="nama_sekolah" class="form-control @error ('nama_sekolah') is-invalid @enderror" value="{{ old('nama_sekolah') }}" id="namasekolah" placeholder="Contoh : SMAN 1 | SMKN 1" >
                  </div>
                  <div class="col-8 mb-3">
                    <label for="jenis_sekolah" class="form-label">Jenis Sekolah</label>
                    <select class="form-select col-4 @error ('jenis_sekolah') is-invalid @enderror" name="jenis_sekolah" @error ('jenis_sekolah') is-invalid @enderror aria-label="Default select example">
                      <option selected value="" disabled>Pilih</option>
                      <option value="SMA" @if (old('jenis_sekolah') == 'SMA') selected="selected" @endif>SMA</option>
                      <option value="SMK" @if (old('jenis_sekolah') == 'SMK') selected="selected" @endif>SMK</option>
                    </select>
                  </div>
                  <div class="col-8 mb-3">
                    <label for="status" class="form-label">Status Sekolah</label>
                    <select class="form-select col-4 @error ('status') is-invalid @enderror" name="status" aria-label="Default select example">
                      <option selected value="" disabled>Pilih</option>
                      <option value="Negeri" @if (old('status') == 'Negeri') selected="selected" @endif>Negeri</option>
                      <option value="Swasta" @if (old('status') == 'Swasta') selected="selected" @endif>Swasta</option>
                    </select>
                  </div>
                  <div class="col-8 mb-3">
                    <label for="npsn" class="form-label">Nomor Pokok Sekolah Nasional (NPSN)</label>
                    <input type="number" name="npsn" class="form-control @error ('npsn') is-invalid @enderror" value="{{ old('npsn') }}" id="npsn">
                  </div>
                  <div class="col-8 mb-3">
                    <label for="akreditasi" class="form-label">Akreditasi </label>
                    <input type="text" name="akreditasi" class="form-control @error ('akreditasi') is-invalid @enderror" value="{{ old('akreditasi') }}" id="akreditasi">
                  </div>
                  <div class="col-8 mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control @error ('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="3">{{ old('alamat') }}</textarea>
                  </div>
                  <div class="col-8 mb-3">
                    <label for="kecamatan" class="form-label">Kecamatan</label>
                    <select class="form-select col-4 @error ('kecamatan') is-invalid @enderror" name="kecamatan" aria-label="Default select example">
                      <option selected value="" disabled>Pilih Kecamatan</option>
                      <option value="Pontianak Barat" @if (old('kecamatan') == 'Pontianak Barat') selected="selected" @endif>Pontianak Barat</option>
                      <option value="Pontianak Kota" @if (old('kecamatan') == 'Pontianak Kota') selected="selected" @endif>Pontianak Kota</option>
                      <option value="Pontianak Selatan" @if (old('kecamatan') == 'Pontianak Selatan') selected="selected" @endif>Pontianak Selatan</option>
                      <option value="Pontianak Tenggara" @if (old('kecamatan') == 'Pontianak Tenggara') selected="selected" @endif>Pontianak Tenggara</option>
                      <option value="Pontianak Timur" @if (old('kecamatan') == 'Pontianak Timur') selected="selected" @endif>Pontianak Timur</option>
                      <option value="Pontianak Utara" @if (old('kecamatan') == 'Pontianak Utara') selected="selected" @endif>Pontianak Utara</option>
                    </select>
                  </div>
                  <div class="col-8 mb-3">
                    <label for="kelurahan" class="form-label">Kelurahan</label>
                    <select class="form-select col-4 @error ('kelurahan') is-invalid @enderror" name="kelurahan" aria-label="Default select example">
                      <option selected value="" disabled>Pilih Kelurahan</option>
                      <option value="Pal Lima" @if (old('kelurahan') == 'Pal Lima') selected="selected" @endif>Pal Lima</option>
                      <option value="Sungai Beliung" @if (old('kelurahan') == 'Sungai Beliung') selected="selected" @endif>Sungai Beliung</option>
                      <option value="Sungai Jawi Dalam" @if (old('kelurahan') == 'Sungai Jawi Dalam') selected="selected" @endif>Sungai Jawi Dalam</option>
                      <option value="Sungai Jawi Luar" @if (old('kelurahan') == 'Sungai Jawi Luar') selected="selected" @endif>Sungai Jawi Luar</option>
                      <option value="Daratsekip" @if (old('kelurahan') == 'Daratsekip') selected="selected" @endif>Darat Sekip</option>
                      <option value="Mariana" @if (old('kelurahan') == 'Mariana') selected="selected" @endif>Mariana</option>
                      <option value="Sungai Bangkong" @if (old('kelurahan') == 'Sungai Bangkong') selected="selected" @endif>Sungai Bangkong</option>
                      <option value="Sungai Jawi" @if (old('kelurahan') == 'Sungai Jawi') selected="selected" @endif>Sungai Jawi</option>
                      <option value="Tengah" @if (old('kelurahan') == 'Tengah') selected="selected" @endif>Tengah</option>
                      <option value="Akcaya" @if (old('kelurahan') == 'Akcaya') selected="selected" @endif>Akcaya</option>
                      <option value="Benua Melayu Darat" @if (old('kelurahan') == 'Benua Melayu Darat') selected="selected" @endif>Benua Melayu Darat</option>
                      <option value="Benua Melayu Laut" @if (old('kelurahan') == 'Benua Melayu Laut') selected="selected" @endif>Benua Melayu Laut</option>
                      <option value="Kota Baru" @if (old('kelurahan') == 'Kota Baru') selected="selected" @endif>Kota Baru</option>
                      <option value="Parit Tokaya" @if (old('kelurahan') == 'Parit Tokaya') selected="selected" @endif>Parit Tokaya</option>
                      <option value="Bangka Belitung Darat" @if (old('kelurahan') == 'Bangka Belitung Darat') selected="selected" @endif>Bangka Belitung Darat</option>
                      <option value="Bangka Belitung Laut" @if (old('kelurahan') == 'Bangka Belitung Laut') selected="selected" @endif>Bangka Belitung Laut</option>
                      <option value="Bansir Darat" @if (old('kelurahan') == 'Bansir Darat') selected="selected" @endif>Bansir Darat</option>
                      <option value="Bansir Laut" @if (old('kelurahan') == 'Bansir Laut') selected="selected" @endif>Bansir Laut</option>
                      <option value="Banjar Serasan" @if (old('kelurahan') == 'Banjar Serasan') selected="selected" @endif>Banjar Serasan</option>
                      <option value="Dalam Bugis" @if (old('kelurahan') == 'Dalam Bugis') selected="selected" @endif>Dalam Bugis</option>
                      <option value="Parit Mayor" @if (old('kelurahan') == 'Parit Mayor') selected="selected" @endif>Parit Mayor</option>
                      <option value="Saigon" @if (old('kelurahan') == 'Saigon') selected="selected" @endif>Saigon</option>
                      <option value="Tambelan Sampit" @if (old('kelurahan') == 'Tambelan Sampit') selected="selected" @endif>Tambelan Sampit</option>
                      <option value="Tanjung Hulu" @if (old('kelurahan') == 'Tanjung Hulu') selected="selected" @endif>Tanjung Hulu</option>
                      <option value="Tanjung Hilir" @if (old('kelurahan') == 'Tanjung Hilir') selected="selected" @endif>Tanjung Hilir</option>
                      <option value="Batulayang" @if (old('kelurahan') == 'Batulayang') selected="selected" @endif>Batulayang</option>
                      <option value="Siantan Hilir" @if (old('kelurahan') == 'Siantan Hilir') selected="selected" @endif>Siantan Hilir</option>
                      <option value="Siantan Hulu" @if (old('kelurahan') == 'Siantan Hulu') selected="selected" @endif>Siantan Hulu</option>
                      <option value="Siantan Tengah" @if (old('kelurahan') == 'Siantan Tengah') selected="selected" @endif>Siantan Tengah</option>
                    </select>
                  </div>
                  <div class="col-8 mb-3">
                    <label for="jumlahsiswa" class="form-label">Jumlah Siswa</label>
                    <input type="number" name="jumlah_siswa" class="form-control @error ('jumlah_siswa') is-invalid @enderror" value="{{ old('jumlah_siswa') }}" id="jumlahsiswa" >
                  </div>
                  <div class="col-8 mb-3">
                    <label for="jumlahguru" class="form-label">Jumlah Guru</label>
                    <input type="number" name="jumlah_guru" class="form-control @error ('jumlah_guru') is-invalid @enderror" value="{{ old('jumlah_guru') }}" id="jumlahguru" >
                  </div>
                  <div class="col-8 mb-3">
                    <label for="jumlahkelas" class="form-label">Jumlah Kelas</label>
                    <input type="number" name="jumlah_kelas" class="form-control @error ('jumlah_kelas') is-invalid @enderror" value="{{ old('jumlah_kelas') }}" id="jumlahkelas" >
                  </div>
                  <div class="col-8 mb-3">
                    <label class="form-label">Koordinat Sekolah</label>
                    <br>
                    <label for="latitude" class="form-label">Latitude</label>
                    <input type="text" name="latitude" class="form-control @error ('latitude') is-invalid @enderror" id="latitude" >
                  </div>
                  <div class="col-8 mb-3">
                    <label for="longitude" class="form-label">Longitude</label>
                    <input type="text" name="longitude" class="form-control @error ('longitude') is-invalid @enderror" id="longitude" >
                  </div>
                  <div class="mb-1">
                    <label >Pilih Koordinat</label>
                    </div>
                  
                  <div id="map" style="height: 400px"></div>
                  <div class="coordinate"></div>

                  <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
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
  var map = L.map('map').setView([-0.0285867, 109.3357431], 15);
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

  var stameTerrain = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/terrain/{z}/{x}/{y}{r}.{ext}');

  var latInput = document.querySelector("[name=latitude]");
  var lngInput = document.querySelector("[name=longitude]");

  var curLocation = [-0.0285867, 109.3357431];
  map.attributionControl.setPrefix(false);

  var markerIcon = L.icon({
    iconUrl: '/marker48.png',
    iconSize: [56, 56], // size of the icon
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
    // 'Stame Terrain' : stameTerrain,
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