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
            $id_tutorial=$_GET['id'];
            $query_tutorial="SELECT * FROM tutorial WHERE id_tutorial='$id_tutorial'";
            $result_tutorial=  mysql_query($query_tutorial);
            $row_tutorial=  mysql_fetch_array($result_tutorial);
            if(isset($_POST['submit'])){
                $judul        =$_POST['judul'];
                $kategori     = $_POST['kategori'];
                $isi          = $_POST['isi'];
                if(con_db()!=0){
                    if($pas == $pass){
                        $query="UPDATE  `tutorial` SET  
                            `judul` =  '$judul',
                            `kategori` =  '$kategori',
                            `isi` =  '$isi' 
                            WHERE  `id_tutorial` ='$id_tutorial';";
                        $result = mysql_query($query);
                        if($result){
                            ?>
                            <div class="pad margin no-print">
                              <div class="callout callout-info" style="margin-bottom: 0!important;">
                                <h4><i class="fa fa-info"></i>nfo :</h4>
                                Data Berhasil Ditambahkan !
                              </div>
                            </div>
                            <?php
                        }
                        else{
                            ?>
                            <div class="pad margin no-print">
                              <div class="callout callout-danger" style="margin-bottom: 0!important;">
                                <h4><i class="fa fa-info"></i>nfo :</h4>
                                Data Gagal Ditambahkan !
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
                            Password Tidak Cocok !
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
                        Password Tidak Cocok !
                      </div>
                    </div>
                    <?php
                }
            }
            ?>
            
          <section class="content">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="box box-info box-solid">
                          <div class="box-header with-border">
                              <h3 class="box-title">Tutorial</h3>
                          </div>
                          <div class="box-body">
                            <div class="box box-info">
                              <div class="box-header with-border">
                                <h3 class="box-title">Form Edit Tutorial</h3>
                              </div>
                                
                              <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                                <div class="box-body">
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Judul</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" placeholder="Judul" name="judul" value="<?php echo $row_tutorial['judul']; ?>" required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Kategori</label>
                                    <div class="col-sm-5">
                                        <select name="kategori" class="form-control">
                                            <option value="0">Photoshop</option>
                                            <option value="1">Corel Draw</option>
                                        </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Isi</label>
                                    <div class="col-sm-5">
                                        <textarea name="isi" class="form-control" style="width: 150%; height: 200px;"><?php echo $row_tutorial['isi']; ?></textarea>
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