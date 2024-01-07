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
          <a href="/dashboard/tambahdata_View" type="button" class="btn btn-success mb-2"><i class="bi bi-plus-lg"></i> Tambah Data</a>
          
          <a href="{{ route('cetakpdf') }}" type="button" class="btn btn-danger mb-2"><i class="bi bi-filetype-pdf"></i> Cetak PDF</a>

          <a href="/dashboard/cetakexcel" type="button" class="btn btn-success mb-2"><i class="bi bi-filetype-xlsx"></i> Cetak Excel</a>
          
          {{-- Search --}}
      <form class="row g-3" method="GET">
          <div class="col-auto">
            <select class="form-select form-inline" name="jenis" aria-label="Default select example">
              <option selected value="" disabled>Pilih Berdasarkan Jenis</option>
              <option value="SMA" >SMA</option>
              <option value="SMK">SMK</option>
            </select>
          </div>
          <div class="col-auto">
            <select class="form-select form-inline" name="status" aria-label="Default select example">
              <option selected value="" disabled>Pilih Berdasarkan Status</option>
              <option value="Negeri">Negeri</option>
              <option value="Swasta">Swasta</option>
            </select>
            
          </div>
          <div class="col-auto">
            <input type="search" id="search" name="search" class="form-control" placeholder="Cari Nama Sekolah ...">
        </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Search</button>
          </div>
      </form>
        <div class="table-responsive">
          <table class="table text-center">
            <thead>
              <tr>
                <th scope="col" style="vertical-align: middle">No</th>
                <th scope="col" style="vertical-align: middle">Nama Sekolah </th>
                <th scope="col" style="vertical-align: middle">Jenis Sekolah </th>
                <th scope="col" style="vertical-align: middle">Status </th>
                <th scope="col" style="vertical-align: middle">NPSN</th>
                <th scope="col" style="vertical-align: middle">Alamat</th>
                <th scope="col" style="vertical-align: middle">Aksi</th>
              </tr>
            </thead>
            <tbody>
              
              @php
                    $no = 1;
                @endphp

                  @foreach ($data as $index => $row)
                  <tr>
                      <td>{{ $index + $data->firstItem() }}</td>
                      <td>{{ $row->nama_sekolah }}</td>
                      <td>{{ $row->jenis_sekolah }}</td>
                      <td>{{ $row->status }}</td>
                      <td>{{ $row->npsn }}</td>
                      <td>{{ $row->alamat }}</td>
                      <td>
                        <a href="/dashboard/editdata_View/{{ $row->id }}" class="btn btn-warning mb-1"><i class="bi bi-pencil-square"></i> Edit</a>
                        <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama_sekolah }}"><i class="bi bi-trash3"></i> Delete</a>
                      </td>
                  </tr>
                  @endforeach
                  
                  
                  
                  
                </tbody>
          </table>
        </div>
          <p class="text-center">{{ $data->links()  }}</p>
          
         
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
<script>
  $('.delete').click( function(){
      var profilid = $(this).attr('data-id')
      var nama = $(this).attr('data-nama')
      swal({
              title: "Hapus Data",
              text: "Kamu akan menghapus data profil sekolah "+nama+" ",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
              if (willDelete) {
                  window.location = "/dashboard/delete/"+profilid+""
                  swal("Data berhasil dihapus", {
                      icon: "success",
                  });
              } else {
                  swal("Data tidak jadi dihapus");
              }
          });
  })
</script>

<script>
   @if (Session::has('success'))
      toastr.success("{{ Session::get('success') }}")
   @endif
</script>
</html>
