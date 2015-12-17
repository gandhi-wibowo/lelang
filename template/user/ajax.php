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

include '../include/koneksi.php';

function jam(){
    date_default_timezone_set('Asia/Jakarta');
    $tgl= mktime(date("d"),date("m"),date("Y"));
    $date = date("Y-m-d", $tgl);
    return $jam = date("H:i:s");    
}
function tgl(){
    date_default_timezone_set('Asia/Jakarta');
    $tgl= mktime(date("d"),date("m"),date("Y"));
    return $date = date("Y-m-d", $tgl);   
}

if(con_db()!=1){
    ?>
    <div class="pad margin no-print">
      <div class="callout callout-danger" style="margin-bottom: 0!important;">
        Database Belum Terhubung
      </div>
    </div>
    <?php
}

if($_POST['name']=="hapus" && $_POST['id']!=NULL){
    $id=$_POST['id'];
    block_iklan($id);
}
elseif($_POST['name']=="block" && $_POST['id']!=NULL){
    $id=$_POST['id'];
    block_admin($id);
}
elseif($_POST['comentar']!=NULL && $_POST['id_user']!=NULL){
    $id_iklan=$_POST['id_iklan'];
    $id_user=$_POST['id_user'];
    $comentar = $_POST['comentar'];
    comentar($id_iklan, $id_user, $comentar);
    // notifikasi untuk yang memposting iklan
    $admin = "SELECT * FROM iklan WHERE id_iklan='$id_iklan'";
    $res_admin = mysql_query($admin);
    $r_id_admin = mysql_fetch_array($res_admin);
    $id_admin=$r_id_admin['id_user'];
        $query_not_admin = "SELECT * FROM notif_comentar WHERE id_user='$id_admin' AND id_iklan='$id_iklan'";
        $result_not_admin = mysql_query($query_not_admin);
            if(mysql_num_rows($result_not_admin)>0){
                // update
                update_notif($id_admin, $id_iklan);
            }
            else{
                //insert
                insert_notif($id_admin, $id_iklan);
            }
    // notifikasi untuk yang sudah ikut komentar di iklan
    $query = "SELECT id_user FROM komentar WHERE id_iklan='$id_iklan'"; // cek id yang ada di komentar
     $result=  mysql_query($query);
     while ($row = mysql_fetch_array($result)) {
         $id_not=$row['id_user'];// id yang terkait di dalam komentar
         // cek apakah id user yang menulis komentar sudah terdaftar
         // jika sudah, maka update
         // jika belum, maka insert

         $cek_query = "SELECT * FROM notif_comentar WHERE id_user='$id_not' AND id_iklan='$id_iklan'";
         $cek_result = mysql_query($cek_query);
         if($id_not!=$id_user){// cek supaya id yang comentar tidak di buatkan notif
            if(mysql_num_rows($cek_result)>0){
                // update
                update_notif($id_not, $id_iklan);
            }
            else{
                //insert
                insert_notif($id_not, $id_iklan);
            } 
         }     
     }
     header("location:index.php");
}

else if($_POST['pas']!=$_POST['pass']){
    ?>
    <div class="pad margin no-print">
      <div class="callout callout-danger" style="margin-bottom: 0!important;">
        Password Tidak Cocok
      </div>
    </div>
    <?php
}
elseif ($_POST['comentar']==NULL) {
    header("location:index.php");
}

function block_iklan($id){
    $query = "UPDATE iklan SET status='0' WHERE id_iklan='$id'";
    mysql_query($query);   
}
function block_admin($id){
    $query = "UPDATE user SET block='0' WHERE id_user='$id'";
    mysql_query($query);
}
function comentar($id_iklan,$id_user,$message){
    $query = "INSERT INTO `komentar` 
                       (`id_komentar`, `id_iklan`, `id_user`, `isi_komentar`,`waktu_komentar`, `jam`)
                VALUES (NULL, '$id_iklan', '$id_user', '$message','".tgl()."', '".jam()."');";
    mysql_query($query);
}
function insert_notif($id_user,$id_iklan){
                $insert_query = "INSERT INTO `notif_comentar` (`id_notif`, `id_iklan`, `id_user`, `status`)
                                                                   VALUES (NULL, '$id_iklan', '$id_user', '1');";
                mysql_query($insert_query);
}
function update_notif($id_user,$id_iklan){
                $update_query ="UPDATE `notif_comentar` SET `status` = '1' WHERE `id_user` ='$id_user' AND `id_iklan`='$id_iklan';";
                mysql_query($update_query); 
}
    ?>