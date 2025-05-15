<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERPUSTAKAAN FKOM UNIKU</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body>
    <h2>PERPUSTAKAAN ONLINE</h2>
    <?php include "koneksi.php"; ?>
    <p>
        <?php include "menu.php"; ?>
    </p>
    <hr color="green" size="14">
    <?php
    extract($_GET);
    if (isset($menu)) {
        if ($menu == "input_buku") {
            include "input_buku.php";
        }
         else if ($menu == "tampil_buku") {
            include "tampil_buku.php";
        }
        else if ($menu == "simpan_buku") {
            include "simpan_buku.php";
        }
        else if ($menu == "input_mahasiswa") {
            include "input_mahasiswa.php";
        }
        else if ($menu == "tampil_mahasiswa") {
            include "tampil_mahasiswa.php";
        }
        else if ($menu == "simpan_mahasiswa") {
            include "simpan_mahasiswa.php";
        }
        else if ($menu == "tampil_data_buku") {
            include "tampil_data_buku.php";
        }
        else if ($menu == "tampil_data_mahasiswa") {
            include "tampil_data_mahasiswa.php";
        }
        else if ($menu == "input_peminjaman") {
            include "input_peminjaman.php";
        }
        else if ($menu == "tampil_peminjaman") {
            include "tampil_peminjaman.php";
        }
        else if ($menu == "simpan_peminjaman") {
            include "simpan_peminjaman.php";
        }
        else if ($menu == "edit_buku") {
            include "input_buku.php";
        }
        else if ($menu == "hapus_buku") {
            include "aksi_buku.php";
        }

    }
    ?>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>