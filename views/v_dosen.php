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
                            <h1 class="m-0 text-dark">Data Dosen</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dosen</li>
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
                        <section class="col-lg-7 connectedSortable">
                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-user mr-1"></i>
                                        List Dosen
                                    </h3>

                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="table-responsive">
                                                    <table id="dosen_table" class="table table-bordered table-striped dataTable data" role="grid" aria-describedby="example1_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th tabindex="0" rowspan="1" colspan="1" style="width: 74px;">NIK</th>
                                                                <th tabindex="0" rowspan="1" colspan="1" style="width: 84px;">Nama Dosen</th>
                                                                <th tabindex="0" rowspan="1" colspan="1" style="width: 40px;">Jenis Kelamin</th>
                                                                <th tabindex="0" rowspan="1" colspan="1" style="width: 70px;">Konsentrasi</th>
                                                                <th tabindex="0" rowspan="1" colspan="1" style="width: 70px;" hidden>Status</th>

                                                                <th tabindex="0" rowspan="1" colspan="1" style="width: 50px;">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="dosen_data">


                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->


                        </section>
                        <!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-5 connectedSortable">

                            <!-- Map card -->
                            <form>
                                <div class="card bg-gradient-warning">
                                    <div class="card-header border-0">
                                        <h3 class="card-title">
                                            <i class="fas fa-map-marker-alt mr-1"></i>
                                            Tambah Dosen
                                        </h3>
                                        <!-- card tools -->

                                    </div>
                                    <div class="card-body">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">NIK</span>
                                            </div>
                                            <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Nama Dosen</span>
                                            </div>
                                            <input type="text" class="form-control" name="nama_dosen" id="nama_dosen" placeholder="Nama Dosen">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" type="">Jenis Kelamin</span>
                                            </div>
                                            <select class="custom-select" id="jenis_kelamin_dosen" name="jenis_kelamin_dosen">
                                                <option selected hidden>Jenis Kelamin</option>
                                                <option value="Laki - Laki">Laki - Laki</option>
                                                <option value="Perempuan">Perempuan</option>

                                            </select>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" type="">Konsentrasi</span>
                                            </div>
                                            <select class="custom-select" id="konsentrasii" name="konsentrasii">


                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" type="">Status</span>
                                            </div>
                                            <select class="custom-select" id="statuss" name="statuss">
                                                <option selected hidden>Status</option>
                                                <option value="Ketua Prodi">Ketua Prodi</option>
                                                <option value="Pembimbing Akademik">Pembimbing Akademik</option>
                                                <option value="Dosen">Dosen</option>

                                            </select>
                                        </div>



                                    </div>
                                    <!-- /.card-body-->
                                    <div class="card-footer">
                                        <button id="tambah_dosen" name="tambah_dosen" type="button" class="btn btn-primary btn-block">Tambah Dosen</button>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </form>

                        </section>
                        <!-- right col -->
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2020 <a href="<?php echo base_url() ?>">STMIK Kharisma</a>.</strong>
            All rights reserved.

        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php $this->load->view("_partials/script.php") ?>
    <?php $this->load->view("_partials/modal.php") ?>

</body>

</html>