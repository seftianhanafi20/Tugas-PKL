<?php include_once('../../header.php');?>
<?php 
  $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
  $username = isset($_SESSION['user']) ? $_SESSION['user'] : false;
  $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : false;
?>
    
    
    <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Scanner</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
	
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">

              <html>
                <head>
                    <meta charset="UTF-8">
                    <!-- <title>Login with Qrcode</title> -->
                    <!-- <style>
                        .sidebar{ width: 350px; margin:auto; padding: 10px }
                        .camera{ width: 610px; margin:auto; }
                    </style> -->
                    <script src="js/jquery-3.4.1.min.js"></script>
                <!-- scanner -->
                <script src="scanner/vendor/modernizr/modernizr.js"></script>
                <script src="scanner/vendor/vue/vue.min.js"></script>
                </head>
                <body>

                    <!-- scan -->
                <div id="app" class="row box">
                    <div class="col-md-3 col-md-offset-3 sidebar">
                    <!-- <ul>
                        <li v-if="cameras.length === 0" class="empty">No cameras found</li>
                        <li v-for="camera in cameras">
                        <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active"><input type="radio" class="align-middle mr-1" checked> {{ formatName(camera.name) }}</span>
                        <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
                            <a @click.stop="selectCamera(camera)"> <input type="radio" class="align-middle mr-1">@{{ formatName(camera.name) }}</a>
                        </span>
                        </li>
                    </ul> -->
                    <!-- <div class="clearfix"></div> -->
                    <!-- form scan -->
                    <form action="" method="POST" id="myForm">
                        <fieldset class="scheduler-border">
                        <!-- <legend class="scheduler-border"> Form Scan </legend> -->
                        <input type="hidden" name="qrcode" id="code" autofocus>
                        </fieldset>
                    </form>
                    <?php
                    if(!empty($_POST['qrcode']))
                    {
                        $qrcode = $_POST['qrcode'];
                        $arr = explode('.', $qrcode); // adalah separor
                        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                        $id_transformator = $arr[0];
                        // $serial_id = $arr[3];
                        //$password = $arr[2];

                        $sql = "SELECT * FROM tb_transformator WHERE id_transformator = '$id_transformator'";
                        $resultSQL = mysqli_query($con, $sql);
                        $result = mysqli_fetch_array($resultSQL);
                        
                        if(mysqli_num_rows($resultSQL) > 0 ) {

                        $_SESSION['id_transformator'] = $result['id_transformator'];
                        //$_SESSION['IsActive'] = TRUE;
                        ?>
                        <script>window.location.href = "../transformator/data.php?id_transformator=<?=$result['id_transformator']?>";</script>
                        <!-- <script>alert("QR berhasil"); window.location.href = "../transformator/data.php?id=<?=$result['id_transformator']?>";</script> -->
                        <?php
                        }
                        else{
                        echo "<script>alert('QR tidak terdaftar'); window.location='scanner.php';</script>";
                        }
                    }
                    ?>
                    </div>
                    <div>
                        <video id="preview" class="col-12" style="width:auto; height: auto; text-align: center;"></video>
                    </div>
                </div>
                <!-- scanner -->
                <script src="scanner/js/app.js"></script>
                <script src="scanner/vendor/instascan/instascan.min.js"></script>
                <script src="scanner/js/scanner.js"></script>
                </body>
                </html>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
<?php include_once('../../footer.php');?>
