<section class="content">
  <div class="row">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Konsultasi Pemecahan Masalah Kelompok</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <a href="?page=konsul_kelompok&aksi=tambah" class="btn btn-info" style="margin-bottom: 10px;">Tambah</a>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Pukul</th>
              <th>Nama/Kelompok</th>
              <th>Desa</th>
              <th>Kecamatan</th>
              <th>Peserta</th>
              <th>Materi</th>
              <th>Masalah yg Ditemui</th>
              <th>Pemecahan Masalah</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            session_start();
            $nomer = 1;
            $nip = $_SESSION['nip'];
            $sql = $koneksi->query("select * from tb_konsul_kelompok where nip='$nip'");
            $satuan = " orang";
            while ($data = $sql->fetch_assoc()) {
            ?>

              <tr>
                <td><?php echo $nomer; ?></td>
                <td><?php echo date('d/m/Y', strtotime($data['tgl_pelaksanaan'])); ?></td>
                <td><?php echo $data['jam']; ?></td>
                <td><?php echo $data['kelompok']; ?></td>
                <td><?php echo $data['desa']; ?></td>
                <td><?php echo $data['kec']; ?></td>
                <td><?php echo $data['peserta'].$satuan; ?></td>
                <td><?php echo $data['materi']; ?></td>
                <td><?php echo $data['masalah']; ?></td>
                <td><?php echo $data['pemecahan']; ?></td>


                <td>    
                  <a href="?page=konsul_kelompok&aksi=ubah&id=<?php echo $data['id_konsul_kelompok']; ?>" class="btn btn-success" title=""><i class="fa fa-edit"></i></a>
                  <a onclick="return confirm('Apakah anda yakin menghapus data ini ?')" href="?page=konsul_kelompok&aksi=hapus&id=<?php echo $data['id_konsul_kelompok']; ?>" class="btn btn-danger" title=""><i class="fa fa-trash"></i></a>
                </td>
              </tr>
            <?php $nomer++;} ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>