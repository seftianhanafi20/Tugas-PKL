<?php
    include_once('../../_config/config.php');
    $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
    $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
	$username = isset($_SESSION['user']) ? $_SESSION['user'] : false;
    //proses ganti password
    if (isset($_POST['editpwd'])) {
        // $username        = $_POST['username'];
        $pwd_lama = md5(trim(mysqli_real_escape_string($con, $_POST['pwd_lama'])));
        $pwd_baru = md5(trim(mysqli_real_escape_string($con, $_POST['pwd_baru'])));
        $konfirm_pwd_baru = md5(trim(mysqli_real_escape_string($con, $_POST['konfirm_pwd_baru'])));
        //cek old password
        $query = "SELECT * FROM tb_user WHERE id_user='$id_user' AND password='$pwd_lama'";
        $sql = mysqli_query($con, $query);
        $hasil = mysqli_num_rows($sql);
        if (! $hasil >= 1) {
            echo "<script>alert('Password lama tidak sesuai!, silahkan ulang kembali! ')</script>";
            echo '<script type="text/javascript">window.location="data.php"</script>';
            unset($id_user);
            unset($level);
            session_destroy();
        }
        //validasi data data kosong
        else if (empty($_POST['pwd_baru']) || empty($_POST['konfirm_pwd_baru'])) {
            echo "<script>alert('Ganti Password Gagal! Data Tidak Boleh Kosong. ')</script>";
            echo '<script type="text/javascript">window.location="data.php"</script>';
        }
        //validasi input konfirm password
        else if (($_POST['pwd_baru']) != ($_POST['konfirm_pwd_baru'])) {
            echo "<script>alert('Ganti Password Gagal! Password dan Konfirm Password Harus Sama. ')</script>";
            echo '<script type="text/javascript">window.location="data.php"</script>';
        }
        else {
            //update data
            $query = "UPDATE tb_user SET password='$pwd_baru' WHERE id_user='$id_user'";
            $sql = mysqli_query($con, $query);
            //setelah berhasil update
                if ($sql) {
                    echo "<script>alert('Ganti Password Berhasil!')</script>";
                    echo '<script type="text/javascript">window.location="data.php"</script>';    
                } else {
                    echo "<script>alert('Ganti Password Gagal!')</script>";
                    echo '<script type="text/javascript">window.location="data.php"</script>';
                }
        }
    }
?>