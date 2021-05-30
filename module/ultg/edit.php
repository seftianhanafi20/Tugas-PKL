<?php 
include_once('../../header.php');
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
$username = isset($_SESSION['user']) ? $_SESSION['user'] : false;
$id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
if($level=="admin"){
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid_fg">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Edit ULTG</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid_fg -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid_fg">
        <div class="row">
          <!-- left column -->
          <div class="col-md">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ULTG</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php
                $id = $_GET['id'];
                $sql = mysqli_query($con, "SELECT * FROM ultg WHERE id_ultg='$id'") or die (mysqli_error($con));
                $data = mysqli_fetch_array($sql);
              ?>
              <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ULTG</label>
                    <input type="hidden" class="form-control" name="id" value="<?=$data['id_ultg']?>">
                    <input type="text" class="form-control" name="nama_ultg" value="<?=$data['nama_ultg']?>" placeholder="Enter ULTG">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="edit" class="btn btn-primary">Submit</button>
                  <a href="data.php" class="btn btn-warning"><i class="fas fa-undo"></i> Kembali</a>
                </div>
              </form>
            </div>
            </div>
        <!-- /.row -->
      </div><!-- /.container-fluid_fg -->
    </section>
    <!-- /.content -->
  </div>
<?php
}
?>
<?php include_once('../../footer.php');?>