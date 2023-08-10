<?php

    $kode = $_GET['id'];
    $sql = $koneksi->query("delete from tb_auk where id_auk='$kode'");
    
    if($sql){
?>
        <script type="text/javascript">
          alert ("Data Berhasil Dihapus")
          window.location.href="?page=auk";
        </script>
<?php
    }
?>