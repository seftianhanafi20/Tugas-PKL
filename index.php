<?php 
    // include_once("function/helper.php");
    // include_once("function/koneksi.php");
    // require_once "_config/config.php";
    // //require_once "_assets/libs/vendor/autoload.php";
    
    // echo "<script>window.location='".BASE_URL('dashboard')."';</script>";

    require_once "_config/config.php";
    if (isset($_SESSION['user'])) {
		echo "<script>window.location='".base_url('dashboard')."';</script>";
        //echo "<script>window.location='".base_url('dashboard')."';</script>";
    }
    if(isset($_SESSION['level'])=="admin"){
        echo "<script>window.location='".base_url('dashboard')."';</script>";
    }
    else if(isset($_SESSION['level'])=="pegawai"){
        echo "<script>window.location='".base_url('dashboard')."';</script>";
    }
    else if(isset($_SESSION['level'])=="operator"){
        echo "<script>window.location='".base_url('dashboard')."';</script>";
    }
    // else{
    // 	echo "<script>window.location='".base_url('modulefree/item/data.php')."';</script>";
    // }
    else{
    	echo "<script>window.location='".base_url('dashboard')."';</script>";
    }
    
 ?>