<?php 
require_once "../../_config/config.php";
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
$username = isset($_SESSION['user']) ? $_SESSION['user'] : false;
$id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
if($level=="admin"){
mysqli_query($con, "DELETE FROM ultg WHERE id_ultg = '$_GET[id]'") or die (mysqli_error($con));
echo "<script>window.location='data.php';</script>";
}
?>