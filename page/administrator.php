<?php
  $link = WEB_ROOT."/Administrator";
  
  if ($req3=="proses_tambah") {
    $simpan = $db->insertData("tb_admin",
      "
      null,
      '$_POST[username]',
      '$_POST[nama]',
      '$_POST[ket]',
      '$_POST[email]',
      '$_POST[telpon]',
      '',
      '4',
      '$_POST[prodi]'
      ");
      if ($simpan) {
        header ("location:".$link);
      }
    }

    if ($req3=="proses_ubah") {
    $simpan = $db->updateData("tb_admin",
      "
      nik='$_POST[username]',
      nama='$_POST[nama]',
      keterangan='$_POST[ket]',
      email='$_POST[email]',
      telepon='$_POST[telpon]',
      idprodi='$_POST[prodi]'
      ","id","$req4");
      if ($simpan) {
        header ("location:".$link);
      }
    }

    if ($req3=="proses_hapus") {
      $simpan = $db->deletedata("tb_admin","id","$req4");
      if ($simpan) {
        header ("location:".$link);
      }
    }
?>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
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
        Administrator
        <small>Data yang menjadi Administrator</small>
      </h1>
       <ol class="breadcrumb">
        <li><a href="<?php echo WEB_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Administrator</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content"> 

      <?php if (empty($req3)) { ?>
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><a href="<?php echo $link."/tambah"; ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>                
            <tr>
              <th>Username</th>
              <th>Nama</th>
              <th>Ket</th>
              <th>Telpon</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php 
              $administrator = $db->tampildata("tb_admin");
              while($row=$administrator->fetch_array()){
            ?>
            <tr>
              <td><?php echo $row['1'] ?></td>
              <td><?php echo $row['2'] ?></td>
              <td><?php echo $row['3'] ?></td>
              <td><?php echo $row['5'] ?></td>
              <td>
                <div class="btn-group-vertical">
                  <a href="<?php echo $link.'/ubah/'.$row['0'] ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                  <a href="<?php echo $link.'/proses_hapus/'.$row['0'] ?>" onclick="confirm('Apakah Ingin Menghapus Data?..')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </div>
              </td>
            </tr>
            <?php } ?>                
            </tbody>                
          </table>
        </div>
      </div>
      <!-- /.box-body -->
      <?php }elseif ($req3 == "tambah") { ?>
       <!-- left column -->
      <div class="box">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Form Tambah</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="<?php echo $link."/proses_tambah" ?>" method="POST">
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInput1">Username</label>
                <input type="text" class="form-control" name="username" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleInput1">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleInput1">Email</label>
                <input type="text" class="form-control" name="email" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleInput1">Telpon</label>
                <input type="text" class="form-control" name="telpon" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleInput1">Keterangan</label>
                <input type="text" class="form-control" name="ket" placeholder="">
              </div>
              <div class="form-group">
                <label>Hak Akses Prodi</label>
                <select class="form-control" name="prodi">
                  <?php 
                    $prodi = $db->tampildata("tb_prodi");
                    while ($row_prodi = $prodi->fetch_array()) { ?>
                  <option value="<?php echo $row_prodi['0'] ?>"><?php echo $row_prodi['2'] ?></option>
                  <?php } ?>
                </select>
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
        <!--/.col (left) -->
      <?php }elseif ($req3=="ubah") { 
      $tampil = $db->tampildata("tb_admin where id='$req4'");
      while ($row = $tampil->fetch_array()) { ?>
      <div class="box">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Form Ubah</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="<?php echo $link."/proses_ubah/".$req4 ?>" method="POST">
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInput1">Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $row['1'] ?>" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleInput1">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $row['2'] ?>" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleInput1">Email</label>
                <input type="text" class="form-control" name="email" value="<?php echo $row['4'] ?>" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleInput1">Telpon</label>
                <input type="text" class="form-control" name="telpon" value="<?php echo $row['5'] ?>" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleInput1">Keterangan</label>
                <input type="text" class="form-control" name="ket" value="<?php echo $row['3'] ?>" placeholder="">
              </div>
              <div class="form-group">
                <label>Hak Akses Prodi</label>
                <select class="form-control" name="prodi">
                  <?php 
                    $prodi = $db->tampildata("tb_prodi");
                    while ($row_prodi = $prodi->fetch_array()) { ?>
                  <option value="<?php echo $row_prodi['0'] ?>" <?php if ($row_prodi['0'] == $row['8']) {
                    echo "selected";
                  } ?>><?php echo $row_prodi['2'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Ubah</button>
              <a href="<?php echo $link ?>" class="btn btn-primary"> Kembali</a>
            </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
        <!--/.col (left) -->
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