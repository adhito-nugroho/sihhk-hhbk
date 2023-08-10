<?php

    $kode = $_GET['id'];
    $sql = $koneksi->query("delete from tb_anjangkarya where id_anjangkarya='$kode'");
    
    if($sql){
?>
        <script type="text/javascript">
          alert ("Data Berhasil Dihapus")
          window.location.href="?page=anjangkarya";
        </script>
<?php
    }
?>