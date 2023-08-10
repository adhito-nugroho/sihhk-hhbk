<?php
    $kode = $_GET['id'];

  $sql = $koneksi->query("select * from tb_admin where kode='$kode'");
  $data = $sql->fetch_assoc();

  $kode_kab = $data['id_kab'];
  $kode_kec = $data['id_kec'];
  $kode_desa = $data['id_desa'];


  $sql2 = $koneksi->query("select * from kabupaten where id_kab='$kode_kab'");
  $data2 = $sql2->fetch_assoc();

  $sql3 = $koneksi->query("select * from kecamatan where id_kec='$kode_kec'");
  $data3 = $sql3->fetch_assoc();

  $sql4 = $koneksi->query("select * from desa where id_desa='$kode_desa'");
  $data4 = $sql4->fetch_assoc();


?>



<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Admin</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST">
              <div class="box-body">
                

                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Admin</label>
                  <input type="text" class="form-control" value="<?php echo $data['nama_admin']?>" name="nama_admin">
                </div>

                <div class="form-group">
                <label>Kabupaten</label>
                <select class="form-control" name="kabupaten" id="kabupaten">
                <option value="<?=$hasil['id_kab'];?>"> <?=$data2['nama'];?> </option>                  
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
                    
                    <option value="<?=$hasil['id_kec'];?>"> <?=$data3['nama'];?> </option>
                    <option value=""></option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Desa</label>
                    <select class="form-control" name="desa" id="desa">
                    
                    <option value="<?=$hasil['id_desa'];?>"> <?=$data4['nama'];?> </option>
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

    $id_kab = $_POST['kabupaten'];
    $id_kec = $_POST['kecamatan'];
    $id_desa = $_POST['desa'];


    $sql = $koneksi->query("UPDATE tb_admin SET nama_admin='$nama', id_kab='$id_kab',id_kec='$id_kec',id_desa='$id_desa' WHERE kode ='$kode'");

    if($sql){
    ?>
        <script type="text/javascript">
          alert ("Data Berhasil Diubah")
          window.location.href="?page=kelompok";
        </script>
    <?php
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