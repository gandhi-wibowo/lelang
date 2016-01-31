<html>
    <head>
        <?php
        include 'session.php';
        $id_daftar_pemenang = $_GET['id'];
        $quer = "SELECT *
                 FROM daftar_pemenang AS df,iklan AS ik,user AS us,rekening AS rek
                 WHERE df.id_user=us.id_user
                 AND us.id_user=rek.id_user
                 AND df.id_iklan=ik.id_iklan 
                 AND id_daftar_pemenang='$id_daftar_pemenang'";
        $result = mysql_query($quer);
        $row = mysql_fetch_array($result);

        $nama=  $row['nama'];
        $judul = $row['judul_iklan'];
        $tanggal_men = $row['tanggal'];
        $tanggal_mul = $row['tgl_iklan'];
        $no_hp = $row['no_hp'];
        $email = $row['email'];
        $bank = $row['bank_rek'];
        $an_bank = $row['holder_rek'];
        $no_rek = $row['no_rek'];   
        
        include 'css.php';        
        ?>
        <style type="text/css" media="print">
            @page 
            {
                size: auto;   /* auto is the initial value */
                margin: 0mm;  /* this affects the margin in the printer settings */
            }
        </style>        
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
                    <div class="box box-info">
                      <div class="box-header with-border">
                        <h3 class="box-title">Invoice Pemenang Lelang</h3>
                      </div><!-- /.box-header -->
                          <div class="box-body">
                              
                            <div class="box">
                              <div class="box-header">
                                  <h3 class="box-title"><b>Data User</b></h3>
                              </div><!-- /.box-header -->
                              <div class="box-body no-padding">
                                <table class="table">
                                  <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nama</th>
                                    <th>No Hp</th>
                                    <th>Email</th>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td><?php echo $nama ?></td>
                                      <td><?php echo $no_hp ?></td>
                                      <td><?php echo $email ?></td>
                                  </tr>
                                </table>
                              </div><!-- /.box-body -->
                            </div> 
                              <br>
                              <br>
                            <div class="box">
                              <div class="box-header">
                                  <h3 class="box-title"><b>Data Rekening User</b></h3>
                              </div><!-- /.box-header -->
                              <div class="box-body no-padding">
                                <table class="table">
                                  <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nama Bank</th>
                                    <th>Nama Pemilik</th>
                                    <th>No Rekening</th>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td><?php echo $bank ?></td>
                                      <td><?php echo $an_bank ?></td>
                                      <td><?php echo $no_rek ?></td>
                                  </tr>
                                </table>
                              </div><!-- /.box-body -->
                            </div> 
                              <br>
                              <br>
                            <div class="box">
                              <div class="box-header">
                                  <h3 class="box-title"><b>Data Lelang</b></h3>
                              </div><!-- /.box-header -->
                              <div class="box-body no-padding">
                                <table class="table">
                                  <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Judul Lelang</th>
                                    <th>Tgl Mulai</th>
                                    <th>Tgl Selesai</th>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td><?php echo $judul ?></td>
                                      <td><?php echo $tanggal_mul ?></td>
                                      <td><?php echo $tanggal_men ?></td>
                                  </tr>
                                </table>
                              </div><!-- /.box-body -->
                            </div> 
                      
                    </div>              
                    </section>          
                  </div><!-- /.container -->
                </div>            
            
            <!-- batas nulis isinya -->
            <?php include 'footer.php'; ?>
        </div>
        
        <?php include 'js.php'; ?>
            <script type="text/javascript">window.print();</script>
    </body>
</html>