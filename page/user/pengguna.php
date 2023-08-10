<section class="content">
  <div class="row">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Pengguna</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <a href="?page=pengguna&aksi=tambah" class="btn btn-info" style="margin-bottom: 10px;">Tambah</a>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Password</th>
              <th>Nama</th>
              <th>Level</th>
              <th>Foto</th>
              <th>Aksi</th>

            </tr>
          </thead>
          <tbody>
            <?php
            $nomer = 1;
            $sql = $koneksi->query("select * from tb_user");
            while ($data = $sql->fetch_assoc()){
            ?>
              <tr>
                <td><?php echo $nomer; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['password']; ?></td>
                
                <?php
                   $kodenya = $data['username'];
                   $level = $data['level'];
	           if ($level=="penyuluh"){
	                $nipnya = $data['username'];
	            	  $sql2 = $koneksi->query("select * from tb_penyuluh where nip= '$nipnya'");
	            	  while ($data2 = $sql2->fetch_assoc()){
	                ?>
                  <td><?php echo $data2['nama']; ?></td>		
                  <?php
                  }
                  }
                else if ($level=="kth")
                {      
                  $kode_kth=$data['username'];
                  $sql3 = $koneksi->query("select * from tb_kth where kode_kth='$kode_kth'");
                  while ($data3 = $sql3->fetch_assoc()){
                  ?>
                  <td><?php echo $data3['nama_kth']; ?></td>
                  <?php
	            	}	
                }
                else {?>
                  <td><?php echo"admin"; ?></td>
                <?php  
                }
                ?>
                <td><?php echo $data['level']; ?></td>
                <td><img src="assets/images/<?php echo $data['foto']?>" class="user-image" alt="User Image" width="75" height="75"></td>
                <td>
                  <a href="?page=pengguna&aksi=ubah&id=<?php echo $data['id_user']; ?>" class="btn btn-success" title=""><i class="fa fa-edit"></i>Ubah</a>
                  <a onclick="return confirm('Apakah anda yakin menghapus data ini ?')" href="?page=pengguna&aksi=hapus&id=<?php echo $data['id_user']; ?>" class="btn btn-danger" title=""><i class="fa fa-trash"></i>Hapus</a>
                </td>
              </tr>
            <?php $nomer++;}?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>