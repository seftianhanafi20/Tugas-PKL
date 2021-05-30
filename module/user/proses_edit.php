<?php
    //require_once "../../_config/config.php";
    include_once('../../_config/config.php');
    $id = $_POST['id'];
	$level = trim(mysqli_real_escape_string($con, $_POST['level']));
    // $nama_user = trim(mysqli_real_escape_string($con, $_POST['nama_user']));
	// $email = trim(mysqli_real_escape_string($con, $_POST['email']));
    // $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    // $no_hp = trim(mysqli_real_escape_string($con, $_POST['no_hp']));
	// $username = trim(mysqli_real_escape_string($con, $_POST['username']));
	// $password = trim(mysqli_real_escape_string($con, $_POST['password']));
    
    $simpan = mysqli_query($con, "UPDATE tb_user SET level='$level' WHERE id_user='$id'") or die(mysqli_error());
    if($simpan)
            {
                echo "<script>alert('Data Berhasil disimpan ')</script>";
                echo '<script type="text/javascript">window.location="data.php"</script>';    
            }
        else
            {
            echo "<script>alert('Gagal Menyimpan Data ')</script>";
            echo '<script type="text/javascript">window.location="edit.php"</script>'; 
            }

?>