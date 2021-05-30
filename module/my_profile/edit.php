<?php 
include_once('../../header.php');
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
$username = isset($_SESSION['user']) ? $_SESSION['user'] : false;
$id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
if($id_user){
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid_fg">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Edit Profile</h1>
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
                <h3 class="card-title">Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php
                // $id = $_GET['id'];
                $sql_user = mysqli_query($con, "SELECT * FROM tb_user WHERE id_user='$id'") or die (mysqli_error($con));
                $data = mysqli_fetch_array($sql_user);
                $file=$data['foto'];
              ?>
              <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                <div class="card-body box-profile">
                      <div class="text-center">
                        <!-- <img class="profile-user-img img-fluid img-circle"
                            src="../../dist/img/user4-128x128.jpg"
                            alt="User profile picture"> -->
                        <?php
                        if($file == ''){
                          ?>
                          <a href="../../poto/default.png"><img src="../../poto/default.png" class="profile-user-img img-fluid img-circle" ></a>
                          <?php }
                          
                          else { ?>
                          <a href="../../poto/<?php echo $data['foto'];?>"><img src="../../poto/<?=$data['foto'];?>" class="center-cropped profile-user-img img-fluid img-circle" ></a>
                          <?php }?>
                      </div>

                      <h3 class="profile-username text-center"><?=$data['level']?></h3><br>

                      <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                          <label for="exampleInputEmail1">Ubah Foto Profile</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="foto" id="nama_file">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                        </li>
                        <li class="list-group-item">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?=$data['nama']?>" id_fg="exampleInputEmail1" placeholder="Enter nama">
                        </li>
                        <li class="list-group-item">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="<?=$data['alamat']?>" id_fg="exampleInputEmail1" placeholder="Enter nama">
                        </li>
                        <li class="list-group-item">
                            <label for="exampleInputEmail1">No. Hp</label>
                            <input type="number" class="form-control" name="no_hp" value="<?=$data['no_hp']?>" id_fg="exampleInputEmail1" placeholder="Enter nama">
                        </li>
                        <li class="list-group-item">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" name="email" value="<?=$data['email']?>" id_fg="exampleInputEmail1" placeholder="Enter nama">
                        </li>
                        
                      </ul>
                    </div>
              <!-- /.card-body -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="edit" class="btn btn-primary">Submit</button>
                  <a href="data.php" class="btn btn-warning"><i class="fas fa-undo"></i> Kembali</a>
                </div>
              </form>
              <!-- Profile Image -->
            
            <!-- /.card -->
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