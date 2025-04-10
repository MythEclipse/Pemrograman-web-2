<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Dinamis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .biodata {
            width: 500px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }
        .label {
            font-weight: bold;
            width: 150px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="biodata">
        <h1>Biodata</h1>
        
        <?php
        $nama = "Asep haryana saputra";
        $tempatLahir = "Kuningan";
        $tanggalLahir = "18 july 2005";
        $alamat = "Jl. H.O Iskandar";
        $pendidikan = "Universitas Kuuningan";
        $hobi = ["Membaca", "Coding", "Bermain Game"];
        
        function tampilBiodata($label, $isi) {
            echo "<p><span class='label'>$label</span>: $isi</p>";
        }
        
        tampilBiodata("Nama", $nama);
        tampilBiodata("Tempat Lahir", $tempatLahir);
        tampilBiodata("Tanggal Lahir", $tanggalLahir);
        tampilBiodata("Alamat", $alamat);
        tampilBiodata("Pendidikan", $pendidikan);
        
        // Menampilkan hobi
        echo "<p><span class='label'>Hobi</span>: ";
        echo implode(", ", $hobi);
        echo "</p>";
        ?>
    </div>
</body>
</html>