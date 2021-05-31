<?php
    //require_once "../../_config/config.php";
    include_once('../../_config/config.php');
    $id = $_POST['id'];
	$level = trim(mysqli_real_escape_string($con, $_POST['level']));
    $no_induk = trim(mysqli_real_escape_string($con, $_POST['no_induk']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $username = trim(mysqli_real_escape_string($con, $_POST['username']));
    // $password = md5(trim(mysqli_real_escape_string($con, $_POST['password'])));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $jk = trim(mysqli_real_escape_string($con, $_POST['jk']));
    $no_hp = trim(mysqli_real_escape_string($con, $_POST['no_hp']));
    $email = trim(mysqli_real_escape_string($con, $_POST['email']));
    
    $simpan = mysqli_query($con, "UPDATE tb_user SET level='$level', no_induk='$no_induk', nama='$nama',
    username='$username', alamat='$alamat', jk='$jk', no_hp='$no_hp', email='$email' 
    WHERE id_user='$id'") or die(mysqli_error());
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