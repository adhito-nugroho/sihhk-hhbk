<section class="content">
  <div class="row">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Operator</h3>
      </div>
      <!-- /.box-header -->


      <div class="box-body">
        <a href="?page=kelompok&aksi=tambah" class="btn btn-info" style="margin-bottom: 10px;">Tambah</a>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Operator</th>
              <th>Kabupaten</th>
              <th>Kecamatan</th>
              <th>Desa</th>

              <th>Aksi</th>

            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
              $sql = $koneksi->query("select * from tb_admin");
            while ($data = $sql->fetch_assoc()) {
              $id_kab=$data['id_kab'];
              $sql2 = $koneksi->query("select * from kabupaten where id_kab='$id_kab'");
              $data2 = $sql2->fetch_assoc();
              $id_kec=$data['id_kec'];
              $sql3 = $koneksi->query("select * from kecamatan where id_kec='$id_kec'");
              $data3 = $sql3->fetch_assoc();
              $id_desa=$data['id_desa'];
              $sql4 = $koneksi->query("select * from desa where id_desa='$id_desa'");
              $data4 = $sql4->fetch_assoc();
            ?>


              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nama_admin']; ?></td>
                <td><?php echo $data2['nama']; ?></td>
                <td><?php echo $data3['nama']; ?></td>
                <td><?php echo $data4['nama']; ?></td>

                <td>
                  <a href="?page=kelompok&aksi=ubah&id=<?php echo $data['kode']; ?>" class="btn btn-success" title=""><i class="fa fa-edit"></i>Ubah</a>
                  <a onclick="return confirm('Apakah anda yakin menghapus data ini ?')" href="?page=kelompok&aksi=hapus&id=<?php echo $data['kode']; ?>" class="btn btn-danger" title=""><i class="fa fa-trash"></i>Hapus</a>


                </td>

              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>