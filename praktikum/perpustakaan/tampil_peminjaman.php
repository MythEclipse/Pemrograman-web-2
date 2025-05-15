<?php
include "koneksi.php";
$q = "SELECT 
        p.kode_pinjam,
        p.tanggal_pinjam,
        m.nim,
        m.nama,
        b.kode_buku,
        b.judul_buku
      FROM peminjaman p
      JOIN mahasiswa m ON p.nim = m.nim
      JOIN buku b ON p.kode_buku = b.kode_buku";
$r = mysqli_query($db, $q);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Peminjaman Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">DATA PEMINJAMAN BUKU</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-success text-center">
                <tr>
                    <th>Kode Pinjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($data = mysqli_fetch_assoc($r)) {
                    echo "<tr>
                            <td>{$data['kode_pinjam']}</td>
                            <td>{$data['tanggal_pinjam']}</td>
                            <td>{$data['nim']}</td>
                            <td>{$data['nama']}</td>
                            <td>{$data['kode_buku']}</td>
                            <td>{$data['judul_buku']}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
