<?php
session_start();

if (!isset($_SESSION['saldo'])) {
    $_SESSION['saldo'] = 10000;
}

$saldoMinimum = 5000;
$kodeSetor = 0;
$kodeAmbil = 1;

header('Content-Type: application/json');

$respons = ['message' => '', 'saldo' => $_SESSION['saldo'], 'success' => false];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    http_response_code(200);
    echo json_encode(['saldo' => $_SESSION['saldo']]);
    exit;
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jenisTransaksi = isset($_POST['transactionType']) ? (int)$_POST['transactionType'] : -1;
    $jumlah = isset($_POST['amount']) ? (float)$_POST['amount'] : 0;

    if ($jumlah <= 0) {
        $respons['message'] = "Jumlah harus lebih dari 0";
    } else {
        if ($jenisTransaksi === $kodeSetor) {
            $_SESSION['saldo'] += $jumlah;
            $respons['code'] = $kodeSetor;
            $respons['message'] = "Berhasil menyetor Rp. " . $jumlah . " - Saldo: Rp. " . $_SESSION['saldo'];
            $respons['success'] = true;
        } else if ($jenisTransaksi === $kodeAmbil) {
            if (($_SESSION['saldo'] - $jumlah) < $saldoMinimum) {
                $respons['message'] = "Gagal mengambil uang. Saldo minimum harus Rp. " . $saldoMinimum . " - Saldo saat ini: Rp. " . $_SESSION['saldo'];
            } else {
                $_SESSION['saldo'] -= $jumlah;
                $respons['code'] = $kodeAmbil;
                $respons['message'] = "Berhasil mengambil Rp. " . $jumlah . " - Saldo: Rp. " . $_SESSION['saldo'];
                $respons['success'] = true;
            }
        } else {
            $respons['message'] = "Kode transaksi tidak valid";
        }
    }

    $respons['saldo'] = $_SESSION['saldo'];
    echo json_encode($respons);
    exit;
}
