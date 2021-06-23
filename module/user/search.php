<?php
    if (isset($_POST['pencarian'])) {
        include_once('../../_config/config.php');

        $no = 1;
        $pencarian = $_POST['pencarian'];
        $sql = "SELECT *
		FROM tb_user
		WHERE level LIKE '%$pencarian%' OR 
        nama LIKE '%$pencarian%' OR username LIKE '%$pencarian%' ORDER BY level AND nama DESC";
        $query = $sql;
        $sql = mysqli_query($con, $query) or die (mysqli_error($con));
		if(mysqli_num_rows($sql) > 0) {
        $no=0;
        while($data = mysqli_fetch_array($sql)) { 
			$no++;
			if($data['level']=="admin"){
			?>
			<tr>
				<td><?php echo $no; ?>.</td>s
				<td><?=$data['level']?></td>
				<td><?=$data['no_induk']?></td>
				<td><?=$data['nama']?></td>
				<td><?=$data['username']?></td>
				<td><?=$data['password']?></td>
				<td><?=$data['alamat']?></td>
				<td><?=$data['jk']?></td>
				<td><?=$data['no_hp']?></td>
				<td><?=$data['email']?></td>
				
				<td class="text-center">
					<div class="btn-group">
						<a href="edit.php?id=<?=$data['id_user']?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
						<!-- <a href="del.php?id=<?=$data['id_user']?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger"><i class="fas fa-trash"></i></a> -->
					</div>
				</td>
			</tr>
		<?php
			}elseif($data['level']!="admin"){?>
			<tr>
				<td><?php echo $no; ?>.</td>
				<td><?=$data['level']?></td>
				<td><?=$data['no_induk']?></td>
				<td><?=$data['nama']?></td>
				<td><?=$data['username']?></td>
				<td><?=$data['password']?></td>
				<td><?=$data['alamat']?></td>
				<td><?=$data['jk']?></td>
				<td><?=$data['no_hp']?></td>
				<td><?=$data['email']?></td>
				
				<td class="text-center">
					<div class="btn-group">
						<a href="edit.php?id=<?=$data['id_user']?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
						<a href="del.php?id=<?=$data['id_user']?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
					</div>
				</td>
			</tr>
			<?php
			}
		}
	} else {
		echo "<tr><td colspan=\"4\" align=\"center\">Data tidak ditemukan</td></tr>";
	}
}
?>