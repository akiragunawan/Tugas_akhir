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
                            <h1 class="m-0 text-dark">Pengajuan Judul</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Pengajuan Judul</li>
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
                                        Aturan Pengajuan Judul Tugas Akhir
                                    </h3>
                                    <div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button> </div>
                                </div><!-- /.card-header -->
                                <div class="card-body">

                                    <p><strong> Persyaratan: </strong><br>
                                        (a) Mahasiswa aktif pada semester yang sedang berjalan.<br>
                                        (b) Telah melulusi mata kuliah dengan jumlah minimal 110 SKS dengan IPKum. ≥ 2,75 (Tidak ada nilai E dan hanya mempunyai maksimal 1 nilai D).<br>
                                        (c) Telah melulusi/menempuh mata kuliah Metodologi Penelitian<br>

                                        <strong> Dokumen:</strong><br>
                                        (a) Surat Elektronik (email) Persetujuan dari dosen calon pembimbing dan bertanggung jawab terhadap Judul/Topik Tugas Akhir diajukan<br>
                                        (b) Daftar Nilai Sementara (DNS) Mahasiswa terbaru<br>
                                        (c) Laporan Usulan Judul yang terdiri atas: Halaman Judul, Latar Belakang, Rumusan Masalah, Batasan Masalah, Tujuan dan Manfaat, serta Penelitian Terkait dari Topik/Judul Tugas Akhir<br>
                                        <br>
                                        Informasi lengkap lihat di Buku Panduan Tugas Akhir</p>

                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->


                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-cog mr-1"></i>
                                        Form Pengajuan Judul Tugas Akhir
                                    </h3>
                                    <div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button> </div>
                                </div><!-- /.card-header -->
                                <?php if ($hid == '1') {
                                ?>
                                    <div class="card-body">
                                        <form action="form_peng_judul/tambah_judul" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" type="">Calon Dosen Pembimbing</span>
                                                    </div>
                                                    <select class="custom-select" id="dosen_pemb" name="dosen_pemb">


                                                    </select>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" type="">Program Studi</span>
                                                    </div>
                                                    <select class="custom-select" id="program_studi_pengajuan" name="program_studi_pengajuan">


                                                    </select>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" type="">Konsentrasi/Peminatan</span>
                                                    </div>
                                                    <select class="custom-select" id="konsentrasii_pengajuan" name="konsentrasii_pengajuan">


                                                    </select>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Nomor Handphone</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor Handphone">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Jumlah SKS Yang DI lulusi</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="jmlh_sks" id="jmlh_sks" placeholder="SKS">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">IPK</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="ipk" id="ipk" placeholder="IPK">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Judul Tugas AKhir</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Tugas AKhir">
                                                </div>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Upload DNS</span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="dns_upload" name="dns_upload">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">laporan Usulan Judul</span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="laporan_upload" name="laporan_upload">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="card-footer">
                                                <button id="ajukan_judul" name="ajukan_judul" type="submit" class="btn btn-success btn-block">Ajukan Judul</button>
                                            </div>

                                        </form>

                                    </div>

                                <?php  } elseif ($hid == '2') {
                                ?>
                                    <div class="card-body bg-warning">
                                        <div class="text">Judul Sudah di ajukan, Silakan menunggu untuk judul di terima</div>

                                    </div>
                                <?php } elseif ($hid == '3') { ?>
                                    <div class="card-body bg-danger">

                                        <div class="text">Maaf Judul anda yang sebelumnya di tolak silakan mengisi formulir ini dengan judul yang berbeda</div>
                                    </div>
                                    <form action="form_peng_judul/tambah_judul" method="POST" enctype="multipart/form-data">
                                        <div class="card-body">

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" type="">Calon Dosen Pembimbing</span>
                                                </div>
                                                <select class="custom-select" id="dosen_pemb" name="dosen_pemb">


                                                </select>
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" type="">Program Studi</span>
                                                </div>
                                                <select class="custom-select" id="program_studi_pengajuan" name="program_studi_pengajuan">


                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" type="">Konsentrasi/Peminatan</span>
                                                </div>
                                                <select class="custom-select" id="konsentrasii_pengajuan" name="konsentrasii_pengajuan">


                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Nomor Handphone</span>
                                                </div>
                                                <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor Handphone">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Jumlah SKS Yang DI lulusi</span>
                                                </div>
                                                <input type="text" class="form-control" name="jmlh_sks" id="jmlh_sks" placeholder="SKS">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">IPK</span>
                                                </div>
                                                <input type="text" class="form-control" name="ipk" id="ipk" placeholder="IPK">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Judul Tugas AKhir</span>
                                                </div>
                                                <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Tugas AKhir">
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload DNS</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="dns_upload" name="dns_upload">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">laporan Usulan Judul</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="laporan_upload" name="laporan_upload">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="card-footer">
                                            <button id="ajukan_judul" name="ajukan_judul" type="submit" class="btn btn-success btn-block">Ajukan Judul</button>
                                        </div>

                                    </form>


                                <?php } elseif ($hid == '4') { ?>
                                    <div class="card-body bg-success">
                                        <div class="text">Selamat Judul anda di terima silakan melakukan pembimbingan</div>
                                    </div>
                                <?php } ?>

                            </div>


                        </section>
                        <!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->

                        <!-- right col -->
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2020 <a href="<?php echo base_url() ?>">STIMIK Kharisma</a>.</strong>
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