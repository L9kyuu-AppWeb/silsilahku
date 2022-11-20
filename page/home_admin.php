  <?php 
  $link = WEB_ROOT;
   ?>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<?php 
  $judul_utama = 'Dashboard';
  $des_judul_utama = 'Selamat Datang Di Sistem Sisilah Keluarga';
  $menu_samping = 'Dashboard';
?>
<body class="hold-transition skin-blue sidebar-mini">
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
        <li class="active"><i class="fa fa-dashboard"></i> <?php echo $menu_samping ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <!-- <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Pencarian Nama Keluarga</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form role="form" action="<?php echo $link."/prosesCari/"; ?>" method="POST">
            <div class="box-body">              
              <div class="form-group">
                <input type="text" class="form-control" name="nama_keluarga" placeholder="Masukkan Nama">
              </div>                                                       
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Cari Orang</button> 
            </div>
          </form>
        </div> 
      </div> -->

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Kata Pengantar</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <p>Silsilah  keluarga  adalah  suatu  catatan  yang  menggambarkan  hubungan keluarga  sampai  ke  beberapa  generasi  dalam  suatu  struktur  pohon.  Data kajian tentang  keluarga  dan  penelusuran  jalur  keturunan  serta  sejarahnya  ini  dapat ditampilkan  dalam  berbagai  format.  Salah  satu  format  yang  sering  digunakan dalam  menampilkan  silsilah  adalah  bagan  dengan  generasi  yang  lebih  tua  di bagian atas dan generasiyang lebih muda di bagian bawah. Bagan keturunan yang menampilkan  semua  keturunan  dari  satu  individu  memiliki  bagian  yang  paling sempit di bagian atas.</p>
          <p>
          Kesulitan    untuk    menelusuri    silsilah    keluarga    yang    dikarenakan keterbatasan  data  yang  dimiliki  tentang anggota  keluarga,  dan  juga  dikarenakan tempat  tinggal  yang  berjauhan  mengakibatkan  data  menjadi  sulit  untuk  dicari. Selain itu pencarian penyakit keturunan dalam keluarga sulit dilakukan akibat data yang tidak lengkap. Keluarga sekarang ini kesulitan dalammenghubungi anggota keluarganya   yang   sudah   lama   tidak   bertemu   dikarenakan   anggota   keluarga tersebut pindah alamat dan berbagai hal lainnya.</p>
        </div>
        <!-- /.box-body -->        
      </div>
      <!-- /.box -->

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
  <!-- SlimScroll -->
  <script src="<?php echo WEB_ROOT; ?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo WEB_ROOT; ?>/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo WEB_ROOT; ?>/dist/js/adminlte.min.js"></script>
</body>
</html>