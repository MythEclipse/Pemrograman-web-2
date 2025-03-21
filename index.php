<?php

$requestUri = isset($_GET['route']) ? trim($_GET['route'], '/') : '';

$pagesDir = __DIR__ . '/pages';
$apiDir = __DIR__ . '/api';

if ($requestUri === '' || $requestUri === 'index.php') {
    $filePath = "$pagesDir/home.php";
} else {
    $filePath = "$pagesDir/$requestUri.php";
    $apiPath = "$apiDir/$requestUri.php";
}

if (file_exists($filePath)) {
    include $filePath;
} elseif (file_exists($apiPath)) {
    include $apiPath;
} else {
    http_response_code(404);
    echo "<h1>404 Not Found</h1><p>Halaman tidak ditemukan.</p>";
}
