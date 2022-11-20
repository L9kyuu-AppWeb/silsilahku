<?php
  $link = WEB_ROOT."/LihatPernikahan";

  if ($req3 == "prosesubahtgl") {
    if ($_POST['tglperceraian'] == "") {
      $update = $db->updatedata("tb_nikah","
        tglnikah='$_POST[tglpernikahan]'
        ","id","$req4");
      if ($update) {
          echo $db->alert("Proses Berhasil","$link");
        }
    }else{
      $update = $db->updatedata("tb_nikah","
        tglnikah='$_POST[tglpernikahan]',
        tglcerai= '$_POST[tglperceraian]'
        ","id","$req4");
      if ($update) {
          echo $db->alert("Proses Berhasil","$link");
        } 
    }   
  }

  if ($req3 == "proses_ganti") {
    $_SESSION['idsilsilah'] = $req4;
    echo "<script type='text/javascript'>
        window.location.href='$link';</script>";
  }

?>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<?php 
  $judul_utama = 'Bagan Pernikahan';
  $des_judul_utama = 'Melihat semua bagan Pernikahan';
  $menu_samping = 'Pernikahan';

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
      <?php 
      if (empty($req3) or $req3 == "ubahpernikahan") { ?>
        <?php 
        if ($jeniskelamin == "L") {
            $nikah = $db->tampildata("tb_nikah where suami='$idsilsilah'");
          }elseif ($jeniskelamin == "P") {
            $nikah = $db->tampildata("tb_nikah where istri='$idsilsilah'");
          }
          if ($nikah->num_rows > 0) { 
          while ($row_nikah = $nikah->fetch_array()) {?>
            <div class="col-md-4">
              <div class="box">
                <div class="box-body no-padding">
                  <table class="table table-condensed">
                    <tr>
                      <th width="150">Kepala Keluarga</th>
                      <td>: 
                        <a href="<?php echo $link ?>/proses_ganti/<?php echo $row_nikah['suami'] ?>" title=""><?php echo $db->lihatdata("tb_pengguna","nama","id","$row_nikah[suami]") ?></a>
                      </td>
                    </tr>
                    <tr>
                      <th>Istri</th>
                      <td>: 
                        <a href="<?php echo $link ?>/proses_ganti/<?php echo $row_nikah['istri'] ?>" title=""><?php echo $db->lihatdata("tb_pengguna","nama","id","$row_nikah[istri]") ?></a>
                      </td>
                    </tr>
                    <tr>
                      <th>Tgl Pernikahan</th>
                      <td>: <?php echo tgl_indo($row_nikah['tglnikah']) ?></td>
                    </tr>
                    <tr>
                      <th>Tgl Perceraian</th>
                      <td>: <?php
                      if ($row_nikah['tglcerai'] == "0000-00-00") {
                         echo "";
                       }else{
                        echo tgl_indo($row_nikah['tglcerai']);
                       } ?>
                        
                       </td>
                    </tr>
                    <tr>
                      <?php $anak = $db->tampildata("tb_pengguna where idnikah='$row_nikah[id]' order by anakke asc"); ?>
                      <th>Jumlah Anak</th>
                      <td>: <?php echo $anak->num_rows; ?> Orang</td>
                    </tr>
                    <tr>
                      <th></th>
                      <td><a href="<?php echo $link ?>/ubahpernikahan/<?php echo $row_nikah['id'] ?>" class="btn btn-info btn-xs" title="">Ubah Pernikahan</a></td>
                    </tr>
                  </table>   
                </div>   
              </div>        
            </div>
    <?php }
      } 
    }
    if ($req3 == "ubahpernikahan") {?>
      <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
          <div class="box">
            <div class="box-body no-padding">
              <form action="<?php echo $link ?>/prosesubahtgl/<?php echo $req4 ?>" method="POST">
              <table class="table table-condensed">
                <tr>
                  <th width="150">Tgl Pernikahan</th>
                  <td>
                    <input type="date" class="form-control" name="tglpernikahan" value="<?php echo $db->lihatdata("tb_nikah","tglnikah","id","$req4") ?>">
                  </td>
                </tr>
                <tr>
                  <th>Tgl Perceraian</th>
                  <td>
                    <input type="date" class="form-control" name="tglperceraian" value="<?php echo $db->lihatdata("tb_nikah","tglcerai","id","$req4") ?>">
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <button type="submit" class="btn btn-info">Ubah Tanggal</button> &nbsp; 
                    <a href="<?php echo $link ?>" title="" class="btn btn-danger">Batal</a>
                  </td>
                </tr>
              </table>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-4">
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