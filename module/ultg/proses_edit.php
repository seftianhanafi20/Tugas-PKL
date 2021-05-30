<?php
    //require_once "../../_config/config.php";
    include_once('../../_config/config.php');
    $id = $_POST['id'];
	$nama_ultg = trim(mysqli_real_escape_string($con, $_POST['nama_ultg']));
    
    $simpan = mysqli_query($con, "UPDATE ultg SET nama_ultg='$nama_ultg' WHERE id_ultg='$id'") or die(mysqli_error());
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