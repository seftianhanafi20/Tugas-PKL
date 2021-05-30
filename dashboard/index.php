<?php 
include_once('../header.php'); 
$id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
$username = isset($_SESSION['user']) ? $_SESSION['user'] : false;
?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- <?php
    if($level=="admin" || $level=="fotografer"){
        $tampil1=mysqli_query($con, "SELECT * FROM pesanan ") or die(mysqli_error($con));
        $tampil2=mysqli_query($con, "SELECT * FROM pesanan WHERE status='0' ") or die(mysqli_error($con));
        $tampil3=mysqli_query($con, "SELECT * FROM pesanan WHERE status='1' ") or die(mysqli_error($con));
        $tampil4=mysqli_query($con, "SELECT * FROM pesanan WHERE status='2' ") or die(mysqli_error($con));
        $tampil5=mysqli_query($con, "SELECT * FROM pesanan WHERE status='3' ") or die(mysqli_error($con));
        $tampil6=mysqli_query($con, "SELECT * FROM tb_user ") or die(mysqli_error($con));
    }
    elseif ($level=="customer") {
        $tampil1=mysqli_query($con, " SELECT pesanan.*, tb_user.nama_user FROM pesanan JOIN tb_user ON pesanan.id_user=tb_user.id_user
        WHERE pesanan.id_user='$id_user' ") or die(mysqli_error($con));
        $tampil2=mysqli_query($con, "SELECT pesanan.*, tb_user.nama_user FROM pesanan JOIN tb_user ON pesanan.id_user=tb_user.id_user
        WHERE pesanan.id_user='$id_user' && pesanan.status='0' ") or die(mysqli_error($con));
        $tampil3=mysqli_query($con, "SELECT pesanan.*, tb_user.nama_user FROM pesanan JOIN tb_user ON pesanan.id_user=tb_user.id_user
        WHERE pesanan.id_user='$id_user' && pesanan.status='1' ") or die(mysqli_error($con));
        $tampil4=mysqli_query($con, "SELECT pesanan.*, tb_user.nama_user FROM pesanan JOIN tb_user ON pesanan.id_user=tb_user.id_user
        WHERE pesanan.id_user='$id_user' && pesanan.status='2' ") or die(mysqli_error($con));
        $tampil5=mysqli_query($con, "SELECT pesanan.*, tb_user.nama_user FROM pesanan JOIN tb_user ON pesanan.id_user=tb_user.id_user
        WHERE pesanan.id_user='$id_user' && pesanan.status='3' ") or die(mysqli_error($con));
        $tampil6=mysqli_query($con, "SELECT * FROM tb_user ") or die(mysqli_error($con));
    }
        $jumlah = mysqli_num_rows($tampil1);
        $jumlah2 = mysqli_num_rows($tampil2);
        $jumlah3 = mysqli_num_rows($tampil3);
        $jumlah4 = mysqli_num_rows($tampil4);
        $jumlah5 = mysqli_num_rows($tampil5);
        $jumlah6 = mysqli_num_rows($tampil6);

    ?> -->
    <!-- Main content -->
    
    <!-- /.content -->
  </div>

<?php 
include_once('../footer.php'); 
?>