<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "perpustakaan";

$db = @mysqli_connect($host, $user, $password, $database) or die("Connection Error : " . mysqli_connect_error()); @mysqli_select_db($db, $database) or die("Database Error : " . mysqli_error($db));
?>
