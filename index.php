<?php 
    require_once "_config/config.php";
    $id = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
    $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
    $username = isset($_SESSION['user']) ? $_SESSION['user'] : false;
    if($level=="admin" || $level=="pegawai"){
        echo "<script>window.location='".base_url('dashboard')."';</script>";
    }
    elseif($level=="operator"){
        echo "<script>window.location='".base_url('module/gangguan/data.php')."';</script>";
    }
    
 ?>