<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="text" name="angka">
        <button type="submit" name="tombol">submit</button>
        <input type="text" name="isi" readonly value=<?php 
        $angka = (int)$_POST['angka'];
        if ($angka % 2 == 0) {
            echo "genap";
        } else {
            echo "ganjil";
        }
        ?>>
    </form>
</body>
</html>