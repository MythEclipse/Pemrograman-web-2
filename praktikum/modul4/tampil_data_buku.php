<?php
$q = "SELECT * FROM buku";
$r = mysqli_query($db, $q) or die(mysqli_error($db));
$jml = mysqli_num_rows($r);
?>