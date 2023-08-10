<?php
$koneksi = new mysqli("localhost","root","root","cdk_bojonegoro");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan_produksi.xls");
?>
        <h3>DATA PRODUKSI ANEKA USAHA KEHUTANAN</h3>
        <table border="1" cellpadding="3">
            <tr>
              <th>No</th>
              <th>Nama AUK</th>
              <th>Nama KTH</th>
              <th>Tahun</th>
              <th>Bulan</th>
              <th>Minggu ke-1</th>
              <th>Minggu ke-2</th>
              <th>Minggu ke-3</th>
              <th>Minggu ke-4</th>
              <th>Total Produksi/Bulan</th>
            </tr>
          <?php
            session_start();
            
            $nomer = 1;
            $bulan = $_POST['bulan'];
            $tahun = $_POST['tahun'];
            $id_auk = $_POST['aukID'];
            if ($bulan==''||$tahun==''){
              $sql = $koneksi->query("select * from tb_auk, tb_produksi_auk,tb_kategori where tb_auk.id_auk=tb_produksi_auk.id_auk and tb_auk.id_kategori=tb_kategori.id_kategori and tb_produksi_auk.id_auk='$id_auk'");
            }
            else 
            {
              $sql = $koneksi->query("select * from tb_auk, tb_produksi_auk,tb_kategori where tb_auk.id_auk=tb_produksi_auk.id_auk and tb_auk.id_kategori=tb_kategori.id_kategori and bulan='$bulan' and tahun='$tahun' and tb_produksi_auk.id_auk='$id_auk'");
            }
            while ($data = $sql->fetch_assoc()) {
            $satuan = $data['satuan'];
            ?>
              
              <tr>
                <td><?php echo $nomer; ?></td>
                <td><?php echo $data['nama_auk']; ?></td>
                <td><?php echo $data['penanggungjawab']; ?></td>
                <td><?php echo $data['tahun']; ?></td>
                <td><?php echo $data['bulan']; ?></td>
                <td><?php echo $data['minggu1'].' '.$satuan; ?></td>
                <td><?php echo $data['minggu2'].' '.$satuan; ?></td>
                <td><?php echo $data['minggu3'].' '.$satuan; ?></td>
                <td><?php echo $data['minggu4'].' '.$satuan; ?></td>
                <?php 
                  $total = $data['minggu1']+$data['minggu2']+$data['minggu3']+$data['minggu4'];
                  $rata = $total/4;
                ?>
                <td><?php echo $total.' '.$data['satuan']; ?></td>


              </tr>
            <?php $nomer++;} ?>
          </tbody>
        </table>