<html>
    <head>
        <?php
        include 'session.php';
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
                date_default_timezone_set('Asia/Jakarta');
                $tgl= mktime(date("d"),date("m"),date("Y"));
                $date = date("Y-m-d", $tgl);
                $jam = date("His");

                $id_d = $_GET['id'];
                $id=$_SESSION['id_user'];
                $quer = "SELECT * FROM iklan WHERE id_iklan='$id_d'";
                $res = mysql_query($quer);
                $r = mysql_fetch_array($res);



                if(isset($_POST['submit'])){
                    $target_dir = "../file/";   
                    $target_file = $target_dir . basename($_FILES["file_post"]["name"]);
                    $FileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    $new_name =$id."_".date("Ymd",$tgl)."_".$jam.".".$FileType;
                    $judul = $_POST['judul_post'];
                    $isi   = $_POST['isi_post'];
                    if($FileType != "jpg" && $FileType != "png" && $FileType != "jpeg" && $FileType != "gif" && $FileType != "zip" && $FileType != "rar"){
                            $query = "UPDATE  `iklan` SET  `id_user`='$id', `judul_iklan`='$judul', `isi_iklan`='$isi' WHERE  `id_iklan` ='$id_d';";
                            mysql_query($query); 
                            ?>
                            <div class="pad margin no-print">
                              <div class="callout callout-info" style="margin-bottom: 0!important;">
                                <h4><i class="fa fa-info"></i>nfo :</h4>
                                Data Berhasil Diubah !
                              </div>
                            </div>
                            <?php
                    }
                    else{
                        if (move_uploaded_file($_FILES["file_post"]["tmp_name"], $target_dir.$new_name)) {
                            $query = "UPDATE  `iklan` SET  `id_user`='$id', `file_iklan`='$new_name', `judul_iklan`='$judul', `isi_iklan`='$isi' WHERE  `id_iklan` ='$id_d';";
                            mysql_query($query);
                            header("location:index.php");
                            ?>
                            <div class="pad margin no-print">
                              <div class="callout callout-info" style="margin-bottom: 0!important;">
                                <h4><i class="fa fa-info"></i>nfo :</h4>
                                Data Berhasil Diubah !
                              </div>
                            </div>
                            <?php
                        }
                        else{
                            ?>
                            <div class="pad margin no-print">
                              <div class="callout callout-danger" style="margin-bottom: 0!important;">
                                <h4><i class="fa fa-info"></i>nfo :</h4>
                                Gagal Ubah Data !
                              </div>
                            </div>             
                            <?php
                            
                        }
                    }         
                }
                ?>            
            
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
                                      <label class="col-sm-2 control-label">Judul Iklan</label>
                                    <div class="col-sm-5">
                                      <input type="text" class="form-control" placeholder="Judul" name="judul_post" value="<?php echo $r['judul_iklan']; ?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Isi Iklan</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="7" placeholder="Spesifikasi Iklan ...." name="isi_post"><?php echo $r['isi_iklan']; ?></textarea>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">File / Gambar</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="file_post" style="width: 48%;">
                                    </div>
                                  </div>

                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <input type="submit" name="submit" class="btn btn-info pull-right" value="Simpan">
                                </div><!-- /.box-footer -->
                              </form>
                            </div>  
                          </div>
                          
                          
                          
                      </div>
                  </div>
              </div>
          </section>
        </div><!-- /.container -->
      </div>            
            
            <!-- batas nulis isinya -->
            <?php include 'footer.php'; ?>
        </div>
        
        <?php include 'js.php'; ?>
    </body>
</html>
