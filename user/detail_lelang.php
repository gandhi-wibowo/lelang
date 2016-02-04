<html>
    <head>
        <?php
        include 'session.php';
        $id_iklan=$_GET['id'];
        $query = "SELECT * FROM  `iklan` WHERE id_iklan='$id_iklan'";
        $result = mysql_query($query);        
        
        
        $query_pemenang = "SELECT * FROM daftar_pemenang WHERE id_user=$id_user AND id_iklan='$id_iklan'";
        $res_pemenang = mysql_query($query_pemenang);
        $ro_pemenang = mysql_fetch_array($res_pemenang);
        
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
                
                        $target_dir = "../file/confirm/";  
                        $lokasi_file = $_FILES['upload_confirm']['tmp_name'];
                        $target_file = $target_dir . basename($_FILES["upload_confirm"]["name"]);
                        $tipe_file = pathinfo($target_file,PATHINFO_EXTENSION);
                        $nama_file   = $_FILES['upload_confirm']['name'];
                        $nama_new= "$id_user-".date('dmYHis')."-$nama_file";
                        $direktori   = "../file/confirm/$nama_new";
                        if($tipe_file != "rar" && $tipe_file != "zip"){
                            ?>
                                  <div class="pad margin no-print">
                                    <div class="callout callout-danger" style="margin-bottom: 0!important;">
                                      <h4><i class="fa fa-info"></i>nfo :</h4>
                                      Format FIle Tidak didukung !
                                    </div>
                                  </div>             
                            <?php
                        }
                        else{
                            if(move_uploaded_file($lokasi_file,$direktori)){
                                // mau di input ke confirm lelang  <?php echo $ro_pemenang['id_daftar_pemenang']; 
                                $id_daftar_pemenang = $ro_pemenang['id_daftar_pemenang'];
                                $query_confirm = "INSERT INTO `cv_witra`.`confirm_lelang` 
                                    (`id_confirm`, `id_daftar_pemenang`, `nama_file`, `status`)
                                    VALUES (NULL, '$id_daftar_pemenang', '$nama_new', '0');";
                                if(mysql_query($query_confirm)){
                                    ?>
                                        <div class="pad margin no-print">
                                          <div class="callout callout-info" style="margin-bottom: 0!important;">
                                            <h4><i class="fa fa-info"></i>nfo :</h4>
                                            File Telah Terkirim !
                                          </div>
                                        </div>            
                                    <?php                                    
                                }
                                else{
                                    ?>
                                        <div class="pad margin no-print">
                                          <div class="callout callout-danger" style="margin-bottom: 0!important;">
                                            <h4><i class="fa fa-info"></i>nfo :</h4>
                                            File Gagal di upload !
                                          </div>
                                        </div>             
                                    <?php
                                }

                                    }
                                    else{
                                        ?>
                                            <div class="pad margin no-print">
                                              <div class="callout callout-danger" style="margin-bottom: 0!important;">
                                                <h4><i class="fa fa-info"></i>nfo :</h4>
                                                File Gagal di upload !
                                              </div>
                                            </div>             
                                        <?php
                                    }                            
                        }
            }
            ?>

          <section class="content">
              <div class="row">
                  <?php
                  while ($row = mysql_fetch_array($result)) {
                  ?>
                <div class="col-md-6">
                  <div class="box box-widget">
                    <div class='box-header with-border'>
                      <div class='user-block'>
                        <img class='img-circle' src='../dist/img/user1-128x128.jpg' alt='user image'>
                        <span class='username'><a href="#"><?php echo $row['judul_iklan']; ?></a></span>
                        <span class='description'>Admin : <?php echo $row['tgl_iklan']; ?></span>
                      </div>
                    </div><!-- /.box-header -->
                    <div class='box-body'>                        
                        <?php echo $row['isi_iklan']; ?>
                        
                        <br>
                        <br>
                        
                    </div>
                    
                    <?php
                    $que = "SELECT * FROM  `lelang` WHERE id_iklan ='".$row['id_iklan']."' ORDER BY id_lelang ASC ";
                    $res =  mysql_query($que);
                    $ro = mysql_fetch_array($res);
                    ?>

                    <div class='box-footer box-comments'>
                      <div class='box-comment'>
                        <img class='img-circle' src='../dist/img/user1-128x128.jpg' alt='user image'>
                        <div class='comment-text'>
                          <span class="username">
                            <?php
                            $nama = mysql_fetch_array(mysql_query("SELECT * FROM `user` WHERE id_user='$id_user'"));
                            ?>
                              <a href="#"><?php echo $nama['nama']; ?></a>
                            
			  </span>
                            <label>
                                Silahkan Upload Ulang FIle asli untuk Konfirmasi !<br>(File dalam bentuk .rar,.zip )<br>
                            </label>
                            <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                                <input type="file" name="upload_confirm" class="form-control">
                                <input type="submit" name="submit" value="Kirim" class="glyphicon glyphicon-ok btn btn-md btn-success pull-right">

                            </form>

                        </div><!-- /.comment-text -->
                      </div>
                    </div>
                    
                    <?php } ?>
                    
                  </div><!-- /.box -->
                </div><!-- /.col -->  
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
