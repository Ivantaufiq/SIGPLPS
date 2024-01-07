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
                {{-- <li class="nav-item">
                  <a href="/dashboard/tambahdata" class="nav-link">
                    <i class="nav-icon fa-solid fa-keyboard"></i>
                      <p>
                          Tambah Data Sekolah
                      </p>
                  </a>
              </li> --}}

              <li class="nav-item">
                <a href="{{ url('dashboard/profil') }}" class="nav-link">
                  <i class="nav-icon fa-solid fa-school"></i>
                    <p>
                        Kelola Data Sekolah
                    </p>
                </a>
            </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
