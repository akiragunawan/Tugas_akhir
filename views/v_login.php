<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="./manifest.json">
  <meta name="theme-color" content="#00897B" />
  <meta name="Description" content="Put your description here.">
  <link rel="apple-touch-icon" href="./assets/logo.png">

  <?php $this->load->view("_partials/css.php") ?>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="<?php echo base_url() ?>"><b>STMIK </b>KHARISMA</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <div class="text"><?= $this->session->flashdata('msg_error') ?></div>

        <form action="<?= base_url('Login/login_auth') ?>" method="post">
          <div class="input-group mb-3">
            <input name="userid" id="userid" type="text" class="form-control" placeholder="NIK/NIM">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="password" id="password" type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">

            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block" name="login_btn" id="login_btn">Sign In</button>
            </div>
            <!-- /.col -->
          </div>





        </form>
        
            
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <div class="loading"></div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <?php $this->load->view("_partials/script.php") ?>
</body>

</html>