<?php
    $kode = $_GET['id'];
    $sql = $koneksi->query("delete from tb_konsul_kelompok where id_konsul_kelompok='$kode'");
    
    if($sql){
?>
        <script type="text/javascript">
          alert ("Data Berhasil Dihapus")
          window.location.href="?page=konsul_kelompok";
        </script>
<?php
    }
?>