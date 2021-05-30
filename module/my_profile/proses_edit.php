<?php
    //require_once "../../_config/config.php";
    include_once('../../_config/config.php');
    $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
	$nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
	$email = trim(mysqli_real_escape_string($con, $_POST['email']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $no_hp = trim(mysqli_real_escape_string($con, $_POST['no_hp']));
    
    $nama_file    = $_FILES['foto']['name'];
    $lokasi_file  = $_FILES['foto']['tmp_name'];
    $tipe_file    = $_FILES['foto']['type'];
    $tipe_file    = array('jpg','jpeg','png');
    $x = explode('.', $nama_file);
    $ekstensi = strtolower(end($x));
        
        $data=mysqli_fetch_array(mysqli_query($con, "SELECT id_user FROM tb_user WHERE id_user='$id_user'"));
        $id_user_baru=$data['id_user']+1;
        $nama_file_baru=$id_user_baru.'_'.$nama_file;
        // if($lokasi_file==""){
        //     $simpan = mysqli_query($con, "UPDATE tb_portofolio SET portofolio = '$nama_file' WHERE id_porto='$id'") or die(mysqli_error());
        //  }
        // if($nama_file==""){
        //     echo '<script type="text/javascript">window.location="data.php"</script>';
        // }
        if($nama_file==""){
            $simpan = mysqli_query($con, "UPDATE tb_user SET nama = '$nama', email = '$email', alamat = '$alamat', no_hp = '$no_hp' WHERE id_user='$id_user'") or die(mysqli_error());
        }
        else {
            $data=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_user WHERE id_user='$id_user'"));
            // if($data['foto'] != "") unlink("poto/$data[foto]");
            if($data['foto'] != "");
            move_uploaded_file($lokasi_file,"../../poto/$nama_file_baru");
            $simpan =  mysqli_query($con, "UPDATE tb_user SET nama = '$nama', email = '$email', alamat = '$alamat', no_hp = '$no_hp', foto = '$nama_file_baru' WHERE id_user = '$id_user'") 
            or die(mysqli_error());
        }
        
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