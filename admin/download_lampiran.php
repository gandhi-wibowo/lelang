<html>
    <head>
        <?php
        include 'session.php';
        $id_lelang = $_GET['id_lelang'];
        $quer = "SELECT *
                 FROM lelang
                 WHERE id_lelang='$id_lelang'";
        $result = mysql_query($quer);
        $row = mysql_fetch_array($result);
        $harga = $row['harga'];
        $ikhtisar = $row['ikhtisar'];

  
        
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
                        <h3 class="box-title">Lampiran Lelang</h3>
                      </div><!-- /.box-header -->
                          <div class="box-body">
                              <div class="box">
                                  <img style="" src="../file/<?php echo $row['nama_file']; ?>">
                              </div>  
                            <div class="box">
                              <div class="box-header">
                                  <h3 class="box-title"><b>Note</b></h3>
                              </div><!-- /.box-header -->
                              <div class="box-body no-padding">
                                <table class="table">
                                  <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Harga</th>
                                    <th>Ikhtisar</th>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td><?php echo "Rp. ".$harga ?></td>
                                      <td><?php echo $ikhtisar ?></td>
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