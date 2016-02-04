<?php
include 'session.php';
if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $query_donlot = "SELECT nama_file FROM confirm_lelang WHERE id_confirm= '$id'";
        $res_donlot = mysql_query($query_donlot) or die('Error, query failed');
        list($nama_file) = mysql_fetch_array($res_donlot);
        echo $nama_file;
        $rootDir = realpath('../file/confirm');
        $fullPath = realpath($rootDir . '/' . $nama_file);
        if ($fullPath && is_readable($fullPath) && dirname($fullPath) === $rootDir) {
            header('Content-Disposition: attachment; filename=' . basename($fullPath));
            readfile($fullPath);
        } 
    }
else{
    header("location:../../admin/");
}
?>
