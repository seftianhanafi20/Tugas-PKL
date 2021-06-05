<?php
require_once "_config/config.php";
//require_once "_assets/libs/vendor/autoload.php";
$id = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
$username = isset($_SESSION['user']) ? $_SESSION['user'] : false;
// $keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : false;
// $keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
// $totalBarang = count($keranjang);
	if(!isset($_SESSION['user'])) {
        echo "<script>window.location='".base_url('auth/login.php')."';</script>";
    }
    elseif(!isset($id)){
      echo "<script>window.location='".base_url('auth/login.php')."';</script>";
    }

   
$sql_user = mysqli_query($con, "SELECT * FROM tb_user WHERE id_user='$id'") or die (mysqli_error($con));
$data = mysqli_fetch_array($sql_user);
$file=$data['foto'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UPT KalSelTeng</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=BASE_URL('plugins/fontawesome-free/css/all.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?=BASE_URL('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css');?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=BASE_URL('plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=BASE_URL('plugins/jqvmap/jqvmap.min.css');?>">
  <!-- Ion Slider -->
  <link rel="stylesheet" href="<?=BASE_URL('plugins/ion-rangeslider/css/ion.rangeSlider.min.css');?>">
  <!-- bootstrap slider -->
  <link rel="stylesheet" href="<?=BASE_URL('plugins/bootstrap-slider/css/bootstrap-slider.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=BASE_URL('dist/css/adminlte.min.css');?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=BASE_URL('plugins/overlayScrollbars/css/OverlayScrollbars.min.css');?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=BASE_URL('plugins/daterangepicker/daterangepicker.css');?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=BASE_URL('plugins/summernote/summernote-bs4.min.css');?>">

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css"> -->

  <script src="<?=BASE_URL('js/jquery-3.5.1.min.js');?>" ></script>
  <link rel="stylesheet" href="<?=BASE_URL('auth/css/style.css');?>">
  
  <!-- <link rel="stylesheet" href="<?=BASE_URL('asset/bootstrap-3.3.7/dist/css/bootstrap.min.css');?>"> -->
  <link rel="stylesheet" href="<?=BASE_URL('asset/select2-4.0.6-rc.1/dist/css/select2.min.css');?>">
  <script src="<?=BASE_URL('asset/jquery/jquery-3.3.1.min.js');?>"></script>
  <script src="<?=BASE_URL('asset/bootstrap-3.3.7/dist/js/bootstrap.min.js');?>"></script>
  <script src="<?=BASE_URL('asset/select2-4.0.6-rc.1/dist/js/select2.min.js');?>"></script>   
  <script src="<?=BASE_URL('asset/select2-4.0.6-rc.1/dist/js/i18n/id.js');?>"></script>   
  <script src="<?=BASE_URL('asset/js/app.js');?>"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php 
  if($level=="admin"){
    if($_SESSION['level']!='admin') {
      echo "<script>window.location='".base_url('auth/login.php')."';</script>";
  }
?>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=BASE_URL('dashboard')?>" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=BASE_URL('module/kontak/data.php')?>" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=BASE_URL('dashboard')?>" class="brand-link">
      <img src="<?=BASE_URL('dist/img/AdminLTELogoo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"');?>">
      <span class="brand-text font-weight-light">UPT KalSelTeng</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <?php
					   if($file == ''){
							?>
							<a href="<?=BASE_URL()?>/poto/default.png"><img src="<?=BASE_URL()?>/poto/default.png" class="img-circle elevation-2" ></a>
							<?php }
							
							else { ?>
							<a href="<?=BASE_URL()?>/poto/<?php echo $data['foto'];?>"><img src="<?=BASE_URL()?>/poto/<?=$data['foto'];?>" class="center-cropped img-circle elevation-2" style="width: 33px; height: 33px;"></a>
					<?php }?>
        </div>
        
        <div class="info">
          <a href="<?=BASE_URL('module/my_profile/data.php')?>" class="d-block"><?php echo $username; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item open-menu">
            <a href="<?=BASE_URL('dashboard')?>" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item open-menu">
            <a href="<?=BASE_URL('module/ultg/data.php')?>" class="nav-link active">
              <i class="nav-icon fas fa-charging-station"></i>
              <p>
                ULTG
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item open-menu">
            <a href="<?=BASE_URL('module/transmisi_trafo/data.php')?>" class="nav-link active">
              <i class="nav-icon fas fa-broadcast-tower"></i>
              <p>
                Transmisi Trafo
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item open-menu">
            <a href="<?=BASE_URL('module/gangguan/data.php')?>" class="nav-link active">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Data Gangguan
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item open-menu">
            <a href="<?=BASE_URL('module/user/data.php')?>" class="nav-link active">
              <i class="nav-icon far fa-user"></i>
              <p>
                User
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item open-menu">
            <a href="<?=BASE_URL('auth/logout.php')?>" class="nav-link active">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<?php
    }elseif($level=="operator"){
      if($_SESSION['level']!='operator') {
        echo "<script>window.location='".base_url('auth/login.php')."';</script>";
    }
?>
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=BASE_URL('dashboard')?>" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=BASE_URL('module/kontak/data.php')?>" class="nav-link">Contact</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=BASE_URL('dashboard')?>" class="brand-link">
      <img src="<?=BASE_URL('dist/img/AdminLTELogoo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"');?>">
      <span class="brand-text font-weight-light">UPT KalSelTeng</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
							<!-- <a href="<?=BASE_URL()?>/poto/default.png"><img src="<?=BASE_URL()?>/poto/default.png" class="img-circle elevation-2" ></a> -->
        <?php
					   if($file == ''){
							?>
							<a href="<?=BASE_URL()?>/poto/default.png"><img src="<?=BASE_URL()?>/poto/default.png" class="img-circle elevation-2" ></a>
							<?php }
							
							else { ?>
							<a href="<?=BASE_URL()?>/poto/<?php echo $data['foto'];?>"><img src="<?=BASE_URL()?>/poto/<?=$data['foto'];?>" class="center-cropped img-circle elevation-2" style="width: 33px; height: 33px;"></a>
				<?php }?>
        </div>
        <div class="info">
          <a href="<?=BASE_URL('module/my_profile/data.php')?>" class="d-block"><?php echo $data['nama']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item open-menu">
            <a href="<?=BASE_URL('module/gangguan/data.php')?>" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Data Gangguan
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item open-menu">
            <a href="<?=BASE_URL('auth/logout.php')?>" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</div>
<?php
    }elseif($level=="pegawai"){
      if($_SESSION['level']!='pegawai') {
        echo "<script>window.location='".base_url('auth/login.php')."';</script>";
      }
?>
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=BASE_URL('dashboard')?>" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=BASE_URL('module/kontak/data.php')?>" class="nav-link">Contact</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=BASE_URL('dashboard')?>" class="brand-link">
      <img src="<?=BASE_URL('dist/img/AdminLTELogoo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"');?>">
      <span class="brand-text font-weight-light">UPT KalSelTeng</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
							<!-- <a href="<?=BASE_URL()?>/poto/default.png"><img src="<?=BASE_URL()?>/poto/default.png" class="img-circle elevation-2" ></a> -->
        <?php
					   if($file == ''){
							?>
							<a href="<?=BASE_URL()?>/poto/default.png"><img src="<?=BASE_URL()?>/poto/default.png" class="img-circle elevation-2" ></a>
							<?php }
							
							else { ?>
							<a href="<?=BASE_URL()?>/poto/<?php echo $data['foto'];?>"><img src="<?=BASE_URL()?>/poto/<?=$data['foto'];?>" class="center-cropped img-circle elevation-2" style="width: 33px; height: 33px;"></a>
				<?php }?>
        </div>
        <div class="info">
          <a href="<?=BASE_URL('module/my_profile/data.php')?>" class="d-block"><?php echo $data['nama']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item open-menu">
            <a href="<?=BASE_URL('dashboard')?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item open-menu">
            <a href="<?=BASE_URL('module/gangguan/data.php')?>" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Data Gangguan
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item open-menu">
            <a href="<?=BASE_URL('auth/logout.php')?>" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</div>
<?php } ?>