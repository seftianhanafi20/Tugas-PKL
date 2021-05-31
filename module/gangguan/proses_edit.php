<?php
    //require_once "../../_config/config.php";
    include_once('../../_config/config.php');
    $id = $_POST['id'];
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
    $diff = $waktutripm-$waktutripl;
    $menit = $diff / 60 ;
    $jam = $menit / 60 ;

    $hours = floor($diff / 3600);
    $mins = floor($diff / 60 % 60);
    $secs = floor($diff % 60);
    $timeFormat = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);

    $keterangan = trim(mysqli_real_escape_string($con, $_POST['keterangan']));
    $timezone = time() + (60 * 60 * 7);
    $tgl_input = date('Y-m-d H:i:s', $timezone);
    
    if($wtripm<$wtripl){
        echo '<script type="text/javascript">
        alert("Maaf! Waktu Tidak Sesuai");history.go(-1);
        </script>';
    }else{
        $simpan = mysqli_query($con, "UPDATE status_gg SET id_ultg='$id_ultg', 
        id_tt='$id_tt', nama_status='$nama_status', penyebab='$pilih', waktu_trip_lepas='$wtripl',
        waktu_trip_masuk='$wtripm', durasi_number='$timeFormat', durasi_menit='$menit',
        durasi_jam='$jam' , keterangan='$keterangan', tgl_input='$tgl_input' WHERE id_gg='$id'") or die(mysqli_error());
    
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

?>