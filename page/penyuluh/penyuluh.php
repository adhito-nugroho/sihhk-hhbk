<section class="content">
  <div class="row">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Penyuluh</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <a href="?page=pengguna&aksi=tambah" class="btn btn-info" style="margin-bottom: 10px;">Tambah</a>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>NIP</th>
              <th>Nama</th>
              <th>Wilayah</th>

            </tr>
          </thead>
          <tbody>
            <?php
            $nomer = 1;
            $sql = $koneksi->query("select * from tb_penyuluh, tb_wilayah where tb_penyuluh.nip=tb_wilayah.nip");
            while ($data = $sql->fetch_assoc()) {
            ?>

              <tr>
                <td><?php echo $nomer; ?></td>
                <td><?php echo $data['nip']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['kabupaten']; ?></td>
                 <a href="?page=penyuluh&aksi=ubah&id=<?php echo $data['nip']; ?>" class="btn btn-success" title=""><i class="fa fa-edit"></i>Ubah</a>
                  <a onclick="return confirm('Apakah anda yakin menghapus data ini ?')" href="?page=penyuluh&aksi=hapus&id=<?php echo $data['nip']; ?>" class="btn btn-danger" title=""><i class="fa fa-trash"></i>Hapus</a>
                </td>
              </tr>
            <?php $nomer++;} ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>