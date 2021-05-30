<?php 
require_once "../../_config/config.php";
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
$username = isset($_SESSION['user']) ? $_SESSION['user'] : false;
if($level=="admin"){
mysqli_query($con, "DELETE FROM tb_user WHERE id_user = '$_GET[id]'") or die (mysqli_error($con));
echo "<script>window.location='data.php';</script>";
}
?>