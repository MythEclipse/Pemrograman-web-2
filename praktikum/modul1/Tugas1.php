<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Luas Lingkaran</title>
</head>
<body>
    <h1>Hitung Luas Lingkaran</h1>
    <form method="post" action="">
        <label for="radius">Masukkan Jari-jari:</label>
        <input type="number" name="radius" id="radius" step="0.01" required>
        <button type="submit">Hitung</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        define('PHI', 3.14); 
        $radius = $_POST['radius'];

        if (is_numeric($radius) && $radius > 0) {
            $area = PHI * $radius * $radius;
            echo "<p>Luas lingkaran dengan jari-jari $radius adalah: $area</p>";
        } else {
            echo "<p>Masukkan nilai jari-jari yang valid!</p>";
        }
    }
    ?>
</body>
</html>