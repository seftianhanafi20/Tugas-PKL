<?php 
require_once "../../_config/config.php";

	$id_ultg = trim(mysqli_real_escape_string($con, $_POST['id_ultg']));
	$nama_tt = trim(mysqli_real_escape_string($con, $_POST['nama_tt']));
	$kode = trim(mysqli_real_escape_string($con, $_POST['kode']));

	$simpan = mysqli_query($con, "INSERT INTO transmisi_trafo VALUES('','$id_ultg','$nama_tt','$kode')");

		if($simpan)
			{
				echo "<script>alert('Data Berhasil disimpan ')</script>";
				echo '<script type="text/javascript">window.location="data.php"</script>';    
			}
		else
			{
			echo "<script>alert('Gagal Menyimpan Data ')</script>";
			echo '<script type="text/javascript">window.location="add.php"</script>'; 
			}

?>