<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="">
        Jumlah Data : <input type="text" name="jumlah" value="<?php echo isset($_POST['jumlah']) ? $_POST['jumlah'] : ''; ?>">
        <button type="submit">INPUT DATA</button>
        <br><br>
        <?php
        if (isset($_POST['jumlah']) && is_numeric($_POST['jumlah'])) {
            for ($i = 0; $i < $_POST['jumlah']; $i++) {
                echo 
                '
                    Angka [' . $i . '] : <input type="text" name="data[' . $i . ']"><br>
                ';
            }
        }
        ?>
        <button type="submit" name="tampil">TAMPIL</button>
        <br><br>
        <?php
        if (isset($_POST['tampil']) && isset($_POST['data']) && is_array($_POST['data'])) {
            echo "Data yang dimasukkan:<br>";
            foreach ($_POST['data'] as $index => $value) {
            echo "Angka [$index] : " . htmlspecialchars($value) . "<br>";
            }
        }
        ?>
    </form>
</body>

</html>