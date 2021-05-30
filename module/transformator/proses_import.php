<?php
    require_once "../../_config/config.php";
    require_once "../../_assets/libs/vendor/autoload.php";
    $button = $_POST['button'];
    if($button == "Import"){
        $id_user = $_SESSION["id_user"];
        // 
        $file = $_FILES['file']['name'];
        $ekstensi = explode(".", $file);
        $file_name = "file-".round(microtime(true)).".".end($ekstensi);
        $sumber = $_FILES['file']['tmp_name'];
        //error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $target_dir = "../_file/";
        //error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $target_file = $target_dir.$file_name;
        move_uploaded_file($sumber, $target_file);
        require '../../_assets/libs/PHPExcel/Classes/PHPExcel.php';
        $obj = PHPExcel_IOFactory::load($target_file);
        $all_data = $obj->getActiveSheet()->toArray(null, true, true, true);

        $sql = "INSERT INTO tb_transformator (id_transformator, id_gi, nama_bay, serial_id, type_id, id_bay, 
        tegangan_operasi, impdns, phasa, tanggal_operasi, tahun_buat, buatan, jenis, penempatan, merk, daya, 
        teg_prim_rated, teg_sec_rated, teg_ter_rated, teg_prim_max, teg_sec_max, teg_ter_max, arus_prim, arus_sec, 
        arus_ter, vector, bil, suhu_naik_w, suhu_naik_o, cooling, brt_minyak, brt_inti_bltn, brt_tot, jenis_minyak, 
        standard, pasang, jumlah_tap, teg_tap_bawah, teg_tap_atas, teg_tap_normal, tipe_minyak) VALUES";
        for ($i=2; $i <= count($all_data); $i++) {
            $id_transformator = '';
            $id_gi = $all_data[$i]['B'];
            $nama_bay= $all_data[$i]['C'];
            $serial_id = $all_data[$i]['D'];
            $type_id = $all_data[$i]['E'];
            $id_bay = $all_data[$i]['F'];
            $tegangan_operasi   = $all_data[$i]['G'];
            $impdns   = $all_data[$i]['H'];
            $phasa = $all_data[$i]['I'];
            $tanggal_operasi   = $all_data[$i]['J'];
            $tahun_buat   = $all_data[$i]['K'];
            $buatan   = $all_data[$i]['L'];
            $jenis   = $all_data[$i]['M'];
            $penempatan   = $all_data[$i]['N'];
            $merk   = $all_data[$i]['O'];
            $daya   = $all_data[$i]['P'];
            $teg_prim_rated= $all_data[$i]['Q'];
            $teg_sec_rated= $all_data[$i]['R'];
            $teg_ter_rated= $all_data[$i]['S'];
            $teg_prim_max= $all_data[$i]['T'];
            $teg_sec_max= $all_data[$i]['U'];
            $teg_ter_max= $all_data[$i]['V'];
            $arus_prim = $all_data[$i]['W'];
            $arus_sec = $all_data[$i]['X'];
            $arus_ter = $all_data[$i]['Y'];
            $vector   = $all_data[$i]['Z'];
            $bil = $all_data[$i]['AA'];
            $suhu_naik_w = $all_data[$i]['AB'];
            $suhu_naik_o   = $all_data[$i]['AC'];
            $cooling = $all_data[$i]['AD'];
            $brt_minyak   = $all_data[$i]['AE'];
            $brt_inti_bltn   = $all_data[$i]['AF'];
            $brt_tot= $all_data[$i]['AG'];
            $jenis_minyak   = $all_data[$i]['AH'];
            $standard = $all_data[$i]['AI'];
            $pasang   = $all_data[$i]['AJ'];
            $jumlah_tap   = $all_data[$i]['AK'];
            $teg_tap_bawah   = $all_data[$i]['AL'];
            $teg_tap_atas   = $all_data[$i]['AM'];
            $teg_tap_normal   = $all_data[$i]['AN'];
            $tipe_minyak = $all_data[$i]['AO'];
            
            $sql .= " (
                '$id_transformator',
                '$id_gi',
                '$nama_bay',
                '$serial_id',
                '$type_id',
                '$id_bay',
                '$tegangan_operasi',
                '$impdns',
                '$phasa',
                '$tanggal_operasi',
                '$tahun_buat',
                '$buatan',
                '$jenis',
                '$penempatan',
                '$merk',
                '$daya',
                '$teg_prim_rated',
                '$teg_sec_rated',
                '$teg_ter_rated',
                '$teg_prim_max',
                '$teg_sec_max',
                '$teg_ter_max',
                '$arus_prim',
                '$arus_sec',
                '$arus_ter',
                '$vector',
                '$bil',
                '$suhu_naik_w',
                '$suhu_naik_o',
                '$cooling',
                '$brt_minyak',
                '$brt_inti_bltn',
                '$brt_tot',
                '$jenis_minyak',
                '$standard',
                '$pasang',
                '$jumlah_tap',
                '$teg_tap_bawah',
                '$teg_tap_atas',
                '$teg_tap_normal',
                '$tipe_minyak'
            ),";
        }
        $sql = substr($sql, 0, -1);
        //echo $sql;
        mysqli_query($con, $sql) or die(mysqli_error($con));
        // print_r($sql);
        unlink($target_file);
        echo "<script>window.location='data.php';</script>";

    }
?>