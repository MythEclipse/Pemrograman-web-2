<?php
session_start();

if (!isset($_SESSION['balance'])) {
    $_SESSION['balance'] = 10000;
}

$minimumBalance = 5000;
$depositCode = 0;
$withdrawalCode = 1;

header('Content-Type: application/json');

$response = ['message' => '', 'balance' => $_SESSION['balance']];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    http_response_code(200);
    echo json_encode(['balance' => $_SESSION['balance']]);
    exit;
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $transactionType = isset($_POST['transactionType']) ? (int)$_POST['transactionType'] : -1;
    $amount = isset($_POST['amount']) ? (float)$_POST['amount'] : 0;

    if ($amount <= 0) {
        $response['message'] = "Jumlah harus lebih dari 0";
        $response['balance'] = $_SESSION['balance'];
    } else {
        if ($transactionType === $depositCode) {
            $_SESSION['balance'] += $amount;
            $response['code'] = $depositCode;
            $response['message'] = "Berhasil menyetor Rp. " . $amount . " - Saldo: Rp. " . $_SESSION['balance'];
            $response['balance'] = $_SESSION['balance'];
        } else if ($transactionType === $withdrawalCode) {
            if (($_SESSION['balance'] - $amount) < $minimumBalance) {
                $response['message'] = "Gagal mengambil uang. Saldo minimum harus Rp. " . $minimumBalance . " - Saldo saat ini: Rp. " . $_SESSION['balance'];
            } else {
                $_SESSION['balance'] -= $amount;
                $response['code'] = $withdrawalCode;
                $response['message'] = "Berhasil mengambil Rp. " . $amount . " - Saldo: Rp. " . $_SESSION['balance'];
                $response['balance'] = $_SESSION['balance'];
            }
        } else {
            $response['message'] = "Kode transaksi tidak valid";
            $response['balance'] = $_SESSION['balance'];
        }
    }
    
    echo json_encode($response);
    exit;
}
