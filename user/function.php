<?php
function koneksi(){
	$koneksi = mysqli_connect("localhost","root","jakarta");
	mysqli_select_db($koneksi,"cv_witra");
	if(!$koneksi){
    die("could not connect ".mysqli_error($koneksi));
  }
  return $koneksi;
}
function registerUserLelang($namap,$nohpp,$emailp,$unamep,$passwp){
  $con=koneksi();
  $insert="insert into user values('','$namap','$nohpp','$emailp','$unamep','$passwp','0','0')";
  $query=mysqli_query($con,$insert);
  return $query;
}

function registerRekening($userid,$norekp,$bankp,$holdp){
  $con=koneksi();
  $insert="insert into rekening values('','$userid','$bankp','$holdp','$norekp')";
  $query=mysqli_query($con,$insert);
  return $query;
}

function getUserId($usernamep){
  $con=koneksi();
  $select="select id_user from user where username='$usernamep'";
  $query=mysqli_query($con,$select);
//  $row = mysqli_num_rows($query);
  $row=mysqli_fetch_array($query);
  $userId=$row['id_user'];
  return $userId;
}

function getName($userid){
  $con=koneksi();
  $select="select nama from user where id_user='$userid'";
  $query=mysqli_query($con,$select);
  $row=mysqli_fetch_array($query);
  $namaAdmin=$row['nama'];
  return $namaAdmin;
}

function getlelangIkutan($userid){
  $con=koneksi();
  $select="select lelang.id_iklan,iklan.isi_iklan,lelang.status_menang,iklan.status from lelang join iklan on lelang.id_iklan=iklan.id_iklan where lelang.id_user='$userid' order by lelang.status_menang";
  $query=mysqli_query($con,$select);
  return $query;
}

function lelangMenang($userid){
  $con=koneksi();
  $select="select lelang.id_iklan,iklan.isi_iklan from lelang join iklan on lelang.id_iklan=iklan.id_iklan where lelang.id_user='$user_id' and lelang.status_menang='1'";
  $query=mysqli_query($con,$select);
  return $query;
}

function getIklan($idIklanp){
  $con=koneksi();
  $select="select id_iklan,id_user,tgl_iklan,isi_iklan from iklan where id_iklan='$idIklanp'";
  $query=mysqli_query($con,$select);
  $row=mysqli_fetch_array($query);
  return $row;
}

function sendKomentar($userid,$idiklan,$komen){
  $con=koneksi();
  $date=date('Y-m-d');
  $insert="insert into komentar values('','$idiklan','$userid','$komen','$date','0')";
  $query=mysqli_query($con,$insert);
  return $query;
}

function getKomentar($idIklanp){
  $con=koneksi();
  $select="select id_user,waktu_komentar,isi_komentar from komentar where id_iklan='$idIklanp'";
  $query=mysqli_query($con,$select);
  //$row=mysqli_fetch_array($query);
  return $query;
}

function getTanggal($dt){
  $unixDate=strtotime($dt);
  $dateConverted=date("d-m-Y",$unixDate);
  $splitDate=explode("-",$dateConverted);
  
  $day=$splitDate[0];
  $month=$splitDate[1];
  $year=$splitDate[2];
  
  switch($month){
  
  case '01':
  $month="Januari";
  break;
  
  case '02':
  $month="Februari";
  break;
  
  case '03':
  $month="Maret";
  break;
  
  case '04':
  $month="April";
  break;
  
  case '05':
  $month="Mei";
  break;
  
  case '06':
  $month="Juni";
  break;
  
  case '07':
  $month="Juli";
  break;
  
  case '08':
  $month="Agustus";
  break;
  
  case '09':
  $month="September";
  break;
  
  case '10':
  $month="Oktober";
  break;
  
  case '11':
  $month="November";
  break;
  
  case '12':
  $month="Desember";
  break;
  }
  $tanggalPenuh="".$day." ".$month." ".$year;
  return $tanggalPenuh;
}

function cekIkutLelang($iduser,$idiklan){
  $con=koneksi();
  $select="select count(*) as hitung from lelang where id_user='$iduser' and id_iklan='$idiklan'";
  $query=mysqli_query($con,$select);
  $row=mysqli_fetch_array($query);
  
  if($row['hitung']==1){
    return true;
  } else {
    return false;
  }
}

?>
