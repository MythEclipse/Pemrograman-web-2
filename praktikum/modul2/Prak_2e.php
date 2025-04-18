<?php 
function fungsi_1($angka){ 
$angka = 300; 
return $angka; 
} 
 
function fungsi_2($angka){ 
return $angka; 
} 
 
$angka = 200; 
echo "Angka (variabel lokal) = ".fungsi_1($angka); 
echo "<br>Angka (variabel eksternal) = 
".fungsi_2($angka); 
?> 