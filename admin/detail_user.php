<html>
    <head>
        <?php
        include 'session.php';
        $id=$_GET['id'];
        if($id!=NULL){
            $query="SELECT * FROM user where id_user='$id'";
            $result=  mysql_query($query);
            $row = mysql_fetch_array($result);    
            $quer="SELECT * FROM rekening where id_user='$id'";
            $resul=  mysql_query($quer);
            $rekening = mysql_fetch_array($resul);
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
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Detail : <?php echo $row['nama']; ?></h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">

                      <h2>Data Diri</h2>
                      <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" value="<?php echo $row['nama']; ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="nohp">Nomor Telepon/HP</label>
                        <input type="text" class="form-control" value="<?php echo $row['no_hp']; ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="email_user">Email</label>
                        <input type="text" class="form-control" value="<?php echo $row['email']; ?>" disabled>
                      </div>
                  </div>

                  <div class="col-md-6">
                      <h2>Data Rekening</h2>
                      <div class="form-group">
                        <label for="rekening-no">Nomor Rekening</label>
                        <input type="text" class="form-control" value="<?php echo $rekening['no_rek']; ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="rekening-bank">Nama Bank</label>
                        <input type="text" class="form-control" value="<?php echo $rekening['bank_rek']; ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="rekening-holder">Nama Pemegang Rekening</label>
                        <input type="text" class="form-control" value="<?php echo $rekening['holder_rek']; ?>" disabled>
                      </div>                    
                  </div><!-- /.col -->
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

<?php
}
?>