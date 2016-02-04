<html>
    <head>
        <?php
        include 'session.php';
        include "function.php";
        $iklanId=$_GET['id_iklan'];
        $idUser=$_SESSION['id_user'];        
        include 'css.php';        
        ?>     
    </head>
    
    <body class="hold-transition skin-blue layout-top-nav">
        <div class="wrapper">
            <?php include 'menu.php';
            ?>
            <!-- mulai nulis isinya -->
      <div class="content-wrapper">
        <div class="container">
          <section class="content-header">
            <h1></h1>
          </section>
            <?php
            if(isset($_POST['submit'])){
                $con=koneksi();
                $userId=$_POST['id_user'];
                $iklanId=$_POST['id_iklan'];
                $harga=$_POST['harga'];
                $ikhtisar=$_POST['ikhtisar'];
                        $lokasi_file = $_FILES['karya']['tmp_name'];
                        $tipe_file   = $_FILES['karya']['type'];
                        $nama_file   = $_FILES['karya']['name'];
                        $nama_new= "$userId-".date('dmYHis')."-$nama_file";
                        $direktori   = "../file/$nama_new";
                  move_uploaded_file($lokasi_file,$direktori);
                $insert="insert into lelang values('','$userId','$iklanId','$harga','$ikhtisar','$nama_new','0','1')";
                $query=mysqli_query($con,$insert);
                if($query){
                ?>
                <div class="pad margin no-print">
                  <div class="callout callout-info" style="margin-bottom: 0!important;">
                    <h4><i class="fa fa-info"></i>nfo :</h4>
                    Upload File Berhasil !
                  </div>
                </div>
                <?php                    
                } else {
                ?>
                <div class="pad margin no-print">
                  <div class="callout callout-danger" style="margin-bottom: 0!important;">
                    <h4><i class="fa fa-info"></i>nfo :</h4>
                    Gagal Upload file !
                  </div>
                </div>
                <?php                    
                }                
            }
            if (cekIkutLelang($idUser,$iklanId)){
                ?>
                <div class="pad margin no-print">
                  <div class="callout callout-info" style="margin-bottom: 0!important;">
                    <h4><i class="fa fa-info"></i>nfo :</h4>
                    Anda Sudah mengikuti lelang ini, Silahkan tunggu Pemberitahuannya !
                  </div>
                </div>
                <?php
            } else { ?> 
          <section class="content">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="box box-info box-solid">
                          <div class="box-header with-border">
                              <h3 class="box-title">Tambah Iklan</h3>
                          </div>
                          <div class="box-body">
                            <div class="box box-info">
                              <div class="box-header with-border">
                                <h3 class="box-title">Form Tambah Iklan</h3>
                              </div><!-- /.box-header -->
                              <!-- form start -->
                              <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                                <div class="box-body">

                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">File / Gambar</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="karya" class="form-control">
                                        <input type="hidden" name="id_iklan" value="<?php echo $iklanId; ?>">
                                        <input type="hidden" name="id_user" value="<?php echo $idUser; ?>"><br>                                        
                                    </div>
                                    <label class="col-sm-2 control-label">Harga</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="harga" class="form-control"><br>                                  
                                    </div>
                                    <label class="col-sm-2 control-label">Ikhtisar</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="ikhtisar" class="form-control">                                        
                                    </div>
                                  </div>


                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <input type="submit" name="submit" value="Kirim Karya" class="btn btn-md btn-primary pull-right" for="karya">
                                </div><!-- /.box-footer -->
                              </form>
                            </div>  
                          </div>
                      </div>
                  </div>
              </div>
          </section>
           <?php } ?>
        </div><!-- /.container -->
      </div>            
            
            <!-- batas nulis isinya -->
            <?php include 'footer.php'; ?>
        </div>
        
        <?php include 'js.php'; ?>
    </body>
</html>