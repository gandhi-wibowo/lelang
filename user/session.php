<?php
session_start();
if($_SESSION['status']=="login"){
    if($_SESSION['hak_akses']!="user"){
        header("location:../admin");
    }
}
elseif($_SESSION['status']!="login"){
    header("location:../login.php");
}


include '../include/function.php';
$id_user =$_SESSION['id_user'];
?>