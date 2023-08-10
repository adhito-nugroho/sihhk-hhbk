<section class="content">
<div class="row">
  <div class="box">
      <div class="box-header">
        <h3 class="box-title">Hasil Hutan Bukan Kayu</h3>
      </div>
      <!-- /.box-header -->
      
      
      <div class="box-body">
      <a href="?page=hhbk&aksi=tambah" class="btn btn-info" style="margin-bottom: 10px;">Tambah</a>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Komoditas</th>
                    <th>Kabupaten</th>
                    <th>Kecamatan</th>
                    <th>Desa</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <tbody>
            <?php 
            $nomer = 1;
            $kode_admin = $_SESSION['kode'];
            $sql = $koneksi->query("select * from tb_hhbk where kode_hhbk='$kode_admin'");
            
            while ($data = $sql->fetch_assoc()) { 
            
            ?>
                
            <tr>
            <td><?=$nomer++;?></td>
            <td><?=$data['kode_kategori'];?></td>
            <td><?=$data['id_kab'];?></td>
            <td><?=$data['id_kec'];?></td>
            <td><?=$data['id_desa'];?></td>
            <td><?=$data['keterangan'];?></td>
            <td>
            <a href="?page=hhbk&aksi=ubah&id=<?php echo $data['kode_hhbk']; ?>" class="btn btn-success" title=""><i class="fa fa-edit"></i></a>
                  <a onclick="return confirm('Apakah anda yakin menghapus data ini ?')" href="?page=hhbk&aksi=hapus&id=<?php echo $data['id_auk']; ?>" class="btn btn-danger" title=""><i class="fa fa-trash"></i></a>
            <a href="?page=auk_produksi_view&id=<?php echo $data['kode_hhbk']; ?>" class="btn btn-success" title="">Data Produksi</a>
            </td>

            </tr>
            <?php } ?>
               
            </tbody>
        </table>
        </div>
    </div>
  </div>
</section>