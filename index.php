<?php

// Mendapatkan parameter 'route' dari query string, atau kosong jika tidak ada
$requestUri = isset($_GET['route']) ? trim($_GET['route'], '/') : '';

// Mendefinisikan direktori untuk halaman, API, dan praktikum
$pagesDir = __DIR__ . '/pages';
$apiDir = __DIR__ . '/api';
$praktikumDir = __DIR__ . '/praktikum';

// Menentukan path default untuk home.php jika tidak ada 'route'
if ($requestUri === '' || $requestUri === 'index.php') {
    $filePath = "$pagesDir/home.php";
} else {
    // Cek apakah URI mengarah ke file halaman
    $filePath = "$pagesDir/$requestUri.php";

    // Cek apakah URI mengarah ke API
    $apiPath = "$apiDir/$requestUri.php";

    // Cek apakah URI mengarah ke folder praktikum, misalnya 'praktikum/modul1'
    if (preg_match('/^praktikum\/modul\d+$/', $requestUri)) {
        $filePath = "$praktikumDir/$requestUri.php";
    }
}

// Memastikan file ada dan termasuk (include) file yang sesuai
if (file_exists($filePath)) {
    include $filePath;
} elseif (isset($apiPath) && file_exists($apiPath)) {
    include $apiPath;
} else {
    // Jika tidak ditemukan file yang sesuai, tampilkan error 404
    http_response_code(404);
    echo "<h1>404 Not Found</h1><p>Halaman tidak ditemukan.</p>";
}
