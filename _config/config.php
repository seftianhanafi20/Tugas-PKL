<?php
//setting default timezone
date_default_timezone_get('Asia/Jakarta');

session_start();

include_once "conn.php";

$arrayStatusPesanan[0] = "Menunggu Pembayaran";
$arrayStatusPesanan[1] = "Pembayaran Sedang Di Proses"; 
$arrayStatusPesanan[2] = "Lunas";
$arrayStatusPesanan[3] = "Pembayaran Di Tolak";

//koneksi
$con = mysqli_connect($con['host'], $con['user'], $con['pass'], $con['db']);
if (mysqli_connect_error()) {
 	echo mysqli_connect_error();
} 

//fungsi base_url
function base_url($url = null) {
 	$BASE_URL = "http://localhost/Tugas-PKL";
 	if ($url != null) {
 		return $BASE_URL."/".$url;
 	}
 	else{
 		return $BASE_URL;
 	}
}

//fungsi rupiah
function rupiah($nilai = 0){
    $string = "Rp" . number_format($nilai);
    return $string;
}

//fungsi untuk merubah tanggal default menjadi tanggal indonesia
function tgl_indo($tgl) {
	$tanggal =substr($tgl, 8, 2);
	$bulan =substr($tgl, 5, 2);
	$tahun =substr($tgl, 0, 4);
	return $tanggal."/".$bulan."/".$tahun;
}
 ?>
