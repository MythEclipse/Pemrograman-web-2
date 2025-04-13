<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Perhitungan Gaji Karyawan</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .container {
      width: 400px;
      border: 1px solid #000;
      padding: 20px;
      margin: 50px auto;
    }
    select, input[type=submit] {
      padding: 5px;
      margin-top: 10px;
    }
    .result {
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h3>PERHITUNGAN GAJI KARYAWAN</h3>
    <form method="post">
      <label for="golongan">Golongan :</label><br>
      <select name="golongan" id="golongan">
        <option value="I">I</option>
        <option value="II">II</option>
        <option value="III">III</option>
      </select><br><br>
      <input type="submit" name="hitung" value="HITUNG">
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

        echo "<div class='result'>";
        echo "Gaji Pokok : " . number_format($gajiPokok, 0, ',', '.') . "<br>";
        echo "Tunjangan : " . number_format($tunjangan, 0, ',', '.') . "<br>";
        echo "Potongan : " . number_format($potongan, 0, ',', '.') . "<br>";
        echo "======================<br>";
        echo "<strong>Total Gaji : " . number_format($totalGaji, 0, ',', '.') . "</strong>";
        echo "</div>";
    }
    ?>
  </div>
</body>
</html>
