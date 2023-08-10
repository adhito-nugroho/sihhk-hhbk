<?php
    define('HOST','localhost');
    define('USER','root');
    define('PASS','');
    define('DB1', 'cdk_bojonegoro');
    
    // Buat Koneksinya
    $db1 = new mysqli(HOST, USER, PASS, DB1);
    $koneksi = new mysqli("localhost","root","","cdk_bojonegoro");
?>
