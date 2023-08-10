<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=nama_filenya.xls");

?>
        <h3>LAPORAN PELAKSANAAN PENYULUHAN KEHUTANAN</h3>
        <h3>KEGIATAN ANJANGSANA KEPADA PERORANGAN</h3>
        <table border="1" cellpadding="3">
        <tr>
        <th colspan="3">Waktu</th>
        <th colspan="6">Sasaran</th>
        </tr>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Pukul</th>
              <th>Nama/Kelompok</th>
              <th>Desa</th>
              <th>Kecamatan</th>
              <th>Lokasi</th>
              <th>Materi</th>
              <th>Uraian Kegiatan</th>
            </tr>
          <?php
            session_start();
            $koneksi = new mysqli("localhost","root","","cdk_bojonegoro");
            $nomer = 1;
            $nip = $_SESSION['login'];
            $sql = $koneksi->query("select * from tb_anjangsana");
            while ($data = $sql->fetch_assoc()) {
            ?>
              <tr>
                <td><?php echo $nomer; ?></td>
                <td><?php echo date('d/m/Y', strtotime($data['tgl_pelaksanaan'])); ?></td>
                <td><?php echo $data['jam']; ?></td>
                <td><?php echo $data['kelompok']; ?></td>
                <td><?php echo $data['desa']; ?></td>
                <td><?php echo $data['kec']; ?></td>
                <td><?php echo $data['lokasi']; ?></td>
                <td><?php echo $data['materi']; ?></td>
                <td><?php echo $data['uraian']; ?></td>
              </tr>
            <?php $nomer++;} ?>
          </tbody>
        </table>