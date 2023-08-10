<?php

    $kode = $_GET['id'];
    $sql = $koneksi->query("delete from tb_anjangsana where id_anjangsana='$kode'");
    
    if($sql){
?>
        <script type="text/javascript">
          alert ("Data Berhasil Dihapus")
          window.location.href="?page=anjangsana";
        </script>
<?php
    }
?>