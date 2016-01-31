<?php
include "koneksi.php";
con_db();
function cek_not_kom($id_user){
    $query="SELECT * FROM notif_comentar WHERE id_user='$id_user' AND status='1';";
    $result = mysql_query($query);
    return mysql_num_rows($result);
}
function jum_peserta($id){
    $query = "SELECT * FROM  `iklan` AS ik,  `lelang` AS le
                WHERE ik.id_iklan = le.id_iklan
                AND ik.id_iklan ='$id'";
    $result = mysql_query($query);
    return mysql_num_rows($result);  
}
function jum_komentar($id){
    $query = "SELECT * FROM  `iklan` AS ik,  `komentar` AS kom
        WHERE ik.id_iklan = kom.id_iklan
        AND ik.id_iklan ='$id'";
    $result = mysql_query($query);
    return mysql_num_rows($result);  
}
function query_contrib($id_user){    
    $query_contrib = "SELECT * FROM user AS us, iklan AS ik, lelang AS le 
    WHERE us.id_user=ik.id_user
    AND ik.id_iklan=le.id_iklan
    AND ik.status='1'
    AND le.checked='1'
    AND us.id_user='$id_user'
    ORDER BY le.id_lelang DESC";
    return mysql_query($query_contrib);   
}
function jumlah_contrib($id_user){
    return mysql_num_rows(query_contrib($id_user));
}
?>