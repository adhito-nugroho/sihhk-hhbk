<?php
    $kode = $_GET['id'];

  $sql = $koneksi->query("select * from tb_anjangkarya where id_anjangkarya='$kode'");
  $data = $sql->fetch_assoc();

?>



<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Anjangkarya Penyuluh Kehutanan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST">
              <div class="box-body">
                <div class="form-group">
                    <label>Tanggal :</label>
                    <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" value="<?php echo date('d/m/Y', strtotime($data['tgl_pelaksanaan']));?>" id="tanggal" name="tanggal">
                    </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Pukul :</label>
                  <input type="text" class="form-control" value="<?php echo $data['jam']?>" name="jam">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Nama/Kelompok</label>
                  <input type="text" class="form-control" value="<?php echo $data['kelompok']?>" name="kelompok">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Desa</label>
                  <input type="text" class="form-control" value="<?php echo $data['desa']?>" name="desa">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Kec</label>
                  <input type="text" class="form-control" value="<?php echo $data['kec']?>" name="kec">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Lokasi</label>
                  <input type="text" class="form-control" value="<?php echo $data['lokasi']?>" name="lokasi">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Materi</label>
                  <textarea class="form-control" rows="3" name="materi"><?php echo $data['materi'];?></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Uraian Kegiatan</label>
                  <textarea class="form-control" rows="3" name="uraian"><?php echo $data['uraian'];?></textarea>
                </div>

              
              </div>
              <div class="box-footer">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
              </div>
            </form>

<?php 
  if (isset($_POST['simpan'])) {

    $nip = $_SESSION['nip'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $kelompok = $_POST['kelompok'];
    $desa = $_POST['desa'];
    $kec = $_POST['kec'];
    $kab = $_SESSION['kab'];
    $lokasi = $_POST['lokasi'];
    $materi = $_POST['materi'];
    $uraian = $_POST['uraian'];

    $sql = $koneksi->query("UPDATE tb_anjangkarya SET nip='$nip', tgl_pelaksanaan=STR_TO_DATE('$tanggal', '%d/%m/%Y'), jam='$jam',kelompok='$kelompok',desa='$desa',kec='$kec',kab='$kab',lokasi='$lokasi',materi='$materi',uraian='$uraian' WHERE id_anjangkarya ='$kode' ");

    if($sql){
    ?>
        <script type="text/javascript">
          alert ("Data Berhasil Diubah")
          window.location.href="?page=anjangkarya";
        </script>
    <?php
    }
  }

?>