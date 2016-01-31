<html>
    <head>
        <?php
        include 'session.php';
        $id = $_SESSION['id_user'];
        date_default_timezone_set('Asia/Jakarta');
        $tgl= mktime(date("d"),date("m"),date("Y"));
        $date = date("Y-m-d", $tgl);
        $jam = date("His");

        if(con_db()!=1){
            echo "Database belum terhubung !";
            die;
        }

        $batas = 10;
        $value = mysql_num_rows(mysql_query("SELECT * FROM iklan WHERE status='1' AND id_user='$id'"));
        $jml_halaman = ceil($value/$batas);
        $halaman=$_GET['halaman'];
        if($halaman==''){
            $posisi=0;
            $halaman=1;
        }
        else{
            $posisi=($halaman-1)*$batas;
        }        
        
        include 'css.php';        
        ?>     
    </head>
    
    <body class="hold-transition skin-blue layout-top-nav">
        <div class="wrapper">
            <?php include 'menu.php';
            ?>
            <!-- mulai nulis isinya -->
      <div class="content-wrapper">
        <div class="container">
          <section class="content-header">
            <h1></h1>
          </section>    
          <section class="content">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="box box-info box-solid">
                          <div class="box-header with-border">
                              <h3 class="box-title">Data Iklan</h3>
                          </div>
                          <div class="box-body">
                              
                            <div class="box">
                              <div class="box-header">
                                <h3 class="box-title"></h3>
                              </div><!-- /.box-header -->
                              <div class="box-body no-padding">
                                <table class="table">
                                  <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Judul Tutorial</th>
                                    <th>Tgl Upload</th>
                                    <th>Post By</th>
                                    <th colspan="2">Opsi</th>
                                  </tr>
                                    <?php
                                    
                                    $quer = "SELECT * FROM tutorial,user WHERE tutorial.id_user=user.id_user ORDER BY  `id_tutorial` DESC LIMIT $posisi,$batas";
                                    $result = mysql_query($quer);
                                    $no=$posisi+1;
                                    while ($row = mysql_fetch_array($result)) {
                                        echo "<tr>"
                                                . "<td>".$no++."</td>"
                                                . "<td>".$row['judul']."</td>"
                                                . "<td>".$row['tgl']."</td>"
                                                . "<td>".$row['nama']."</td>"      
                                                . "<td><a href='tutorial_edit.php?id=".$row['id_tutorial']."' class='btn btn-warning btn-sm glyphicon glyphicon-edit'> Ubah</a>   "
                                                . "</tr>";
                                    }
                                    ?>
                                </table>
                              </div><!-- /.box-body -->
                            </div> 
                              
                            <div class="box-tools">
                              <ul class="pagination pagination-sm no-margin pull-leftt">
                                  <?php
                                  for($i=1;$i<=$jml_halaman;$i++){
                                      if($i!=$jml_halaman){
                                          echo "<li><a href='".$_SERVER['PHP_SELF']."?halaman=$i'>$i</a></li>";
                                      }
                                      else{
                                          echo "<li><a href='".$_SERVER['PHP_SELF']."?halaman=$i'>$i</a></li>";
                                      }
                                  }
                                  ?>
                              </ul>
                            </div>                              
                          </div>
                      </div>
                  </div>
              </div>
          </section>
        </div><!-- /.container -->
      </div>            
            
            <!-- batas nulis isinya -->
            <?php include 'footer.php'; ?>
        </div>
        
        <?php include 'js.php'; ?>
    </body>
</html>