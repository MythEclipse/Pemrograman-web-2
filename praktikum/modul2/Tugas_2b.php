<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Fungsi dalam PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f0f0f0;
        }
        
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        h2 {
            color: #333;
            border-bottom: 2px solid #666;
            padding-bottom: 5px;
        }
        
        .contoh {
            background-color: #f8f8f8;
            padding: 15px;
            margin: 10px 0;
            border-left: 4px solid #007bff;
        }
        
        code {
            background-color: #eee;
            padding: 2px 5px;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Fungsi dalam PHP</h1>
        
        <?php
        function sapa($nama) {
            return "Halo, $nama! Selamat datang!";
        }
        
        function hitung_luas_lingkaran($jari) {
            return number_format(pi() * pow($jari, 2), 2);
        }
        ?>

        <h2>Fungsi Bawaan</h2>
        
        <h3>1. Fungsi String</h3>
        <div class="contoh">
            <strong>strlen():</strong> Menghitung panjang string<br>
            <code>echo strlen("Hello World");</code><br>
            Hasil: <?php echo strlen("Hello World"); ?>
        </div>

        <div class="contoh">
            <strong>strtoupper():</strong> Mengubah ke huruf besar<br>
            <code>echo strtoupper("php");</code><br>
            Hasil: <?php echo strtoupper("php"); ?>
        </div>

        <h3>2. Fungsi Aritmatika</h3>
        <div class="contoh">
            <strong>abs():</strong> Nilai absolut<br>
            <code>echo abs(-5.2);</code><br>
            Hasil: <?php echo abs(-5.2); ?>
        </div>

        <div class="contoh">
            <strong>round():</strong> Pembulatan angka<br>
            <code>echo round(3.6);</code><br>
            Hasil: <?php echo round(3.6); ?>
        </div>

        <h3>3. Fungsi Array</h3>
        <div class="contoh">
            <strong>count():</strong> Menghitung elemen array<br>
            <code>echo count([1,2,3,4]);</code><br>
            Hasil: <?php echo count([1,2,3,4]); ?>
        </div>

        <div class="contoh">
            <strong>array_merge():</strong> Menggabungkan array<br>
            <pre><?php 
            $arr1 = [1,2];
            $arr2 = [3,4];
            print_r(array_merge($arr1, $arr2));
            ?></pre>
        </div>

        <h2>Fungsi Buatan</h2>
        <div class="contoh">
            <strong>Fungsi sapa():</strong><br>
            <code>echo sapa("Andi");</code><br>
            Hasil: <?php echo sapa("Andi"); ?>
        </div>

        <div class="contoh">
            <strong>Fungsi hitung_luas_lingkaran():</strong><br>
            <code>echo hitung_luas_lingkaran(7);</code><br>
            Hasil: <?php echo hitung_luas_lingkaran(7); ?>
        </div>
    </div>
</body>
</html>