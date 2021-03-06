<?php 
include_once('../../header.php');
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
$username = isset($_SESSION['user']) ? $_SESSION['user'] : false;
$id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
if($level=="operator"){ ?>
    <div class="content-wrapper kanban">
    <?php 
        // $id_transformator = $_GET['id_transformator'];
        // $sql = mysqli_query($con, "SELECT * FROM tb_transformator NATURAL JOIN tb_gi WHERE id_transformator='$id_transformator'") or die (mysqli_error($con));
        // $data = mysqli_fetch_array($sql);
    ?>
    <section class="content-header">
      <div class="container-fluid">
        <!-- <div class="row">
          <div class="col-sm-6">
            <h1>Transformator ID: <?=$data['id_transformator']?> <?=$data['nama_gi']?></h1>
          </div>
        </div> -->
      </div>
    </section>

    <section class="content">
     <form action="proses_input.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Status Gangguan</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h5 class="card-title">Form Data Gangguan</h5>
                        <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-link">#3</a>
                        <a href="#" class="btn btn-tool">
                            <i class="fas fa-pen"></i>
                        </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ULTG</label>
                            <!-- <input type="hidden" class="form-control" name="id_status" value="<?=$data['id_status']?>"> -->
                            <select id="form_ultg" class="form-control" name="id_ultg">
                                <option value="">Pilih ULTG</option>
                                <?php 
                                $id = '';
                                $sql_ultg = mysqli_query($con,"SELECT * FROM ultg ORDER BY nama_ultg ASC");
                                while($row = mysqli_fetch_array($sql_ultg)){
                                    if($id==$row['id_ultg']){
                                        echo "<option value='$row[id_ultg]' selected='true'>$row[nama_ultg]</option>";
                                }else
                                echo "<option value='$row[id_ultg]'>$row[nama_ultg]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Wilayah Transmisi Trafo</label>
                            <select id="form_tt" class="form-control" name="id_tt">
                                <option value="">Pilih Wilayah Transmisi Trafo</option>                
                            </select>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function(){
                    
                                // sembunyikan form kabupaten, kecamatan dan desa
                                $("#form_tt").show();
                                // $("#form_kec").hide();
                                // $("#form_des").hide();
                    
                                // ambil data kabupaten ketika data memilih provinsi
                                $('body').on("change","#form_ultg",function(){
                                    var id = $(this).val();
                                    var data = "id="+id+"&data=tt";
                                    $.ajax({
                                        type: 'POST',
                                        url: "get_proses.php",
                                        data: data,
                                        success: function(hasil) {
                                            $("#form_tt").html(hasil);
                                            $("#form_tt").show();
                                            // $("#form_kec").hide();
                                            // $("#form_des").hide();
                                        }
                                    });
                                });      
                    
                            });
                        </script>
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary1" name="nama_status" value="AR">
                                <label for="radioPrimary1">
                                AR
                                </label>
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary2" name="nama_status" value="TRIP">
                                <label for="radioPrimary2">
                                TRIP
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Penyebab Gangguan</label>
                            <select name="pilih" class="form-control">
                                <option value="">-Pilih-</option>
                                <option value="Pohon">Pohon</option>
                                <option value="Petir">Petir</option>
                                <option value="Hewan">Hewan</option>
                                <option value="Peralatan">Peralatan</option>
                                <option value="Proteksi">Proteksi</option>
                                <option value="Lain-lain">Lain-lain</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputName">Waktu Trip Lepas</label>
                            <input type="datetime-local" id="inputName" class="form-control" name="waktu_tripl">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Waktu Trip Masuk</label>
                            <input type="datetime-local" id="inputName" class="form-control" name="waktu_tripm">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Keterangan</label>
                            <textarea id="inputDescription" class="form-control" maxlength="50" rows="3" name="keterangan"></textarea>
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