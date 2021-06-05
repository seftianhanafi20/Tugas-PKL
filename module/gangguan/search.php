<?php
    if (isset($_POST['pencarian'])) {
        include_once('../../_config/config.php');

        $no = 1;
        $pencarian = $_POST['pencarian'];
        $sql = "SELECT * FROM status_gg NATURAL JOIN transmisi_trafo 
        NATURAL JOIN ultg NATURAL JOIN tb_user WHERE penyebab LIKE '%$pencarian%' OR nama_tt LIKE '%$pencarian%' OR
        tgl_input LIKE '%$pencarian%' OR nama LIKE '%$pencarian%'";
        $query = $sql;
        $sql = mysqli_query($con, $query) or die (mysqli_error($con));
		if(mysqli_num_rows($sql) > 0) {
        $no=0;
        while ($data = mysqli_fetch_array($sql)) {
            $no++;
?>
            <tr>
                <td><?php echo $no; ?>.</td>
                <td><?=$data['nama']?></td>
                <td><?=$data['nama_ultg']?></td>
                <td><?=$data['nama_tt']?></td>					
                <td><?=$data['kode']?></td>
                <td><?=$data['nama_status']?></td>
                <td><?=$data['penyebab']?></td>
                <td><?=$data['waktu_trip_lepas']?></td>
                <td><?=$data['waktu_trip_masuk']?></td>
                <td><?=$data['durasi_number']?></td>
                <td><?=$data['tgl_input']?></td>
                <td class="text-center">
                    <div class="btn-group">
                        <a href="edit.php?id=<?=$data['id_gg']?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <!-- <a href="del.php?id=<?=$data['id_gg']?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger"><i class="fas fa-trash"></i></a> -->
                    </div>
                </td>
            </tr>
<?php   }
    } else {
	echo "<tr><td colspan=\"9\" align=\"center\">Data tidak ditemukan</td></tr>";
}
}?>