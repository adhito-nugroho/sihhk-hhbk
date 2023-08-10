<div class="col-sm-7">
    <div class="panel panel-default">
                <div class="panel-heading">
                    Lokasi
                </div>
                                               
                <div class="panel-body">
                    <div id="map" style="height: 530px;"></div>
                </div>
    </div>
</div>
<?php  
    $id = $_GET['id'];

    $sql = $koneksi->query("select * from tb_auk where id_auk='$id'");
    $hasil = $sql->fetch_assoc();
?>

<div class="col-sm-5">
    <div class="panel panel-default">
        <div class="panel-heading">Data AUK</div>
            <div class="panel-body">
                <form enctype="multipart/form-data" method="post">
                
                
                <div class="form-group">
                    <label>Nama AUK</label>
                    <input name="nama_auk" class="form-control" placeholder="Nama Kegiatan AUK" value="<?php echo $hasil['nama_auk']?>">
                </div>

                <?php
                    $id_kategori= $hasil['id_kategori'];
                    $sql = $koneksi->query("select * from tb_kategori where id_kategori='$id_kategori'");
                    while ($datanya=$sql->fetch_assoc()){
                        $kategori = $datanya['kategori'];
                    }
                ?>
                <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" name="kategori">
                <option value="<?=$hasil['id_kategori'];?>"> <?=$kategori;?> </option>                  
                    <?php
                    $sql = $koneksi->query("select * from tb_kategori"); 
                    while ($set = $sql->fetch_assoc()) {
                    ?>
                    <option value="<?=$set['id_kategori'];?>"><?=$set['kategori'];?></option> 
                    <?php
                    }
                    ?>
                </select>
                </div>

                <div class="form-group">
                <label>KTH</label>
                <select class="form-control" name="penanggungjawab">
                <option value="<?=$hasil['id_kth'];?>"> <?=$hasil['penanggungjawab'];?> </option>                  
                    <?php
                    $nip = $_SESSION['penyuluh'];
                    $sql = $koneksi->query("select * from tb_kth where nip='$nip'"); 
                    while ($set = $sql->fetch_assoc()) {
                    ?>
                    <option value="<?=$set['kode_kth'];?>"><?=$set['nama_kth'];?></option> 
                    <?php
                    }
                    ?>
                </select>
                </div>

                
                <div class="form-group">
                    <label>Alamat</label>
                    <input name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $hasil['alamat']?>">
                </div>

                <div class="form-group">
                    <label>Telepon</label>
                    <input name="telepon" class="form-control" placeholder="No Telepon" value="<?php echo $hasil['telepon']?>">
                </div>

                

                <div class="form-group">
                    <label>Latitude</label>
                    <input name="lat" id="lat" class="form-control" placeholder="Latitude" value="<?php echo $hasil['latitude']?>">
                </div>

                <div class="form-group">
                    <label>Longitude</label>
                    <input name="long" id="long" class="form-control" placeholder="Longitude" value="<?php echo $hasil['longitude']?>">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input name="keterangan" class="form-control" placeholder="keterangan" value="<?php echo $hasil['keterangan']?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Foto</label>
                  <label><img src="foto/<?php echo $hasil['foto']?>" widht="100" height="100" alt=""></label>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Ganti Foto</label>
                  <input type="file" name="foto">
                </div>



                <div class="form-group">
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                </div>

                </form>        
            </div>
    </div>
</div>

<script src="src/L.Control.Locate.js"></script>
<script>

    var curlocation=[0,0];
    if (curlocation[0]==0 && curlocation[1]==0){
        curlocation=[<?php echo $hasil['latitude'] ?>, <?php echo $hasil['longitude'] ?>];
    }
    var map = L.map('map').setView([<?php echo $hasil['latitude'] ?>, <?php echo $hasil['longitude'] ?>], 14);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        
    }).addTo(map);

    
    map.attributionControl.setPrefix(false);
    var marker = new L.marker(curlocation,{
        draggable: 'true'
    });

    marker.on('dragend', function(event){
        var position = marker.getLatLng();
        marker.setLatLng(position,{
            draggable :'true'
        }).bindPopup(position).update();
        $("#lat").val(position.lat);
        $("#long").val(position.lng).keyup();
    });

    $("#lat, #long").change(function() {
        var position = [parseInt($("#lat").val()),parseInt($("#long").val())];
        marker.setLatLng(position,{
            draggable : 'true'
        }).bindPopup(position).update();
        map.panTo(position);
    });
    map.addLayer(marker);
    L.control.locate().addTo(map);

    

</script>
 

<?php
    if (isset($_POST['simpan'])){

        $penanggungjawab = $_POST['penanggungjawab'];

    
            $nip = $_SESSION['penyuluh'];
            $nama = $_POST['nama_auk'];
            $nip = $_SESSION['penyuluh'];
            $sql = $koneksi->query("select * from tb_kth where kode_kth='$penanggungjawab'"); 
            while ($data = $sql->fetch_assoc()) {
                    $nama_kth = $data['nama_kth'];
            ?>
    
        <?php
        }
        ?>
<?php
    $alamat = $_POST['alamat'];
    $latitude = $_POST['lat'];
    $longitude = $_POST['long'];
    $keterangan = $_POST['keterangan'];
    $kabupaten = $_POST['kabupaten'];
    $telepon = $_POST['telepon'];
    $id_kategorinya = $_POST['kategori'];

    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    
    if (!empty($lokasi)){
    move_uploaded_file($lokasi, "foto/".$foto);
    $sql = $koneksi->query("UPDATE tb_auk SET id_kth='$penanggungjawab', nama_auk='$nama',penanggungjawab='$nama_kth',id_kategori='$id_kategorinya',alamat='$alamat',telepon='$telepon',latitude='$latitude',longitude='$longitude',keterangan='$keterangan',foto='$foto',kabupaten='$kabupaten' WHERE id_auk='$id'");

    if($sql){
    ?>
        <script type="text/javascript">
          alert ("Data Berhasil Disimpan")
          window.location.href="?page=auk";
        </script>
    <?php
    }
  }else
  {
    $sql = $koneksi->query("UPDATE tb_auk SET id_kth='$penanggungjawab', nama_auk='$nama',penanggungjawab='$nama_kth',id_kategori='$id_kategorinya',alamat='$alamat',telepon='$telepon',latitude='$latitude',longitude='$longitude',keterangan='$keterangan',kabupaten='$kabupaten' WHERE id_auk='$id'");
    if($sql){
        ?>
            <script type="text/javascript">
              alert ("Data Berhasil Disimpan")
              window.location.href="?page=auk";
            </script>
        <?php
        }
  }
}
?>