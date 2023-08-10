<?php

    $kode = $_GET['id'];
    $sql = $koneksi->query("delete from tb_kategori_hhbk where kode_kategori='$kode'");
    
    if($sql){
?>
        <script type="text/javascript">
          alert ("Data Berhasil Dihapus")
          window.location.href="?page=kategori";
        </script>
<?php
    }
?>