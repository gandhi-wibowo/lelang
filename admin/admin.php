<html>
    <head>
        <?php
        include 'session.php';
        
        
        $batas = 10;
        $value = mysql_num_rows(mysql_query("SELECT * FROM user WHERE hak_akses='1'"));
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
                              <h3 class="box-title">Data User Admin</h3>
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
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>No Hp</th>
                                    <th colspan="2">Opsi</th>
                                  </tr>
                                    <?php

                                    $quer = "SELECT * FROM user WHERE hak_akses='1' AND block='1' ORDER BY  `id_user` DESC LIMIT $posisi,$batas";
                                    $res = mysql_query($quer);
                                    $no = $posisi+1;
                                    while ($row = mysql_fetch_array($res)) {
                                        echo "<tr>"
                                                . "<td>".$no++."</td>"
                                                . "<td>".$row['nama']."</td>"
                                                . "<td>".$row['email']."</td>"
                                                . "<td>".$row['no_hp']."</td>"
                                                . "<td coolspan='2'><a href='admin_edit.php?id=".$row['id_user']."' class='btn btn-warning btn-sm glyphicon glyphicon-edit'> Ubah</a>    "     
                                                . "<a name='block' id='button' onclick='block(".$row['id_user'].")' class='btn btn-danger btn-sm glyphicon glyphicon-floppy-remove' > Hapus</a></td>"
                                                . "</tr>";
                                    }
                                    ?>
                                </table>
                              </div>
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
    <script type="text/javascript">            
        $(document).ready(function(){
            $("#pass").keyup(function(){
                var pas=$("input#pas").val();
                var pass=$("input#pass").val();
                $.ajax({
                    type:"POST",
                    url:"ajax.php",
                    data:"pas="+pas+"&pass="+pass,
                    success:function(html){
                        $("#confirm").html(html);  
                    }
                });
            });
        });

        function block(id){
            var name=$("#button").attr("name");
                $.ajax({
                    type:"POST",
                    url:"ajax.php",
                    data:"name="+name+"&id="+id,
                    success:function(){
                        location.reload(); 
                    }
                });
        }            
    </script>        
    </body>
</html>