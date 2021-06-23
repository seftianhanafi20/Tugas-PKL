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
            <h1>Form Tambah User</h1>
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
                <h3 class="card-title">User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="proses.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">No. Induk</label>
                    <input type="text" class="form-control" name="no_induk" id="exampleInputEmail1" placeholder="No. Induk" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" name="nama" id="exampleInputEmail1" placeholder="Nama" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="text" class="form-control" name="password" id="exampleInputEmail1" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="exampleInputEmail1" placeholder="Alamat" required>
                  </div>
                  <div class="form-group clearfix">
                    <label for="exampleInputEmail1">Jenis Kelamin</label><br>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary1" name="jk" value="l">
                      <label for="radioPrimary1">
                        L
                      </label>
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary2" name="jk" value="p">
                      <label for="radioPrimary2">
                        P
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">No. Telepon</label>
                    <input type="number" data-maxlength="13" oninput="this.value=this.value.slice(0,this.dataset.maxlength)" class="form-control" name="no_hp" id="exampleInputEmail1" placeholder="No. Telepon" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email" required>
                  </div>
                  <div class="form-group clearfix">
                    <label for="exampleInputEmail1">Level</label><br>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary3" name="level" value="admin">
                      <label for="radioPrimary3">
                        Admin
                      </label>
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary4" name="level" value="pegawai">
                      <label for="radioPrimary4">
                        Pegawai
                      </label>
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary5" name="level" value="operator">
                      <label for="radioPrimary5">
                        Operator
                      </label>
                    </div>
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