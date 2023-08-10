<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
                $nip = $_SESSION['penyuluh'];
                if ($nip!=''){
                  $sql = $koneksi->query("select count(kode_kth) as jumlah from tb_kth where nip='$nip'");
                }else{
                  $sql = $koneksi->query("select count(kode_kth) as jumlah from tb_kth");
                }
                
                $data = $sql->fetch_assoc();
              ?>
              <h3><?php echo $data['jumlah']; ?></h3>
              <p>Jumlah KTH</p>
            </div>
            <div class="icon">
              <i class="ion ion-home"></i>
            </div>
            <a href="Localhost/cdk/index.php?page=kelompok" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          
          <?php
                $nip = $_SESSION['penyuluh'];
                
                if ($nip!=''){
                  $sql = $koneksi->query("select count(id_auk) as jumlah from tb_auk where nip='$nip'");
                }
                else {
                  $sql = $koneksi->query("select count(id_auk) as jumlah from tb_auk");
                }
                $hasil = $sql->fetch_assoc();
          ?>
          
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $hasil['jumlah']; ?></h3>
              <p>Aneka Usaha Kehutanan</p>
            </div>
            <div class="icon">
              <i class="ion ion-bug"></i>
            </div>
            <a href="https://sikahanan.com/cdk/index.php?page=auk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
       
        <!-- <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> -->