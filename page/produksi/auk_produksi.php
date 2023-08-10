<section class="content">
  <div class="row">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Aneka Usaha Kehutanan</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kegiatan</th>
                    <th>Alamat</th>
                    <th>Foto</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            session_start();
            $nomer = 1;
            $id_kth = $_SESSION['kth'];
            $sql = $koneksi->query("select * from tb_auk where id_kth='$id_kth'");
             
            while ($data = $sql->fetch_assoc()) { 
            
            ?>
                
            <tr>
            <td><?=$nomer++;?></td>
            <td><?=$data['nama_auk'];?></td>
            <td><?=$data['alamat'];?></td>
            <td><img src="<?=('foto/'.$data['foto']);?>" width="100px"></td>
            <td><?=$data['keterangan'];?></td>
            <td>
            <a href="?page=auk_produksi&aksi=tambah&id=<?php echo $data['id_auk']; ?>" class="btn btn-success" title=""><i class="fa fa-edit">Input Produksi</i></a>

            </td>

            </tr>
            <?php } ?>
               
            </tbody>
        </table>
        </div>
    </div>
  </div>
</section>