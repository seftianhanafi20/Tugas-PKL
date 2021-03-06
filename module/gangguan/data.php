<?php 
include_once('../../header.php');
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
$username = isset($_SESSION['user']) ? $_SESSION['user'] : false;
$id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
if($level=="admin" || $level=="pegawai"){
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Gangguan</h1>
          </div>
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
				<input type="text" name="pencarian" id="pencarian" class="form-control" placeholder="Search..." aria-label="Search" style="width: 250px;">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Operator</th>
                    <th>ULTG</th>
					<th>Transmisi/Trafo</th>
					<th>Kode</th>
					<th>Status</th>
					<th>Penyebab</th>
					<th>TRIP Lepas</th>
					<th>TRIP Masuk</th>
					<th>Durasi Number</th>
					<th>Durasi Jam</th>
					<th>Durasi Menit</th>
					<th>Waktu Input</th>
					<th>Action</th>
                  </tr>
                  </thead>
                  <tbody id="tampil">
                  <?php
				$batas = 20;
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
						$sql = "SELECT * FROM status_gg NATURAL JOIN transmisi_trafo NATURAL JOIN ultg NATURAL JOIN tb_user WHERE penyebab LIKE '%$pencarian%'";
						$query = $sql;
						$queryJml = $sql;
					} else {
						$query = "SELECT * FROM status_gg NATURAL JOIN transmisi_trafo NATURAL JOIN ultg NATURAL JOIN tb_user ORDER BY id_gg DESC LIMIT $posisi, $batas";
						$queryJml = "SELECT * FROM status_gg";
						$no = $posisi + 1;
					}
				} else {
					$query = "SELECT * FROM status_gg NATURAL JOIN transmisi_trafo NATURAL JOIN ultg NATURAL JOIN tb_user ORDER BY id_gg DESC LIMIT $posisi, $batas";
					$queryJml = "SELECT * FROM status_gg";
					$no = $posisi + 0;
				}
				
				$sql = mysqli_query($con, $query) or die (mysqli_error($con));
				if(mysqli_num_rows($sql) > 0) {
					while($data = mysqli_fetch_array($sql)) { 
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
							<td><?=$data['durasi_jam']?></td>
							<td><?=$data['durasi_menit']?></td>
							<td><?=$data['tgl_input']?></td>
							<td class="text-center">
								<div class="btn-group">
									<a href="edit.php?id=<?=$data['id_gg']?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
									<!-- <a href="del.php?id=<?=$data['id_gg']?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger"><i class="fas fa-trash"></i></a> -->
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
			  <script type="text/javascript">
					$(document).ready(function() {
						$('#pencarian').on('keyup', function() {
							$.ajax({
								type: 'POST',
								url: 'search.php',
								data: {
									pencarian: $(this).val()
								},
								cache: false,
								success: function(data) {
									$('#tampil').html(data);
								}
							});
						});
					});
			  </script>
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
<?php } elseif($level=="operator"){ ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Gangguan</h1>
          </div>
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
                    <th>Operator</th>
                    <th>ULTG</th>
					<th>Transmisi/Trafo</th>
					<th>Kode</th>
					<th>Status</th>
					<th>Penyebab</th>
					<th>TRIP Lepas</th>
					<th>TRIP Masuk</th>
					<th>Durasi Number</th>
					<th>Durasi Jam</th>
					<th>Durasi Menit</th>
					<th>Waktu Input</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
				$batas = 20;
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
						$sql = "SELECT * FROM status_gg NATURAL JOIN transmisi_trafo NATURAL JOIN ultg NATURAL JOIN tb_user WHERE id_user='$id_user' AND penyebab LIKE '%$pencarian%' ORDER BY id_gg DESC";
						$query = $sql;
						$queryJml = $sql;
					} else {
						$query = "SELECT * FROM status_gg NATURAL JOIN transmisi_trafo NATURAL JOIN ultg NATURAL JOIN tb_user WHERE id_user='$id_user' ORDER BY id_gg DESC LIMIT $posisi, $batas";
						$queryJml = "SELECT * FROM status_gg NATURAL JOIN tb_user WHERE id_user='$id_user'";
						$no = $posisi + 1;
					}
				} else {
					$query = "SELECT * FROM status_gg NATURAL JOIN transmisi_trafo NATURAL JOIN ultg NATURAL JOIN tb_user WHERE id_user='$id_user' ORDER BY id_gg DESC LIMIT $posisi, $batas";
					$queryJml = "SELECT * FROM status_gg NATURAL JOIN tb_user WHERE id_user='$id_user'";
					$no = $posisi + 0;
				}
				
				$sql = mysqli_query($con, $query) or die (mysqli_error($con));
				if(mysqli_num_rows($sql) > 0) {
					while($data = mysqli_fetch_array($sql)) { 
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
							<td><?=$data['durasi_jam']?></td>
							<td><?=$data['durasi_menit']?></td>
							<td><?=$data['tgl_input']?></td>					
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
<?php } 
include_once('../../footer.php');
?>