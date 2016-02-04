<?php
include 'include/koneksi.php';
con_db();
$query = "SELECT * FROM  `iklan`  WHERE status='1' ORDER BY tgl_iklan DESC";
$result = mysql_query($query);  
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <style>
        .background{
            background: url('include/img/witra.png')no-repeat #ECF0F5;
            -webkit-background-size: 85%;
            -moz-background-size: 85%;
            background-size: 85%;
        }
    </style>    
  </head>
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
                    <a class="navbar-brand" rel="home" href="index.php" >
                        <img style="max-width:90px; margin-top: -20px;" src="include/img/witra.png">
                    </a>                
            </div>
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                  <li class="dropdown">
                      <a href="#" class="glyphicon glyphicon-user dropdown-toggle" data-toggle="dropdown">  TUTORIAL <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                          <li><a href="tutorial/photoshop.php" class="fa   fa-file">  Photoshop</a></li>
                          <li><a href="tutorial/corel_draw.php" class="fa  fa-lock">  Corel Draw</a></li>
                      </ul>
                  </li>
              </ul>
            </div>  
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                  <li><a href="profil.php" class="glyphicon glyphicon-phone-alt">  PROFIL</a></li>
              </ul>
            </div>               
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                  <li>
                      <a href="user/registrasi.php" class="glyphicon glyphicon-plus-sign">  Daftar</a>
                  </li>                  
                  <li>
                      <a href="login.php" class="glyphicon glyphicon-log-in">  Masuk</a>
                  </li>                  
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="content-wrapper background">
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
                        <img class='img-circle' src='dist/img/user1-128x128.jpg' alt='user image'>
                        <span class='username'><a href="#"><?php echo $row['judul_iklan']; ?></a></span>
                        <span class='description'>Admin : <?php echo $row['tgl_iklan']; ?></span>
                      </div>
                    </div><!-- /.box-header -->
                    <div class='box-body'>                        
                        <?php echo $row['isi_iklan']; ?>
                        
                        <br>
                        <br>
                        <a href="file/<?php echo $row['file_iklan']; ?>" class="btn btn-md btn-info pull-left">Download Lampiran</a>
                        <a disable href="user/ikut_lelang.php?id_iklan=<?php echo $row['id_iklan']; ?>" class="btn btn-md btn-info pull-right">Ikut Lelang</a>
                    </div>
                    
                    <?php
                    $que = "SELECT * FROM  `komentar` WHERE id_iklan ='".$row['id_iklan']."' ORDER BY id_komentar ASC ";
                    $res =  mysql_query($que);
                    while ($ro = mysql_fetch_array($res)) {
                    ?>

                    <div class='box-footer box-comments'>
                      <div class='box-comment'>
                        <img class='img-circle' src='dist/img/user1-128x128.jpg' alt='user image'>
                        <div class='comment-text'>
                          <span class="username">
                            <?php
                            $nama = mysql_fetch_array(mysql_query("SELECT * FROM `user` WHERE id_user='".$ro['id_user']."'"));
                            echo $nama['nama'];
                            ?>
                            <span class='text-muted pull-right'><?php echo $ro['jam']; ?></span>
                          </span>
                            <?php echo $ro['isi_komentar']; ?>
                        </div><!-- /.comment-text -->
                      </div>
                    </div>                    
                    <?php } ?>                    
                    <div class="box-footer">
                        <form action="user/ajax.php" method="POST">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" name="comentar">
                                <input type="hidden" name='id_user' value="<?php echo $id_user; ?>">
                                <input type="hidden" name='id_iklan' value="<?php echo $row['id_iklan']; ?>">
                                <span class="input-group-btn">
                                    <input type="submit" class="btn btn-info btn-flat" name="coment" value="POST">
                                </span>
                            </div>
                        </form>
                    </div><!-- /.box-footer -->
                  </div><!-- /.box -->
                </div><!-- /.col -->  
                <?php } ?>
              </div>
          </section>          
            
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
          </div>
          <strong>Copyright &copy; <a href="#"> CV. Witra</a></strong>
        </div><!-- /.container -->
      </footer>
    </div>
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="bootstrap/js/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="dist/js/app.min.js"></script>
  </body>
</html>
