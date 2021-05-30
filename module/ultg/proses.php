<?php 
require_once "../../_config/config.php";

	$nama_ultg = trim(mysqli_real_escape_string($con, $_POST['nama_ultg']));

	$simpan = mysqli_query($con, "INSERT INTO ultg VALUES('','$nama_ultg')");

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