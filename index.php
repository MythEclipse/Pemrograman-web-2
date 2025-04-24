<?php
// session_start();

// Proteksi login di semua halaman kecuali login
$publicRoutes = ['login'];
$route = $_GET['route'] ?? '';

// if (!in_array($route, $publicRoutes) && !isset($_SESSION['username'])) {
//     header("Location: login.php");
//     exit;
// }

$requestUri = trim($route, '/');

// Direktori
$pagesDir = __DIR__ . '/pages';
$tugas2Dir = "$pagesDir/tugas2";
$apiDir = __DIR__ . '/api';
$praktikumDir = __DIR__ . '/praktikum';

// Mapping alias: route => file di /pages/tugas2
$tugas2Routes = [
    'dashboard' => 'dashboard.php',
    'logout' => 'logout.php',
    // tambah di sini sesuai file yang ada
];

// Default ke home.php
if ($requestUri === '' || $requestUri === 'index.php') {
    $filePath = "$pagesDir/home.php";
} elseif (isset($tugas2Routes[$requestUri])) {
    // Jika route sesuai alias tugas2
    $filePath = "$tugas2Dir/{$tugas2Routes[$requestUri]}";
} elseif (file_exists("$pagesDir/$requestUri.php")) {
    // Jika file ada di pages/
    $filePath = "$pagesDir/$requestUri.php";
} elseif (file_exists("$apiDir/$requestUri.php")) {
    $filePath = "$apiDir/$requestUri.php";
} elseif (preg_match('/^praktikum\/modul\d+$/', $requestUri)) {
    $filePath = "$praktikumDir/$requestUri.php";
}

// Jalankan file jika ada
if (isset($filePath) && file_exists($filePath)) {
    include $filePath;
} else {
    http_response_code(404);
    echo "<h1>404 Not Found</h1><p>Halaman tidak ditemukan.</p>";
}
