<?php 
$kalimat="Saya belajar PHP"; 
$kata=explode(" ",$kalimat); 
$jumlahArray = count($kata); 
 
for ($i=0; $i<$jumlahArray; $i++){ 
echo "Kata[$i] = $kata[$i] <BR>"; 
} 
 
$gabung = implode(" ",$kata); 
echo "<BR> Hasil Penggabungan = $gabung"; 
?> 



