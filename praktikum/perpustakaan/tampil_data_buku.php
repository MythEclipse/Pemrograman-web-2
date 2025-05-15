<?php

extract($_GET);

if ($menu == "edit_buku") {

    $id = isset($id) ? (int)$id : 0;
    $q = "SELECT * FROM buku WHERE kode_buku = $id";
    $r = mysqli_query($db, $q) or die(mysqli_error($db));
    $data = mysqli_fetch_array($r);
    if (!isset($data['kode_buku'])) {
        $data['kode_buku'] = null;
    }
} elseif ($menu == "tampil_buku") {

    $q = "SELECT * FROM buku";

    $r = mysqli_query($db, $q) or die(mysqli_error($db));
    $jml = mysqli_num_rows($r);
}
