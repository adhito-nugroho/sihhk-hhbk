
<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Admin Desa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Admin</label>
                  <input type="text" class="form-control" name="nama_admin">
                </div>
                

                <div class="form-group">
                <label>Kabupaten</label>
                <select class="form-control" name="kabupaten" id="kabupaten">
                <option> Pilih </option>                  
                    <?php
                    
                      $sql = $koneksi->query("select * from kabupaten");
                     
                    while ($hasil = $sql->fetch_assoc()) {
                    ?>
                    <option value="<?=$hasil['id_kab'];?>"><?=$hasil['nama'];?></option> 
                    <?php
                    }
                    ?>
                </select>
                </div>

                <div class="form-group">
                    <label>Kecamatan</label>
                    <select class="form-control" name="kecamatan" id="kecamatan">
                      <option value=""></option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Desa</label>
                    <select class="form-control" name="desa" id="desa">
                      <option value=""></option>
                    </select>
                </div>

              </div>
              <div class="box-footer">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
              </div>
            </form>

<?php 
  if (isset($_POST['simpan'])) {

    $nama = $_POST['nama_admin'];
    $id_kab = $_POST['kabupaten'];
    $id_kec = $_POST['kecamatan'];
    $id_desa = $_POST['desa'];

    $sql = $koneksi->query("insert into tb_admin (nama_admin,id_kab,id_kec,id_desa) values('$nama','$id_kab','$id_kec','$id_desa')");
    
    $sql2 = $koneksi->query("insert into tb_user(username,password,level) values('$kode','$kode','admin')");
    
    if($sql){
    ?>
      <?php if($sql2){?>
        <script type="text/javascript">
          alert ("Data Berhasil Disimpan")
          window.location.href="?page=kelompok";
        </script>
    <?php
    
      }
      }
  }
?>
<script type="text/javascript">
        $("#kabupaten").change(function(){
      	var kabupaten = $("#kabupaten").val();
          	$.ajax({
          		type: 'POST',
              	url: "page/laporan/get_kecamatan.php",
              	data: {kabupaten: kabupaten},
              	cache: false,
              	success: function(msg){
                  $("#kecamatan").html(msg);
                }
            });
        });

        $("#kecamatan").change(function(){
      	var kecamatan = $("#kecamatan").val();
          	$.ajax({
          		type: 'POST',
              	url: "page/laporan/get_desa.php",
              	data: {kecamatan: kecamatan},
              	cache: false,
              	success: function(msg){
                  $("#desa").html(msg);
                }
            });
        });
</script>