<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V16</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Silahkan Register
				</span>
				<?php
                    require_once "../_config/config.php";
                    if (isset($_POST['register'])) { //'register' sesuai name yang ada di button
                        //$id = trim(mysqli_real_escape_string($con, $_POST['id']));
						//$id_user = '';
                        $level = "customer";
						$nama_user = trim(mysqli_real_escape_string($con, $_POST['nama_user']));
						// $nik = trim(mysqli_real_escape_string($con, $_POST['nik']));
                        $email = trim(mysqli_real_escape_string($con, $_POST['email']));
                        $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
                        $no_hp = trim(mysqli_real_escape_string($con, $_POST['no_hp']));
                        $username = trim(mysqli_real_escape_string($con, $_POST['username']));
                        $password = md5(trim(mysqli_real_escape_string($con, $_POST['password'])));
						$re_password = md5(trim(mysqli_real_escape_string($con, $_POST['re_password'])));
                        $foto = trim(mysqli_real_escape_string($con, $_POST['foto']));

                        //$lev = trim(mysqli_real_escape_string($con, $_POST['level']));
                        //$sql = mysqli_query($con, "SELECT * FROM user WHERE username='$username'");
                        $sql = mysqli_query($con, "SELECT * FROM tb_user WHERE username= '$username'");

                        
						// Kalau username sudah ada yang pakai
                        if (mysqli_num_rows($sql) > 0){ ?>
                            <!-- // echo "<script>
                            // alert ('Username telah terdaftar');
                            // </script>"; -->
                            <div class="alert alert-danger" role="alert">
                                <strong>Register Gagal!</strong> Username/NIK Telah Terdaftar
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
						    </div>
						<?php }
                        elseif($password != $re_password){ ?>
                            <!-- // echo "<script>
                            // alert ('Password Tidak Sama');
                            // </script>"; -->
                            <div class="alert alert-danger" role="alert"></div>
                                <strong>Register Gagal!</strong> Password Tidak sama
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
						    </div>
                        <?php }
                        else{
                            mysqli_query($con, "INSERT INTO tb_user (id_user, level, nama_user, email, alamat, no_hp, username, password, foto) VALUES (NULL, '$level', '$nama_user', '$email', '$alamat', '$no_hp', '$username', '$password', '$foto')") or die (mysqli_error($con));
							echo "<script>alert('Data Berhasil disimpan ')</script>";
							echo "<script>window.location='".base_url('auth/login.php')."';</script>";
    						
							// echo "<script>window.location='index.php';</script>";
                        }
                            //$password = md5($password);
                            //mysqli_sql($con, "INSERT INTO user (level, nama, email, alamat, phone, password, status)
                            //    VALUES ('$lev','$nama_lengkap','$email','$alamat','$phone','$password','$status')")
                        
                            
                        }
                ?>
				<form action="" method="post" class="login100-form validate-form p-b-33 p-t-5">

					<div class="wrap-input100 validate-input" data-validate = "Enter nama lengkap">
						<input class="input100" type="text" name="nama_user" placeholder="Nama Lengkap">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<!-- <div class="wrap-input100 validate-input" data-validate = "Enter NIK">
						<input class="input100" type="number" data-maxlength="16" oninput="this.value=this.value.slice(0,this.dataset.maxlength)" name="nik" placeholder="NIK">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div> -->

					<div class="wrap-input100 validate-input" data-validate = "Enter email">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter alamat">
						<input class="input100" type="textarea" name="alamat" placeholder="Alamat">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter nomor hp">
						<input class="input100" type="number" data-maxlength="13" oninput="this.value=this.value.slice(0,this.dataset.maxlength)" name="no_hp" placeholder="No. HP/ex: 628..">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter repassword">
						<input class="input100" type="password" name="re_password" placeholder="Re-Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button type="submit" name="register" class="login100-form-btn">
							Sign Up
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>