<?php include_once('../../header.php');?>
<?php 
  $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
	$username = isset($_SESSION['user']) ? $_SESSION['user'] : false;
	if($level=="admin"){
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid_fg">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Edit User</h1>
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
                <h3 class="card-title">User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php
                $id = $_GET['id'];
                $sql_user = mysqli_query($con, "SELECT * FROM tb_user WHERE id_user='$id'") or die (mysqli_error($con));
                $data = mysqli_fetch_array($sql_user);
                $level = $data['level'];
              ?>
              <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Level</label><br>
                    <input type="hidden" class="form-control" name="id" value="<?=$data['id_user']?>">
                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary1" name="level" value="admin" <?php if($level == "admin"){echo "checked='true'";} ?> required>
                        <label for="radioPrimary1">
                        Admin
                        </label>
                      </div>&nbsp;&nbsp;&nbsp;
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary2" name="level" value="customer" <?php if($level == "customer"){echo "checked='true'";} ?> required>
                        <label for="radioPrimary2">
                        Customer
                        </label>
                      </div>&nbsp;&nbsp;&nbsp;
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary3" name="level" value="fotografer" <?php if($level == "fotografer"){echo "checked='true'";} ?> required>
                        <label for="radioPrimary3">
                        Fotografer
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" name="nama_user" value="<?=$data['nama']?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" value="<?=$data['email']?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="textarea" class="form-control" name="alamat" value="<?=$data['alamat']?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">No. HP</label>
                    <input type="text" class="form-control" name="no_hp" value="<?=$data['no_hp']?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" name="username" value="<?=$data['username']?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="text" class="form-control" name="password" value="<?=$data['password']?>" readonly>
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
<?php } ?>
<?php include_once('../../footer.php');?>