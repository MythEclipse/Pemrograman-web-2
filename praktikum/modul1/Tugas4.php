<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Gaji Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h3>PERHITUNGAN GAJI KARYAWAN</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="golongan" class="form-label">Golongan :</label>
                        <select name="golongan" id="golongan" class="form-select">
                            <option value="I">I</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                        </select>
                    </div>
                    <button type="submit" name="hitung" class="btn btn-primary w-100">HITUNG</button>
                </form>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["golongan"])) {
                        $gol = $_POST["golongan"];
                        $gajiPokok = 0;
                        $tunjangan = 0;
                        $potongan = 0;
                        $totalGaji = 0;

                        switch ($gol) {
                                case "I":
                                        $gajiPokok = 500000;
                                        $tunjangan = 175000;
                                        $potongan = 0.10 * $gajiPokok;
                                        break;
                                case "II":
                                        $gajiPokok = 750000;
                                        $tunjangan = 155000;
                                        $potongan = 0.075 * $gajiPokok;
                                        break;
                                case "III":
                                        $gajiPokok = 1000000;
                                        $tunjangan = 146000;
                                        $potongan = 0.05 * $gajiPokok;
                                        break;
                        }

                        $totalGaji = $gajiPokok + $tunjangan - $potongan;

                        echo "<div class='alert alert-info mt-4'>";
                        echo "Gaji Pokok : " . number_format($gajiPokok, 0, ',', '.') . "<br>";
                        echo "Tunjangan : " . number_format($tunjangan, 0, ',', '.') . "<br>";
                        echo "Potongan : " . number_format($potongan, 0, ',', '.') . "<br>";
                        echo "<hr>";
                        echo "<strong>Total Gaji : " . number_format($totalGaji, 0, ',', '.') . "</strong>";
                        echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
