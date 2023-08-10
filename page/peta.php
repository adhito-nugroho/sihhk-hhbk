<?php
function bulan($bulan)
{
Switch ($bulan){
    case 1 : $bulan="Januari";
        Break;
    case 2 : $bulan="Februari";
        Break;
    case 3 : $bulan="Maret";
        Break;
    case 4 : $bulan="April";
        Break;
    case 5 : $bulan="Mei";
        Break;
    case 6 : $bulan="Juni";
        Break;
    case 7 : $bulan="Juli";
        Break;
    case 8 : $bulan="Agustus";
        Break;
    case 9 : $bulan="September";
        Break;
    case 10 : $bulan="Oktober";
        Break;
    case 11 : $bulan="November";
        Break;
    case 12 : $bulan="Desember";
        Break;
    }
return $bulan;
}
?>

<section class="content-header">
      <ol class="breadcrumb">
        <li><a href="sikahanan.com"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Peta</li>
      </ol>
</section>
<div class="row">
    <div class="box-body">
      
        <h3 class="box-title">Peta Aneka Usaha Kehutanan</h3>
      
<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin=""/>

        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>
        
        <script src="assets/js/leaflet.ajax.js"></script>
        <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

        <style>
        p {
            border-bottom-style: solid;
            border-width: 1px;
            
        }

        table, th, td {
        padding: 5px;
        border-spacing: 5px;
            
        }

        my-label {
            position: absolute;
            width:1000px;
            font-size:60px;
        }
        </style>
    
</head>
<body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<div id="mapid" style="height: 540px;"></div>
<script>
    var mymap = L.map('mapid').setView([-7.1561384,111.8839009], 9);    
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1Ijoic2F0Y2hhZnVuayIsImEiOiJjanp0dmtsMmMwOHd4M2NteDc1Y2E5ZGUxIn0.qLjkfrDEEHh2IJPud5cgEw'
    }).addTo(mymap);
    <?php
      $bulannya = bulan(date("m"));
      $id_kategori = $_GET['kategori'];
    ?>
    <?php 
    if ($id_kategori==""){
        $sql = $koneksi->query("select * from tb_auk,tb_produksi_auk,tb_kategori where tb_auk.id_auk=tb_produksi_auk.id_auk and tb_auk.id_kategori=tb_kategori.id_kategori and tb_produksi_auk.view='y'");
    }
    else 
    {
        $sql = $koneksi->query("select * from tb_auk,tb_produksi_auk,tb_kategori where tb_auk.id_auk=tb_produksi_auk.id_auk and tb_auk.id_kategori = tb_kategori.id_kategori and tb_produksi_auk.view='y' and tb_auk.id_kategori='$id_kategori'");
    }
    $total = 0;
    while ($data = $sql->fetch_assoc()) { 
    ?>
    <?php
    $produksi = ($data['minggu1']+$data['minggu2']+$data['minggu3']+$data['minggu4']);
    ?>
    var homeIcon = L.icon({
    iconUrl: 'simbol/<?php echo $data['simbol']?>',
    iconSize:     [40, 40],
    });
    
    L.marker([<?php echo $data['latitude']?>, <?php echo $data['longitude']?>],{icon: homeIcon}).addTo(mymap)
     .bindPopup("<table><tr><th>NAMA AUK</th><th><?= $data['nama_auk']?></th></tr>"+
     "<tr><td colspan=3><img src='<?php echo ('foto/'.$data['foto'])?>' width='300px' height='200px'></td></tr>"+
     "<tr><td>NAMA PEMILIK / KTH</td><td><?= $data['penanggungjawab']?></td></tr>"+
     "<tr><td>ALAMAT</td><td><?=$data['alamat']?></td></tr>"+
     "<tr><td>TELEPON</td><td><?=$data['telepon']?></td><tr>"+
     "<tr><td>PRODUKSI/BULAN</td><td> <?php echo number_format($produksi,2, ',', '.')?> <?=$data['satuan']?></td></tr></table>");
    <?php 
    $total = $total + $produksi;
    $satuan = $data['satuan'];
    } 
    ?>
    var myStyle = {
    "color": "#ff0000",
    "weight": 2,
    "opacity": 0.40
    };
    
    function popUp(f,l){
    var out = [];
    if (f.properties){
        //for(key in f.properties){
        //}
        out.push(f.properties['name']);
        l.bindPopup(out.join("<br />"));
    }
    }
   
    var jsonTest = new L.GeoJSON.AJAX(["assets/geojson/cdk.geojson"],{onEachFeature:popUp,style : myStyle}).addTo(mymap);

<?php
    if ($id_kategori!=""){
?>
    var marker = new L.marker([-7.1561384,111.8839009], { opacity: 0.01 }); //opacity may be set to zero
    marker.bindTooltip("Total Produksi/bulan :<?php echo $total?> <?php echo $satuan?>", {permanent: true, className: "my-label", offset: [0, 0] });
    marker.addTo(mymap);
    <?php } ?>   
    
</script>

</body>
</html>
</div>
</div>



