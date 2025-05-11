<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cari Judul Buku</title>
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
    <h2>Data Buku</h2>
    <table border="1" width="50%">
        <tr>
            <td><strong>Kode Buku</strong></td>
            <td>
                <select name="kode_buku" onchange="tampilJudul(this.value)">
                    <option value="">-- Pilih Salah Satu --</option>
                    <?php
                    $q = mysqli_query($db, "SELECT kode_buku FROM buku");
                    while ($row = mysqli_fetch_assoc($q)) {
                        echo "<option value='{$row['kode_buku']}'>{$row['kode_buku']}</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><strong>Judul Buku</strong></td>
            <td id="isi_judul">-</td>
        </tr>
    </table>
</body>
</html>
