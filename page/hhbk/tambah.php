<section class="content">

<div class="col-sm-5">
    <div class="panel panel-default">
        <div class="panel-heading">Data HHBK</div>
            <div class="panel-body">
                <form enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label>Nama HHBK</label>
                    <input name="nama_hhbk" class="form-control" placeholder="Nama Kegiatan HHBK">
                </div>

                <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" name="kategori">
                <option> Pilih </option>                  
                    <?php
                    $sql = $koneksi->query("select * from tb_kategori_hhbk"); 
                    while ($data = $sql->fetch_assoc()) {
                    ?>
                    <option value="<?=$data['kode_kategori'];?>"><?=$data['nama_kategori'];?></option> 
                    <?php
                    }
                    ?>
                </select>
                </div>

                



                <div class="form-group">
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                </div>

                </form>        
            </div>
</section>
<script src="src/L.Control.Locate.js"></script>
<script>

    var curlocation=[0,0];
    if (curlocation[0]==0 && curlocation[1]==0){
        curlocation=[-7.148594, 111.881875];
    }
    var map = L.map('map').setView([-7.148594, 111.881875], 14);

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
        if (isset($_POST['simpan'])) {

        $nip = $_SESSION['penyuluh'];
        $nama = $_POST['nama_auk'];
        $penanggungjawab = $_POST['penanggungjawab'];

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
    $telepon = $_POST['telepon'];
    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $id_kategori = $_POST['kategori'];
    $upload = move_uploaded_file($lokasi, "foto/".$foto);
    
    if ($upload){
    $sql = $koneksi->query("insert into tb_auk (id_kth,nip,nama_auk,id_kategori,penanggungjawab,alamat,telepon,latitude,longitude,keterangan,foto) values('$penanggungjawab','$nip','$nama','$id_kategori','$nama_kth','$alamat','$telepon','$latitude','$longitude','$keterangan','$foto')"); 
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
