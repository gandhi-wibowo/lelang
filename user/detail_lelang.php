<html>
    <head>
        <?php
        include 'session.php';
        $id_iklan=$_GET['id'];
        $query = "SELECT * FROM  `iklan` WHERE id_iklan='$id_iklan'";
        $result = mysql_query($query);        
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
                            <a href="#" class="glyphicon glyphicon-ok btn btn-md btn-success pull-right"> Selamat, Anda Adalah Pemenang Lelang Ini</a>
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