<?php include_once('../../header.php');?>
<?php 
  $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
  $username = isset($_SESSION['user']) ? $_SESSION['user'] : false;
  $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
	if($level=="admin"){
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Tambah ULTG</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ULTG</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="proses.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ULTG</label>
                    <input type="text" class="form-control" name="nama_ultg" id="exampleInputEmail1" placeholder="Enter ULTG" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="add" class="btn btn-primary">Submit</button>
                  <a href="data.php" class="btn btn-warning"><i class="fas fa-undo"></i> Kembali</a>
                </div>
              </form>
            </div>
            </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php } ?>
<?php include_once('../../footer.php');?>