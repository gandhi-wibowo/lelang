<?php
session_start();
if($_SESSION['status']=="login"){
    if($_SESSION['hak_akses']!="admin"){
        header("location:../user");
    }
}
elseif($_SESSION['status']!="login"){
    header("location:../login.php");
}

include '../include/function.php';

con_db();
$id_user =$_SESSION['id_user'];
$id_admin =$_SESSION['id_user'];
        
?>