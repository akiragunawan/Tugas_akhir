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

<?php var_dump($ada); ?>
<?php if($this->session->userdata('status') == "Mahasiswa" and !$ada and !$gada){ ?>

     <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Upload Proposal</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href=<?php echo base_url() ?>>Home</a></li>
                                <li class="breadcrumb-item active">Upload Proposal</li>
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
                                        Upload Proposal
                                    </h3>
                                    <div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button> </div>
                                </div><!-- /.card-header -->
                                <div class="card-body">

                                   
                                       Upload File Proposal (Lengkap)!
                                         <form action="Ujian_proposal/upload_proposal" method="POST" enctype="multipart/form-data">
                                       <div class="custom-file mt-2">
                                     
                                                      <label class="custom-file-label" for="b_upload_proposal"> Upload Proposal </label>
    
                                                <input name="b_upload_proposal" class="custom-file-input" id="b_upload_proposal" type="file">
                                                
                                                
                                                </div>
                                              
                        
                                    

                                </div>
                                   <div class="card-footer">
                                                <button id="ajukan_judul" name="ajukan_judul" type="submit" class="btn btn-success btn-block">Upload Proposal</button>
                                            </div>
                                              </form>

                            </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
               
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
 
<?php }elseif($this->session->userdata('status') == "Mahasiswa" and $ada and $gada){ ?>
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
                                <li class="breadcrumb-item active">Upload Proposal</li>
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
                                        Upload Proposal
                                    </h3>
                                    <div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button> </div>
                                </div><!-- /.card-header -->
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-12">
                                        Silakan Tunggu Untuk kedua Dosen Pembimbing Menyelesaikan Bimbingan
                                        </div>
                                    </div>

                                </div>

                            </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
               
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
   <?php }elseif($this->session->userdata('status') == "Mahasiswa" and $ada and !$gada){ ?>
   <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Upload Proposal</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href=<?php echo base_url() ?>>Home</a></li>
                                <li class="breadcrumb-item active">Upload Proposal</li>
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
                            <div class="card bg-warning">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-cog mr-1"></i>
                                        Upload Proposal
                                    </h3>
                                    <div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button> </div>
                                </div><!-- /.card-header -->
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-12">
                                        Proposal Sudah Selesai Silakan Melanjutkan ke Pembimbingan Skripsi!
                                        </div>
                                    </div>

                                </div>

                            </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
               
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
<?php } elseif($this->session->userdata('status') == "Admin"){ ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Proposal</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href=<?php echo base_url() ?>>Home</a></li>
                                <li class="breadcrumb-item active">Proposal</li>
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
                                        List Proposal
                                    </h3>
                                    <div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button> </div>
                                </div><!-- /.card-header -->
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table id="table_list_proposal_judul" class="table table-bordered table-striped dataTable data" role="grid" aria-describedby="example1_info" style="width:100%">
                                                    <thead>
                                                        <tr role="row">
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 10px;" hidden>id</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 20px;">NIM</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 84px;">Nama Mahasiswa</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 60px;">Judul</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 29px;">Dosen Pembimbing 1</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 10px;">Dosen Pembimbing 2</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 10px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="list_proposal_judul">


                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div><!-- /.card-body -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-cog mr-1"></i>
                                        Selesaikan Proposal
                                    </h3>
                                    <div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button> </div>
                                </div><!-- /.card-header -->
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table id="table_list_selesai_proposal" class="table table-bordered table-striped dataTable data" role="grid" aria-describedby="example1_info" style="width:100%">
                                                    <thead>
                                                        <tr role="row">
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 10px;" hidden>id</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 20px;">NIM</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 84px;">Nama Mahasiswa</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 60px;">Judul</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 29px;">Dosen Pembimbing 1</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 10px;">Dosen Pembimbing 2</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 10px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="list_selesai_proposal">


                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div><!-- /.card-body -->
                             <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-cog mr-1"></i>
                                        Proposal Di Terima
                                    </h3>
                                    <div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button> </div>
                                </div><!-- /.card-header -->
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table id="table_list_selesai_proposal_terima" class="table table-bordered table-striped dataTable data bg-success" role="grid" aria-describedby="example1_info" style="width:100%">
                                                    <thead>
                                                        <tr role="row">
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 10px;" hidden>id</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 20px;">NIM</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 84px;">Nama Mahasiswa</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 60px;">Judul</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 29px;">Dosen Pembimbing 1</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 10px;">Dosen Pembimbing 2</th>
                                                           
                                                        </tr>
                                                    </thead>
                                                    <tbody id="list_selesai_proposal_terima">


                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div><!-- /.card-body -->
                             <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-cog mr-1"></i>
                                      Proposal Di tolak
                                    </h3>
                                    <div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button> </div>
                                </div><!-- /.card-header -->
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table id="table_list_selesai_proposal_tolak" class="table table-bordered table-striped dataTable data bg-danger" role="grid" aria-describedby="example1_info" style="width:100%">
                                                    <thead>
                                                        <tr role="row">
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 10px;" hidden>id</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 20px;">NIM</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 84px;">Nama Mahasiswa</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 60px;">Judul</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 29px;">Dosen Pembimbing 1</th>
                                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 10px;">Dosen Pembimbing 2</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody id="list_selesai_proposal_tolak">


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

            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
<?php }?>
        <!-- Content Wrapper. Contains page content -->
    
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