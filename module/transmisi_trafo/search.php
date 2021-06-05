<?php
    if (isset($_POST['pencarian'])) {
        include_once('../../_config/config.php');

        $no = 1;
        $pencarian = $_POST['pencarian'];
        $sql = "SELECT * FROM transmisi_trafo NATURAL JOIN ultg WHERE nama_tt LIKE '%$pencarian%'";
        $query = $sql;
        $sql = mysqli_query($con, $query) or die (mysqli_error($con));
		if(mysqli_num_rows($sql) > 0) {
        $no=0;
        while ($data = mysqli_fetch_array($sql)) {
            $no++;
?>
            <tr>
                <td><?php echo $no; ?>.</td>
                <td><?=$data['id_tt']?></td>
                <td><?=$data['nama_ultg']?></td>
                <td><?=$data['nama_tt']?></td>					
                <td><?=$data['kode']?></td>					
                <td class="text-center">
                    <div class="btn-group">
                        <a href="edit.php?id=<?=$data['id_tt']?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <!-- <a href="del.php?id=<?=$data['id_tt']?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger"><i class="fas fa-trash"></i></a> -->
                    </div>
                </td>
            </tr>
<?php   }
    } else {
	echo "<tr><td colspan=\"9\" align=\"center\">Data tidak ditemukan</td></tr>";
}
}?>