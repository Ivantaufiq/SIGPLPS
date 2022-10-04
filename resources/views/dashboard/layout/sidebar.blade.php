<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link text-decoration-none">
        <span class="brand-text font-weight-light text-wrap">SIGPLPS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link">
                        {{-- <i class="nav-icon fas fa-th"></i> --}}
                        <i class="nav-icon fa-solid fa-gauge"></i>
                        <p>
                            Dashboard
                            
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard/tambahdata" class="nav-link">
                    <i class="nav-icon fa-solid fa-keyboard"></i>
                      <p>
                          Input Profil Sekolah
                      </p>
                  </a>
              </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        {{-- <i class="nav-icon fas fa-file"></i> --}}
                        <i class="nav-icon fa-solid fa-school"></i>
                        <p>
                            Profil Sekolah
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{ url('dashboard/profil?jenis=SMA&search=') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data SMA</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ url('dashboard/profil?jenis=SMK&search=') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data SMK</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ url('dashboard/profil') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Semua Sekolah</p>
                          </a>
                        </li>
                      </ul>
                </li>
                
    
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
