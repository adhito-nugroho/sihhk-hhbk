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
                    $sql = $koneksi->query("select * from tb_auk where id_auk='$kode'"); 
                    while ($hasil = $sql->fetch_assoc()) {
                    $nama_auk = $hasil['nama_auk'];
                    }


                    $bulan11 = bulan(date("m"));
                    $tahun11 = (int)date('Y');
                    $sql2 = $koneksi->query("select * from tb_auk_produksi where id_auk='$kode' and tahun=$tahun11 and bulan=$bulan11"); 
                    
                    while ($hasil = $sql->fetch_assoc()) {
                    $nama_auk = $hasil['nama_auk'];
                    }


?>
<div class="col-md-4">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Input Data Produksi <?php echo $nama_auk; ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST">
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

                <div class="form-group">
                <label for="exampleInputEmail1">Minggu ke-</label>
                    <select class="form-control" name="minggu">
                    <option value="minggu1"> Minggu Ke-1 </option>
                    <option value="minggu2"> Minggu Ke-2 </option>
                    <option value="minggu3"> Minggu Ke-3 </option>
                    <option value="minggu4"> Minggu Ke-4 </option>
                </select>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah Produksi</label>
                  <input type="number" class="form-control" name="produksi"/>
                </div>

              </div>

              <div class="box-footer">
                <button type="submit" name="simpan" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>

<div class="col-md-8">
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
            </tr>
          </thead>
          <tbody>
            <?php
            session_start();
            $nomer = 1;
            $idnya = $_GET['id'];
            $sql3 = $koneksi->query("select * from tb_produksi_auk,tb_kategori,tb_auk where tb_produksi_auk.id_auk=tb_auk.id_auk and tb_auk.id_kategori=tb_kategori.id_kategori and tb_produksi_auk.id_auk='$idnya'");
            while ($data3 = $sql3->fetch_assoc()) {
            ?>
              <tr>
                <td><?php echo $nomer; ?></td>
                <td><?php echo $data3['tahun']; ?></td>
                <td><?php echo $data3['bulan']; ?></td>
                <td><?php echo $data3['minggu1'].' '.$data3['satuan']; ?></td>
                <td><?php echo $data3['minggu2'].' '.$data3['satuan']; ?></td>
                <td><?php echo $data3['minggu3'].' '.$data3['satuan']; ?></td>
                <td><?php echo $data3['minggu4'].' '.$data3['satuan']; ?></td>
              </tr>
            <?php $nomer++;} ?>
          </tbody>
        </table>
        </div>
    </div>
</div>

<?php 
  if (isset($_POST['simpan'])) {

    $tahun1 = $_POST['tahun'];
    $bulan1 = $_POST['bulan'];
    $minggu1 = $_POST['minggu'];
    $produksi = $_POST['produksi'];
    

    $sql10 = $koneksi->query("select * from tb_produksi_auk where id_auk='$kode' and tahun = '$tahun1' and bulan ='$bulan1'");
    $data11 = $sql10->fetch_assoc();
    $ketemu = $sql10->num_rows;
    $id11 = $data11['id_produksi'];

    if ($ketemu == 1)
    {
        if ($minggu1=='minggu1'){
            $sql20 = $koneksi->query("update tb_produksi_auk set minggu1='$produksi' where id_produksi='$id11'");
        }elseif($minggu1=='minggu2'){
            $sql20 = $koneksi->query("update tb_produksi_auk set minggu2='$produksi' where id_produksi='$id11'");
        }elseif($minggu1=='minggu3'){
            $sql20 = $koneksi->query("update tb_produksi_auk set minggu3='$produksi' where id_produksi='$id11'");
        }elseif($minggu1=='minggu4'){
            $sql20 = $koneksi->query("update tb_produksi_auk set minggu4='$produksi' where id_produksi='$id11'");
        }
    }
    else
    {
        if ($minggu1=='minggu1'){
            $sql20 = $koneksi->query("insert into tb_produksi_auk (id_auk,tahun,bulan,minggu1,minggu2,minggu3,minggu4) values('$kode','$tahun1','$bulan1','$produksi','0','0','0')");
        }elseif($minggu1=='minggu2'){
            $sql20 = $koneksi->query("insert into tb_produksi_auk (id_auk,tahun,bulan,minggu1,minggu2,minggu3,minggu4) values('$kode','$tahun1','$bulan1','0','$produksi','0','0')");
        }elseif($minggu1=='minggu3'){
            $sql20 = $koneksi->query("insert into tb_produksi_auk (id_auk,tahun,bulan,minggu1,minggu2,minggu3,minggu4) values('$kode','$tahun1','$bulan1','0','0','$produksi','0')");
        }elseif($minggu1=='minggu4'){
            $sql20 = $koneksi->query("insert into tb_produksi_auk (id_auk,tahun,bulan,minggu1,minggu2,minggu3,minggu4) values('$kode','$tahun1','$bulan1','0','0','0','$produksi')");
        }
    }
    
    if($sql20){
    ?>
        <script type="text/javascript">
          alert ("Data Berhasil Disimpan")
          window.location.href="?page=auk_produksi&aksi=tambah&id=<?php echo $kode;?>";
        </script>
    <?php
    }
  }

?>