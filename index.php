<?php
$requestUri = isset($_GET['route']) ? trim($_GET['route'], '/') : '';

// Lakukan routing sesuai dengan nilai $requestUri
$pagesDir = __DIR__ . '/pages';
$apiDir = __DIR__ . '/api';
$praktikumDir = __DIR__ . '/praktikum';

if ($requestUri === '' || $requestUri === 'index.php') {
    $filePath = "$pagesDir/home.php";
} else {
    $filePath = "$pagesDir/$requestUri.php";
    $apiPath = "$apiDir/$requestUri.php";

    // Cek apakah URI mengarah ke folder praktikum
    if (preg_match('/^praktikum\/modul\d+$/', $requestUri)) {
        $filePath = "$praktikumDir/$requestUri.php";
    }
}

if (file_exists($filePath)) {
    include $filePath;
} elseif (isset($apiPath) && file_exists($apiPath)) {
    include $apiPath;
} else {
    http_response_code(404);
    echo "<h1>404 Not Found</h1><p>Halaman tidak ditemukan.</p>";
}
