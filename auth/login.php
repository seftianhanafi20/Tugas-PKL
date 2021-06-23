<?php 
    require_once "../_config/config.php";
    if (isset($_SESSION['user'])) {
        echo "<script>window.location='".base_url()."';</script>";
    }
    else{
 ?>
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
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="package/dist/sweetalert2.all.min.js"></script>
	<script src="sweetalert2.min.js"></script>
	<link rel="stylesheet" href="package/dist/sweetalert2.min.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-02.jpg');">
		<?php
			if(isset($_POST['login'])) {
					$user = trim(mysqli_real_escape_string($con, $_POST['user']));
					$pass = md5(trim(mysqli_real_escape_string($con, $_POST['pass'])));
					$sql_login = mysqli_query($con, "SELECT * FROM tb_user WHERE no_induk = '$user' OR username='$user' AND password = '$pass'") or die (mysqli_error($con));//sebagai tracking error =or die (mysqli_error($con)
					$data=mysqli_fetch_array($sql_login);
					if(mysqli_num_rows($sql_login) > 0) {
					$_SESSION['id_user'] = $data['id_user'];
					$_SESSION['user'] = $user;
					$_SESSION['level'] = $data['level'];
					//$_SESSION['username'] = $data['username'];
					echo "<script>alert('Selamat Anda Berhasil Login')</script>";
					echo "<script>window.location='".base_url()."';</script>";
					}
					else{ ?>
						<script>
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: 'Login Gagal. Username / Password Salah!',
							})
						</script>
					
					<?php
					}
				} 
		?>
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Silahkan Login
				</span>
				<form action="" method="POST" enctype="multipart/form-data" class="login100-form validate-form p-b-33 p-t-5">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="user" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button type="submit" name="login" class="login100-form-btn">
							Login
						</button>&nbsp;
						<!-- <button onclick="window.location.href='register.php'" class="login100-form-btn">
							Register
						</button> -->
					</div>

				</form>
			</div>
		</div>
	</div>
	
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
<?php
}
?>