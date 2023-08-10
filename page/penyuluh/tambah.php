
<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data Penyuluh</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="text" class="form-control" name="password">
                </div>

                <div class="form-group">
                  <label for="sel1">Level</label>
                  <select class="form-control" name="level"?>">
                  <option value="admin">admin</option>
                  <option value="penyuluh">penyuluh</option>
                  <option value="kth">kth</option>

                  </select>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Foto</label>
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
    $upload = move_uploaded_file($lokasi, "foto/".$foto);
    if ($upload){
   
    $sql = $koneksi->query("insert into tb_user (username,password,level,foto)values('$username','$pass','$level','$foto')");
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