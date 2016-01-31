<html>
    <head>
        <?php
        include 'session.php';
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
                                        <h3 class="box-title">Daftar Pemenang</h3>
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
                                              <th>Nama</th>
                                              <th>Judul Iklan</th>
                                              <th>Tanggal Menang</th>
                                              <th>Details</th>
                                            </tr>
                                              <?php
                                                $batas = 10;
                                                $value = mysql_num_rows(mysql_query("SELECT * FROM daftar_pemenang WHERE id_admin='$id_admin'"));
                                                $jml_halaman = ceil($value/$batas);
                                                $halaman=$_GET['halaman'];
                                                if($halaman==''){
                                                    $posisi=0;
                                                    $halaman=1;
                                                }
                                                else{
                                                    $posisi=($halaman-1)*$batas;
                                                }
                                                
                                              $quer = "SELECT * FROM daftar_pemenang AS df,iklan AS ik,user AS us 
                                                       WHERE df.id_user=us.id_user
                                                       AND df.id_iklan=ik.id_iklan 
                                                       ORDER BY  `id_daftar_pemenang`
                                                       DESC LIMIT $posisi,$batas";
                                              $result = mysql_query($quer);
                                              
                                              $no=$posisi+1;
                                              while ($row = mysql_fetch_array($result)) {
                                                  echo "<tr>"
                                                          . "<td>".$no++."</td>"
                                                          . "<td>".$row['nama']."</td>"
                                                          . "<td>".$row['judul_iklan']."</td>"
                                                          . "<td>".$row['tanggal']."</td>"       
                                                          . "<td>
                                                              <a href='cetak.php?id=".$row['id_daftar_pemenang']."' class='btn btn-warning btn-sm glyphicon glyphicon-edit'> Cetak</a> "
                                                          ."</td>"
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