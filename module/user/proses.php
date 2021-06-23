<?php
    include_once('../../_config/config.php');
    if (isset($_POST['add'])) { //'register' sesuai name yang ada di button
        $no_induk = trim(mysqli_real_escape_string($con, $_POST['no_induk']));
        $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
        $username = trim(mysqli_real_escape_string($con, $_POST['username']));
        $password = md5(trim(mysqli_real_escape_string($con, $_POST['password'])));
        $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
        $jk = trim(mysqli_real_escape_string($con, $_POST['jk']));
        $no_hp = trim(mysqli_real_escape_string($con, $_POST['no_hp']));
        $email = trim(mysqli_real_escape_string($con, $_POST['email']));
        $level = trim(mysqli_real_escape_string($con, $_POST['level']));
        // $foto = trim(mysqli_real_escape_string($con, $_POST['foto']));

        $sql = mysqli_query($con, "SELECT * FROM tb_user WHERE no_induk='$no_induk' AND username='$username'");

        // Kalau username sudah ada yang pakai
        if (mysqli_num_rows($sql) > 0){ 
            echo '<script type="text/javascript">
					alert("Gagal Menyimpan Data! No Induk Telah Terdaftar");history.go(-1);
					</script>';
        }else{
            mysqli_query($con, "INSERT INTO tb_user (id_user, no_induk, nama, username, password, alamat, jk, no_hp, email, level, foto) 
            VALUES (NULL, '$no_induk', '$nama', '$username', '$password', '$alamat', '$jk', '$no_hp', '$email', '$level', '')") 
            or die (mysqli_error($con));

            echo "<script>alert('Data Berhasil disimpan ')</script>";
            echo '<script type="text/javascript">window.location="data.php"</script>';
            }
        }
?>