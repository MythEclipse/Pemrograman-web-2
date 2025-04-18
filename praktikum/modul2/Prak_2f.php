<?php 
   extract($_POST); 
 
   function tampilAlert($pesan){ 
   echo"<script>alert('Pesan : $pesan'); 
        window.history.go(-1);</script>"; 
   } 
 
   function kuadrat($bilangan){ 
   $kuadrat = pow($bilangan,2); 
   echo "<script> alert('hasil $bilangan kuadrat = 
$kuadrat');  
         window.history.go(-1); </script>"; 
   return 1; 
   } 
 
if (isset($submit)) {
   switch($submit){ 
      case "Tampilkan" : tampilAlert($pesan); break; 
      case "Kuadrat"   : print (kuadrat($bilangan)); break; 
   }
}
?> 
 
<HTML> 
<HEAD> 
<TITLE> Latihan FUNGSI </TITLE> 
</HEAD> 
<BODY> 
<FORM METHOD=POST ACTION="prak_2f.php"> 
 
   Tuliskan Pesan Anda <INPUT TYPE="text" NAME="pesan">  
   <INPUT TYPE="submit" name="submit" 
value="Tampilkan"> 
   <BR><HR> 
   Tuliskan Bilangan <INPUT TYPE="text" NAME="bilangan" 
size=3>  
   <INPUT TYPE="submit" name="submit" value="Kuadrat"> 
 
</FORM> 
</BODY> 
</HTML>