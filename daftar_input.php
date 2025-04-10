<!DOCTYPE html>
<html>
<head>
    <title>Form Input Anggota</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], select, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .message {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Input Anggota</h2>
        
        <div class="message success">Data anggota berhasil disimpan</div>
        <div class="message error">Error message here</div>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="kode_anggota">Kode Anggota:</label>
                <input type="number" id="kode_anggota" name="kode_anggota" required>
            </div>
            
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap:</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" required>
            </div>
            
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <input type="radio" id="laki_laki" name="jenis_kelamin" value="Laki-laki" required>
                <label for="laki_laki">Laki-laki</label>
                <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" required>
                <label for="perempuan">Perempuan</label>
            </div>
            
            <div class="form-group">
                <label for="no_telp">No. Telepon:</label>
                <input type="telp" id="no_telp" name="no_telp" required>
            </div>
            
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat" rows="3" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" id="status" name="status" required>
            </div>
            
            <div class="form-group">
                <select name="status" id="">
                    <option value="Mendaftar">Mendaftar</option>
                    <option value="Pinjam">Pinjam</option>
                    <option value="Tidak_Pinjam">Tidak Pinjam</option>
                </select>
            </div>
        </form>
        
        <h2>Data Anggota</h2>
        <table>
            <tr>
                <th>Kode Anggota</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Status</th>
            </tr>
            <tr>
                <td>Sample Kode</td>
                <td>Sample Nama</td>
                <td>Sample Gender</td>
                <td>Sample Phone</td>
                <td>Sample Address</td>
                <td>Sample Status</td>
            </tr>
        </table>
    </div>
</body>
</html>
