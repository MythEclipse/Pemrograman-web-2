<?php
extract($_POST);
if ($submit == "SIMPAN") {
    include "koneksi.php";

    $nim          = $_POST['nim'];
    $nama         = $_POST['nama'];
    $jurusan      = $_POST['jurusan'];

    $q = "INSERT INTO mahasiswa (nim, nama, jurusan)
          VALUES ('$nim', '$nama', '$jurusan')";

    $r = mysqli_query($db, $q) or die(mysqli_error($db));

    if ($r) {
        echo "<h2>Data Mahasiswa Berhasil Disimpan</h2>";
    } else {
        echo "<h2>Data Mahasiswa Gagal Disimpan</h2>";
    }
}
