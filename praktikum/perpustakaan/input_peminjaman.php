<?php
include "koneksi.php";
$buku = mysqli_query($db, "SELECT * FROM buku");
$mhs = mysqli_query($db, "SELECT * FROM mahasiswa");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Peminjaman Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Form Peminjaman Buku</h2>
    <form action="Prak_4b.php?menu=simpan_peminjaman" method="post">
        <div class="mb-3">
            <label class="form-label">Tanggal Pinjam</label>
            <input type="date" class="form-control" name="tanggal_pinjam" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Pilih Mahasiswa (NIM)</label>
            <select name="nim" class="form-control" required>
                <?php while ($m = mysqli_fetch_assoc($mhs)) {
                    echo "<option value='{$m['nim']}'>{$m['nim']} - {$m['nama']}</option>";
                } ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Pilih Buku</label>
            <select name="kode_buku" class="form-control" required>
                <?php while ($b = mysqli_fetch_assoc($buku)) {
                    echo "<option value='{$b['kode_buku']}'>{$b['kode_buku']} - {$b['judul_buku']}</option>";
                } ?>
            </select>
        </div>
              <button type="submit" class="btn btn-primary" name="submit" value="SIMPAN" >Simpan</button>
        <button type="reset" class="btn btn-secondary" name="reset" >Batal</button>
    </form>
</div>
</body>
</html>
