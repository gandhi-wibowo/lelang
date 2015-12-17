<html>
    <head>
        <?php
        include 'session.php';
        $query_profil="SELECT * FROM profil";
        $result_profil=  mysql_query($query_profil);        
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
                $nama = $_POST['nama'];
                $jenis = $_POST['jenis'];
                $alamat = $_POST['alamat'];
                $tgl = $_POST['tgl'];
                $isi = $_POST['isi'];
                $query_simpan ="INSERT INTO `profil` (`id_profil`, `nama`, `jenis`, `alamat`, `tahun_berdiri`, `profil`)
                                              VALUES (NULL, '$nama', '$jenis', '$alamat', '$tgl', '$isi');";
                
                $sukses_simpan = mysql_query($query_simpan);
                    if($sukses_simpan){
                        ?>
                        <div class="pad margin no-print">
                          <div class="callout callout-info" style="margin-bottom: 0!important;">
                            <h4><i class="fa fa-info"></i>nfo :</h4>
                            Data Berhasil Disimpan !
                          </div>
                        </div>
                        <?php
                    }
                    else{
                        ?>
                        <div class="pad margin no-print">
                          <div class="callout callout-danger" style="margin-bottom: 0!important;">
                            <h4><i class="fa fa-info"></i>nfo :</h4>
                            Data Gagal Disimpan !
                          </div>
                        </div>
                        <?php                            
                    }                
            }
            elseif (isset ($_POST['update'])) {
                $id_profil = $_POST['id_profil'];
                $nama = $_POST['nama'];
                $jenis = $_POST['jenis'];
                $alamat = $_POST['alamat'];
                $tgl = $_POST['tgl'];
                $isi = $_POST['isi'];
                $query_update ="UPDATE  `profil` SET  
                    `nama` =  '$nama',
                    `jenis`='$jenis',
                    `alamat`='$alamat',
                    `tahun_berdiri`='$tgl',
                    `profil`='$isi'
                    WHERE  `id_profil` ='$id_profil';";
                $sukses_update = mysql_query($query_update);
                    if($sukses_update){
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
                            Data Gagal Diubah !
                          </div>
                        </div>
                        <?php                            
                    }                
            }
                if(mysql_num_rows($result_profil)>0){
                    $status ="1";// update
                    $row_profil = mysql_fetch_array($result_profil);
            ?>
          <section class="content">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="box box-info box-solid">
                          <div class="box-header with-border">
                              <h3 class="box-title">Profil</h3>
                          </div>
                          <div class="box-body">
                            <div class="box box-info">
                              <div class="box-header with-border">
                                <h3 class="box-title">Form Ubah Profil</h3>
                              </div>
                                
                              <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                                <div class="box-body">
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Nama Perusahaan</label>
                                    <div class="col-sm-5">
                                        <input type="hidden" name="id_profil" value="<?php echo $row_profil['id_profil']; ?>">
                                        <input type="text" class="form-control" placeholder="Nama" name="nama" value="<?php echo $row_profil['nama']; ?>" required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Jenis Perusahaan</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" placeholder="Jensi Perusahaan" name="jenis" value="<?php echo $row_profil['jenis']; ?>"required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-5">
                                      <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?php echo $row_profil['alamat']; ?>" required>
                                    </div>
                                  </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Tahun Berdiri</label>
                                        <div class="col-sm-5">
                                            <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                                <input type="text" class="form-control" name="tgl" value="<?php echo $row_profil['tahun_berdiri']; ?>">
                                                <div class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </div>                                        
                                            </div>                                            
                                        </div>
                                    </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Visi & Misi</label>
                                    <div class="col-sm-5">
                                        <textarea name="isi" class="form-control" style="width: 150%; height: 200px;"><?php echo $row_profil['profil']; ?></textarea>
                                    </div>
                                  </div>
                                 
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <input type="submit" name="update" class="btn btn-info pull-right" value="update">
                                </div><!-- /.box-footer -->
                              </form>
                            </div>
                              
                          </div>
                      </div>
                  </div>
              </div>
          </section>
            <?php } else{ ?>
          <section class="content">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="box box-info box-solid">
                          <div class="box-header with-border">
                              <h3 class="box-title">Profil</h3>
                          </div>
                          <div class="box-body">
                            <div class="box box-info">
                              <div class="box-header with-border">
                                <h3 class="box-title">Form Tambah Profil</h3>
                              </div>
                                
                              <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                                <div class="box-body">
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Nama Perusahaan</label>
                                    <div class="col-sm-5">
                                      <input type="text" class="form-control" placeholder="Nama" name="nama" required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Jenis Perusahaan</label>
                                    <div class="col-sm-5">
                                      <input type="text" class="form-control" placeholder="Jensi Perusahaan" name="jenis" required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-5">
                                      <input type="text" class="form-control" placeholder="Alamat" name="alamat" required>
                                    </div>
                                  </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Tahun Berdiri</label>
                                        <div class="col-sm-5">
                                            <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                                <input type="text" class="form-control" name="tgl">
                                                <div class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </div>                                        
                                            </div>                                            
                                        </div>
                                    </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Visi & Misi</label>
                                    <div class="col-sm-5">
                                        <textarea name="isi" class="form-control" style="width: 150%; height: 200px;"></textarea>
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
            <?php } ?>
        </div><!-- /.container -->
      </div>            
            
            <!-- batas nulis isinya -->
            <?php include 'footer.php'; ?>
        </div>
        
        <?php include 'js.php'; ?>
    </body>
</html>