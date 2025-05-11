<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INPUT DATA BUKU</title>
</head>

<body>
    <form action="Prak_4b.php?menu=simpan_buku" method="post" name="form1">
        <PRE>
        Kode Buku : <input type="text" name="kode_buku" size="10" maxlength="10">
        Judul Buku : <input type="text" name="judul_buku" size="30" maxlength="30">
        Pengarang : <input type="text" name="pengarang" size="20" maxlength="20">
        Penerbit : <input type="text" name="penerbit" size="20" maxlength="20">
        <input type="submit" name="submit" value="SIMPAN">
        <input type="reset" name="reset" value="BATAL">
    </PRE>

    </form>
</body>

</html>