<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Anjangsana Penyuluh Kehutanan</h3>
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
                  <input type="text" class="form-control pull-right" id="tanggal" name="tanggal">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Jam</label>
                  <input type="text" class="form-control" name="jam">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Nama/Kelompok</label>
                  <input type="text" class="form-control" name="kelompok">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Desa</label>
                  <input type="text" class="form-control" name="desa">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Kecamatan</label>
                  <input type="text" class="form-control" name="kec">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Lokasi</label>
                  <input type="text" class="form-control" name="lokasi">
                </div>

                <div class="form-group">
                  <label>Materi</label>
                  <textarea class="form-control" rows="3" placeholder="Materi Penyuluhan ..." name="materi"></textarea>
                </div>

                <div class="form-group">
                  <label>Uraian Kegiatan</label>
                  <textarea class="form-control" rows="3" placeholder="Uraian ..." name="uraian"></textarea>
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
    
    $sql = $koneksi->query("insert into tb_anjangsana (nip,tgl_pelaksanaan,jam,kelompok,desa,kec,kab,lokasi,materi,uraian) values('$nip',STR_TO_DATE('$tanggal', '%d/%m/%Y'),'$jam','$kelompok','$desa','$kec','$kab','$lokasi','$materi','$uraian')");

    if($sql){
    ?>
      
        <script type="text/javascript">
          alert ("Data Berhasil Disimpan")
          window.location.href="?page=anjangsana";
        </script>
    <?php
    }
  }

?>