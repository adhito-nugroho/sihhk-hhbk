<?php

    $kode1 = $_GET['id_auk'];
    $kode2 = $_GET['id_produksi'];

    $sql = $koneksi->query("UPDATE tb_produksi_auk set view='n' where id_auk='$kode1'");
    
    if($sql){
        $sql2 = $koneksi->query("UPDATE tb_produksi_auk set view='y' where id_produksi='$kode2'");
        if($sql2){    
        
        ?>
            <script type="text/javascript">
            alert ("Data Berhasil Diubah")
            window.location.href="?page=auk_produksi_view&id=<?=$kode1?>";
            </script>
        <?php
        }
        }
        ?>