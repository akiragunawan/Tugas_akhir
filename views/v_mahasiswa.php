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
                            <h1 class="m-0 text-dark">Data Mahasiswa</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Mahasiswa</li>
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
                                        List Mahasiswa
                                    </h3>

                                </div><!-- /.card-header -->
                                <div class="card-body">


                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table id="mahasiswa_table" class="table table-bordered table-striped dataTable data" role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 74px;">NIK</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 84px;">Nama Mahasiswa</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 40px;">Jenis Kelamin</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 70px;">Program Studi</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 41px;">Kompetisi</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 30px;">Pembimbing Akademik</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 29px;">Tanggal Masuk</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 50px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="mahasiswa_data">


                                                    </tbody>

                                                </table>
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
                                <div class="card bg-gradient-primary">
                                    <div class="card-header border-0">
                                        <h3 class="card-title">
                                            <i class="fas fa-map-marker-alt mr-1"></i>
                                            Tambah Mahasiswa
                                        </h3>
                                        <!-- card tools -->

                                    </div>
                                    <div class="card-body">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">NIM</span>
                                            </div>
                                            <input type="text" class="form-control" name="nim" id="nim" placeholder="NIM">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Nama Mahasiswa</span>
                                            </div>
                                            <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa" placeholder="Nama Mahasiswa">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" type="">Jenis Kelamin</span>
                                            </div>
                                            <select class="custom-select" id="jenis_kelamin" name="jenis_kelamin">
                                                <option selected hidden>Jenis Kelamin</option>
                                                <option value="Laki - Laki">Laki - Laki</option>
                                                <option value="Perempuan">Perempuan</option>

                                            </select>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" type="">Program Studi</span>
                                            </div>
                                            <select class="custom-select" id="program_studi" name="program_studi">


                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" type="">Kompetisi</span>
                                            </div>
                                            <select class="custom-select" id="kompetisi" name="kompetisi">


                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" type="">Pembimbing Akademik</span>
                                            </div>
                                            <select class="custom-select" id="pa" name="pa">


                                            </select>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Tanggal Masuk</span>
                                            </div>
                                            <input type="date" class="form-control" name="tgl" id="tgl">
                                        </div>
                                    </div>
                                    <!-- /.card-body-->
                                    <div class="card-footer">
                                        <button id="tambah_mahasiswa" name="tambah_mahasiswa" type="button" class="btn btn-success btn-block">Tambah Mahasiswa</button>
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
            <strong>Copyright &copy; 2020 <a href="<?php echo base_url() ?>">STMIK KHARISMA</a>.</strong>
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