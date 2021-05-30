<?php 
require_once "../../_config/config.php";
$id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
// $id_status = $_GET['id_status'];
$button = $_POST['button'];
if($button == "tambah"){
$id_ultg = trim(mysqli_real_escape_string($con, $_POST['id_ultg']));
$id_tt = trim(mysqli_real_escape_string($con, $_POST['id_tt']));
$nama_status = trim(mysqli_real_escape_string($con, $_POST['nama_status']));
$pilih = trim(mysqli_real_escape_string($con, $_POST['pilih']));
$waktu_tripl = $_POST['waktu_tripl'];//sql timestamp
$waktutripl = strtotime($waktu_tripl);
$wtripl = date('Y-m-d H:i:s', $waktutripl);
$waktu_tripm = $_POST['waktu_tripm'];//sql timestamp
$waktutripm = strtotime($waktu_tripm);
$wtripm = date('Y-m-d H:i:s', $waktutripm);
// $waktu_tripl = date('Y-m-d\TH:i:sP', $_POST['waktu_tripl']);var_dump($waktu_tripl);
// $waktu_tripm = date('Y-m-d\TH:i:sP',$_POST['waktu_tripm']);var_dump($waktu_tripm);
//menghitung selisih dengan hasil detik
$diff = $waktutripm-$waktutripl;
$menit = $diff / 60 ;
$jam = $menit / 60 ;

$hours = floor($diff / 3600);
$mins = floor($diff / 60 % 60);
$secs = floor($diff % 60);
$timeFormat = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);
//membagi detik menjadi jam
// $jam    =floor($diff / (60 * 60));
//membagi sisa detik setelah dikurangi $jam menjadi menit
// $menit    =$diff - $jam * (60 * 60);
$keterangan = trim(mysqli_real_escape_string($con, $_POST['keterangan']));
$timezone = time() + (60 * 60 * 7);
$tgl_input = date('Y-m-d H:i:s', $timezone);
if($wtripm<$wtripl){
    echo '<script type="text/javascript">
    alert("Maaf! Waktu Tidak Sesuai");history.go(-1);
    </script>';
}else{
	$simpan = mysqli_query($con, "INSERT INTO status_gg 
    VALUES('','$id_user','$id_ultg','$id_tt','$nama_status','$pilih','$wtripl',
    '$wtripm','$timeFormat','$menit','$jam','$keterangan','$tgl_input')");

	if($simpan)
		{
			echo "<script>alert('Data Berhasil disimpan ')</script>";
			echo '<script type="text/javascript">window.location="data.php"</script>';    
		}
	else
		{
				echo '<script type="text/javascript">
					alert("Gagal Menyimpan Data");history.go(-1);
					</script>';
        }
    }
}
?>