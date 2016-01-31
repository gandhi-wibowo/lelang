<?php
session_start();
if($_SESSION['status']!="login"){
    header("location:../login.php");
}else{
    session_destroy();
    header("location:../login.php");
    
}
?>