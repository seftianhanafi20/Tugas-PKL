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
            <h1>Gardu Induk (GI)</h1>
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
				<!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
				<div style="float: right;">
					<a href="import.php" class="btn btn-block bg-gradient-primary">Import <i class="fas fa-file-import"></i></a>
				</div>
				<input type="text" name="pencarian" id="pencarian" class="form-control" placeholder="search..." aria-label="Search" style="width: 250px;">
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
                    <th>Nama Bay</th>
                    <th>Nama Item</th>
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
						$sql = "SELECT * FROM tb_gi WHERE nama_gi LIKE '%$pencarian%'";
						$query = $sql;
						$queryJml = $sql;
					} else {
						$query = "SELECT * FROM tb_gi LIMIT $posisi, $batas";
						$queryJml = "SELECT * FROM tb_gi";
						$no = $posisi + 1;
					}
				} else {
					$query = "SELECT * FROM tb_gi LIMIT $posisi, $batas";
					//$query = "SELECT tb_item.*, tb_kategori.kategori FROM tb_item JOIN tb_kategori ON tb_item.id_kategori=tb_kategori.id_kategori";
					$queryJml = "SELECT * FROM tb_gi";
					$no = $posisi + 1;
				}
				
				$sql = mysqli_query($con, $query) or die (mysqli_error($con));
				if(mysqli_num_rows($sql) > 0) {
					$no=0;
					while($data = mysqli_fetch_array($sql)) { 
						$no++;
						?>
						<tr>
							<td><?php echo $no; ?>.</td>
							<td><?=$data['nama_gi']?></td>
							<td><?=$data['alamat']?></td>
							<td class="text-center">
								<div class="btn-group">
									<a href="edit.php?id=<?=$data['id_item']?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
									<a href="del.php?id=<?=$data['id_item']?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
								</div>
							</td>
						</tr>
					<?php
					}
				} else {
					echo "<tr><td colspan=\"6\" align=\"center\">Data tidak ditemukan</td></tr>";
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

<?php 
}
include_once('../../footer.php');
?>