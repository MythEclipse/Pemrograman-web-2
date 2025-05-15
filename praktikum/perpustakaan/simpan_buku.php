<?php 
extract($_POST);
if($submit == "SIMPAN") {
    include "koneksi.php";

    $kode_buku   = $_POST['kode_buku'];
    $judul_buku  = $_POST['judul_buku'];
    $pengarang   = $_POST['pengarang'];
    $penerbit    = $_POST['penerbit'];

    $q = "INSERT INTO buku (kode_buku, judul_buku, pengarang, penerbit)
          VALUES ('$kode_buku', '$judul_buku', '$pengarang', '$penerbit')";

    $r = mysqli_query($db, $q) or die(mysqli_error($db));

    if ($r) {
        echo "<h2>Data Buku Berhasil Disimpan</h2>";
    } else {
        echo "<h2>Data Buku Gagal Disimpan</h2>";
    }

}
?>F
