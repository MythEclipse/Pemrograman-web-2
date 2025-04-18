<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Sederhana</title>
</head>
<body>
    <?php
    function tambah($a, $b) {
        return $a + $b;
    }
    function kurang($a, $b) {
        return $a - $b;
    }
    function kali($a, $b) {
        return $a * $b;
    }
    function bagi($a, $b) { 
        if ($b != 0) {
            return $a / $b;
        } else {
            return "Tidak bisa dibagi nol";
        }
    }

    $angka1 = 5;
    $angka2 = 3;
    $operator = '+';
    $hasil = 0;

    switch ($operator) {
        case '+':
            $hasil = tambah($angka1, $angka2);
            break;
        case '-':
            $hasil = kurang($angka1, $angka2);
            break;
        case '*':
            $hasil = kali($angka1, $angka2);
            break;
        case '/':
            $hasil = bagi($angka1, $angka2);
            break;
    }
    echo "<h3>$angka1 $operator $angka2 = $hasil</h3>";
    ?>
</body>
</html>
