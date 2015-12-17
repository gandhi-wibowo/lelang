<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registrasi</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="../bootstrap/css/ionicons.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="../plugins/morris/morris.css">
    <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  </head>
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
                <a href="../index.php" class="navbar-brand glyphicon glyphicon-home">  Home</a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                  <li class="dropdown">
                      <a href="#" class="glyphicon glyphicon-user dropdown-toggle" data-toggle="dropdown">  TUTORIAL <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                          <li><a href="../tutorial/photoshop.php" class="fa   fa-file">  Photoshop</a></li>
                          <li><a href="../tutorial/corel_draw.php" class="fa  fa-lock">  Corel Draw</a></li>
                      </ul>
                  </li>
              </ul>
            </div>  
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                  <li><a href="../profil.php" class="glyphicon glyphicon-phone-alt">  PROFIL</a></li>
              </ul>
            </div>               
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                  <li>
                      <a href="registrasi.php" class="glyphicon glyphicon-plus-sign">  Daftar</a>
                  </li>                  
                  <li>
                      <a href="../login.php" class="glyphicon glyphicon-log-in">  Masuk</a>
                  </li>                  
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="content-wrapper">
        <div class="container">
          <section class="content-header">
            <h1></h1>
          </section>
            <?php
            include "function.php";
            if(isset($_POST['submit'])){
                $nama=$_POST['nama'];
                $nohp=$_POST['nohp'];
                $email=$_POST['email_user'];
                $norek=$_POST['rekening-no'];
                $bank=$_POST['rekening-bank'];
                $hold=$_POST['rekening-holder'];
                $uname=$_POST['username'];
                $pass=md5($_POST['passw']);
                if(getUserId($uname)>0){
                    ?>
                    <div class="pad margin no-print">
                      <div class="callout callout-danger" style="margin-bottom: 0!important;">
                        <h4><i class="fa fa-info"></i>nfo :</h4>
                        Username Sudah Terdaftar !
                      </div>
                    </div>
                    <?php
                } else {
                  if(registerUserLelang($nama,$nohp,$email,$uname,$pass)){
                    $idUserReg=getUserId($uname);
                    if(registerRekening($idUserReg,$norek,$bank,$hold)){
                    ?>
                    <div class="pad margin no-print">
                      <div class="callout callout-info" style="margin-bottom: 0!important;">
                        <h4><i class="fa fa-info"></i>nfo :</h4>
                        Registrasi Berhasil !
                      </div>
                    </div>
                    <?php        
                    } else {
                    ?>
                    <div class="pad margin no-print">
                      <div class="callout callout-danger" style="margin-bottom: 0!important;">
                        <h4><i class="fa fa-info"></i>nfo :</h4>
                        Gagal Registrasi !
                      </div>
                    </div>
                    <?php        
                    }
                  }
                }                
            }

            ?>            
          <section class="content">
              
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Registrasi</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
             <form method="POST" action="">
              <div class="row">
                <div class="col-md-6">
                    
                    <h2>Data Diri</h2>
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control" name="nama" size="35" placeholder="Nama Lengkap" />
                    </div>
                    <div class="form-group">
                      <label for="nohp">Nomor Telepon/HP</label>
                      <input type="text" class="form-control" name="nohp" size="35" placeholder="Nomor Telepon/HP" />
                    </div>
                    <div class="form-group">
                      <label for="email_user">Email</label>
                      <input type="email" class="form-control" name="email_user" placeholder="Alamat E-mail" />
                    </div>
                    
                    
                    <h2>Data Rekening</h2>
                    <div class="form-group">
                      <label for="rekening-no">Nomor Rekening</label>
                      <input type="text" class="form-control" name="rekening-no" size="35" placeholder="Nomor Rekening" />
                    </div>
                    <div class="form-group">
                      <label for="rekening-bank">Nama Bank</label>
                      <input type="text" class="form-control" name="rekening-bank" size="35" placeholder="Bank" />
                    </div>
                    <div class="form-group">
                      <label for="rekening-holder">Nama Pemegang Rekening</label>
                      <input type="text" class="form-control" name="rekening-holder" size="35" placeholder="Pemegang Rekening" />
                    </div>
                </div>
                  
                <div class="col-md-6">
                    <h2>Data Akun</h2>
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" size="35" placeholder="Username" />
                      </div>
                      <div class="form-group">
                        <label for="passw">Password</label>
                        <input type="password" class="form-control" name="passw" size="35" placeholder="Password" />
                      </div>
                      <div class="form-group">
                        <input type="submit" name="submit" value="Register" class="btn btn-md btn-info">
                      </div>
                </div><!-- /.col -->
              </div><!-- /.row -->
             </form>
            </div><!-- /.box-body -->
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
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>        
    <script src="../bootstrap/js/jquery-ui.min.js"></script>
    <script> $.widget.bridge('uibutton', $.ui.button);</script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/js/raphael-min.js"></script>
    <script src="../plugins/morris/morris.min.js"></script>
    <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../plugins/knob/jquery.knob.js"></script>
    <script src="../bootstrap/js/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <script src="../dist/js/app.min.js"></script>
    <script src="../dist/js/pages/dashboard.js"></script>
    <script src="../dist/js/demo.js"></script>
  </body>
</html>
