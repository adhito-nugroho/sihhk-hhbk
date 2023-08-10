<?php

    $kode = $_GET['id'];
    $sql = $koneksi->query("delete from tb_admin where kode='$kode'");
    
    if($sql){
?>
        <script type="text/javascript">
          alert ("Data Berhasil Dihapus")
          window.location.href="?page=kelompok";
        </script>
<?php
    }
?>