<?php

extract($_GET);

if ($menu == "edit_buku") {

    $q = "SELECT * FROM buku WHERE KD_BUKU = $id";
    $r = mysqli_query($db, $q) or die(mysqli_error($db));
    $data = mysqli_fetch_array($r);
} elseif ($menu == "tampil_buku") {

    $q = "SELECT * FROM buku";

    $r = mysqli_query($db, $q) or die(mysqli_error($db));
    $jml = mysqli_num_rows($r);
}
