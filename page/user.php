<?php 
  $link = WEB_ROOT."/User";
  $id = $_SESSION['idsilsilah'];

  if ($req3 == "proses_ubah_profil") {
    $id = $_SESSION['idsilsilah'];
    $niklama = $db->lihatdata("tb_pengguna","nik","id","$id");

    if ($niklama == $_POST['nik']) {
      $nama = $db->enscape($_POST['nama']);
      $update = $db->updatedata("tb_pengguna","
        nama='$nama',
        jeniskelamin='$_POST[jeniskelamin]',
        anakke='$_POST[anakke]',
        tgllahir='$_POST[tgllahir]',
        alamat='$_POST[alamat]',
        kota='$_POST[kota]',
        telp='$_POST[telp]'
        ","id","$id");    
      if ($update) {
        echo $db->alert("Proses Berhasil","$link");
      }  
    }else{
      $cek = $db->tampildata("tb_pengguna where nik='$_POST[nik]'");
      if ($cek->num_rows > 0) {
        echo $db->alert("NIK Terbaru sudah ada...","$link");
      }else{
        $nama = $db->enscape($_POST['nama']);
        $update = $db->updatedata("tb_pengguna","
        nik='$_POST[nik]',
        nama='$nama',
        jeniskelamin='$_POST[jeniskelamin]',
        anakke='$_POST[anakke]',
        tgllahir='$_POST[tgllahir]',
        alamat='$_POST[alamat]',
        kota='$_POST[kota]',
        telp='$_POST[telp]'
        ","id","$id");
        if ($update) {
          echo $db->alert("Proses Berhasil","$link");
        } 
      }
    }
  }

  if ($req3 == "proses_setayah") {
    $id = $_SESSION['idsilsilah'];
    $admin = $_SESSION['adminsilsilah'];
    if (empty($_POST['ketik'])) {
      if (empty($_POST['pilih'])) {
        echo $db->alert("Tidak Ada yang di update","$link");
      }else{
        $update = $db->updatedata("tb_pengguna","ayah='$_POST[pilih]'","id","$id");
        if ($update) {
          echo $db->alert("Proses Berhasil","$link");
        } 
      }
    }else{
      $id_baru = time();
      $nama = $db->enscape($_POST['ketik']);
      $insert = $db->insertdata("tb_pengguna","id,nama,admin,jeniskelamin","'$id_baru','$nama','$admin','L'");
      $update = $db->updatedata("tb_pengguna","ayah='$id_baru'","id","$id");
      if ($update) {
        echo $db->alert("Proses Berhasil","$link");
      }
    }
  }

  if ($req3 == "proses_setIbu") {
    $id = $_SESSION['idsilsilah'];
    $admin = $_SESSION['adminsilsilah'];
    if (empty($_POST['ketik'])) {
      if (empty($_POST['pilih'])) {
        echo $db->alert("Tidak Ada yang di update","$link");
      }else{
        $update = $db->updatedata("tb_pengguna","ibu='$_POST[pilih]'","id","$id");
        if ($update) {
          echo $db->alert("Proses Berhasil","$link");
        } 
      }
    }else{
      $id_baru = time();
      $nama = $db->enscape($_POST['ketik']);
      $insert = $db->insertdata("tb_pengguna","id,nama,admin,jeniskelamin","'$id_baru','$nama','$admin','P'");
      $update = $db->updatedata("tb_pengguna","ibu='$id_baru'","id","$id");
      if ($update) {
        echo $db->alert("Proses Berhasil","$link");
      }
    }
  }

  if ($req3 == "proses_setIstri") {
    $id = $_SESSION['idsilsilah'];
    $admin = $_SESSION['adminsilsilah'];
    $id_baru = time();
    if (empty($_POST['ketik'])) {
      if (empty($_POST['pilih'])) {
        echo $db->alert("Tidak Ada yang di update","$link");
      }else{
        $insert = $db->insertdata("tb_nikah","id,suami,istri,tglnikah,admin","
          '$id_baru',
          '$id',
          '$_POST[pilih]',
          '$_POST[tglnikah]',
          '$admin'
          ");
        if ($insert) {
          echo $db->alert("Proses Berhasil","$link");
        } 
      }
    }else{    
      $id_nikah = time();  
      $nama = $db->enscape($_POST['ketik']);
      $insert = $db->insertdata("tb_pengguna","id,nama,admin,jeniskelamin","'$id_baru','$nama','$admin','P'");
      $update = $db->insertdata("tb_nikah","id,suami,istri,tglnikah,admin","
          '$id_nikah',
          '$id',
          '$id_baru',
          '$_POST[tglnikah]',
          '$admin'
          ");
      if ($update) {
        echo $db->alert("Proses Berhasil","$link");
      }
    }
  }

  if ($req3 == "proses_setSuami") {
    $id = $_SESSION['idsilsilah'];
    $admin = $_SESSION['adminsilsilah'];
    $id_baru = time();
    if (empty($_POST['ketik'])) {
      if (empty($_POST['pilih'])) {
        echo $db->alert("Tidak Ada yang di update","$link");
      }else{
        $insert = $db->insertdata("tb_nikah","id,suami,istri,tglnikah,admin","
          '$id_baru',
          '$_POST[pilih]',
          '$id',          
          '$_POST[tglnikah]',
          '$admin'
          ");
        if ($insert) {
          echo $db->alert("Proses Berhasil","$link");
        } 
      }
    }else{    
      $id_nikah = time();  
      $nama = $db->enscape($_POST['ketik']);
      $insert = $db->insertdata("tb_pengguna","id,nama,admin,jeniskelamin","'$id_baru','$nama','$admin','L'");
      $update = $db->insertdata("tb_nikah","id,suami,istri,tglnikah,admin","
          '$id_nikah',
          '$id_baru',
          '$id',          
          '$_POST[tglnikah]',
          '$admin'
          ");
      if ($update) {
        echo $db->alert("Proses Berhasil","$link");
      }
    }
  }

  if ($req3 == "proses_setOrtu") {
    $id = $_SESSION['idsilsilah'];
    $admin = $_SESSION['adminsilsilah'];    
    if (empty($_POST['pilih'])) {
      echo $db->alert("Tidak ada update ortu","$link");
    }else{ 
      $update = $db->updatedata("tb_pengguna","idnikah='$_POST[pilih]'","id","$id");
        if ($update) {
          echo $db->alert("Proses Berhasil","$link");
        }
    }
  }

  if ($req3 == "proses_setAnak") {
    $id = $_SESSION['idsilsilah'];
    $admin = $_SESSION['adminsilsilah']; 
    $id_baru = time();    
    $nama = $db->enscape($_POST['nama']);
    $ayah = $db->lihatdata("tb_nikah","suami","id","$_POST[pilihan]");
    $ibu = $db->lihatdata("tb_nikah","istri","id","$_POST[pilihan]");
    $insert = $db->insertdata("tb_pengguna","id,nama,ayah,ibu,idnikah,anakke,admin,jeniskelamin","'$id_baru','$nama','$ayah','$ibu','$_POST[pilihan]','$_POST[anakke]','$admin','$_POST[jeniskelamin]'");
      if ($insert) {
        echo $db->alert("Proses Berhasil","$link");
      }    
  }

  // Compress Gambar...
  $ukuran_compress = 50;

  function compress_imsge($soure_url, $destination_url, $quality){
    $info = getimagesize($soure_url);

    if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($soure_url);
    elseif ($info['mime'] == 'image/jpg') $image = imagecreatefromjpg($soure_url);
    elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($soure_url);

    imagejpeg($image, $destination_url, $quality);

    return $destination_url;
  }

  if ($req3 == "prosesgambar") {
    $kodeauto = time();
    $nama_berkas1 = $_FILES['berkas']['name'];
    $x_berkas1 = explode('.', $nama_berkas1);
    $ekstensi_berkas1= strtolower(end($x_berkas1));
    $folder_berkas1 = "gambar/";             
    $nama_berkas1 = $kodeauto.".".$ekstensi_berkas1;
    $data_berkas1 = $folder_berkas1.basename($nama_berkas1);   

    $pindah = compress_imsge($_FILES['berkas']['tmp_name'], $data_berkas1, $ukuran_compress);
    //$pindah = move_uploaded_file($_FILES['berkas']['tmp_name'], "$data_berkas1");
    if ($pindah) {
        $update = $db->updatedata("tb_pengguna","foto='$nama_berkas1'","id","$id");
        echo $db->alert("Proses Berhasil","$link");
      }
  }

  if ($req3 == "prosestambahpassword") {
    if ($_POST['password'] == $_POST['password_ulang']) {
      $update = $db->updatedata("tb_pengguna","password='$_POST[password_ulang]'","id","$id");
      if ($update) {
        echo $db->alert("Proses Berhasil","$link");
      }
    }else{
      echo $db->alert("Password yang dimasukkan tidak samaa...","$link");
    }
  }

  if ($req3 == "prosesupdatepassword") {
    $password_ulang = $db->lihatdata("tb_pengguna","password","id","$id");
    if ($_POST['password'] == $password_ulang) {
      $update = $db->updatedata("tb_pengguna","password='$_POST[password_ulang]'","id","$id");
      if ($update) {
        echo $db->alert("Proses Berhasil","$link");
      }
    }else{
      echo $db->alert("Password Lama yang dimasukkan tidak samaa...","$link");
    }
  }

  if ($req3 == "prosesupdatekematian") {    
      $update = $db->updatedata("tb_pengguna","tglkematian='$_POST[tglkematian]'","id","$id");
      if ($update) {
        echo $db->alert("Proses Berhasil","$link");
      }    
  }

  if ($req3 == "proses_ganti") {
    $_SESSION['idsilsilah'] = $req4;
    echo "<script type='text/javascript'>
        window.location.href='$link';</script>";
  }
 ?>
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>/bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>/plugins/iCheck/all.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo WEB_ROOT ?>/plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<?php 
  $judul_utama = 'Profil';
  $des_judul_utama = 'Melihat semua bagian informasi';
  $menu_samping = 'Profil';

  $foto = $db->lihatdata("tb_pengguna","foto","id","$id");
  
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
    <?php 
          $editprofil = $db->tampildata("tb_pengguna where id='$_SESSION[idsilsilah]'");
          while ($row_edit = $editprofil->fetch_array()){ ?>
    <section class="content">
      <?php if (empty($req3) or $req3 == "setAyah" or $req3 == "setIbu" or $req3 == "setPasangan" or $req3 == "setOrtu" or $req3 == "setAnak") { ?>
      <!-- Default box -->
      <div class="row">
        <!-- left column -->
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php 
              if (empty($foto)) { ?>
              <img class="profile-user-img img-responsive" src="<?php echo WEB_ROOT."/dist/img/"; ?>user4-128x128.png" alt="User profile picture">
              <?php }else{ ?>
              <img class="profile-user-img img-responsive" src="<?php echo WEB_ROOT."/gambar/"; ?><?php echo $foto ?>" alt="User profile picture">
              <?php } ?>

              <h3 class="profile-username text-center">                
                <?php echo $db->lihatdata("tb_pengguna","nama","id","$id"); ?></h3>

              <p class="text-muted text-center"><?php echo $db->lihatdata("tb_pengguna","nik","id","$id"); ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Jenis Kelamin</b> <a class="pull-right">
                    <?php echo $db->lihatdata("tb_pengguna","jeniskelamin","id","$id"); ?>                      
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Lahir</b> <a class="pull-right">
                    <?php
                    if ($db->lihatdata("tb_pengguna","tgllahir","id","$id") == "0000-00-00") {
                       echo "";
                     }else{
                      echo tgl_indo($db->lihatdata("tb_pengguna","tgllahir","id","$id"));
                     }  ?></a>
                </li>
                <li class="list-group-item">
                  <b>Anak Ke-</b> <a class="pull-right">
                    <?php echo $db->lihatdata("tb_pengguna","anakke","id","$id"); ?></a>
                </li>
                <li class="list-group-item">
                  <b>Usia</b> <a class="pull-right">
                    <?php 
                    $tgllahir = $db->lihatdata("tb_pengguna","tgllahir","id","$id");
                    $tglkematian = $db->lihatdata("tb_pengguna","tglkematian","id","$id");
                    if (empty($tgllahir)) {
                      echo "";
                    }else{                       
                      if (empty($tglkematian)) {
                        echo $db->umur($tgllahir,$tglkematian);
                      }else{
                        echo $db->umur($tgllahir,$tglkematian);
                      }
                    } ?></a>
                </li>
                <li class="list-group-item">
                  <b>Telpon</b> <a class="pull-right">
                    <?php echo $db->lihatdata("tb_pengguna","telp","id","$id"); ?></a>
                </li>
                <li class="list-group-item">
                  <b>Alamat</b> <br>
                  <a>
                    <?php echo $db->lihatdata("tb_pengguna","alamat","id","$id"); ?></a>
                </li>
              </ul>

              <a href="<?php echo $link ?>/editprofil" class="btn btn-primary btn-block"><b>Edit Data</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-8">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Keluarga</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <?php if ($req3 == "setAyah") { ?>
                <form action="<?php echo $link ?>/proses_setayah" method="POST">
                  <tr>                  
                    <td style="width: 25%"><b>Ayah</b></td>
                    <td colspan="2">
                      <div class="form-group">                        
                        <select class="form-control select2" style="width: 100%;" name="pilih">
                          <option value="">--Pilih Ayah --</option>
                          <?php 
                          $setayah = $db->tampildata("tb_pengguna where jeniskelamin='L' and id <> '$_SESSION[idsilsilah]' and admin='$_SESSION[adminsilsilah]'");
                          while ($row_setayah = $setayah->fetch_array()) { ?>
                            <?php $nama_ayah = $db->lihatdata("tb_pengguna","ayah","id",$row_setayah['id']); ?>
                            <option value="<?php echo $row_setayah['id'] ?>"><?php echo $row_setayah['nama']." bin ".$nama_ayah ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="input-group">                      
                        <!-- /btn-group -->
                        <input type="text" name="ketik" class="form-control" placeholder="Masukkan Nama Baru...">
                        <div class="input-group-btn">
                          <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        <div class="input-group-btn">
                          <a href="<?php echo $link ?>" class="btn btn-danger">Batal</a>
                        </div>
                      </div>
                    </td>          
                  </tr>   
                </form>             
                <?php }else{ ?>
                <tr>                  
                  <td style="width: 25%"><b>Ayah</b></td>
                  <td style="width: 35%">
                    <a href="<?php echo $link ?>/proses_ganti/<?php echo $row_edit['ayah'] ?>" title=""><?php echo $db->lihatdata("tb_pengguna","nama","id","$row_edit[ayah]") ?></a>
                  </td>
                  <td style="width: 40%" class="pull-right"><a href="<?php echo $link ?>/setAyah" title="">Set Ayah</a></td>
                </tr>
                <?php } ?>
                <?php if ($req3 == "setIbu") { ?>
                <form action="<?php echo $link ?>/proses_setIbu" method="POST">
                  <tr>                  
                    <td style="width: 25%"><b>Ibu</b></td>
                    <td colspan="2">
                      <div class="form-group">                        
                        <select class="form-control select2" style="width: 100%;" name="pilih">
                          <option value="">--Pilih Ibu --</option>
                          <?php 
                          $setibu = $db->tampildata("tb_pengguna where jeniskelamin='P' and id <> '$_SESSION[idsilsilah]' and admin='$_SESSION[adminsilsilah]'");
                          while ($row_setibu = $setibu->fetch_array()) { ?>
                            <option value="<?php echo $row_setibu['id'] ?>"><?php echo $row_setibu['nama'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="input-group">                      
                        <!-- /btn-group -->
                        <input type="text" name="ketik" class="form-control" placeholder="Masukkan Nama Baru...">
                        <div class="input-group-btn">
                          <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        <div class="input-group-btn">
                          <a href="<?php echo $link ?>" class="btn btn-danger">Batal</a>
                        </div>
                      </div>
                    </td>          
                  </tr>   
                </form>             
                <?php }else{ ?>
                <tr>                  
                  <td style="width: 25%"><b>Ibu</b></td>
                  <td style="width: 35%">
                    <a href="<?php echo $link ?>/proses_ganti/<?php echo $row_edit['ibu'] ?>" title=""><?php echo $db->lihatdata("tb_pengguna","nama","id","$row_edit[ibu]") ?></a>
                  </td>
                  <td style="width: 40%" class="pull-right"><a href="<?php echo $link ?>/setIbu" title="">Set Ibu</a></td>
                </tr>
                <?php } ?>
                <?php if ($req3 == "setOrtu") { ?>
                <form action="<?php echo $link ?>/proses_setOrtu" method="POST">
                  <tr>                  
                    <td style="width: 25%"><b>Orang Tua</b></td>
                    <td colspan="2">
                      <div class="form-group">                        
                        <select class="form-control select2" style="width: 100%;" name="pilih" required="">
                          <option value="">--Pilih Ortu --</option>
                          <?php 
                          $setOrtu = $db->tampildata("tb_nikah where admin='$_SESSION[adminsilsilah]'");
                          while ($row_setOrtu = $setOrtu->fetch_array()) { ?>
                            <option value="<?php echo $row_setOrtu['id'] ?>"><?php echo $db->lihatdata("tb_pengguna","nama","id","$row_setOrtu[suami]")  ?> & <?php echo $db->lihatdata("tb_pengguna","nama","id","$row_setOrtu[istri]")  ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Update</button>&nbsp;&nbsp;
                        <a href="<?php echo $link ?>" class="btn btn-danger">Batal</a>
                      </div>
                                           
                    </td>          
                  </tr>   
                </form>             
                <?php }else{ ?>
                <tr>                  
                  <td style="width: 25%"><b>Orang Tua</b></td>
                  <td style="width: 35%">
                    <?php $setOrtu = $db->tampildata("tb_nikah where id='$row_edit[idnikah]'");
                          while ($row_setOrtu = $setOrtu->fetch_array()) { ?>
                    <a href="#" title=""><?php echo $db->lihatdata("tb_pengguna","nama","id","$row_setOrtu[suami]")  ?> & <?php echo $db->lihatdata("tb_pengguna","nama","id","$row_setOrtu[istri]")  ?></a>
                    <?php } ?>
                  </td>
                  <td style="width: 40%" class="pull-right"><a href="<?php echo $link ?>/setOrtu" title="">Set Orang Tua</a></td>
                </tr>
                <?php } ?>
                <?php if ($req3 == "setPasangan") { 
                  if ($row_edit['jeniskelamin'] == "L") { ?>
                    <form action="<?php echo $link ?>/proses_setIstri" method="POST">
                      <tr>                  
                        <td style="width: 25%"><b>Istri</b></td>
                        <td colspan="2">
                          <div class="form-group">                        
                            <select class="form-control select2" style="width: 95%;" name="pilih">
                              <option value="">--Pilih Istri --</option>
                              <?php 
                              $setIstri = $db->tampildata("tb_pengguna where jeniskelamin='P' and id <> '$_SESSION[idsilsilah]' and admin='$_SESSION[adminsilsilah]'");
                              while ($row_setIstri = $setIstri->fetch_array()) { ?>
                                <option value="<?php echo $row_setIstri['id'] ?>"><?php echo $row_setIstri['nama'] ?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">                            
                              <input type="text" name="ketik" class="form-control" placeholder="Masukkan Nama Baru...">                            
                          </div>

                          <div class="form-group"> 
                            <div class="input-group">                      
                              <!-- /btn-group -->
                              <span class="input-group-addon">
                                <!-- <input type="checkbox"> --><i class="fa fa-calendar"></i>
                              </span>
                              <input type="date" name="tglnikah" class="form-control" placeholder="" required=""> 
                            </div>
                          </div>
                          <div class="form-group"> 
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="<?php echo $link ?>" class="btn btn-danger">Batal</a>
                          </div>

                        </td>          
                      </tr>   
                    </form>             
                <?php }elseif ($row_edit['jeniskelamin'] == "P"){ ?>
                    <form action="<?php echo $link ?>/proses_setSuami" method="POST">
                      <tr>                  
                        <td style="width: 25%"><b>Suami</b></td>
                        <td colspan="2">
                          <div class="form-group">                        
                            <select class="form-control select2" style="width: 100%;" name="pilih">
                              <option value="">--Pilih Suami --</option>
                              <?php 
                              $setSuami = $db->tampildata("tb_pengguna where jeniskelamin='L' and id <> '$_SESSION[idsilsilah]' and admin='$_SESSION[adminsilsilah]'");
                              while ($row_setSuami = $setSuami->fetch_array()) { ?>
                                <option value="<?php echo $row_setSuami['id'] ?>"><?php echo $row_setSuami['nama'] ?></option>
                              <?php } ?>
                            </select>
                          </div>

                          <div class="form-group">
                            <div class="input-group">
                              <input type="text" name="ketik" class="form-control" placeholder="Masukkan Nama Baru...">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="input-group">                      
                            <!-- /btn-group -->
                              <span class="input-group-addon">
                                <!-- <input type="checkbox"> --><i class="fa fa-calendar"></i>
                              </span>
                              <input type="date" name="tglnikah" class="form-control" placeholder="" required="">
                            </div>
                          </div>

                          <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            
                            <a href="<?php echo $link ?>" class="btn btn-danger">Batal</a>
                          </div>
                                                   
                        </td>          
                      </tr>   
                    </form>  
                <?php }}else{ 
                  if ($row_edit['jeniskelamin'] == "L") { ?>                
                    <tr>                  
                      <td style="width: 25%"><b>Istri</b></td>
                      <td style="width: 35%">
                        <?php $no=1; $istri = $db->tampildata("tb_nikah where suami='$_SESSION[idsilsilah]' order by tglnikah asc");
                        while ($row_istri = $istri->fetch_array()) { ?>
                        <a href="<?php echo $link ?>/proses_ganti/<?php echo $row_istri['istri'] ?>" title="">
                          <?php echo $no++ ?>. <?php echo $db->lihatdata("tb_pengguna","nama","id","$row_istri[istri]") ?></a><br>
                        <?php } ?>
                      </td>
                      <td style="width: 40%" class="pull-right"><a href="<?php echo $link ?>/setPasangan" title="">Set Istri</a></td>
                    </tr>
                <?php }else{ ?>
                    <tr>                  
                      <td style="width: 25%"><b>Suami</b></td>
                      <td style="width: 35%">
                        <?php $no=1; $suami = $db->tampildata("tb_nikah where istri='$_SESSION[idsilsilah]' order by tglnikah asc");
                        while ($row_suami = $suami->fetch_array()) { ?>
                        <a href="<?php echo $link ?>/proses_ganti/<?php echo $row_suami['suami'] ?>" title="">
                          <?php echo $no++ ?>. <?php echo $db->lihatdata("tb_pengguna","nama","id","$row_suami[suami]") ?></a><br>
                        <?php } ?>
                      </td>
                      <td style="width: 40%" class="pull-right"><a href="<?php echo $link ?>/setPasangan" title="">Set Suami</a></td>
                    </tr>
                <?php }} ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Anak-Anak</h3>
              <a href="<?php echo $link ?>/setAnak" title="" class="btn btn-info btn-xs pull-right">Tambah</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <?php 
            if ($row_edit['jeniskelamin'] == "L") {
                $nikah = $db->tampildata("tb_nikah where suami='$_SESSION[idsilsilah]'");
              }elseif ($row_edit['jeniskelamin'] == "P") {
                $nikah = $db->tampildata("tb_nikah where istri='$_SESSION[idsilsilah]'");
              }
              if ($nikah->num_rows > 0) { 
              while ($row_nikah = $nikah->fetch_array()) {
                 $anak = $db->tampildata("tb_pengguna where idnikah='$row_nikah[id]' order by anakke asc");
                  
                    while ($row_anak = $anak->fetch_array()) { ?>
                    <a href="<?php echo $link ?>/proses_ganti/<?php echo $row_anak['id'] ?>" title="">
                      Anak Ke-<?php echo $row_anak['anakke'] ?>. <?php echo $row_anak['nama'] ?> (<?php echo $row_anak['jeniskelamin'] ?>)</a><br>
                   
                 <?php  }}}else{ ?>
                  <a href="#" title="">
                      Anak Anak Belum Tercatat</a>
                    <?php } ?>
              <?php if ($req3 == "setAnak") { ?>
                <hr>
                <form action="<?php echo $link ?>/proses_setAnak" method="POST">
                  <div class="row">
                    <div class="col-md-7">
                      <div class="form-group">
                        <label for="exampleInput1">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Baru">
                      </div>
                      <div class="form-group">  
                      <label for="exampleInput1">Dari Pasangan (Pilih Pasangan)</label>                      
                        <select class="form-control select2" style="width: 100%;" name="pilihan" required="">
                          <option value="">--Pilih Ortu --</option>
                          <?php 
                          if ($row_edit['jeniskelamin'] == "L") {
                            $setOrtu = $db->tampildata("tb_nikah where suami='$_SESSION[idsilsilah]' and admin='$_SESSION[adminsilsilah]'");
                          }elseif ($row_edit['jeniskelamin'] == "P") {
                            $setOrtu = $db->tampildata("tb_nikah where istri='$_SESSION[idsilsilah]' and admin='$_SESSION[adminsilsilah]'");
                          }
                          while ($row_setOrtu = $setOrtu->fetch_array()) { ?>
                            <option value="<?php echo $row_setOrtu['id'] ?>"><?php echo $db->lihatdata("tb_pengguna","nama","id","$row_setOrtu[suami]")  ?> & <?php echo $db->lihatdata("tb_pengguna","nama","id","$row_setOrtu[istri]")  ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        <label for="exampleInput1">Jenis Kelamin</label>
                        <div class="form-group">
                          <label>
                            <input type="radio" name="jeniskelamin" value="L" class="flat-red" checked=""> Laki-laki
                          </label>
                          <label>
                            <input type="radio" name="jeniskelamin" value="P" class="flat-red"> Perempuan
                          </label>                
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInput1">Anak Ke-</label>
                        <input type="number" class="form-control" name="anakke" placeholder="Misal : 1-10" required="">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Tambah</button> 
                        <a href="<?php echo $link ?>" class="btn btn-primary"> Kembali</a>
                      </div>
                    </div>
                  </div>
                </form>
              <?php } ?>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Saudara</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php               
              $ayah = $db->lihatdata("tb_pengguna","ayah","id","$_SESSION[idsilsilah]");
              $ibu = $db->lihatdata("tb_pengguna","ibu","id","$_SESSION[idsilsilah]");
              $saudara = $db->tampildata("tb_pengguna where ayah='$ayah' or ibu='$ibu' order by anakke asc");
              while ($row_saudara = $saudara->fetch_array()) { ?>
              <a href="<?php echo $link ?>/proses_ganti/<?php echo $row_saudara['id'] ?>" title="">Anak ke <?php echo $row_saudara['anakke'] ?>. <?php echo $row_saudara['nama'] ?> (<?php echo $row_saudara['jeniskelamin'] ?>)</a><br>
              <?php } ?>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.box -->
      <?php }elseif ($req3 == "editprofil") { ?>
      <div class="box">
        <!-- general form elements -->
        <!-- form start -->        
        <form role="form" action="<?php echo $link."/proses_ubah_profil" ?>" method="POST">
          <div class="row">
            <!-- left column -->
            <div class="col-md-4">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Profil</h3>
                </div>
                <!-- /.box-header -->          
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInput1">Email</label>
                      <input type="text" class="form-control" name="nik" placeholder="" value="<?php echo $row_edit['nik'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInput1">Nama Lengkap</label>
                      <input type="text" class="form-control" name="nama" placeholder="" value="<?php echo $row_edit['nama'] ?>">
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="input-group">
                            <div class="form-group">
                              <label for="exampleInput1">Jenis Kelamin</label>
                              <div class="form-group">
                                <label>
                                  <input type="radio" name="jeniskelamin" value="L" class="flat-red" <?php if ($row_edit['jeniskelamin'] == "L") {
                                    echo "checked";
                                  } ?>> Laki-laki
                                </label>
                                <label>
                                  <input type="radio" name="jeniskelamin" value="P" class="flat-red" <?php if ($row_edit['jeniskelamin'] == "P") {
                                    echo "checked";
                                  } ?>> Perempuan
                                </label>                
                              </div>
                            </div>
                          </div>
                          <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                          <div class="input-group">
                            <div class="form-group">
                              <label for="exampleInput1">Anak Ke-</label>
                              <input type="number" class="form-control" name="anakke" placeholder="Misal : 1-10" value="<?php echo $row_edit['anakke'] ?>" required>
                            </div>
                          </div>
                          <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-6 -->
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="input-group">
                            <div class="form-group">
                              <label>Tanggal Lahir:</label>

                              <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="date" name="tgllahir" class="form-control pull-right" id="" value="<?php echo $row_edit['tgllahir'] ?>" required>
                              </div>
                              <!-- /.input group -->
                            </div>
                          </div>
                          <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                          <!-- <div class="input-group">
                            <div class="form-group">
                              <div class="form-group">
                              <label>Tanggal Kematian:</label>

                              <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="date" name="tglkematian" class="form-control pull-right" id="" value="<?php echo $row_edit['tglkematian'] ?>">
                              </div>
                              
                            </div>
                            </div>
                          </div> -->
                          <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-6 -->
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->             
              </div>
            </div>
            <div class="col-md-4">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Alamat & Kontak</h3>
                </div>
                <!-- /.box-header -->          
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInput1">Alamat</label>
                      <input type="text" class="form-control" name="alamat" placeholder="" value="<?php echo $row_edit['alamat'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInput1">Kota</label>
                      <input type="text" class="form-control" name="kota" placeholder="" value="<?php echo $row_edit['kota'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInput1">Telpon</label>
                      <input type="text" class="form-control" name="telp" placeholder="" value="<?php echo $row_edit['telp'] ?>">
                    </div>                  
                  </div>
                  <!-- /.box-body --> 
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Ubah Profil</button> 
                    <a href="<?php echo $link ?>" class="btn btn-primary"> Kembali</a>
                  </div>              
              </div>
            </div>
            </form>
            <div class="col-md-4">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Update Foto</h3>
                </div>
                <!-- /.box-header -->          
                <form action="<?php echo $link ?>/prosesgambar" method="POST" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <?php 
                        if (empty($foto)) { ?>
                        <img class="profile-user-img img-responsive" src="<?php echo WEB_ROOT."/dist/img/"; ?>user4-128x128.png" alt="User profile picture">
                        <?php }else{ ?>
                        <img class="profile-user-img img-responsive" src="<?php echo WEB_ROOT."/gambar/"; ?><?php echo $foto ?>" alt="User profile picture">
                        <?php } ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Upload Ulang Foto</label>
                      <input type="file" name="berkas" id="exampleInputFile" onchange="ValidateSingleInput(this,this)" required="">

                      <p class="help-block">Format Jpg, Ukuran gambar kurang dari 2 mb</p>
                    </div>                  
                  </div>
                  <!-- /.box-body --> 
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Upload</button> 
                    <a href="<?php echo $link ?>" class="btn btn-primary"> Kembali</a>
                  </div>              
                </form>
              </div>
            </div>            
          </div>
          <div class="row">
            <?php 
            $tglkematian = $db->lihatdata("tb_pengguna","tglkematian","id","$id");
            $password = $db->lihatdata("tb_pengguna","password","id","$id");
            if ($password == null or $password == "") { ?>
              <div class="col-md-4">
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Tambah Password</h3>
                  </div>
                  <!-- /.box-header -->     
                  <form action="<?php echo $link ?>/prosestambahpassword" method="POST">     
                    <div class="box-body">
                      <div class="form-group">
                        <label for="exampleInput1">Passwod</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan Password Baru" value="" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInput1">Ulangi Password</label>
                        <input type="text" class="form-control" name="password_ulang" placeholder="Masukkan Ulang Password baru" value="" required>
                      </div>                                
                    </div>
                    <!-- /.box-body --> 
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Buat Password</button> 
                      <a href="<?php echo $link ?>" class="btn btn-primary"> Kembali</a>
                    </div>  
                  </form>            
                </div>
              </div>
            <?php }else{ ?>
              <div class="col-md-4">
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Update Password</h3>
                  </div>
                  <!-- /.box-header -->   
                  <form action="<?php echo $link ?>/prosesupdatepassword" method="POST">        
                    <div class="box-body">
                      <div class="form-group">
                        <label for="exampleInput1">Passwod Lama</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan Password Lama" value="" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInput1">Password Baru</label>
                        <input type="text" class="form-control" name="password_ulang" placeholder="Password yang baru" value="" required>
                      </div>                                
                    </div>
                    <!-- /.box-body --> 
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Ubah Password</button> 
                      <a href="<?php echo $link ?>" class="btn btn-primary"> Kembali</a>
                    </div>  
                  </form>            
                </div>
              </div>
            <?php } ?>
              <div class="col-md-4">
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Update Tgl Kematian</h3>
                  </div>
                  <!-- /.box-header --> 
                  <form action="<?php echo $link ?>/prosesupdatekematian" method="POST">          
                    <div class="box-body">
                      <div class="form-group">
                        <label for="exampleInput1">Tgl Kematian</label>
                        <input type="date" class="form-control" name="tglkematian" placeholder="" value="<?php echo $tglkematian ?>" required>
                      </div>
                                                     
                    </div>
                    <!-- /.box-body --> 
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Ubah Kematian</button> 
                      <a href="<?php echo $link ?>" class="btn btn-primary"> Kembali</a>
                    </div> 
                  </form>             
                </div>
              </div>
          </div>
                
        <!-- /.box -->
      </div>
      <?php } ?>
    </section>
    <?php } ?>
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
  <!-- Select2 -->
  <script src="<?php echo WEB_ROOT; ?>/bower_components/select2/dist/js/select2.full.min.js"></script>
  <!-- bootstrap datepicker -->
  <script src="<?php echo WEB_ROOT; ?>/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- iCheck 1.0.1 -->
  <script src="<?php echo WEB_ROOT; ?>/plugins/iCheck/icheck.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo WEB_ROOT; ?>/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo WEB_ROOT; ?>/dist/js/adminlte.min.js"></script>
  <script type="text/javascript">
    //Initialize Select2 Elements
    $('.select2').select2()

    //Date picker
    $('#tgllahir').datepicker({
      autoclose: true
    })

    $('#tglkematian').datepicker({
      autoclose: true
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

    //Fungsi Batasan Exten FIle
    var _validFileExtensions = [".jpg"];    
    function ValidateSingleInput(oInput,file) {
        if (oInput.type == "file") {
            var sFileName = oInput.value;
             if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        var FileSize = file.files[0].size / 1024 / 1024; // in MB
                        //Fungsi Menambahkan size file 
                                if (FileSize > 2) {
                                    alert('File size Lebih Dari 2 MB');
                                   $(file).val(''); //for clearing with Jquery
                                } else {

                                }                    
                        break;
                    }
                }
                 
                if (!blnValid) {
                    alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    oInput.value = "";
                    return false;
                }
            }
        }
        return true;
    }
  </script>
</body>
</html>