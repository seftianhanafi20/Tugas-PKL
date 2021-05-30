<?php 
require_once "../../_config/config.php";
$id_transformator = $_GET['id_transformator'];
$button = $_POST['button'];
if($button == "tambah"){
	// $id_user = $_SESSION["id_user"];
	$id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
	//
	// $pilih = trim(mysqli_real_escape_string($con, $_POST['pilih']));
	$pilih = implode(",", $_POST['pilih']);
	
	$form = trim(mysqli_real_escape_string($con, $_POST['form']));
	$r1 = trim(mysqli_real_escape_string($con, $_POST['r1']));
	$r2 = trim(mysqli_real_escape_string($con, $_POST['r2']));
	$r3 = trim(mysqli_real_escape_string($con, $_POST['r3']));
	$r4 = trim(mysqli_real_escape_string($con, $_POST['r4']));
	$form1 = trim(mysqli_real_escape_string($con, $_POST['form1']));
	$form2 = trim(mysqli_real_escape_string($con, $_POST['form2']));
	$form3 = trim(mysqli_real_escape_string($con, $_POST['form3']));
	$r5 = trim(mysqli_real_escape_string($con, $_POST['r5']));
	$r6 = trim(mysqli_real_escape_string($con, $_POST['r6']));
	$r7 = trim(mysqli_real_escape_string($con, $_POST['r7']));
	$r8 = trim(mysqli_real_escape_string($con, $_POST['r8']));
	$r9 = trim(mysqli_real_escape_string($con, $_POST['r9']));
	$r10 = trim(mysqli_real_escape_string($con, $_POST['r10']));

	$nama_file    = $_FILES['foto']['name'];
	$lokasi_file  = $_FILES['foto']['tmp_name'];
	$tipe_file    = $_FILES['foto']['type'];
	$tipe_file    = array('jpg','jpeg','png');
	$x = explode('.', $nama_file);
	$ekstensi = strtolower(end($x));

	$nama_file1    = $_FILES['foto1']['name'];
	$lokasi_file1  = $_FILES['foto1']['tmp_name'];
	$tipe_file1    = $_FILES['foto1']['type'];
	$tipe_file1    = array('jpg','jpeg','png');
	$x1 = explode('.', $nama_file1);
	$ekstensi1 = strtolower(end($x1));

	$nama_file2    = $_FILES['foto2']['name'];
	$lokasi_file2  = $_FILES['foto2']['tmp_name'];
	$tipe_file2    = $_FILES['foto2']['type'];
	$tipe_file2    = array('jpg','jpeg','png');
	$x2 = explode('.', $nama_file2);
	$ekstensi2 = strtolower(end($x2));

	$nama_file3    = $_FILES['foto3']['name'];
	$lokasi_file3  = $_FILES['foto3']['tmp_name'];
	$tipe_file3    = $_FILES['foto3']['type'];
	$tipe_file3    = array('jpg','jpeg','png');
	$x3 = explode('.', $nama_file3);
	$ekstensi3 = strtolower(end($x3));

	$nama_file4    = $_FILES['foto4']['name'];
	$lokasi_file4  = $_FILES['foto4']['tmp_name'];
	$tipe_file4    = $_FILES['foto4']['type'];
	$tipe_file4    = array('jpg','jpeg','png');
	$x4 = explode('.', $nama_file4);
	$ekstensi4 = strtolower(end($x4));

	$nama_file5    = $_FILES['foto5']['name'];
	$lokasi_file5  = $_FILES['foto5']['tmp_name'];
	$tipe_file5    = $_FILES['foto5']['type'];
	$tipe_file5    = array('jpg','jpeg','png');
	$x5 = explode('.', $nama_file5);
	$ekstensi5 = strtolower(end($x5));

	$nama_file6    = $_FILES['foto6']['name'];
	$lokasi_file6  = $_FILES['foto6']['tmp_name'];
	$tipe_file6    = $_FILES['foto6']['type'];
	$tipe_file6    = array('jpg','jpeg','png');
	$x6 = explode('.', $nama_file6);
	$ekstensi6 = strtolower(end($x6));

	$nama_file7    = $_FILES['foto7']['name'];
	$lokasi_file7  = $_FILES['foto7']['tmp_name'];
	$tipe_file7    = $_FILES['foto7']['type'];
	$tipe_file7    = array('jpg','jpeg','png');
	$x7 = explode('.', $nama_file7);
	$ekstensi7 = strtolower(end($x7));

	$nama_file8    = $_FILES['foto8']['name'];
	$lokasi_file8  = $_FILES['foto8']['tmp_name'];
	$tipe_file8    = $_FILES['foto8']['type'];
	$tipe_file8    = array('jpg','jpeg','png');
	$x8 = explode('.', $nama_file8);
	$ekstensi8 = strtolower(end($x8));

	$nama_file9    = $_FILES['foto9']['name'];
	$lokasi_file9  = $_FILES['foto9']['tmp_name'];
	$tipe_file9    = $_FILES['foto9']['type'];
	$tipe_file9    = array('jpg','jpeg','png');
	$x9 = explode('.', $nama_file9);
	$ekstensi9 = strtolower(end($x9));

	$nama_file10    = $_FILES['foto10']['name'];
	$lokasi_file10  = $_FILES['foto10']['tmp_name'];
	$tipe_file10    = $_FILES['foto10']['type'];
	$tipe_file10    = array('jpg','jpeg','png');
	$x10 = explode('.', $nama_file10);
	$ekstensi10 = strtolower(end($x10));

	$nama_file11    = $_FILES['foto11']['name'];
	$lokasi_file11  = $_FILES['foto11']['tmp_name'];
	$tipe_file11    = $_FILES['foto11']['type'];
	$tipe_file11    = array('jpg','jpeg','png');
	$x11 = explode('.', $nama_file11);
	$ekstensi11 = strtolower(end($x11));

	$nama_file12    = $_FILES['foto12']['name'];
	$lokasi_file12  = $_FILES['foto12']['tmp_name'];
	$tipe_file12    = $_FILES['foto12']['type'];
	$tipe_file12    = array('jpg','jpeg','png');
	$x12 = explode('.', $nama_file12);
	$ekstensi12 = strtolower(end($x12));

	$nama_file13    = $_FILES['foto13']['name'];
	$lokasi_file13  = $_FILES['foto13']['tmp_name'];
	$tipe_file13    = $_FILES['foto13']['type'];
	$tipe_file13    = array('jpg','jpeg','png');
	$x13 = explode('.', $nama_file13);
	$ekstensi13 = strtolower(end($x13));

	$nama_file14    = $_FILES['foto14']['name'];
	$lokasi_file14  = $_FILES['foto14']['tmp_name'];
	$tipe_file14    = $_FILES['foto14']['type'];
	$tipe_file14    = array('jpg','jpeg','png');
	$x14 = explode('.', $nama_file14);
	$ekstensi14 = strtolower(end($x14));

	$timezone = time() + (60 * 60 * 7);
	$tgl_input = date('Y-m-d H:i:s', $timezone);

	if (in_array($ekstensi, $tipe_file) || in_array($ekstensi1, $tipe_file1) || 
		in_array($ekstensi2, $tipe_file2) || in_array($ekstensi3, $tipe_file3) || 
		in_array($ekstensi4, $tipe_file4) || in_array($ekstensi5, $tipe_file5) || 
		in_array($ekstensi6, $tipe_file6) || in_array($ekstensi7, $tipe_file7) ||
		in_array($ekstensi8, $tipe_file8) || in_array($ekstensi9, $tipe_file9) || 
		in_array($ekstensi10, $tipe_file10) || in_array($ekstensi11, $tipe_file11) || 
		in_array($ekstensi12, $tipe_file12) || in_array($ekstensi13, $tipe_file13) || 
		in_array($ekstensi14, $tipe_file14) == true){

		$data=mysqli_fetch_array(mysqli_query($con, "SELECT id_posisi_tap FROM tb_posisi_tap order by id_posisi_tap desc"));
		$id_fg_baru=$data['id_posisi_tap']+1;
		$nama_file_baru=$id_fg_baru.'_'.$nama_file;
		move_uploaded_file($lokasi_file,"poto/$nama_file_baru");

		$data1=mysqli_fetch_array(mysqli_query($con, "SELECT id_counter FROM tb_counter order by id_counter desc"));
		$id_fg_baru1=$data1['id_counter']+1;
		$nama_file_baru1=$id_fg_baru1.'_'.$nama_file1;
		move_uploaded_file($lokasi_file1,"poto/$nama_file_baru1");

		$data2=mysqli_fetch_array(mysqli_query($con, "SELECT id_main_tank FROM tb_main_tank order by id_main_tank desc"));
		$id_fg_baru2=$data2['id_main_tank']+1;
		$nama_file_baru2=$id_fg_baru2.'_'.$nama_file2;
		move_uploaded_file($lokasi_file2,"poto/$nama_file_baru2");

		$data3=mysqli_fetch_array(mysqli_query($con, "SELECT id_oltc FROM tb_oltc order by id_oltc desc"));
		$id_fg_baru3=$data3['id_oltc']+1;
		$nama_file_baru3=$id_fg_baru3.'_'.$nama_file3;
		move_uploaded_file($lokasi_file3,"poto/$nama_file_baru3");

		$data4=mysqli_fetch_array(mysqli_query($con, "SELECT id_silica_gel FROM tb_silica_gel order by id_silica_gel desc"));
		$id_fg_baru4=$data4['id_silica_gel']+1;
		$nama_file_baru4=$id_fg_baru4.'_'.$nama_file4;
		move_uploaded_file($lokasi_file4,"poto/$nama_file_baru4");

		$data5=mysqli_fetch_array(mysqli_query($con, "SELECT id_oil FROM tb_oil order by id_oil desc"));
		$id_fg_baru5=$data5['id_oil']+1;
		$nama_file_baru5=$id_fg_baru5.'_'.$nama_file5;
		move_uploaded_file($lokasi_file5,"poto/$nama_file_baru5");

		$data6=mysqli_fetch_array(mysqli_query($con, "SELECT id_oil_temp FROM tb_oil_temp order by id_oil_temp desc"));
		$id_fg_baru6=$data6['id_oil_temp']+1;
		$nama_file_baru6=$id_fg_baru6.'_'.$nama_file6;
		move_uploaded_file($lokasi_file6,"poto/$nama_file_baru6");

		$data7=mysqli_fetch_array(mysqli_query($con, "SELECT id_winding_hv FROM tb_winding_hv order by id_winding_hv desc"));
		$id_fg_baru7=$data7['id_winding_hv']+1;
		$nama_file_baru7=$id_fg_baru7.'_'.$nama_file7;
		move_uploaded_file($lokasi_file7,"poto/$nama_file_baru7");

		$data8=mysqli_fetch_array(mysqli_query($con, "SELECT id_winding_lv FROM tb_winding_lv order by id_winding_lv desc"));
		$id_fg_baru8=$data8['id_winding_lv']+1;
		$nama_file_baru8=$id_fg_baru8.'_'.$nama_file8;
		move_uploaded_file($lokasi_file8,"poto/$nama_file_baru8");

		$data9=mysqli_fetch_array(mysqli_query($con, "SELECT id_kipas FROM tb_kipas order by id_kipas desc"));
		$id_fg_baru9=$data9['id_kipas']+1;
		$nama_file_baru9=$id_fg_baru9.'_'.$nama_file9;
		move_uploaded_file($lokasi_file9,"poto/$nama_file_baru9");

		$data10=mysqli_fetch_array(mysqli_query($con, "SELECT id_radiator FROM tb_radiator order by id_radiator desc"));
		$id_fg_baru10=$data10['id_radiator']+1;
		$nama_file_baru10=$id_fg_baru10.'_'.$nama_file10;
		move_uploaded_file($lokasi_file10,"poto/$nama_file_baru10");

		$data11=mysqli_fetch_array(mysqli_query($con, "SELECT id_pompa_oli FROM tb_pompa_oli order by id_pompa_oli desc"));
		$id_fg_baru11=$data11['id_pompa_oli']+1;
		$nama_file_baru11=$id_fg_baru11.'_'.$nama_file11;
		move_uploaded_file($lokasi_file11,"poto/$nama_file_baru11");

		$data12=mysqli_fetch_array(mysqli_query($con, "SELECT id_hv FROM tb_hv order by id_hv desc"));
		$id_fg_baru12=$data12['id_hv']+1;
		$nama_file_baru12=$id_fg_baru12.'_'.$nama_file12;
		move_uploaded_file($lokasi_file12,"poto/$nama_file_baru12");

		$data13=mysqli_fetch_array(mysqli_query($con, "SELECT id_lv FROM tb_lv order by id_lv desc"));
		$id_fg_baru13=$data13['id_lv']+1;
		$nama_file_baru13=$id_fg_baru13.'_'.$nama_file13;
		move_uploaded_file($lokasi_file13,"poto/$nama_file_baru13");

		$data14=mysqli_fetch_array(mysqli_query($con, "SELECT id_tv FROM tb_tv order by id_tv desc"));
		$id_fg_baru14=$data14['id_tv']+1;
		$nama_file_baru14=$id_fg_baru14.'_'.$nama_file14;
		move_uploaded_file($lokasi_file14,"poto/$nama_file_baru14");
		
		$s = mysqli_query($con, "INSERT INTO tb_posisi_tap VALUES('','$id_transformator','$id_user','$pilih','$nama_file_baru','$tgl_input')");
		$s1 = mysqli_query($con, "INSERT INTO tb_counter VALUES('','$id_transformator','$id_user','$form','$nama_file_baru1','$tgl_input')");
		$s2 = mysqli_query($con, "INSERT INTO tb_main_tank VALUES('','$id_transformator','$id_user','$r1','$nama_file_baru2','$tgl_input')");
		$s3 = mysqli_query($con, "INSERT INTO tb_oltc VALUES('','$id_transformator','$id_user','$r2','$nama_file_baru3','$tgl_input')");
		$s4 = mysqli_query($con, "INSERT INTO tb_silica_gel VALUES('','$id_transformator','$id_user','$r3','$nama_file_baru4','$tgl_input')");
		$s5 = mysqli_query($con, "INSERT INTO tb_oil VALUES('','$id_transformator','$id_user','$r4','$nama_file_baru5','$tgl_input')");
		$s6 = mysqli_query($con, "INSERT INTO tb_oil_temp VALUES('','$id_transformator','$id_user','$form1','$nama_file_baru6','$tgl_input')");
		$s7 = mysqli_query($con, "INSERT INTO tb_winding_hv VALUES('','$id_transformator','$id_user','$form2','$nama_file_baru7','$tgl_input')");
		$s8 = mysqli_query($con, "INSERT INTO tb_winding_lv VALUES('','$id_transformator','$id_user','$form3','$nama_file_baru8','$tgl_input')");
		$s9 = mysqli_query($con, "INSERT INTO tb_kipas VALUES('','$id_transformator','$id_user','$r5','$nama_file_baru9','$tgl_input')");
		$s10 = mysqli_query($con, "INSERT INTO tb_radiator VALUES('','$id_transformator','$id_user','$r6','$nama_file_baru10','$tgl_input')");
		$s11 = mysqli_query($con, "INSERT INTO tb_pompa_oli VALUES('','$id_transformator','$id_user','$r7','$nama_file_baru11','$tgl_input')");
		$s12 = mysqli_query($con, "INSERT INTO tb_hv VALUES('','$id_transformator','$id_user','$r8','$nama_file_baru12','$tgl_input')");
		$s13 = mysqli_query($con, "INSERT INTO tb_lv VALUES('','$id_transformator','$id_user','$r9','$nama_file_baru13','$tgl_input')");
		$s14 = mysqli_query($con, "INSERT INTO tb_tv VALUES('','$id_transformator','$id_user','$r10','$nama_file_baru14','$tgl_input')");

		if($s && $s1 && $s2 && $s3 && $s4 && $s5 && $s6 && $s7 && $s8 && $s9 && $s10 && $s11 && $s12 && $s13 && $s14)
			{
				echo "<script>alert('Data Berhasil disimpan ')</script>";
				echo '<script type="text/javascript">window.location="../qrcode/scanner.php"</script>';    
			}
		else
			{
				echo "<script>alert('Gagal Menyimpan Data ')</script>";
				echo '<script type="text/javascript">
					alert("berhasil menyimpan data marker");history.go(-1);
					</script>';
				// echo '<script type="text/javascript">window.location="data.php"</script>'; 
			}
	}
	else {
		echo "<script>alert('Maaf Extensi File Yang Anda Masukkan Tidak Ada Atau Tidak Didukung ! ')</script>";
		echo '<script type="text/javascript">window.location="../qrcode/scanner.php"</script>'; 
			
	}

}
?>
