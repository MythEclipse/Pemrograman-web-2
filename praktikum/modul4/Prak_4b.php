<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERPUSTAKAAN FKOM UNIKU</title>
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
    }
    ?>
</body>

</html>