<?php
session_start();
$id_user = $_SESSION['id_user'];
include '../include/koneksi.php';
con_db();

date_default_timezone_set('Asia/Jakarta');
$tgl= mktime(date("d"),date("m"),date("Y"));
$date = date("Y-m-d", $tgl);

$id_lelang=$_GET['id'];
$id_iklan=$_GET['id_iklan'];
$id_user_lelang=$_GET['id_user'];
$query="UPDATE  `lelang` SET  `status_menang` =  '1' WHERE  `id_lelang` ='$id_lelang' AND `id_iklan`='$id_iklan';";
$result=  mysql_query($query);
if($result){
    $query_pemenang = "INSERT INTO `daftar_pemenang` (`id_daftar_pemenang`, `id_user`, `id_iklan`, `tanggal`) 
                                              VALUES (NULL, '$id_user_lelang', '$id_iklan', '$date');";
    mysql_query($query_pemenang);
    $quer="UPDATE `iklan` SET `status`='0' WHERE `id_iklan`='$id_iklan' AND `id_user`='$id_user'";
    mysql_query($quer);
    header("location:lelang.php");
}
?>
