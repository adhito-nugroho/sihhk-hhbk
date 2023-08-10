<?php
function bulan($bulan)
{
Switch ($bulan){
    case 1 : $bulan="Januari";
        Break;
    case 2 : $bulan="Februari";
        Break;
    case 3 : $bulan="Maret";
        Break;
    case 4 : $bulan="April";
        Break;
    case 5 : $bulan="Mei";
        Break;
    case 6 : $bulan="Juni";
        Break;
    case 7 : $bulan="Juli";
        Break;
    case 8 : $bulan="Agustus";
        Break;
    case 9 : $bulan="September";
        Break;
    case 10 : $bulan="Oktober";
        Break;
    case 11 : $bulan="November";
        Break;
    case 12 : $bulan="Desember";
        Break;
    }
return $bulan;
}


    $kode = $_GET['id'];
    $sql = $koneksi->query("select * from tb_auk,tb_kategori where tb_auk.id_kategori=tb_kategori.id_kategori and id_auk='$kode'"); 
    while ($hasil = $sql->fetch_assoc()) {
                    $satuan = $hasil['satuan'];
                    $nama_auk = $hasil['nama_auk'];
                    }


                    $bulan11 = bulan(date("m"));
                    $tahun11 = (int)date('Y');
                    $sql2 = $koneksi->query("select * from tb_produksi_auk where id_auk='$kode' and tahun=$tahun11 
                    and bulan='$bulan11' "); 
                    
                    while ($hasil = $sql->fetch_assoc()) {
                    $satuan = $hasil['satuan'];
                    $nama_auk = $hasil['nama_auk'];
                    }


?>
<div class="col-md-3">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Produksi <?php echo $nama_auk; ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="page/produksi/produksi_laporan.php">
            <div class="form-group">          
              <input type="hidden" name="aukID" value="<?php echo $kode; ?>">
             </div> 
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tahun</label>
                    <select class="form-control" name="tahun">
                    <?php $tahun = (int)date('Y');?>
                    <option> <?=$tahun;?> </option>                  
                    <?php
                    $tahun1 = $tahun - 1;
                    $tahun2 = $tahun - 2;
                    ?>
                    <option value="<?=$tahun1;?>"><?=$tahun1;?></option>
                    <option value="<?=$tahun2;?>"><?=$tahun2;?></option>
                </select>
                </div>
                
                <div class="form-group">
                
                <label for="exampleInputEmail1">Bulan</label>
                    <select class="form-control" name="bulan">
                    <?php $bln = date("m");?>
                    <option> <?=bulan($bln-1)?> </option>
                    <option> <?=bulan($bln)?> </option> 
                    <option> <?=bulan($bln+1)?> </option>
                </select>
                </div>

                
              </div>

              <div class="box-footer">
                <button type="submit" name="cetak" class="btn btn-primary">Cetak Excel</button>
                
              </div>

            </form>
          </div>
        </div>

<div class="col-md-9">
    <div class="box box-primary">
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Tahun</th>
              <th>Bulan</th>
              <th>Minggu 1</th>
              <th>Minggu 2</th>
              <th>Minggu 3</th>
              <th>Minggu 4</th>
              <th>Tampil</th>
            </tr>
          </thead>
          <tbody>
            <?php
            session_start();
            $nomer = 1;
            $idnya = $_GET['id'];
            $blnnya = $_GET['bln'];
            if ($blnnya==""){
              $sql3 = $koneksi->query("select * from tb_produksi_auk where id_auk='$idnya'");
            }
            else 
            {
              $sql3 = $koneksi->query("select * from tb_produksi_auk where id_auk='$idnya' and bulan='$blnnya'");
            }
              while ($data3 = $sql3->fetch_assoc()) {
            ?>
              <tr>
                <td><?php echo $nomer; ?></td>
                <td><?php echo $data3['tahun']; ?></td>
                <td><?php echo $data3['bulan']; ?></td>
                <td><?php echo $data3['minggu1'].' '.$satuan; ?></td>
                <td><?php echo $data3['minggu2'].' '.$satuan; ?></td>
                <td><?php echo $data3['minggu3'].' '.$satuan; ?></td>
                <td><?php echo $data3['minggu4'].' '.$satuan; ?></td>
                <?php  
                  if ($data3['view']=='n'){
                ?>
                <td><a href="?page=view_produksi&id_auk=<?php echo $data3['id_auk']; ?>&id_produksi=<?php echo $data3['id_produksi']; ?>" class="btn btn-success" title=""><i class="fa fa-edit">Yes</i></a></td>
                <?php
                  }
                  else
                  {
                  ?>
                  <td><a href="?page=view_produksi&id_auk=<?php echo $data3['id_auk']; ?>&id_produksi=<?php echo $data3['id_produksi']; ?>" class="btn btn-danger" title=""><i class="fa fa-edit">No</i></a></td>
                <?php
                  }
                ?>
                
                
                

              </tr>
            <?php $nomer++;} ?>
          </tbody>
        </table>
        </div>
    </div>
</div>

  
    