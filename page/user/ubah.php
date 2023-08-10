<?php
  $id = $_GET['id'];
  $sql = $koneksi->query("select * from tb_user where id_user='$id'");
  $data = $sql->fetch_assoc();
?>

<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah Data Pengguna</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" name="username" value="<?php echo $data['username']?>">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="text" class="form-control" name="password" value="<?php echo $data['password']?>">
                </div>

                <div class="form-group">
                  <label for="sel1">Level</label>
                  <select class="form-control" name="level" value="<?php echo $data['level'];  ?>">
                  <option><?php echo $data['level'];?></option>      
                  <option>admin</option>
                  <option>penyuluh</option>
                  <option>kth</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Foto</label>
                  <label><img src="assets/images/<?php echo $data['foto']?>" widht="100" height="100" alt=""></label>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Ganti Foto</label>
                  <input type="file" name="foto">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
              </div>
            </form>

<?php 
  if (isset($_POST['simpan'])){

    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $pass = $_POST['password'];
    $level = $_POST['level'];
    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    
    if (!empty($lokasi)){
    move_uploaded_file($lokasi, "foto/".$foto);
    $sql = $koneksi->query("UPDATE tb_user SET username='$username',password='$pass',level='$level',foto='$foto' WHERE id_user='$id'");
    if($sql){
    ?>
        <script type="text/javascript">
          alert ("Data Berhasil Disimpan")
          window.location.href="?page=pengguna";
        </script>
    <?php
    }
  }else{
    $sql = $koneksi->query("UPDATE tb_user SET username='$username',password='$pass',level='$level' WHERE id_user='$id'");
    if($sql){
    ?>
        <script type="text/javascript">
          alert ("Data Berhasil Disimpan")
          window.location.href="?page=pengguna";
        </script>
    <?php
    }
  }
}
?>