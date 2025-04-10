<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="Posttest.php">

        <input type="number" name="nilai">
        <input type="submit" name="tampil" value="TAMPILKAN Nilai">
        <br>
        <?php
        extract($_POST);
        if (isset($tampil)) {
            if (!isset($nilai)) {
                echo "Nilai tidak ada";
            } else if ($nilai < 0 || $nilai > 100) {
                echo "Nilai tidak valid";
            } else {
                $NA = isset($nilai) ? $nilai : 0;
                if ($NA >= 90)
                    $HM = 'A';
                else if ($NA >= 70)
                    $HM = 'B';
                else if ($NA >= 60)
                    $HM = 'C';
                else if ($NA >= 50)
                    $HM = 'D';
                else if ($NA < 50)
                    $HM = 'E';
                echo "Nilai Anda = $NA<BR> 
                Huruf Mutu = $HM";
            }
        }
        ?>
    </form>
</body>

</html>