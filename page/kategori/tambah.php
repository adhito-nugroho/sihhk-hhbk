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
            <form enctype="multipart/form-data" method="POST">
              <div class="box-body">
                                
               
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Kategori</label>
                  <input type="text" class="form-control" name="nama_kategori">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Satuan Produksi</label>
                  <input type="text" class="form-control" name="satuan">
                </div>

               
              <div class="box-footer">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
              </div>
            </form>

<?php 
  if (isset($_POST['simpan'])) {

    
    $kategori = $_POST['nama_kategori'];
    $satuan = $_POST['satuan'];
    
    
      $sql = $koneksi->query("INSERT INTO tb_kategori_hhbk(nama_kategori,satuan) VALUES('$kategori','$satuan')");
      if($sql){
      ?>
          <script type="text/javascript">
            alert ("Data Berhasil Disimpan")
            window.location.href="?page=kategori";
          </script>
      <?php
      }
  }
  
?>