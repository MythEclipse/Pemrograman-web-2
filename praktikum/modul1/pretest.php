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
        
        <form method="POST">
            <label for="nama">Nama:</label><br>
            <input type="text" id="nama" name="nama" required><br><br>
            
            <label for="tempatLahir">Tempat Lahir:</label><br>
            <input type="text" id="tempatLahir" name="tempatLahir" required><br><br>
            
            <label for="tanggalLahir">Tanggal Lahir:</label><br>
            <input type="date" id="tanggalLahir" name="tanggalLahir" required><br><br>
            
            <label for="alamat">Alamat:</label><br>
            <input type="text" id="alamat" name="alamat" required><br><br>
            
            <label for="pendidikan">Pendidikan:</label><br>
            <input type="text" id="pendidikan" name="pendidikan" required><br><br>
            
            <label for="hobi">Hobi (pisahkan dengan koma):</label><br>
            <input type="text" id="hobi" name="hobi" required><br><br>
            
            <button type="submit">Tampilkan Biodata</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = htmlspecialchars($_POST["nama"]);
            $tempatLahir = htmlspecialchars($_POST["tempatLahir"]);
            $tanggalLahir = htmlspecialchars($_POST["tanggalLahir"]);
            $alamat = htmlspecialchars($_POST["alamat"]);
            $pendidikan = htmlspecialchars($_POST["pendidikan"]);
            $hobi = explode(",", htmlspecialchars($_POST["hobi"]));
            
            function tampilBiodata($label, $isi) {
                echo "<p><span class='label'>$label</span>: $isi</p>";
            }
            
            tampilBiodata("Nama", $nama);
            tampilBiodata("Tempat Lahir", $tempatLahir);
            tampilBiodata("Tanggal Lahir", $tanggalLahir);
            tampilBiodata("Alamat", $alamat);
            tampilBiodata("Pendidikan", $pendidikan);
            
            echo "<p><span class='label'>Hobi</span>: ";
            echo implode(", ", $hobi);
            echo "</p>";
        }
        ?>
    </div>
</body>
</html>