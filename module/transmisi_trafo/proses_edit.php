<?php
    //require_once "../../_config/config.php";
    include_once('../../_config/config.php');
    $id = $_POST['id'];
    $id_ultg = trim(mysqli_real_escape_string($con, $_POST['id_ultg']));
	$nama_tt = trim(mysqli_real_escape_string($con, $_POST['nama_tt']));
	$kode = trim(mysqli_real_escape_string($con, $_POST['kode']));
    
    $simpan = mysqli_query($con, "UPDATE transmisi_trafo SET id_ultg='$id_ultg', nama_tt='$nama_tt', kode='$kode' WHERE id_tt='$id'") or die(mysqli_error());
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