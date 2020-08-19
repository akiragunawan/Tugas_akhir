<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="./manifest.json">
  <meta name="theme-color" content="#00897B" />
  <meta name="Description" content="Put your description here.">
  <link rel="apple-touch-icon" href="./assets/logo.png">
    <?php $this->load->view("_partials/css.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php $this->load->view("_partials/navbar.php") ?>

        <?php $this->load->view("_partials/sidebar.php") ?>



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Lihat Judul</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href=<?php echo base_url() ?>>Home</a></li>
                                <li class="breadcrumb-item active">Lihat Judul</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-12 connectedSortable">
                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-cog mr-1"></i>
                                        List Judul
                                    </h3>
                                    <div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button> </div>
                                </div><!-- /.card-header -->
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table id="judul_tables" class="table table-bordered responsive table-striped dataTable data" role="grid" aria-describedby="example1_info" style="width:100%">
                                                    <thead>
                                                        <tr role="row">
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 10px;" hidden>id</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 10px;">NIM</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 84px;">Nama Mahasiswa</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 35px;">Program Studi</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 35px;">Konsentrasi</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 41px;">No Hp</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 20px;">SKS yang di Lulusi</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 29px;">IPK</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 60px;">Judul</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 30px;" hidden>dns_path</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 30px;" hidden>laporan_path</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 29px;">Tanggal</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 30px;">Dosen yang Diajukan</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 50px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="list_juduls">


                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div><!-- /.card-body -->
                    
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-cog mr-1"></i>
                                List Judul Ditolak
                            </h3>
                            <div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button> </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table id="judul_tolak_table" class="table table-bordered table-striped dataTable data bg-danger" role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 20px;">NIM</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 84px;">Nama Mahasiswa</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 60px;">Judul</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 29px;">Tanggal Eksekusi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="list_judul_tolak">


                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-cog mr-1"></i>
                                List Judul Diterima
                            </h3>
                            <div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button> </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table id="judul_Terima_table" class="table table-bordered table-striped dataTable data bg-success" role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 20px;">NIM</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 84px;">Nama Mahasiswa</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 60px;">Judul</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 29px;">Tanggal Eksekusi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="list_judul_terima">


                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-cog mr-1"></i>
                                List Semua Judul
                            </h3>
                            <div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button> </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table id="list_semua_judul" class="table table-bordered table-striped dataTable data bg-warning" role="grid" aria-describedby="example1_info" style="width:100%">
                                            <thead>
                                                <tr role="row">
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 10px;" hidden>id</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 20px;">NIM</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 84px;">Nama Mahasiswa</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 35px;">Program Studi</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 35px;">Konsentrasi</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 41px;">No Hp</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 20px;">SKS yang di Lulusi</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 29px;">IPK</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 60px;">Judul</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 30px;" hidden>dns_path</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 30px;" hidden>laporan_path</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 29px;">Tanggal</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 30px;">Status</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 30px;">Dosen Pembimbing 1</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 30px;">Dosen Pembimbing 2</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 30px;">Tanggal Eksekusi</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 50px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="semua_judul">


                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->






            </section>
            
                    </div>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->

            <!-- right col -->
                </div>
        <!-- /.row (main row) -->
    <!-- /.container-fluid -->
    </section>
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2020 <a href="<?php echo base_url() ?>">STIMIK KHARISMA</a>.</strong>
        All rights reserved.

    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    
    <!-- ./wrapper -->
    <?php $this->load->view("_partials/script.php") ?>
    <?php $this->load->view("_partials/modal.php") ?>

</body>

</html>