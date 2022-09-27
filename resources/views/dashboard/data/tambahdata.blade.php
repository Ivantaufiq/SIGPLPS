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
                    <input type="text" name="nama_sekolah" class="form-control" id="namasekolah">
                  </div>
                  <div class="mb-3">
                    <label for="npsn" class="form-label">Nomor Pokok Sekolah Nasional (NPSN)</label>
                    <input type="number" name="npsn" class="form-control" id="npsn">
                  </div>
                  <div class="mb-3">
                    <label for="status" class="form-label">Status Sekolah</label>
                    <select class="form-select col-5" name="status" aria-label="Default select example">
                      <option selected>Pilih</option>
                      <option value="Negeri">Negeri</option>
                      <option value="Swasta">Swasta</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="kecamatan" class="form-label">Kecamatan</label>
                    <select class="form-select col-5" name="kecamatan" aria-label="Default select example">
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
                    <select class="form-select col-5" name="kelurahan" aria-label="Default select example">
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
                    <input type="number" name="jumlah_siswa" class="form-control" id="jumlahsiswa" >
                  </div>
                  <div class="mb-3">
                    <label for="jumlahguru" class="form-label">Jumlah Guru</label>
                    <input type="number" name="jumlah_guru" class="form-control" id="jumlahguru" >
                  </div>
                  <div class="mb-3">
                    <label for="jumlahkelas" class="form-label">Jumlah Kelas</label>
                    <input type="number" name="jumlah_kelas" class="form-control" id="jumlahkelas" >
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Koordinat Sekolah</label>
                    <br>
                    <label for="latitude" class="form-label">Latitude</label>
                    <input type="text" name="latitude" class="form-control" id="latitude" >
                  </div>
                  <div class="mb-3">
                    <label for="longitude" class="form-label">Longitude</label>
                    <input type="text" name="longitude" class="form-control" id="longitude" >
                  </div>
                  
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="/dashboard/profil" class="btn btn-secondary">Batal</a>
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
</body>
</html>
