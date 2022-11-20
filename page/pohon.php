<?php
  $link = WEB_ROOT."/LihatPohonKeluarga";
  
  if ($req3 == "proses_ganti") {
    $_SESSION['idsilsilah'] = $req4;
    echo "<script type='text/javascript'>
        window.location.href='$link';</script>";
  }
?>
  <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT ?>/dist/css/pohon.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<?php 
  $judul_utama = 'Bagan Pohon Keluarga';
  $des_judul_utama = 'Melihat bagan Pohon Keluarga';
  $menu_samping = 'Pohon Keluarga';

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

      <?php if (empty($req3)) { ?>
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">
            Pohon Keluarga 
          </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <div id="wrapper" style="margin-bottom: 15px;margin-top: 5px;"><span class="label" style="color: black;"><?php echo $db->lihatdata("tb_pengguna","nama","id","$idsilsilah") ?> (<?php echo $db->lihatdata("tb_pengguna","jeniskelamin","id","$idsilsilah") ?>)</span>
            <div class="branch lv1">
              <?php
              if ($jeniskelamin == "L") {
                $nikah = $db->tampildata("tb_nikah where suami='$_SESSION[idsilsilah]'");
              }elseif ($jeniskelamin == "P") {
                $nikah = $db->tampildata("tb_nikah where istri='$_SESSION[idsilsilah]'");
              }
              if ($nikah->num_rows > 0) { 
              while ($row_nikah = $nikah->fetch_array()) {
              $anak = $db->tampildata("tb_pengguna where idnikah='$row_nikah[id]' order by anakke asc");
              if ($anak->num_rows == 1) {
                $ket = "sole";
              }elseif ($anak->num_rows == 0){
                $ket = "sole";
              }             
               
              while ($row_anak = $anak->fetch_array()) { ?>
                <div class="entry <?php echo $ket ?>"><span class="label"><a href="<?php echo $link ?>/proses_ganti/<?php echo $row_anak['id'] ?>" title=""><?php echo $row_anak['nama'] ?> (<?php echo $row_anak['jeniskelamin'] ?>)</a></span>
                  <!-- Generasi II -->
                  <div class="branch lv2">
                    <?php
                    if ($row_anak['jeniskelamin'] == "L") {
                      $nikah2 = $db->tampildata("tb_nikah where suami='$row_anak[id]'");
                    }elseif ($row_anak['jeniskelamin'] == "P") {
                      $nikah2 = $db->tampildata("tb_nikah where istri='$row_anak[id]'");
                    }
                    if ($nikah2->num_rows > 0) { 
                    while ($row_nikah2 = $nikah2->fetch_array()) {
                    $anak2 = $db->tampildata("tb_pengguna where idnikah='$row_nikah2[id]' order by anakke asc");
                    if ($anak2->num_rows == 1) {
                      $ket2 = "sole";
                    }elseif ($anak2->num_rows == 0){
                      $ket2 = "sole";
                    }
                    while ($row_anak2 = $anak2->fetch_array()) { ?>
                      <div class="entry <?php echo $ket2 ?>"><span class="label"><a href="<?php echo $link ?>/proses_ganti/<?php echo $row_anak2['id'] ?>" title=""><?php echo $row_anak2['nama'] ?> (<?php echo $row_anak2['jeniskelamin'] ?>)</a></span>
                        <!-- Generasi III -->
                        <div class="branch lv3">
                          <?php
                          if ($row_anak2['jeniskelamin'] == "L") {
                            $nikah3 = $db->tampildata("tb_nikah where suami='$row_anak2[id]'");
                          }elseif ($row_anak2['jeniskelamin'] == "P") {
                            $nikah3 = $db->tampildata("tb_nikah where istri='$row_anak2[id]'");
                          }
                          if ($nikah3->num_rows > 0) { 
                          while ($row_nikah3 = $nikah3->fetch_array()) {
                          $anak3 = $db->tampildata("tb_pengguna where idnikah='$row_nikah3[id]' order by anakke asc");
                          if ($anak3->num_rows == 1) {
                            $ket3 = "sole";
                          }elseif ($anak3->num_rows == 0){
                            $ket3 = "sole";
                          }
                          while ($row_anak3 = $anak3->fetch_array()) { ?>
                            <div class="entry <?php echo $ket3 ?>"><span class="label"><a href="<?php echo $link ?>/proses_ganti/<?php echo $row_anak3['id'] ?>" title=""><?php echo $row_anak3['nama'] ?> (<?php echo $row_anak3['jeniskelamin'] ?>)</a></span>
                              <!-- Generasi IV -->
                              <div class="branch lv4">
                                <?php
                                if ($row_anak3['jeniskelamin'] == "L") {
                                  $nikah4 = $db->tampildata("tb_nikah where suami='$row_anak3[id]'");
                                }elseif ($row_anak3['jeniskelamin'] == "P") {
                                  $nikah4 = $db->tampildata("tb_nikah where istri='$row_anak3[id]'");
                                }
                                if ($nikah4->num_rows > 0) { 
                                while ($row_nikah4 = $nikah4->fetch_array()) {
                                $anak4 = $db->tampildata("tb_pengguna where idnikah='$row_nikah4[id]' order by anakke asc");
                                if ($anak4->num_rows == 1) {
                                  $ket4 = "sole";
                                }elseif ($anak4->num_rows == 0){
                                  $ket4 = "sole";
                                }
                                while ($row_anak4 = $anak4->fetch_array()) { ?>
                                  <div class="entry <?php echo $ket4 ?>" style="margin-right: 10px;"><span class="label"><a href="<?php echo $link ?>/proses_ganti/<?php echo $row_anak4['id'] ?>" title=""><?php echo $row_anak4['nama'] ?> (<?php echo $row_anak4['jeniskelamin'] ?>)</a></span>
                                      <!-- Generasi V -->
                                      <div class="branch lv5">
                                        <?php
                                        if ($row_anak4['jeniskelamin'] == "L") {
                                          $nikah5 = $db->tampildata("tb_nikah where suami='$row_anak4[id]'");
                                        }elseif ($row_anak4['jeniskelamin'] == "P") {
                                          $nikah5 = $db->tampildata("tb_nikah where istri='$row_anak4[id]'");
                                        }
                                        if ($nikah5->num_rows > 0) { 
                                        while ($row_nikah5 = $nikah5->fetch_array()) {
                                        $anak5 = $db->tampildata("tb_pengguna where idnikah='$row_nikah5[id]' order by anakke asc");
                                        if ($anak5->num_rows == 1) {
                                          $ket5 = "sole";
                                        }else{
                                          $ket5 = "";
                                        }
                                        while ($row_anak5 = $anak5->fetch_array()) { ?>
                                          <div class="entry <?php echo $ket5 ?>"><span class="label"><a href="<?php echo $link ?>/proses_ganti/<?php echo $row_anak5['id'] ?>" title=""><?php echo $row_anak5['nama'] ?> (<?php echo $row_anak5['jeniskelamin'] ?>)</a></span>
                                          </div>
                                        <?php }}} ?>
                                      </div>
                                      <!-- Akhir Generasi V -->
                                  </div>
                                <?php }}} ?>
                              </div>
                              <!-- Akhir Generasi IV -->
                            </div>
                          <?php }}} ?>
                        </div>
                        <!-- Akhir Generasi III -->
                      </div>
                    <?php }}} ?>
                  </div>
                  <!-- Akhir Generasi II -->
                </div>
              <?php }}} ?>
            </div>
          </div>
        </div>
      </div>
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
  <!-- AdminLTE App -->
  <script src="<?php echo WEB_ROOT; ?>/dist/js/adminlte.min.js"></script>
  <script>
    $(function () {
      $('#example1').DataTable()
    })
  </script>
</body>
</html>