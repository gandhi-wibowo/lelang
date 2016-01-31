<html>
    <head>
        <?php
        include 'session.php';
        include 'function.php';
        $con=koneksi();
        $id=$_SESSION['id_user'];
        if($id!=NULL){
            $query="SELECT * FROM user where id_user='$id'";
            $result=  mysqli_query($con,$query);
            $row = mysqli_fetch_array($result);
            $quer="SELECT * FROM rekening where id_user='$id'";
            $resul=  mysqli_query($con,$quer);
            $rekening = mysqli_fetch_array($resul);        
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
                $nama =$_POST['nama'];
                $no_hp =$_POST['no_hp'];
                $email =$_POST['email'];
                $no_rek =$_POST['no_rek'];
                $holder_rek =$_POST['holder_rek'];
                $bank_rek =$_POST['bank_rek'];
                $upd  ="UPDATE `user` SET `nama`='$nama',`no_hp`='$no_hp',`email`='$email' WHERE `id_user`='$id';";
                $upd.="UPDATE `rekening` SET `no_rek`='$no_rek',`holder_rek`='$holder_rek',`bank_rek`='$bank_rek' WHERE `id_user`='$id';";
                $exe = mysqli_multi_query($con, $upd);
                if($exe){
                    header("location:edit_user.php");
                }
                else{
                    header("location:edit_user.php");
                }
            }
            ?>            
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Update Data : <?php echo $row['nama']; ?></h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <div class="row">                    
                    <form method="POST" action="">
                        <div class="col-md-6">
                            <h2>Data Diri</h2>
                            <div class="form-group">
                              <label for="nama">Nama</label>
                              <input type="text" class="form-control" value="<?php echo $row['nama']; ?>" name="nama">
                            </div>
                            <div class="form-group">
                              <label for="nohp">Nomor Telepon/HP</label>
                              <input type="text" class="form-control" value="<?php echo $row['no_hp']; ?>" name="no_hp">
                            </div>
                            <div class="form-group">
                              <label for="email_user">Email</label>
                              <input type="text" class="form-control" value="<?php echo $row['email']; ?>" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h2>Data Rekening</h2>
                            <div class="form-group">
                              <label for="rekening-no">Nomor Rekening</label>
                              <input type="text" class="form-control" value="<?php echo $rekening['no_rek']; ?>" name="no_rek">
                            </div>
                            <div class="form-group">
                              <label for="rekening-bank">Nama Bank</label>
                              <input type="text" class="form-control" value="<?php echo $rekening['bank_rek']; ?>" name="holder_rek">
                            </div>
                            <div class="form-group">
                              <label for="rekening-holder">Nama Pemegang Rekening</label>
                              <input type="text" class="form-control" value="<?php echo $rekening['holder_rek']; ?>" name="bank_rek">
                            </div>                    
                            <div class="form-group">
                                <input type="submit" class="btn btn-info" value="Simpan" name="submit">
                            </div>                    
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
<?php } ?>