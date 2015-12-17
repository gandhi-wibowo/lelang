<html>
    <head>
        <?php
        include 'session.php';
        include 'function.php';
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
                $iduser=$_SESSION['id_user'];
                $passcur=md5($_POST['passw-cur']);
                $passnew=md5($_POST['passw-new']);
                $passconf=md5($_POST['passw-conf']);
                
                if($passnew!=$passconf){
                    ?>
                    <div class="pad margin no-print">
                      <div class="callout callout-danger" style="margin-bottom: 0!important;">
                        <h4><i class="fa fa-info"></i>nfo :</h4>
                        Password Tidak Sesuai !
                      </div>
                    </div>
                    <?php                    
                }
                else{
                    $con=koneksi();
                    $select="select id_user,password from user where id_user='$iduser' and password='$passcur'";
                    $query=mysqli_query($con,$select);
                    if(mysqli_num_rows($query)>0){
                      $update="update user set password='$passconf' where id_user='$iduser'";
                      $quer=mysqli_query($con,$update);
                      if($quer){    
                        ?>
                        <div class="pad margin no-print">
                          <div class="callout callout-info" style="margin-bottom: 0!important;">
                            <h4><i class="fa fa-info"></i>nfo :</h4>
                            Password Berhasil Diubah !
                          </div>
                        </div>
                        <?php
                      }
                    } 
                    else {
                    ?>
                    <div class="pad margin no-print">
                      <div class="callout callout-danger" style="margin-bottom: 0!important;">
                        <h4><i class="fa fa-info"></i>nfo :</h4>
                        Password Tidak Sesuai !
                      </div>
                    </div>
                    <?php 
                    }                    
                }
            }
            ?>
            
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Update Password</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                      <form method="POST" >
                        <h1>Ganti Password</h1>
                        <div class="form-group">
                          <label for="passw-cur">Password Sekarang</label>
                          <input type="password" class="form-control" name="passw-cur" size="35" placeholder="Password" />
                        </div>
                        <div class="form-group">
                          <label for="passw-new">Password Baru</label>
                          <input type="password" class="form-control" name="passw-new" size="35" placeholder="Password Baru" />
                        </div>
                        <div class="form-group">
                          <label for="passw-conf">Konfirmasi Password Baru</label>
                          <input type="password" class="form-control" name="passw-conf" size="35" placeholder="Konfirmasi Password" />
                        </div>
                        <div class="form-group">
                          <input type="submit" name="submit" value="Ganti" class="btn btn-md btn-success">
                        </div>                          
                      </form>
                  </div><!-- /.row -->
              </div><!-- /.box-body -->
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