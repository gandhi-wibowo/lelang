      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
                    <a class="navbar-brand" rel="home" href="index.php" >
                        <img style="max-width:90px; margin-top: -20px;" src="../include/img/witra.png">
                    </a>                
            </div>
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                  <li class="dropdown">
                      <a href="#" class="glyphicon glyphicon-user dropdown-toggle" data-toggle="dropdown">  USER <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                          <li><a href="edit_user.php" class="fa   fa-file">  Ubah Data</a></li>
                          <li><a href="updpass.php" class="fa  fa-lock">  Ubah Password</a></li>
                      </ul>
                  </li>
              </ul>
            </div>
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                  <?php 
                    $query_lelang="SELECT iklan.judul_iklan,lelang.id_lelang,iklan.id_iklan
                                      FROM user,iklan,lelang
                                      WHERE user.id_user=lelang.id_user
                                      AND lelang.id_iklan=iklan.id_iklan
                                      AND lelang.status_menang='1'
                                      AND user.id_user='$id_user'
                                      ORDER BY lelang.id_lelang DESC
                                        ";
                    $result_lelang=  mysql_query($query_lelang);
                    $jumlah_lelang=  mysql_num_rows($result_lelang);                  
                  ?>
                <li class="dropdown messages-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa  fa-certificate"></i>
                    <span class="label label-success"><?php echo $jumlah_lelang; ?></span>
                  </a>
                  <ul class="dropdown-menu">
                      <li class="header">Anda memenangkan <?php echo $jumlah_lelang; ?> Lelang </li>
                    <li>
                      <ul class="menu">
                          <?php
                            while ($row_lelang=  mysql_fetch_array($result_lelang)) {                     
                          ?>
                        <li>
                          <a href="detail_lelang.php?id=<?php echo $row_lelang['id_iklan']; ?>">
                            <div class="pull-left">
                              <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                            </div>
                          <p>Anda memenangkan Lelang :</p>
                          <p><h5> <?php echo $row_lelang['judul_iklan']; ?></h5></p>
                          </a>
                        </li>
                            <?php } ?>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="dropdown messages-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="label label-success"><?php echo cek_not_kom($id_user); ?></span>
                  </a>
                  <ul class="dropdown-menu">
                      <li class="header"> you have <?php echo cek_not_kom($id_user); ?> comentar</li>
                    <li>                      
                      <ul class="menu">
                          <?php
                                $query_notif = "SELECT * FROM notif_comentar WHERE status='1' AND id_user='$id_user'";
                                $result_notif=  mysql_query($query_notif);
                                while ($row_notif = mysql_fetch_array($result_notif)) {
                                    $id_iklan=$row_notif['id_iklan'];
                                    $query_iklan="SELECT judul_iklan FROM iklan WHERE id_iklan='$id_iklan' AND status='1'";
                                    $result_iklan =  mysql_query($query_iklan);
                                    $row_iklan=  mysql_fetch_array($result_iklan);
                                ?>
                                <li>
                                  <a href="detail_comentar.php?id=<?php echo $id_iklan; ?>">
                                    <div class="pull-left">
                                      <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                    </div>
                                      <p>Komentar Baru pada <br>
                                      <h5><?php echo $row_iklan['judul_iklan']; ?></h5></p>
                                  </a>
                                </li>
                                <?php 
                            }
                          ?>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li>
                    <a href="logout.php" class="glyphicon glyphicon-off">  Logout</a>
                </li>  
          </div>
        </nav>
      </header>