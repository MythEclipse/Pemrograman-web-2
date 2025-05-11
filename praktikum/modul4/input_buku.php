<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INPUT DATA BUKU</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Input Data Buku</h2>
        <form action="Prak_4b.php?menu=simpan_buku" method="post" name="form1">
            <div class="mb-3">
                <label for="kode_buku" class="form-label">Kode Buku</label>
                <input type="text" class="form-control" id="kode_buku" name="kode_buku" maxlength="10" required>
            </div>
            <div class="mb-3">
                <label for="judul_buku" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="judul_buku" name="judul_buku" maxlength="30" required>
            </div>
            <div class="mb-3">
                <label for="pengarang" class="form-label">Pengarang</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang" maxlength="20" required>
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" maxlength="20" required>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary" name="submit" value="SIMPAN" >Simpan</button>
                <button type="reset" class="btn btn-secondary" name="reset" >Batal</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>