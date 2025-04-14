<!DOCTYPE html>
<html>
<head>
    <title>Hitung Nilai Akhir</title>
    <link href="../../style/bootstrap.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3>Hitung Nilai Akhir</h3>
        </div>
        <div class="card-body">
            <form method="post" action="">
                <div class="mb-3">
                    <label for="uas" class="form-label">Nilai UAS:</label>
                    <input type="text" name="uas" id="uas" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="uts" class="form-label">Nilai UTS:</label>
                    <input type="text" name="uts" id="uts" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="quiz" class="form-label">Nilai QUIZ:</label>
                    <input type="text" name="quiz" id="quiz" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="tugas" class="form-label">Nilai TUGAS:</label>
                    <input type="text" name="tugas" id="tugas" class="form-control" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Hitung</button>
            </form>
        </div>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $uas = isset($_POST['uas']) ? (float)$_POST['uas'] : 0;
        $uts = isset($_POST['uts']) ? (float)$_POST['uts'] : 0;
        $quiz = isset($_POST['quiz']) ? (float)$_POST['quiz'] : 0;
        $tugas = isset($_POST['tugas']) ? (float)$_POST['tugas'] : 0;

        // Hitung Nilai Akhir
        $NA = (0.3 * $uas) + (0.3 * $uts) + (0.2 * $quiz) + (0.2 * $tugas);

        // Tentukan Huruf Mutu
        if ($NA >= 90) {
            $HM = 'A';
        } else if ($NA >= 70) {
            $HM = 'B';
        } else if ($NA >= 60) {
            $HM = 'C';
        } else if ($NA >= 50) {
            $HM = 'D';
        } else {
            $HM = 'E';
        }

        echo '<div class="alert alert-info mt-3">';
        echo "<h4>Hasil:</h4>";
        echo "Nilai Akhir Anda = $NA<br>";
        echo "Huruf Mutu = $HM";
        echo '</div>';
    }
    ?>
</body>
</html>