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
          <a href="/dashboard/tambahdata" type="button" class="btn btn-success mb-2">Tambah Data</a>
          

          {{-- Search --}}
          <div class="row g-3 align-items-center mb-2">
            <div class="col-auto">
              <form action="/dashboard/profil" method="GET">
                <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
              </form>
            </div>

            <div class="col-auto">
              <a href="/dashboard/exportpdf" type="button" class="btn btn-danger mb-2">Export PDF</a>
            </div>

            <div class="col-auto">
              <a href="/dashboard/exportexcel" type="button" class="btn btn-success mb-2">Export Excel</a>
            </div>

          </div>
    
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Sekolah </th>
                <th scope="col">NPSN</th>
                <th scope="col">Alamat</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>

              @php
                  $no = 1;
              @endphp

                @foreach ($data as $index => $row)
                <tr>
                    <th scope="row">{{ $index + $data->firstItem() }}</th>
                    <td>{{ $row->nama_sekolah }}</td>
                    <td>{{ $row->npsn }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td>
                      <a href="/dashboard/tampildata/{{ $row->id }}" class="btn btn-warning">Edit</a>
                      <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama_sekolah }}">Delete</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
          </table>
          {{ $data->links () }}
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
