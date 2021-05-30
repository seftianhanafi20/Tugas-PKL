<?php 
    require_once "../_config/config.php";

    // unset($_SESSION['user']);
    // echo "<script>window.location='".base_url('auth/login.php')."';</script>";
    session_destroy();
    // arahkan ke halaman login.php 
    // header("location: index.php");
    echo "<script>window.location='".base_url('auth/login.php')."';</script>";
 ?>