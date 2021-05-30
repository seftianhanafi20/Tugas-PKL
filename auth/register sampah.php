<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- <link href="https://fonts.googleapis.com/css?family=Numans" rel="stylesheet" id="bootstrap-css"> -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>SITALEPAM</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="img/favicon1.ico">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card1">
			<div class="card-header">
				<div class="col-md-12 center login-header">
					<h2 style="color: lightblue; text-align: center;"><b>Welcome to SITALEPAM</b></h2>
				</div>
				<h3>Sign Up</h3>
				<!-- <div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div> -->
                <?php
                    require_once "../_config/config.php";
                    if (isset($_POST['register'])) { //'register' sesuai name yang ada di button
                        //$id = trim(mysqli_real_escape_string($con, $_POST['id']));
						$id = "";
                        $level = "user";
						$nama_user = trim(mysqli_real_escape_string($con, $_POST['nama_user']));
                        $email = trim(mysqli_real_escape_string($con, $_POST['email']));
                        $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
                        $no_hp = trim(mysqli_real_escape_string($con, $_POST['no_hp']));
                        $username = trim(mysqli_real_escape_string($con, $_POST['username']));
                        $password = md5(trim(mysqli_real_escape_string($con, $_POST['password'])));
                        $re_password = md5(trim(mysqli_real_escape_string($con, $_POST['re_password'])));

                        //$lev = trim(mysqli_real_escape_string($con, $_POST['level']));
                        //$sql = mysqli_query($con, "SELECT * FROM user WHERE username='$username'");
                        $sql = mysqli_query($con, "SELECT * FROM tb_user WHERE username= '$username'");

                        
                        // Kalau username sudah ada yang pakai
                        if (mysqli_num_rows($sql) > 0){ ?>
                            <!-- // echo "<script>
                            // alert ('Username telah terdaftar');
                            // </script>"; -->
                            <div class="alert alert-danger" role="alert">
                                <strong>Register Gagal!</strong> Username Telah Terdaftar
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
						    </div>
                    <?php }
                        elseif($password != $re_password){ ?>
                            <!-- // echo "<script>
                            // alert ('Password Tidak Sama');
                            // </script>"; -->
                            <div class="alert alert-danger" role="alert">
                                <strong>Register Gagal!</strong> Password Tidak sama
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
						    </div>
                        <?php }
                        else{
                            mysqli_query($con, "INSERT INTO tb_user (id, level, nama_user, email, alamat, no_hp, username, password) VALUES ('$id', '$level', '$nama_user', '$email', '$alamat', '$no_hp', '$username', '$password')") or die (mysqli_error($con));
    						echo "<script>window.location='".base_url('auth/login.php')."';</script>";
							// echo "<script>window.location='index.php';</script>";
                        }
                            //$password = md5($password);
                            //mysqli_sql($con, "INSERT INTO user (level, nama, email, alamat, phone, password, status)
                            //    VALUES ('$lev','$nama_lengkap','$email','$alamat','$phone','$password','$status')")
                        
                            
                        }
                    ?>
			</div>
			<div class="card-body">
				<form class="form-horizontal" action="" method="post">
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="nama_user" placeholder="Nama Lengkap" required>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						</div>
						<input type="email" class="form-control" name="email" placeholder="Email" required>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						</div>
						<input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
					</div>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						</div>
						<input type="text" class="form-control" name="no_hp" placeholder="No. HP" required>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						</div>
						<input type="text" class="form-control" name="username" placeholder="Username" required>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" placeholder="Password" required>
					</div>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="re_password" placeholder="Re-password" required>
					</div>
					<!-- <div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div> -->
					<div class="form-group">
						<input type="submit" name="register" value="Sign Up" class="btn float-right login_btn" required>
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-left links">
					<a href="<?=BASE_URL('auth/login.php')?>">Back</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>