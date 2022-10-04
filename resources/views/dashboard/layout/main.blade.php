    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $data }}</h3>
                <p class="font-weight-bold">Total SMA-SMK</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ url('dashboard/profil') }}" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $datasma }}</h3>

                <p class="font-weight-bold">Total SMA</p>
              </div>
              <div class="icon">
                <i class="ion ion-university"></i>
              </div>
              <a href="{{ url('/dashboard/profil?jenis=SMA&search=') }}" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $datasmk }}</h3>

                <p class="font-weight-bold">Total SMK</p>
              </div>
              <div class="icon">
                <i class="ion ion-university"></i>
              </div>
              <a href="{{ url('/dashboard/profil?jenis=SMK&search=') }}" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3> {{ $datasman }}</h3>
                <p class="font-weight-bold">SMA Negeri</p>
              </div>
              <div class="icon">
                <i class="ion ion-university"></i>
              </div>
              <a href="{{ url('/dashboard/profil?jenis=SMA&status=Negeri&search=') }}" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $datasmas }}</h3>

                <p class="font-weight-bold">SMA Swasta</p>
              </div>
              <div class="icon">
                <i class="ion ion-university"></i>
              </div>
              <a href="{{ url('/dashboard/profil?jenis=SMA&status=Swasta&search=') }}" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $datasmkn }}</h3>
                <p class="font-weight-bold">SMK Negeri</p>
              </div>
              <div class="icon">
                <i class="ion ion-university"></i>
              </div>
              <a href="{{ url('/dashboard/profil?jenis=SMK&status=Negeri&search=') }}" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $datasmks }}</h3>

                <p class="font-weight-bold">SMK Swasta</p>
              </div>
              <div class="icon">
                <i class="ion ion-university"></i>
              </div>
              <a href="{{ url('/dashboard/profil?jenis=SMK&status=Swasta&search=') }}" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>