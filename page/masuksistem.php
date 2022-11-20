<?php
  $link = WEB_ROOT;
  $linkmasuk = WEB_ROOT."/MasukSistem";
  $linkuser = WEB_ROOT."/User";
  
  if ($req3=="proses_masuk") {
    $nik = $db->enscape($_POST['nik']);
    $password = $db->enscape($_POST['password']);
    $simpan = $db->tampildata("tb_pengguna where nik='$nik' and password='$password'");
    if ($simpan->num_rows > 0) {
      $sementara = $simpan->fetch_array();
      $_SESSION['idsilsilah'] = $sementara['id'];
      $_SESSION['adminsilsilah'] = $sementara['admin'];
      echo $db->alert("Anda Berhasil Masuk!!!","$linkuser");
    }else{      
        echo $db->alert("Nik atau password salah!!!","$linkmasuk");      
    }}
?>  
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>/plugins/iCheck/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php 
  $judul_utama = 'Portal Masuk';
  $des_judul_utama = 'Portal sistem untuk manajemen data silsilah';
  $menu_samping = 'Portal';
?>
<!-- Site wrapper -->
<div class="wrapper">
  <!-- tempat header class="main-header" -->
  <?php include 'view/header.php'; ?>
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <?php include 'view/aside.php'; ?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $judul_utama; ?>
        <small><?php echo $des_judul_utama; ?></small>
      </h1>
       <ol class="breadcrumb">
        <li><a href="<?php echo WEB_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> <?php echo $menu_samping ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content"> 

      <?php if (empty($req3)) { ?>
      <div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Silsilah </b>Kita</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Masuk untuk memulai</p>

    <form action="<?php echo $linkmasuk."/proses_masuk" ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email" name="nik" required="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <!-- <label>
              <input type="checkbox"> Remember Me
            </label> -->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-check-circle"></i> Masuk</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p></p>
      <a href="<?php echo $link ?>" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-exclamation"></i> Batal</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="#">Saya Lupa password</a><br>
    <!-- <a href="<?php echo WEB_ROOT."/BuatAkun" ?>" class="text-center">Daftar untuk akun baru</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
      <!-- /.box-body -->
      <?php } ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Footer -->
  <?php include 'view/foot.php'; ?>
</div>
<!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="<?php echo WEB_ROOT; ?>/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo WEB_ROOT; ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="<?php echo WEB_ROOT; ?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo WEB_ROOT; ?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?php echo WEB_ROOT; ?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo WEB_ROOT; ?>/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- iCheck 1.0.1 -->
<script src="<?php echo WEB_ROOT; ?>/plugins/iCheck/icheck.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo WEB_ROOT; ?>/dist/js/adminlte.min.js"></script>
  <script>
    $(function () {
      $('#example1').DataTable()
    })
  </script>
</body>
</html>