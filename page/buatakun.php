<?php
  $link = WEB_ROOT;
  $linktambah = WEB_ROOT."/BuatAkun";
  
  if ($req3=="proses_tambah") {
    if ($_POST['password'] != $_POST['password_ulang'] ) {
      echo $db->alert("Password yang dimasukkan tidak sama...Pastikan harus sama","$linktambah");
    }else{
    $id_baru = time();
    $simpan = $db->insertData("tb_pengguna","id,nama,jeniskelamin,nik,password,admin",
      "
      '$id_baru',
      '$_POST[nama]',
      '$_POST[jeniskelamin]',
      '$_POST[nik]',
      '$_POST[password]',
      '$id_baru'
      ");
      if ($simpan) {
        echo $db->alert("Proses Buat Akun Berhasil","$link");
      }
    }}
?>  
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>/plugins/iCheck/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php 
  $judul_utama = 'Membuat Akun';
  $des_judul_utama = 'Buat Akun untuk menambahkan Silsilah keluarga Anda';
  $menu_samping = 'Membuat Akun';
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
      <div class="box">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Akun</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="<?php echo $linktambah."/proses_tambah" ?>" method="POST">
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInput1">Email</label>
                <input type="text" class="form-control" name="nik" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleInput1">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleInput1">Jenis Kelamin</label>
                <div class="form-group">
                <label>
                  <input type="radio" name="jeniskelamin" value="L" class="flat-red" checked> Laki-laki
                </label>
                <label>
                  <input type="radio" name="jeniskelamin" value="P" class="flat-red"> Perempuan
                </label>                
              </div>
              </div>
              <div class="form-group">
                <label for="exampleInput1">Password</label>
                <input type="password" class="form-control" name="password" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleInput1">Ulangi Password</label>
                <input type="password" class="form-control" name="password_ulang" placeholder="">
              </div>              
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Tambah</button> 
              <a href="<?php echo $link ?>" class="btn btn-primary"> Kembali</a>
            </div>
          </form>
        </div>
        <!-- /.box -->
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

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
  </script>
</body>
</html>