<?php
session_start();

// Cek session atau cookie
if (!isset($_SESSION['username'])) {
    // Jika tidak ada session, cek cookie
    if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
        $valid_username = 'admin';
        $valid_password = 'admin123';

        if ($_COOKIE['username'] === $valid_username && $_COOKIE['password'] === $valid_password) {
            // Set session dari cookie
            $_SESSION['username'] = $_COOKIE['username'];
        } else {
            // Jika cookie tidak valid
            header("Location: /Tugas2");
            exit;
        }
    } else {
        // Tidak ada session dan cookie
        header("Location: /Tugas2");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card shadow p-4 text-center" style="min-width: 350px;">
        <h3 class="mb-3">Dashboard</h3>
        <p class="fs-5">Selamat datang, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></p>
        <a href="/logout" class="btn btn-danger mt-3">Logout</a>
    </div>
</body>
</html>
