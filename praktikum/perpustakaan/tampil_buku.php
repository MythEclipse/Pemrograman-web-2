<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">DATA BUKU</h2>
        <div class="table-responsive">
            <?php
            include "aksi_buku.php";
            ?>
            <table class="table table-bordered table-striped">
                <thead class="table-success text-center">
                    <tr>
                        <th>Kode Buku</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "tampil_data_buku.php";
                    while ($data = mysqli_fetch_array($r)) {
                        echo "<tr>
                                <td>{$data['kode_buku']}</td>
                                <td>{$data['judul_buku']}</td>
                                <td>{$data['pengarang']}</td>
                                <td>{$data['penerbit']}</td>
                               <td><a href=Prak_4b.php?menu=edit_buku&aksi=edit&id=$data[kode_buku]>EDIT</a></td> 
                               <td><a href=Prak_4b.php?menu=hapus_buku&aksi=delete&id=$data[kode_buku]>HAPUS</a></td>
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>