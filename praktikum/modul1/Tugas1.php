<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Luas Lingkaran</title>
    <link href="../../style/bootstrap.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h1 class="text-center">Hitung Luas Lingkaran</h1>
            </div>
            <div class="card-body">
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="radius" class="form-label">Masukkan Jari-jari:</label>
                        <input type="number" name="radius" id="radius" step="0.01" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Hitung</button>
                </form>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    define('PHI', 3.14); 
                    $radius = $_POST['radius'];

                    if (is_numeric($radius) && $radius > 0) {
                        $area = PHI * $radius * $radius;
                        echo "<div class='alert alert-success mt-3'>Luas lingkaran dengan jari-jari $radius adalah: $area</div>";
                    } else {
                        echo "<div class='alert alert-danger mt-3'>Masukkan nilai jari-jari yang valid!</div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <script src="../../script/bootsrap.js"></script>
</body>
</html>