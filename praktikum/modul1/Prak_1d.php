<?php 
$NA = 70; 
if($NA>=90)   
$HM ='A'; 
else if($NA>=70) 
$HM = 'B'; 
else if($NA>=60) 
$HM = 'C'; 
else if($NA>=50) 
$HM = 'D'; 
else if($NA<50) 
$HM = 'E'; 
echo "Nilai Anda = $NA<BR> 
Huruf Mutu = $HM";  
?> 