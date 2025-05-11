<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">DATA MAHASISWA</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-success text-center">
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "tampil_data_mahasiswa.php";
                    while ($data = mysqli_fetch_array($r)) {
                        echo "<tr>
                                <td>{$data['nim']}</td>
                                <td>{$data['nama']}</td>
                                <td>{$data['jurusan']}</td>
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
