<?php
function con_db(){
  $host = "localhost";
  $db_user = "root";
  $db_pwd = "";
  $db_name = "cv_witra";
  $con = mysql_connect($host,$db_user,$db_pwd);
  if($con){
      // konek ke host
      $con_db = mysql_select_db($db_name);
      if($con_db){
          return 1;
          //konek ke database
      }
      else{
          return 0;
          // tidak konek ke database
      }
  }
  else{
      return 0;
      // tidak konek ke database
  }
}
