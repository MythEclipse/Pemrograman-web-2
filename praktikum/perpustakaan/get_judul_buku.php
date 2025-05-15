<?php
include "koneksi.php";

if (isset($_GET['kode_buku'])) {
    $kode = $_GET['kode_buku'];
    $q = mysqli_query($db, "SELECT judul_buku FROM buku WHERE kode_buku = '$kode'");
    $data = mysqli_fetch_assoc($q);

    if ($data) {
        echo $data['judul_buku'];
    } else {
        echo "Judul tidak ditemukan";
    }
}
?>
