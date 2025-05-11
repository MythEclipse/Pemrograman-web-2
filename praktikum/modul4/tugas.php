<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Judul Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function tampilJudul(kode) {
            if (kode === "") {
                document.getElementById("isi_judul").innerText = "-";
                return;
            }

            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById("isi_judul").innerText = this.responseText;
                }
            };
            xhttp.open("GET", "get_judul_buku.php?kode_buku=" + kode, true);
            xhttp.send();
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Data Buku</h2>
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="kode_buku" class="form-label"><strong>Kode Buku</strong></label>
                        <select id="kode_buku" name="kode_buku" class="form-select" onchange="tampilJudul(this.value)">
                            <option value="">-- Pilih Salah Satu --</option>
                            <?php
                            $q = mysqli_query($db, "SELECT kode_buku FROM buku");
                            while ($row = mysqli_fetch_assoc($q)) {
                                echo "<option value='{$row['kode_buku']}'>{$row['kode_buku']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="isi_judul" class="form-label"><strong>Judul Buku</strong></label>
                        <p id="isi_judul" class="form-control">-</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
