<?php
extract($_POST);
if ($submit == "SIMPAN") {
    include "koneksi.php";

    $tanggal = $_POST['tanggal_pinjam'];
    $nim = $_POST['nim'];
    $kode_buku = $_POST['kode_buku'];

    $q = "INSERT INTO peminjaman (tanggal_pinjam, nim, kode_buku)
          VALUES ('$tanggal', '$nim', '$kode_buku')";
    $r = mysqli_query($db, $q);

    if ($r) {
        echo "<h2>Data Peminjaman Berhasil Disimpan</h2>";
    } else {
        echo "<h2>Gagal: " . mysqli_error($db) . "</h2>";
    }
}
?>
