<?php
extract($_GET);
if (isset($aksi))
{
    if($aksi == "edit")
    {
    include "input_buku.php";
    return;
    }
    else if($aksi == "delete")
    {
        include "koneksi.php";
        $q = "DELETE FROM buku WHERE kode_buku = $id";
        $r = mysqli_query($db, $q) or die(mysqli_error($db));
        if ($r)
        {
            echo "<h2>Data Buku Berhasil Dihapus</h2>";
        }
        else
        {
            echo "<h2>Data Buku Gagal Dihapus</h2>";
        }
    }
}
