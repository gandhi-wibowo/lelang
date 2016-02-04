<?php
session_start();
error_reporting(0);
if($_SESSION['status']=="login"){
    if($_SESSION['hak_akses']=="admin"){
        header("location:admin/");
    }
    else{
        header("location:user/");
    }
}
    
include 'include/koneksi.php';
con_db();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log In</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
          <img style="max-width:350px; margin-top: -20px;" src="include/img/witra.png">
      </div><!-- /.login-logo -->
        <?php
        if(isset($_POST['submit'])){
            $name = $_POST['username'];
            $pwd = md5($_POST['password']);
            $query = "SELECT * FROM user WHERE username='$name' AND password='$pwd'";
            $result = mysql_query($query);
            $hasil = mysql_num_rows($result);
            if($hasil>0){
                $row = mysql_fetch_array($result);
                if($row['hak_akses']==1){
                    $_SESSION['status']="login";
                    $_SESSION['hak_akses']="admin";
                    $_SESSION['username']=$row['username'];
                    $_SESSION['id_user']=$row['id_user'];
                    header("location:admin/");
                }
                elseif($row['hak_akses']==0){
                    $_SESSION['status']="login";
                    $_SESSION['hak_akses']="user";
                    $_SESSION['username']=$row['username'];
                    $_SESSION['id_user']=$row['id_user'];
                    header("location:user/");            
                }
            }
            else{ 
                ?>
                <div class="pad margin no-print">
                  <div class="callout callout-danger" style="margin-bottom: 0!important;">
                    <i class="fa fa-info"></i>nfo : Username atau Password salah !
                  </div>
                </div> 
                <?php        
            }
        }
        ?>
      <div class="login-box-body">
        <p class="login-box-msg">Form Login</p>
        <form action="" method="post">
          <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Username" name="username">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Masuk</button>
            </div><!-- /.col -->
            <div class="col-xs-4">
                <a href="index.php" class="btn btn-primary btn-block btn-flat "> Beranda </a>
            </div><!-- /.col -->
            <div class="col-xs-4">
                <a href="user/registrasi.php" class="btn btn-primary btn-block btn-flat "> Daftar </a>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="bootstrap/js/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="dist/js/app.min.js"></script>
    
  </body>
</html>
