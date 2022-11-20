<header class="main-header">
<!-- Logo -->
<a href="#" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>L</b>9</span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>Silsilah</b></span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </a>

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">  
      <!-- User Account: style can be found in dropdown.less -->
      <?php if (@$_SESSION['idsilsilah'] == "") { ?>
      <?php }else{ ?>
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="<?php echo WEB_ROOT; ?>/dist/img/user4-128x128.png" class="user-image" alt="User Image">
          <span class="hidden-xs">Administrator</span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <img src="<?php echo WEB_ROOT; ?>/dist/img/user4-128x128.png" class="img-circle" alt="User Image">

            <p>
              <?php echo $db->lihatdata("tb_pengguna","nama","id","$_SESSION[adminsilsilah]"); ?>
              <small>Terdaftar dari <?php echo $db->lihatdata("tb_pengguna","tgl_buat","id","$_SESSION[adminsilsilah]"); ?></small>
            </p>
          </li>
          </li>
          <!-- Menu Footer-->          
            <li class="user-footer">
            <div class="pull-left">
              <a href="<?php echo WEB_ROOT."/User" ?>/proses_ganti/<?php echo $_SESSION['adminsilsilah'] ?>" class="btn btn-default btn-flat">Profil Admin</a>
            </div>
            <div class="pull-right">
              <a href="<?php echo WEB_ROOT ?>/keluar.php" class="btn btn-default btn-flat">Keluar</a>
            </div>
          </li>
          <?php } ?>
        </ul>
      </li>
    </ul>
  </div>
</nav>
</header>