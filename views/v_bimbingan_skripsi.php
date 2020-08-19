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
 
  <link rel="apple-touch-icon" href="./assets/logo.png">
    <meta
  name="description"           
  content="Application For Thesis in STMIK KHARISMA MAKASSAR">
  <link rel="manifest" href="./manifest.json">
    <?php $this->load->view("_partials/css.php") ?>
    <style>
        .upload_attachmentfile {
  position: absolute;
  opacity: 0;
  right: 0;
  top: 0;
}
.direct-chat-text{
    margin-left : 5px;
}


input[type="file"] {
    display: none;
}
    </style>

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
                            <h1 class="m-0 text-dark">Bimbingan Skripsi</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Bimbingan Skripsi</li>
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
                            <div class="card bg-danger">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-cog mr-1"></i>
                                        Aturan Bimbingan Skripsi
                                    </h3>
                                    <div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button> </div>
                                </div><!-- /.card-header -->
                                <div class="card-body">

                                 
                                        (a) Judul sudah diterima dan mendapatkan SK<br>
                                        (b)<br>
                                        (c)<br>
                                        (d)<br>
                            
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                             <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0 text-dark" id="dospem1">Dosen Pembimbing I : </h1>
                        </div><!-- /.col -->
                      
                    </div><!-- /.row -->
                    
                     <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-cog mr-1"></i>
                                        Upload Bab I - 4
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                
                                
                                           
                                          
                                            <div class="custom-file">
                                     
                                                      <label for="b_upload_b5" class="custom-file-label"> Upload PDF Bab V</label>
    
                                                <input type="file" id="b_upload_b5" name="b_upload_b1" class="custom-file-input">
                                                
                                                
                                                </div>
                                                <div class="custom-file">
                                                         <label for="b_upload_b6" class="custom-file-label"> Upload PDF Bab VI</label>
    
                                                <input type="file" id="b_upload_b6" name="b_upload_b2" class="custom-file-input">
                                                
                                               
                                                </div>
                                               
                  
                                       
                                            
                                        </div>

                                    </div>

                                </div><!-- /.card-body -->
                            </div>
                    
                    <!-- BAB V d1 -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-cog mr-1"></i>
                                        Bab I
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                  

                                        <div class="col-12">
                                            <iframe id = "v_d1_b1"  width="100%" height="500" alt="pdf"></iframe>
                                        </div>
                                        <div class="col-12 mt-3">
                                            
                                            <div class="card">
                                                <div class="card direct-chat direct-chat-primary">

                                                    <div class="card-body">
                                                  
                                                        <div class="direct-chat-messages" id="mahasiswa_chat_b1_d1">
                                                           
                                                        </div>
                                                        </div>
                                      
                                                    <div class="card-footer">
                                                        
                                                            <div class="input-group">
                                                                
                                                              
                                                                    <label for="image_chat_up_b1_d1"> <div class="btn btn-info btn-flat" > <i class="fa fa-upload"> </i></div></label>
    
                                                                    <input type="file" id="image_chat_up_b1_d1" name="image_chat_up_b1_d1" class="form-control-file">
                                                              <input type="text" id="msg_chat_data_d1_b1" name="message" placeholder="Type Message ..." class="form-control">
                                                                <span class="input-group-append">
                                                                    <a href="javascript:void(0);" id="send_chat_d1_b1" class="btn btn-primary" style ="height : 38px;" >Send</a>
                                                                    
                                                                     
                                                                </span>
                                                        
                                                               
                                                               
                                                                             
                                                               
                                                            
                                                            </div>
                                                    
                                                    </div>
                                                    <!-- /.card-footer-->
                                                </div>
                                            </div>
                                        </div>
                           
                                    </div>

                                </div><!-- /.card-body -->
                            </div>
                             <!-- End BAB V d1 -->
                              <!--  BAB VI  d1-->
                             <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-cog mr-1"></i>
                                        Bab II
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                      

                                        <div class="col-12">
                                           <iframe id = "v_d1_b2"  width="100%" height="500" alt="pdf"></iframe>
                                        </div>
                                        <div class="col-12 mt-3">
                                            
                                            <div class="card">
                                                <div class="card direct-chat direct-chat-primary">

                                                    <div class="card-body">
                                                  
                                                        <div class="direct-chat-messages" id="mahasiswa_chat_b2_d1">
                                                           
                                                        </div>
                                                        </div>
                                      
                                                    <div class="card-footer">
                                                        
                                                            <div class="input-group">
                                                                
                                                               <label for="image_chat_up_b2_d1"> <div class="btn btn-info btn-flat" > <i class="fa fa-upload"> </i></div></label>
    
                                                                    <input type="file" id="image_chat_up_b2_d1" name="image_chat_up_b2_d1" class="form-control-file">
                                                              <input type="text" id="msg_chat_data_d1_b2" name="message" placeholder="Type Message ..." class="form-control">
                                                                <span class="input-group-append">
                                                                    <a href="javascript:void(0);" id="send_chat_d1_b2" class="btn btn-primary" style ="height : 38px;" >Send</a>
                                                                    
                                                                     
                                                                </span>
                                                        
                                                               
                                                               
                                                                             
                                                               
                                                            
                                                            </div>
                                                    
                                                    </div>
                                                    <!-- /.card-footer-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div><!-- /.card-body -->
                            </div>

                    <!-- End BAB VI d1 -->
                    
           
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0 text-dark" id="dospem2">Dosen Pembimbing II : </h1>
                        </div><!-- /.col -->
                      
                    </div><!-- /.row -->
                 <!-- BAB V d2 -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-cog mr-1"></i>
                                        Bab I
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                       

                                        <div class="col-12">
                                            <iframe id = "v_d2_b1"  width="100%" height="500" alt="pdf"></iframe>
                                        </div>
                                        <div class="col-12 mt-3">
                                            
                                            <div class="card">
                                                <div class="card direct-chat direct-chat-primary">

                                                    <div class="card-body">
                                                  
                                                        <div class="direct-chat-messages" id="mahasiswa_chat_b1_d2">
                                                           
                                                        </div>
                                                        </div>
                                      
                                                    <div class="card-footer">
                                                        
                                                            <div class="input-group">
                                                                
                                                              
                                                                    <label for="image_chat_up_b1_d2"> <div class="btn btn-info btn-flat" > <i class="fa fa-upload"> </i></div></label>
    
                                                                    <input type="file" id="image_chat_up_b1_d2" name="image_chat_up_b1_d1" class="form-control-file">
                                                              <input type="text" id="msg_chat_data_d2_b1" name="message" placeholder="Type Message ..." class="form-control">
                                                                <span class="input-group-append">
                                                                    <a href="javascript:void(0);" id="send_chat_d2_b1" class="btn btn-primary" style ="height : 38px;" >Send</a>
                                                                    
                                                                     
                                                                </span>
                                                        
                                                               
                                                               
                                                                             
                                                               
                                                            
                                                            </div>
                                                    
                                                    </div>
                                                    <!-- /.card-footer-->
                                                </div>
                                            </div>
                                        </div>
                           
                                    </div>

                                </div><!-- /.card-body -->
                            </div>
                             <!-- End BAB V d2 -->
                              <!--  BAB VI  d2-->
                             <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-cog mr-1"></i>
                                        Bab II
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                      

                                        <div class="col-12">
                                           <iframe id = "v_d2_b2"  width="100%" height="500" alt="pdf"></iframe>
                                        </div>
                                        <div class="col-12 mt-3">
                                            
                                            <div class="card">
                                                <div class="card direct-chat direct-chat-primary">

                                                    <div class="card-body">
                                                  
                                                        <div class="direct-chat-messages" id="mahasiswa_chat_b2_d2">
                                                           
                                                        </div>
                                                        </div>
                                      
                                                    <div class="card-footer">
                                                        
                                                            <div class="input-group">
                                                                
                                                               <label for="image_chat_up_b2_d2"> <div class="btn btn-info btn-flat" > <i class="fa fa-upload"> </i></div></label>
    
                                                                    <input type="file" id="image_chat_up_b2_d2" name="image_chat_up_b2_d2" class="form-control-file">
                                                              <input type="text" id="msg_chat_data_d2_b2" name="message" placeholder="Type Message ..." class="form-control">
                                                                <span class="input-group-append">
                                                                    <a href="javascript:void(0);" id="send_chat_d2_b2" class="btn btn-primary" style ="height : 38px;" >Send</a>
                                                                    
                                                                     
                                                                </span>
                                                        
                                                               
                                                               
                                                                             
                                                               
                                                            
                                                            </div>
                                                    
                                                    </div>
                                                    <!-- /.card-footer-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div><!-- /.card-body -->
                            </div>

                    <!-- End BAB VI d2 -->
                    

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