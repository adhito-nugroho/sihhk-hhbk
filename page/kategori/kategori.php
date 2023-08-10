<section class="content">
  <div class="row">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Kategori Hasil Hutan Bukan Kayu</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <a href="?page=kategori&aksi=tambah" class="btn btn-info" style="margin-bottom: 10px;">Tambah</a>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Kategori</th>
              <th>Satuan</th>
            </tr>
          </thead>
          <tbody>
            <?php
            session_start();
            $nomer = 1;
            $sql = $koneksi->query("select * from tb_kategori_hhbk");
            while ($data = $sql->fetch_assoc()) {
            ?>

              <tr>
                <td><?php echo $nomer; ?></td>
                <td><?php echo $data['nama_kategori']; ?></td>
                <td><?php echo $data['satuan']; ?></td>
             

                <td>    
                  <a href="?page=kategori&aksi=ubah&id=<?php echo $data['kode_kategori']; ?>" class="btn btn-success" title=""><i class="fa fa-edit"></i></a>
                  <a onclick="return confirm('Apakah anda yakin menghapus data ini ?')" href="?page=kategori&aksi=hapus&id=<?php echo $data['kode_kategori']; ?>" class="btn btn-danger" title=""><i class="fa fa-trash"></i></a>
                </td>
              </tr>
            <?php $nomer++;} ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>