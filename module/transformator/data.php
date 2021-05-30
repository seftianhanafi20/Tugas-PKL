<?php 
include_once('../../header.php');
require_once('phpqrcode/qrlib.php');
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
            <h1>Transformator</h1>
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
                    <th>No.</th>
                    <th>Gardu Induk</th>
                    <th>Nama Bay</th>
                    <th>Serial ID</th>
                    <th>Tipe id</th>
                    <th>id bay</th>
                    <th>tegangan operasi</th>
                    <th>impdns</th>
                    <th>phasa</th>
                    <th>tanggal operasi</th>
                    <th>tahun buat</th>
                    <th>buatan</th>
                    <th>jenis</th>
                    <th>penempatan</th>
                    <th>merk</th>
                    <th>daya</th>
                    <th>tegangan prim rated</th>
                    <th>tegangan sec rated</th>
                    <th>tegangan ter rated</th>
                    <th>tegangan prim max</th>
                    <th>tegangan sec max</th>
                    <th>tegangan ter max</th>
                    <th>arus prim</th>
                    <th>arus sec</th>
                    <th>arus ter</th>
                    <th>vector</th>
                    <th>bil</th>
                    <th>suhu naik w</th>
                    <th>suhu naik o</th>
                    <th>cooling</th>
                    <th>brt_minyak</th>
                    <th>brt_inti bltn</th>
                    <th>brt_tot</th>
                    <th>jenis_minyak</th>
                    <th>standard</th>
                    <th>pasang</th>
                    <th>jumlah tap</th>
                    <th>tegangan tap bawah</th>
                    <th>tegangan tap atas</th>
                    <th>tegangan tap normal</th>
                    <th>tipe minyak</th>
                    <th>QRCode</th>
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
						$sql = "SELECT * FROM tb_transformator NATURAL JOIN tb_gi WHERE nama_bay LIKE '%$pencarian%'";
						$query = $sql;
						$queryJml = $sql;
					} else {
						$query = "SELECT * FROM tb_transformator NATURAL JOIN tb_gi LIMIT $posisi, $batas";
						$queryJml = "SELECT * FROM tb_transformator";
						$no = $posisi + 1;
					}
				} else {
					$query = "SELECT * FROM tb_transformator NATURAL JOIN tb_gi LIMIT $posisi, $batas";
					//$query = "SELECT tb_item.*, tb_kategori.kategori FROM tb_item JOIN tb_kategori ON tb_item.id_kategori=tb_kategori.id_kategori";
					$queryJml = "SELECT * FROM tb_transformator";
					$no = $posisi + 1;
				}
				
				$sql = mysqli_query($con, $query) or die (mysqli_error($con));
				if(mysqli_num_rows($sql) > 0) {
					$no=0;
					while($data = mysqli_fetch_array($sql)) { 
						$no++;
                        $qrvalue = $data['id_transformator'];
                        $tempDir = "pdfqrcodes/"; 
                        $codeContents = $qrvalue; 
                        $fileName = $qrvalue . '.png'; 
                        $pngAbsoluteFilePath = $tempDir.$fileName; 
                        $urlRelativeFilePath = $tempDir.$fileName; 
                        if (!file_exists($pngAbsoluteFilePath)) { 
                            QRcode::png($codeContents, $pngAbsoluteFilePath); 
                        }
						?>
						<tr>
							<td><?php echo $no; ?>.</td>
							<td><?=$data['nama_gi']?></td>
							<td><?=$data['nama_bay']?></td>
							<td><?=$data['serial_id']?></td>
							<td><?=$data['type_id']?></td>
							<td><?=$data['id_bay']?></td>
							<td><?=$data['tegangan_operasi']?></td>
							<td><?=$data['impdns']?></td>
							<td><?=$data['phasa']?></td>
							<td><?=$data['tanggal_operasi']?></td>
							<td><?=$data['tahun_buat']?></td>
							<td><?=$data['buatan']?></td>
                            <td><?=$data['jenis']?></td>
                            <td><?=$data['penempatan']?></td>
                            <td><?=$data['merk']?></td>
                            <td><?=$data['daya']?></td>
                            <td><?=$data['teg_prim_rated']?></td>
                            <td><?=$data['teg_sec_rated']?></td>
                            <td><?=$data['teg_ter_rated']?></td>
                            <td><?=$data['teg_prim_max']?></td>
                            <td><?=$data['teg_sec_max']?></td>
                            <td><?=$data['teg_ter_max']?></td>
                            <td><?=$data['arus_prim']?></td>
                            <td><?=$data['arus_sec']?></td>
                            <td><?=$data['arus_ter']?></td>
                            <td><?=$data['vector']?></td>
                            <td><?=$data['bil']?></td>
                            <td><?=$data['suhu_naik_w']?></td>
                            <td><?=$data['suhu_naik_o']?></td>
                            <td><?=$data['cooling']?></td>
                            <td><?=$data['brt_minyak']?></td>
                            <td><?=$data['brt_inti_bltn']?></td>
                            <td><?=$data['brt_tot']?></td>
                            <td><?=$data['jenis_minyak']?></td>
                            <td><?=$data['standard']?></td>
                            <td><?=$data['pasang']?></td>
                            <td><?=$data['jumlah_tap']?></td>
                            <td><?=$data['teg_tap_bawah']?></td>
                            <td><?=$data['teg_tap_atas']?></td>
                            <td><?=$data['teg_tap_normal']?></td>
                            <td><?=$data['tipe_minyak']?></td>
                            <td>
                                <img src="pdfqrcodes/<?=$data['id_transformator']?>.png" width="74px">
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
<?php } elseif($level=="operator"){ ?>
<div class="content-wrapper kanban">
    <?php 
        $id_transformator = $_GET['id_transformator'];
        $sql = mysqli_query($con, "SELECT * FROM tb_transformator NATURAL JOIN tb_gi WHERE id_transformator='$id_transformator'") or die (mysqli_error($con));
        $data = mysqli_fetch_array($sql);
    ?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Transformator ID: <?=$data['id_transformator']?> <?=$data['nama_gi']?></h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
        <div class="row">
        <div class="col-md-12">
          <div class="card card-row card-secondary">
            <div class="card-header">
              <h3 class="card-title">Detail</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-bolt"></i> <?=$data['nama_bay']?> <?=$data['alamat']?>
                    <small class="float-right"></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <table class="table">
                        <tr>
                            <th><b>Serial ID</b></th>
                            <td><b><?=$data['serial_id']?></b></td>
                        </tr>  
                        <tr>
                            <th><b>Type ID</b></th>
                            <td><b><?=$data['type_id']?></b></td>
                        </tr>
                        <tr>
                            <th><b>ID Bay</b></th>
                            <td><b><?=$data['id_bay']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Tegangan Operasi</b></th>
                            <td><b><?=$data['tegangan_operasi']?></b></td>
                        </tr>
                        <tr>
                            <th><b>IMPDNS</b></th>
                            <td><b><?=$data['impdns']?></b></td>
                        </tr>
                        <tr>
                            <th><b>PHASA</b></th>
                            <td><b><?=$data['phasa']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Tanggal Operasi</b></th>
                            <td><b><?=$data['tanggal_operasi']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Tahun Buat</b></th>
                            <td><b><?=$data['tahun_buat']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Buatan</b></th>
                            <td><b><?=$data['buatan']?></b></td>
                        </tr>  
                        <tr>
                            <th><b>Jenis</b></th>
                            <td><b><?=$data['jenis']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Penempatan</b></th>
                            <td><b><?=$data['penempatan']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Merk</b></th>
                            <td><b><?=$data['merk']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Daya</b></th>
                            <td><b><?=$data['daya']?></b></td>
                        </tr>
                    </table>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <table class="table">
                        <tr>
                            <th><b>Teg Prim Rated</b></th>
                            <td><b><?=$data['teg_prim_rated'] ?></b></td>
                        </tr>
                        <tr>
                            <th><b>Teg Sec Rated</b></th>
                            <td><b><?=$data['teg_sec_rated'] ?></b></td>
                        </tr>
                        <tr>
                            <th><b>Teg Ter Rated</b></th>
                            <td><b><?=$data['teg_ter_rated'] ?></b></td>
                        </tr>
                        <tr>
                            <th><b>Teg Prim Max</b></th>
                            <td><b><?=$data['teg_prim_max']?></b></td>
                        </tr>  
                        <tr>
                            <th><b>Teg Sec Max</b></th>
                            <td><b><?=$data['teg_sec_max']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Teg Ter Max</b></th>
                            <td><b><?=$data['teg_ter_max']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Arus Prim</b></th>
                            <td><b><?=$data['arus_prim']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Arus Sec</b></th>
                            <td><b><?=$data['arus_sec']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Arus Ter</b></th>
                            <td><b><?=$data['arus_ter']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Vector</b></th>
                            <td><b><?=$data['vector']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Bil</b></th>
                            <td><b><?=$data['bil']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Suhu Naik W</b></th>
                            <td><b><?=$data['suhu_naik_w']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Suhu Naik O</b></th>
                            <td><b><?=$data['suhu_naik_o']?></b></td>
                        </tr>
                    </table>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <table class="table">
                        <tr>
                            <th><b>Cooling</b></th>
                            <td><b><?=$data['cooling']?></b></td>
                        </tr>  
                        <tr>
                            <th><b>Brt Minyak</b></th>
                            <td><b><?=$data['brt_minyak']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Brt Inti Bltn</b></th>
                            <td><b><?=$data['brt_inti_bltn']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Brt Tot</b></th>
                            <td><b><?=$data['brt_tot']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Jenis Minyak</b></th>
                            <td><b><?=$data['jenis_minyak']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Standard</b></th>
                            <td><b><?=$data['standard']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Pasang</b></th>
                            <td><b><?=$data['pasang']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Jumlah Tap</b></th>
                            <td><b><?=$data['jumlah_tap']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Teg Tap Bawah</b></th>
                            <td><b><?=$data['teg_tap_bawah']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Teg Tap Atas</b></th>
                            <td><b><?=$data['teg_tap_atas']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Teg Tap Normal</b></th>
                            <td><b><?=$data['teg_tap_normal']?></b></td>
                        </tr>
                        <tr>
                            <th><b>Tipe Minyak</b></th>
                            <td><b><?=$data['tipe_minyak']?></b></td>
                        </tr>
                    </table>
                </div>
                <!-- /.col -->
              </div>
            </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        </div><!-- /.row -->
    </section>

    <section class="content">
     <form action="proses.php?id_transformator=<?=$id_transformator?>" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">OLTC</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h5 class="card-title">Posisi Tap</h5>
                        <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-link">#3</a>
                        <a href="#" class="btn btn-tool">
                            <i class="fas fa-pen"></i>
                        </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- <div class="form-group">
                            <label for="exampleInputEmail1">Form</label>
                            <select name="pilih" class="form-control">
                                <option value="">-Pilih-</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                            </select>
                        </div> -->
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxPrimary1" name="pilih[]" value="1">
                                <label for="checkboxPrimary1">
                                1(satu)
                                </label>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxPrimary2" name="pilih[]" value="2">
                                <label for="checkboxPrimary2">
                                2(dua)
                                </label>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxPrimary3" name="pilih[]" value="3">
                                <label for="checkboxPrimary3">
                                3(tiga)
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Foto</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto" id="nama_file1">
                                <!-- <input id="foto" type="file" class="custom-file-input" name="gambar"/> -->
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h5 class="card-title">Counter</h5>
                        <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-link">#3</a>
                        <a href="#" class="btn btn-tool">
                            <i class="fas fa-pen"></i>
                        </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- <div class="form-group">
                            <label for="inputName">Form</label>
                            <input type="number" id="inputName" class="form-control" value="" name="form" data-maxlength="5" oninput="this.value=this.value.slice(0,this.dataset.maxlength)">
                        </div> -->
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input id="range_5" type="text" name="form" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Foto</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto1" id="nama_file2">
                                <!-- <input id="foto" type="file" class="custom-file-input" name="gambar"/> -->
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Level Oil</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h5 class="card-title">Main Tank</h5>
                        <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-link">#3</a>
                        <a href="#" class="btn btn-tool">
                            <i class="fas fa-pen"></i>
                        </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary1" name="r1" value="Normal">
                                <label for="radioPrimary1">
                                Normal
                                </label>
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary2" name="r1" value="Abnormal">
                                <label for="radioPrimary2">
                                Abnormal
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Foto</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto2" id="nama_file3">
                                <!-- <input id="foto" type="file" class="custom-file-input" name="gambar"/> -->
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h5 class="card-title">OLTC</h5>
                        <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-link">#3</a>
                        <a href="#" class="btn btn-tool">
                            <i class="fas fa-pen"></i>
                        </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary3" name="r2" value="Normal">
                                <label for="radioPrimary3">
                                Normal
                                </label>
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary4" name="r2" value="Abnormal">
                                <label for="radioPrimary4">
                                Abnormal
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Foto</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto3" id="nama_file4">
                                <!-- <input id="foto" type="file" class="custom-file-input" name="gambar"/> -->
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Sistem Pernafasan</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h5 class="card-title">Silica Gel</h5>
                        <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-link">#3</a>
                        <a href="#" class="btn btn-tool">
                            <i class="fas fa-pen"></i>
                        </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary5" name="r3" value="Normal">
                                <label for="radioPrimary5">
                                Normal
                                </label>
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary6" name="r3" value="Abnormal">
                                <label for="radioPrimary6">
                                Abnormal
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Foto</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto4" id="nama_file5">
                                <!-- <input id="foto" type="file" class="custom-file-input" name="gambar"/> -->
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h5 class="card-title">Oil</h5>
                        <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-link">#3</a>
                        <a href="#" class="btn btn-tool">
                            <i class="fas fa-pen"></i>
                        </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary7" name="r4" value="Normal">
                                <label for="radioPrimary7">
                                Normal
                                </label>
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary8" name="r4" value="Abnormal">
                                <label for="radioPrimary8">
                                Abnormal
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Foto</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto5" id="nama_file6">
                                <!-- <input id="foto" type="file" class="custom-file-input" name="gambar"/> -->
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Temperatur</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h5 class="card-title">Oil</h5>
                        <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-link">#3</a>
                        <a href="#" class="btn btn-tool">
                            <i class="fas fa-pen"></i>
                        </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Form</label>
                            <input type="text" id="inputName" class="form-control" value="" name="form1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Foto</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto6" id="nama_file7">
                                <!-- <input id="foto" type="file" class="custom-file-input" name="gambar"/> -->
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h5 class="card-title">Winding HV</h5>
                        <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-link">#3</a>
                        <a href="#" class="btn btn-tool">
                            <i class="fas fa-pen"></i>
                        </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Form</label>
                            <input type="text" id="inputName" class="form-control" value="" name="form2">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Foto</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto7" id="nama_file8">
                                <!-- <input id="foto" type="file" class="custom-file-input" name="gambar"/> -->
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h5 class="card-title">Winding LV</h5>
                        <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-link">#3</a>
                        <a href="#" class="btn btn-tool">
                            <i class="fas fa-pen"></i>
                        </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Form</label>
                            <input type="text" id="inputName" class="form-control" value="" name="form3">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Foto</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto8" id="nama_file9">
                                <!-- <input id="foto" type="file" class="custom-file-input" name="gambar"/> -->
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Cooler System</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h5 class="card-title">Fan/Kipas</h5>
                        <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-link">#3</a>
                        <a href="#" class="btn btn-tool">
                            <i class="fas fa-pen"></i>
                        </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary9" name="r5" value="Normal">
                                <label for="radioPrimary9">
                                Normal
                                </label>
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary10" name="r5" value="Abnormal">
                                <label for="radioPrimary10">
                                Abnormal
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Foto</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto9" id="nama_file10">
                                <!-- <input id="foto" type="file" class="custom-file-input" name="gambar"/> -->
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h5 class="card-title">Radiator</h5>
                        <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-link">#3</a>
                        <a href="#" class="btn btn-tool">
                            <i class="fas fa-pen"></i>
                        </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary11" name="r6" value="Normal">
                                <label for="radioPrimary11">
                                Normal
                                </label>
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary12" name="r6" value="Abnormal">
                                <label for="radioPrimary12">
                                Abnormal
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Foto</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto10" id="nama_file11">
                                <!-- <input id="foto" type="file" class="custom-file-input" name="gambar"/> -->
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h5 class="card-title">Pompa Oli</h5>
                        <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-link">#3</a>
                        <a href="#" class="btn btn-tool">
                            <i class="fas fa-pen"></i>
                        </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary13" name="r7" value="Normal">
                                <label for="radioPrimary13">
                                Normal
                                </label>
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary14" name="r7" value="Abnormal">
                                <label for="radioPrimary14">
                                Abnormal
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Foto</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto11" id="nama_file12">
                                <!-- <input id="foto" type="file" class="custom-file-input" name="gambar"/> -->
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Bushing</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h5 class="card-title">HV</h5>
                        <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-link">#3</a>
                        <a href="#" class="btn btn-tool">
                            <i class="fas fa-pen"></i>
                        </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary15" name="r8" value="Normal">
                                <label for="radioPrimary15">
                                Normal
                                </label>
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary16" name="r8" value="Abnormal">
                                <label for="radioPrimary16">
                                Abnormal
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Foto</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto12" id="nama_file13">
                                <!-- <input id="foto" type="file" class="custom-file-input" name="gambar"/> -->
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h5 class="card-title">LV</h5>
                        <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-link">#3</a>
                        <a href="#" class="btn btn-tool">
                            <i class="fas fa-pen"></i>
                        </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary17" name="r9" value="Normal">
                                <label for="radioPrimary17">
                                Normal
                                </label>
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary18" name="r9" value="Abnormal">
                                <label for="radioPrimary18">
                                Abnormal
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Foto</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto13" id="nama_file14">
                                <!-- <input id="foto" type="file" class="custom-file-input" name="gambar"/> -->
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h5 class="card-title">TV</h5>
                        <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-link">#3</a>
                        <a href="#" class="btn btn-tool">
                            <i class="fas fa-pen"></i>
                        </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary19" name="r10" value="Normal">
                                <label for="radioPrimary19">
                                Normal
                                </label>
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary20" name="r10" value="Abnormal">
                                <label for="radioPrimary20">
                                Abnormal
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Foto</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto14" id="nama_file15">
                                <!-- <input id="foto" type="file" class="custom-file-input" name="gambar"/> -->
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-12">
            <!-- <input type="submit" name="" value="OK"> -->
            <button type="submit" name="button" value="tambah" class="btn btn-primary btn-block bg-gradient-success">Submit</button>
        </div>
      </div>
     </form>
    </section>
  </div>
<?php 
}
include_once('../../footer.php');
?>