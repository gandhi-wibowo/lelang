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
            if(isset($_POST['submit'])){                            
                $username     = $_POST['u_name'];
                $nama_lengkap = $_POST['nm_lengkap'];
                $email        = $_POST['email'];
                $no_hp        = $_POST['no_hp'];
                $pas          = md5($_POST['password']);
                $pass         = md5($_POST['password_1']);
                if(con_db()!=0){
                    if($pas == $pass){
                        $query = "INSERT INTO `user` 
                                (`id_user`, `username`, `password`, `nama`, `email`,`no_hp`,`hak_akses`,`block`) 
                         VALUES (NULL, '$username', '$pas', '$nama_lengkap','$email', '$no_hp','1','1');";   
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
                              <h3 class="box-title">Data User Admin</h3>
                          </div>
                          <div class="box-body">
                            <div class="box box-info">
                              <div class="box-header with-border">
                                <h3 class="box-title">Form Tambah User Admin</h3>
                              </div><!-- /.box-header -->
                              <!-- form start -->
                              <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                                <div class="box-body">
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" placeholder="Username" name="u_name" required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Nama Lengkap</label>
                                    <div class="col-sm-5">
                                      <input type="text" class="form-control" placeholder="Nama Lengkap" name="nm_lengkap" required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-5">
                                      <input type="email" class="form-control" placeholder="Email" name="email" required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">No Hp</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" placeholder="No Handphone" name="no_hp" required>
                                    </div>
                                  </div>
 
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control" placeholder="password" name="password" id="pas" required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Ulangi Password</label>
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control" placeholder="password" name="password_1" id="pass" required>
                                        <i id="confirm"></i>
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