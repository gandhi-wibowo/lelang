
    <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand glyphicon glyphicon-home">  Home</a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                  <li class="dropdown">
                      <a href="#" class="glyphicon glyphicon-blackboard dropdown-toggle" data-toggle="dropdown">  IKLAN <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                          <li><span class=""></span><a href="iklan.php" class="fa fa-search">  Data IKLAN</a></li>
                          <li><a href="tambah_iklan.php" class="fa fa-plus-square">  Tambah IKLAN</a></li>
                      </ul>
                  </li>
                  <li class="dropdown">
                      <a href="#" class="glyphicon glyphicon-user dropdown-toggle" data-toggle="dropdown"> ADMIN <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                          <li><a href="admin.php" class="fa fa-search">  Data ADMIN</a></li>
                          <li><a href="tambah_admin.php" class="fa fa-plus-square">  Tambah ADMIN</a></li>
                      </ul>
                  </li>
                  <li class="dropdown">
                      <a href="#" class="glyphicon glyphicon-tags dropdown-toggle" data-toggle="dropdown"> LELANG <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                          <li><a href="lelang.php" class="fa fa-search">  Data LELANG</a></li>
                          <li><a href="winner.php" class="fa fa-search">  Pemenang LELANG</a></li>
                      </ul>
                  </li>
                  <li class="dropdown">
                      <a href="#" class="glyphicon glyphicon-book dropdown-toggle" data-toggle="dropdown"> TUTORIAL <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                          <li><a href="tutorial.php" class="fa fa-search">  Data TUTORIAL</a></li>
                          <li><a href="tambah_tutorial.php" class="fa fa-plus-square">  Tambah TUTORIAL</a></li>
                      </ul>
                  </li>
                  <li><a href="profil.php" class="glyphicon glyphicon-bookmark"> PROFIL</a></li>
              </ul>
            </div>
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <?php
                $jumlah_contrib = jumlah_contrib($id_user);
                $result_contrib=  query_contrib($id_user);
                ?>
                <li class="dropdown messages-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-success"><?php echo $jumlah_contrib; ?></span>
                  </a>
                  <ul class="dropdown-menu">
                      <li class="header"> you have <?php echo $jumlah_contrib; ?> contribution</li>
                    <li>
                      <ul class="menu">
                          <?php
                            while ($row_contrib = mysql_fetch_array($result_contrib)) {
                               $id_user_contrib = $row_contrib['id_user'];
                               $id_iklan_contrib=$row_contrib['id_iklan'];
                               $query_nama_contrib="SELECT nama FROM user WHERE id_user='$id_user_contrib'";
                               $result_nama_contrib = mysql_query($query_nama_contrib);
                               $row_nama_contrib=  mysql_fetch_array($result_nama_contrib);
                               $nama_contrib = $row_nama_contrib['nama'];
                               $judul_iklan_contrib = $row_contrib['judul_iklan'];
                     
                          ?>
                        <li>
                          <a href="detail_lelang.php?id=<?php echo $id_iklan_contrib; ?>">
                            <div class="pull-left">
                              <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                            </div>
                          <p><h5><?php echo $nama_contrib; ?></h5></p>
                          <p>Mengikuti Lelang :</p>
                          <p><h5> <?php echo $judul_iklan_contrib; ?></h5></p>
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
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                  <li>
                      <a href="logout.php" class="glyphicon glyphicon-off">  Logout</a>
                  </li>                  
              </ul>
            </div>
          </div>
        </nav>
      </header>