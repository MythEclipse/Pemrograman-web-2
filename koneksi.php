<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "db_perpus";

$konek = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_error()) {
    trigger_error("Koneksi Database gagal: " . mysqli_connect_error(), E_USER_ERROR);
} 
?>
