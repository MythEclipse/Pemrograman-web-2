<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../style/bootstrap.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Input Data Angka</h4>
            </div>
            <div class="card-body">
                <form method="post" action="">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Jumlah Data</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="jumlah" value="<?php echo isset($_POST['jumlah']) ? $_POST['jumlah'] : ''; ?>">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-success">INPUT DATA</button>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['jumlah']) && is_numeric($_POST['jumlah'])) {
                        for ($i = 0; $i < $_POST['jumlah']; $i++) {
                            echo '
                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label">Angka [' . $i . ']</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="data[' . $i . ']">
                                </div>
                            </div>
                            ';
                        }
                    }
                    ?>
                    <div class="mb-3">
                        <button type="submit" name="tampil" class="btn btn-primary">TAMPIL</button>
                    </div>
                    <?php
                    if (isset($_POST['tampil']) && isset($_POST['data']) && is_array($_POST['data'])) {
                        echo '<div class="alert alert-info"><strong>Data yang dimasukkan:</strong><br>';
                        foreach ($_POST['data'] as $index => $value) {
                            echo "Angka [$index] : " . htmlspecialchars($value) . "<br>";
                        }
                        echo '</div>';
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
    <script src="../../script/bootsrap.js"></script>
</body>

</html>