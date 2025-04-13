<!DOCTYPE html>
<html>
<head>
    <title>Hitung Nilai Akhir</title>
</head>
<body>
    <form method="post" action="">
        <label for="uas">Nilai UAS:</label>
        <input type="text" name="uas" id="uas" required><br><br>

        <label for="uts">Nilai UTS:</label>
        <input type="text" name="uts" id="uts" required><br><br>

        <label for="quiz">Nilai QUIZ:</label>
        <input type="text" name="quiz" id="quiz" required><br><br>

        <label for="tugas">Nilai TUGAS:</label>
        <input type="text" name="tugas" id="tugas" required><br><br>

        <input type="submit" name="submit" value="Hitung">
    </form>

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

        // Tampilkan hasil
        echo "<h3>Hasil:</h3>";
        echo "Nilai Akhir Anda = $NA<br>";
        echo "Huruf Mutu = $HM";
    }
    ?>
</body>
</html>