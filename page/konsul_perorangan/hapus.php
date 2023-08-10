<?php

    $kode = $_GET['id'];
    $sql = $koneksi->query("delete from tb_konsul_perorangan where id_konsul_perorangan='$kode'");
    
    if($sql){
?>
        <script type="text/javascript">
          alert ("Data Berhasil Dihapus")
          window.location.href="?page=konsul_perorangan";
        </script>
<?php
    }
?>