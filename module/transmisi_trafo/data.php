<?php 
include_once('../../header.php');
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
$username = isset($_SESSION['user']) ? $_SESSION['user'] : false;
$id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
if($level=="admin"){
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Transmisi/Trafo</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
				<!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
				<div style="float: right;">
					<a href="add.php" class="btn btn-block bg-gradient-primary">Add <i class="fas fa-plus"></i></a>
				</div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>ULTG</th>
					<th>Transmisi/Trafo</th>
					<th>Kode</th>
					<th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
				$batas = 10;
				$hal = @$_GET['hal'];
				if(empty($hal)) {
					$posisi = 0;
					$hal = 1;
				} else {
					$posisi = ($hal - 1) * $batas;
				}
				$no = 0;
				if($_SERVER['REQUEST_METHOD'] == "POST") {
					$pencarian = trim(mysqli_real_escape_string($con, $_POST['pencarian']));
					if($pencarian != '') {
						$sql = "SELECT * FROM transmisi_trafo NATURAL JOIN ultg WHERE nama_tt LIKE '%$pencarian%'";
						$query = $sql;
						$queryJml = $sql;
					} else {
						$query = "SELECT * FROM transmisi_trafo NATURAL JOIN ultg LIMIT $posisi, $batas";
						$queryJml = "SELECT * FROM transmisi_trafo";
						$no = $posisi + 1;
					}
				} else {
					$query = "SELECT * FROM transmisi_trafo NATURAL JOIN ultg ORDER BY id_tt DESC LIMIT $posisi, $batas";
					$queryJml = "SELECT * FROM transmisi_trafo";
					$no = $posisi + 0;
				}
				
				$sql = mysqli_query($con, $query) or die (mysqli_error($con));
				if(mysqli_num_rows($sql) > 0) {
					// $no=0;
					while($data = mysqli_fetch_array($sql)) { 
						$no++;
						?>
	
						<tr>
							<td><?php echo $no; ?>.</td>
							<td><?=$data['nama_ultg']?></td>
							<td><?=$data['nama_tt']?></td>					
							<td><?=$data['kode']?></td>					
							<td class="text-center">
								<div class="btn-group">
									<a href="edit.php?id=<?=$data['id_tt']?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
									<a href="del.php?id=<?=$data['id_tt']?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
								</div>
							</td>
						</tr>
					<?php
					}
				} else {
					echo "<tr><td colspan=\"4\" align=\"center\">Data tidak ditemukan</td></tr>";
				}
				?>
                  </tbody>
                </table>
				</div>
              </div>
              <!-- /.card-body -->
			  <?php
					error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
					if($_POST['pencarian'] == '') { ?> 
					<div class="card-footer">
						<?php //jika pecariannya kosong maka menghitung jumlah keseluruhan
						$jml = mysqli_num_rows(mysqli_query($con, $queryJml));
						//echo "Jumlah Data : <b>$jml</b>";
						?>
					</div>
					<div class="card-footer">
						<nav aria-label="Contacts Page Navigation">
						<ul class="pagination justify-content-center m-0">
							<?php
							$jml_hal = ceil($jml / $batas);
							for ($i=1; $i <= $jml_hal; $i++) { 
								if ($i != $hal) {
									echo "<li class=\"page-item\"><a class='page-link' href=\"?hal=$i\">$i</a></li>";
								} else {
									echo "<li class=\"page-item active\"><a class='page-link'>$i</a></li>";								}
							}
							?>
						</ul>
						</nav>
					</div>
				<?php		
					} else {
						echo "<div class=\"card-footer\">";
						$jml = mysqli_num_rows(mysqli_query($con, $queryJml));
						echo "Data Hasil Pencarian : <b>$jml</b>";
						echo "</div>";
					}
				?>
            </div>
            <!-- /.card -->

            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->	
<?php
}
?>
<?php include_once('../../footer.php');?>
