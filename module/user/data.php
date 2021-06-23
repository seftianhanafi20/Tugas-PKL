<?php include_once('../../header.php');?>
<?php 
  	$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
	$username = isset($_SESSION['user']) ? $_SESSION['user'] : false;
	if($level=="admin"){
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
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
				<input type="text" name="pencarian" id="pencarian" class="form-control" placeholder="search..." aria-label="Search" style="width: 250px;">
				<!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
				<!-- <div style="float: left;">
					<form action="" method="POST" class="form-inline ml-3">
						<div class="input-group input-group-sm">
							Search form
							<input class="form-control" type="text" placeholder="Search" name="pencarian" aria-label="Search">
						</div>
					</form>
				</div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  	<div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
				  	<th>No</th>
                    <th>Level</th>
                    <th>No. Induk</th>
                    <th>Nama</th>
                    <th>Username</th>
					<th>Password</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>No. HP</th>
                    <th>Email</th>
					<th>Action</th>
                  </tr>
                  </thead>
                  <tbody id="tampil">
                  <?php
				$batas = 10;
				$hal = @$_GET['hal'];
				if(empty($hal)) {
					$posisi = 0;
					$hal = 1;
				} else {
					$posisi = ($hal - 1) * $batas;
				}
				$no = 1;
				if($_SERVER['REQUEST_METHOD'] == "POST") {
					$pencarian = trim(mysqli_real_escape_string($con, $_POST['pencarian']));
					if($pencarian != '') {
						$sql = "SELECT * FROM tb_user WHERE level LIKE '%$pencarian%' OR nama LIKE '%$pencarian%' OR username LIKE '%$pencarian%' OR alamat LIKE '%$pencarian%' ORDER BY level AND nama DESC";
						$query = $sql;
						$queryJml = $sql;
					} else {
						$query = "SELECT *
						FROM tb_user ORDER BY level AND nama DESC LIMIT $posisi, $batas";
						$queryJml = "SELECT * FROM tb_user";
						$no = $posisi + 1;
					}
				} else {
					$query = "SELECT *
					FROM tb_user ORDER BY level AND nama DESC LIMIT $posisi, $batas";
					$queryJml = "SELECT * FROM tb_user";
					$no = $posisi + 1;
				}
				
				$sql_user = mysqli_query($con, $query) or die (mysqli_error($con));
				if(mysqli_num_rows($sql_user) > 0) {
					$no=0;
					while($data = mysqli_fetch_array($sql_user)) { 
						$no++;
						if($data['level']=="admin"){
						?>
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
<?php } ?>
<?php include_once('../../footer.php');?>