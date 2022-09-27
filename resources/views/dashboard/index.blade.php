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
