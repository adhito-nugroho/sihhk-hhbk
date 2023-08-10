<?php
  $kode = $_GET['id'];
  $sql = $koneksi->query("select * from tb_kategori_hhbk where kode_kategori='$kode'");
  $data = $sql->fetch_assoc();
?>



<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Kategori Hasil Hutan Bukan Kayu</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Kategori</label>
                  <input type="text" class="form-control" name="kategori" value="<?php echo $data['nama_kategori']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Satuan Produksi</label>
                  <input type="text" class="form-control"  name="satuan" value="<?php echo $data['satuan']?>">
                </div>

              </div>
              <div class="box-footer">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
              </div>
            </form>

<?php 
  if (isset($_POST['simpan'])) {

   
    $kategori = $_POST['kategori'];
    $satuan = $_POST['satuan'];
   
    $sql = $koneksi->query("UPDATE tb_kategori_hhbk SET nama_kategori='$kategori', satuan='$satuan' WHERE kode_kategori ='$kode'");
    if($sql){
    ?>
        <script type="text/javascript">
          alert ("Data Berhasil Diubah")
          window.location.href="?page=kategori";
        </script>
    <?php
    }
  }
?>