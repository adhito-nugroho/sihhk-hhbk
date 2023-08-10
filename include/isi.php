<?php

$page = $_GET['page'];
$aksi = $_GET['aksi'];


if ($page == "operator") {
    if ($aksi == ''){
        include "page/operator/operator.php";
    }

    if ($aksi == 'tambah'){
        include "page/operator/tambah.php";
    }

    if ($aksi == 'ubah'){
        include "page/operator/ubah.php";
    }

    if ($aksi == 'hapus'){
        include "page/operator/hapus.php";
    }
}

if ($page == "pengguna") {
    if ($aksi == ''){
        include "page/user/pengguna.php";
    }

    if ($aksi == 'tambah'){
        include "page/user/tambah.php";
    }

    if ($aksi == 'ubah'){
        include "page/user/ubah.php";
    }

    if ($aksi == 'hapus'){
        include "page/user/hapus.php";
    }
}

if ($page == "anjangsana") {
    if ($aksi == ''){
        include "page/anjangsana/anjangsana.php";
    }

    if ($aksi == 'tambah'){
        include "page/anjangsana/tambah.php";
    }

    if ($aksi == 'ubah'){
        include "page/anjangsana/ubah.php";
    }

    if ($aksi == 'hapus'){
        include "page/anjangsana/hapus.php";
    }
}

if ($page == "anjangkarya") {
    if ($aksi == ''){
        include "page/anjangkarya/anjangkarya.php";
    }

    if ($aksi == 'tambah'){
        include "page/anjangkarya/tambah.php";
    }

    if ($aksi == 'ubah'){
        include "page/anjangkarya/ubah.php";
    }

    if ($aksi == 'hapus'){
        include "page/anjangkarya/hapus.php";
    }
}

if ($page == "konsul_kelompok") {
    if ($aksi == ''){
        include "page/konsul_kelompok/konsul_kelompok.php";
    }

    if ($aksi == 'tambah'){
        include "page/konsul_kelompok/tambah.php";
    }

    if ($aksi == 'ubah'){
        include "page/konsul_kelompok/ubah.php";
    }

    if ($aksi == 'hapus'){
        include "page/konsul_kelompok/hapus.php";
    }
}

if ($page == "konsul_perorangan") {
    if ($aksi == ''){
        include "page/konsul_perorangan/konsul_perorangan.php";
    }

    if ($aksi == 'tambah'){
        include "page/konsul_perorangan/tambah.php";
    }

    if ($aksi == 'ubah'){
        include "page/konsul_perorangan/ubah.php";
    }

    if ($aksi == 'hapus'){
        include "page/konsul_perorangan/hapus.php";
    }
}

if ($page == "hhbk") {
    if ($aksi == ''){
        include "page/hhbk/hhbk.php";
    }

    if ($aksi == 'tambah'){
        include "page/hhbk/tambah.php";
    }

    if ($aksi == 'ubah'){
        include "page/hhbk/ubah.php";
    }

    if ($aksi == 'hapus'){
        include "page/hhbk/hapus.php";
    }
}

if ($page == "kategori") {
    if ($aksi == ''){
        include "page/kategori/kategori.php";
    }

    if ($aksi == 'tambah'){
        include "page/kategori/tambah.php";
    }

    if ($aksi == 'ubah'){
        include "page/kategori/ubah.php";
    }

    if ($aksi == 'hapus'){
        include "page/kategori/hapus.php";
    }
}

if ($page == "auk_produksi") {
    if ($aksi == ''){
        include "page/produksi/auk_produksi.php";
    }

    if ($aksi == 'tambah'){
        include "page/produksi/auk_produksi_input.php";
    }

    if ($aksi == 'ubah'){
        include "page/produksi/auk_produksi_ubah.php";
    }

    if ($aksi == 'hapus'){
        include "page/auk/hapus.php";
    }
}

if ($page == "auk_produksi_view") {
    if ($aksi == ''){
        include "page/produksi/auk_produksi_view.php";
    }
}


if ($page == 'peta') {
    include "page/peta.php";
}

if ($page == 'view_produksi') {
    include "page/set_view_produksi.php";
}

if ($page == 'Laporan_Auk') {
    include "page/laporan/set_laporan.php";
}



if ($page == '') {
    include "home.php";
}

?>