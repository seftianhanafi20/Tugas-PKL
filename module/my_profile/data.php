<?php include_once('../../header.php');?>
<?php 
  $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
	$username = isset($_SESSION['user']) ? $_SESSION['user'] : false;
	$id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
?>
    <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
	<?php
		$sql_user = mysqli_query($con, "SELECT * FROM tb_user WHERE id_user='$id'") or die (mysqli_error($con));
		$data = mysqli_fetch_array($sql_user);
		$file=$data['foto'];
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
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
							<a href="<?=BASE_URL()?>/poto/<?php echo $data['foto'];?>"><img src="<?=BASE_URL()?>/poto/<?php echo $data['foto'];?>" class="center-cropped profile-user-img img-fluid img-circle"></a>
							<?php }?>
                </div>

                <h3 class="profile-username text-center"><?=$data['nama']?></h3>

                <p class="text-muted text-center"><?=$data['level']?></p>
                
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>No. Induk</b> <a class="float-right"><?=$data['no_induk']?></a>
                  </li>  
                  <li class="list-group-item">
                    <b>Username</b> <a class="float-right"><?=$data['username']?></a>
                  </li>
                  <li class="list-group-item">
                    <b>No. Hp</b> <a class="float-right"><?=$data['no_hp']?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?=$data['email']?></a>
                  </li>
                </ul>

                <a href="edit.php?id_user=<?=$data['id_user']?>" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <!-- <div class="col-md-8">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                </ul>
              </div>

              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                  <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                
              </div>

            </div>

          </div> -->
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once('../../footer.php');?>
