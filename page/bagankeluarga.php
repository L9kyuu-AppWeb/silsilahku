<?php
  $link = WEB_ROOT."/BaganKeluarga";
  
  if ($req3 == "proses_ganti") {
    if (@$req4) {
      $_SESSION['idsilsilah'] = $req4;
        echo "<script type='text/javascript'>
            window.location.href='$link';</script>";
      }
      else{
      echo "<script type='text/javascript'>
            window.location.href='$link';</script>";
      }
    }
    
?>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
    .tabel-keluarga td, .nama-kita{
      text-align: center;
    }
    .judulnya{
      width: 150px;
    }
  </style>
</head>
<?php 
  $judul_utama = 'Bagan Keluarga';
  $des_judul_utama = 'Melihat semua bagan keluarga';
  $menu_samping = 'Bagan';

  $idsilsilah = $_SESSION['idsilsilah'];
  $adminsilsilah = $_SESSION['adminsilsilah'];
  $jeniskelamin = $db->lihatdata("tb_pengguna","jeniskelamin","id","$idsilsilah");
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
        <li><a href="<?php echo WEB_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> <?php echo $menu_samping ?></li>        
      </ol>
    </section>
    <!-- Main content -->
    <section class="content"> 
      <?php if (empty($req3)) { 
        $nama_kita = $db->lihatdata("tb_pengguna","nama","id","$idsilsilah").' ('.$db->lihatdata("tb_pengguna","jeniskelamin","id","$idsilsilah").')';
        $idayah = $db->lihatdata("tb_pengguna","ayah","id","$idsilsilah");
        $idibu = $db->lihatdata("tb_pengguna","ibu","id","$idsilsilah");
        $idayahkakek = $db->lihatdata("tb_pengguna","ayah","id","$idayah");
        $idayahnenek = $db->lihatdata("tb_pengguna","ibu","id","$idayah");
        $idibukakek = $db->lihatdata("tb_pengguna","ayah","id","$idibu");
        $idibunenek = $db->lihatdata("tb_pengguna","ibu","id","$idibu");
        
        if (empty($idayah)) {
          $ayah = "?";
        }else{
        $ayah = $db->lihatdata("tb_pengguna","nama","id","$idayah").' ('.$db->lihatdata("tb_pengguna","jeniskelamin","id","$idayah").')';
        }

        if (empty($idibu)) {
          $ibu = "?";
        }else{
        $ibu = $db->lihatdata("tb_pengguna","nama","id","$idibu").' ('.$db->lihatdata("tb_pengguna","jeniskelamin","id","$idibu").')';
        }

        if (empty($idayahkakek)) {
          $ayahkakek = "?";
        }else{
        $ayahkakek = $db->lihatdata("tb_pengguna","nama","id","$idayahkakek").' ('.$db->lihatdata("tb_pengguna","jeniskelamin","id","$idayahkakek").')';
        }

        if (empty($idayahnenek)) {
          $ayahnenek = "?";
        }else{
        $ayahnenek = $db->lihatdata("tb_pengguna","nama","id","$idayahnenek").' ('.$db->lihatdata("tb_pengguna","jeniskelamin","id","$idayahnenek").')';
        }

        if (empty($idibukakek)) {
          $ibukakek = "?";
        }else{
        $ibukakek = $db->lihatdata("tb_pengguna","nama","id","$idibukakek").' ('.$db->lihatdata("tb_pengguna","jeniskelamin","id","$idibukakek").')';
        }

        if (empty($idibunenek)) {
          $ibunenek = "?";
        }else{
        $ibunenek = $db->lihatdata("tb_pengguna","nama","id","$idibunenek").' ('.$db->lihatdata("tb_pengguna","jeniskelamin","id","$idibunenek").')';
        }

      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">            
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover tabel-keluarga">
                <tr>
                  <th class="judulnya">Kakek & Nenek</th>
                  <td>
                    <a href="<?php echo $link ?>/proses_ganti/<?php echo $idayahkakek ?>">
                      <?php echo $ayahkakek ?></a></td>
                  <td>
                    <a href="<?php echo $link ?>/proses_ganti/<?php echo $idayahnenek ?>">
                      <?php echo $ayahnenek ?></a></td>
                  <td>
                    <a href="<?php echo $link ?>/proses_ganti/<?php echo $idibukakek ?>">
                      <?php echo $ibukakek ?></a></td>
                  <td>
                    <a href="<?php echo $link ?>/proses_ganti/<?php echo $idibunenek ?>">
                      <?php echo $ibunenek ?></a></td>
                </tr>
                <tr>
                  <th class="judulnya">Ayah & Ibu</th>
                  <td colspan="2">
                    <a href="<?php echo $link ?>/proses_ganti/<?php echo $idayah ?>">
                      <?php echo $ayah ?></td>
                  <td colspan="2">
                    <a href="<?php echo $link ?>/proses_ganti/<?php echo $idibu ?>">
                      <?php echo $ibu ?></td>                  
                </tr>
                <tr>
                  <th colspan="5" class="nama-kita"><?php echo $nama_kita ?></th>
                </tr>
                <tr>
                  <th class="judulnya">Anak-anak & <br>Cucu-cucu</th>
                  <td colspan="4">
                    <?php 
                    if ($jeniskelamin == "L") {
                        $nikah = $db->tampildata("tb_nikah where suami='$_SESSION[idsilsilah]'");
                      }elseif ($jeniskelamin == "P") {
                        $nikah = $db->tampildata("tb_nikah where istri='$_SESSION[idsilsilah]'");
                      }
                      if ($nikah->num_rows > 0) { 
                      while ($row_nikah = $nikah->fetch_array()) {
                         $anak = $db->tampildata("tb_pengguna where idnikah='$row_nikah[id]' order by anakke asc");
                            while ($row_anak = $anak->fetch_array()) { ?>                            
                            <div class="col-md-4">
                              <div class="box box-warning">
                                <div class="box-header with-border">
                                  <h3 class="box-title">
                                    <a href="<?php echo $link ?>/proses_ganti/<?php echo $row_anak['id'] ?>" title="">
                                      <?php echo $row_anak['nama'] ?> (<?php echo $row_anak['jeniskelamin'] ?>)</a>
                                      <br>
                                    <span class="label label-success">Anak ke-<?php echo $row_anak['anakke'] ?></span>
                                  </h3>
                                  <div class="box-tools pull-right">
                                    <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> -->
                                    </button>
                                  </div>
                                  <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <?php 
                                if ($row_anak['jeniskelamin'] == "L") {
                                    $nikah2 = $db->tampildata("tb_nikah where suami='$row_anak[id]'");
                                  }elseif ($row_anak['jeniskelamin'] == "P") {
                                    $nikah2 = $db->tampildata("tb_nikah where istri='$row_anak[id]'");
                                  }
                                  if ($nikah2->num_rows > 0) { 
                                  while ($row_nikah2 = $nikah2->fetch_array()) {
                                     $anak2 = $db->tampildata("tb_pengguna where idnikah='$row_nikah2[id]' order by anakke asc");
                                      
                                        while ($row_anak2 = $anak2->fetch_array()) { ?>  
                                        <div class="box-body">
                                          <a href="<?php echo $link ?>/proses_ganti/<?php echo $row_anak2['id'] ?>" title=""><?php echo $row_anak2['nama'] ?> (<?php echo $row_anak2['jeniskelamin'] ?>)</a>
                                          <!-- <br><span class="label label-success">Anak ke-<?php echo $row_anak2['anakke'] ?>. </span> -->
                                        </div>
                                <?php  }}}else{ ?>
                                <a href="#" title="">
                                    Cucu-cucu Belum Tercatat</a>
                                <?php } ?>
                                <!-- /.box-body -->
                              </div>
                              <!-- /.box -->
                            </div>
                         <?php  }}}else{ ?>
                                <a href="#" title="">
                                    Anak Anak Belum Tercatat</a>
                          <?php } ?>
                    
                  </td>                 
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div> 
      <h4>Saudara, Keponakan, Cucu</h4>
      <?php               
        $ayah = $db->lihatdata("tb_pengguna","ayah","id","$_SESSION[idsilsilah]");
        $ibu = $db->lihatdata("tb_pengguna","ibu","id","$_SESSION[idsilsilah]");
        $saudara = $db->tampildata("tb_pengguna where (ayah='$ayah' or ibu='$ibu') and id <> '$idsilsilah' order by anakke asc");
        if ($saudara->num_rows > 0) {
        while ($row_saudara = $saudara->fetch_array()) { ?>
        <div class="col-md-4">
          <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">
                <a href="<?php echo $link ?>/proses_ganti/<?php echo $row_saudara['id'] ?>" title="">
                  <?php echo $row_saudara['nama'] ?> (<?php echo $row_saudara['jeniskelamin'] ?>)</a>
              </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">              
              <?php 
                if ($row_saudara['jeniskelamin'] == "L") {
                    $nikah3 = $db->tampildata("tb_nikah where suami='$row_saudara[id]'");
                  }elseif ($row_saudara['jeniskelamin'] == "P") {
                    $nikah3 = $db->tampildata("tb_nikah where istri='$row_saudara[id]'");
                  }
                  if ($nikah3->num_rows > 0) { 
                  while ($row_nikah3 = $nikah3->fetch_array()) {
                    $anak3 = $db->tampildata("tb_pengguna where idnikah='$row_nikah3[id]' order by anakke asc");
                    while ($row_anak3 = $anak3->fetch_array()) { ?>
                      <a href="<?php echo $link ?>/proses_ganti/<?php echo $row_anak3['id'] ?>" title="">
                  -> <?php echo $row_anak3['nama'] ?> (<?php echo $row_anak3['jeniskelamin'] ?>)</a> <br>
                    <?php  }}}else{ ?>
                      <a href="#" title="">
                          Cucu-cucu Belum Tercatat</a>
                      <?php } ?>
                
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <?php }}else{ ?>
         <a href="#" title="">Saudara belum tercatat</a>
      <?php }} ?>
      
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
  <!-- AdminLTE App -->
  <script src="<?php echo WEB_ROOT; ?>/dist/js/adminlte.min.js"></script>
  <script>
    $(function () {
      $('#example1').DataTable()
    })
  </script>
</body>
</html>