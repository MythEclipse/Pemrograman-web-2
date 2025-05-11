<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
</head>

<body>
    <form name="form1" method="post" action="">
        <h2>DATA BUKU</h2>
        <table width="50%" border="1">
            <tr bgcolor="#00FF00" align="center">
                <td><strong>Kode Buku</strong></td>
                <td><strong>Judul Buku</strong></td>
                <td><strong>Pengarang</strong></td>
                <td><strong>Penerbit</strong></td>
            </tr>
            <?php
            include "tampil_data_buku.php";
            while ($data = mysqli_fetch_array($r)) {
                echo "<tr>
                        <td>{$data['kode_buku']}</td>
                        <td>{$data['judul_buku']}</td>
                        <td>{$data['pengarang']}</td>
                        <td>{$data['penerbit']}</td>
                    </tr>";
            }
            ?>
        </table>
    </form>
</body>

</html>