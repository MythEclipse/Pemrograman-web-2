<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulasi Bank Digital</title>
    <link rel="stylesheet" href="/style/bank.css">
</head>

<body>
    <div class="container">
        <h1>Bank Digital</h1>

        <div class="balance">
            <div>Saldo Anda</div>
            <div class="balance-amount">Rp <span id="balanceAmount">0</span></div>
        </div>

        <div class="message" id="message">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M12 16v-4m0-4h.01"></path>
            </svg>
            <span id="messageText"></span>
        </div>

        <form id="transactionForm">
            <div class="form-group">
                <label for="transactionType">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    Jenis Transaksi
                </label>
                <select id="transactionType" name="transactionType" required>
                    <option value="0">Setor Uang</option>
                    <option value="1">Ambil Uang</option>
                </select>
            </div>

            <div class="form-group">
                <label for="amount">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="1" x2="12" y2="23"></line>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                    Jumlah (Rp)
                </label>
                <input type="number" id="amount" name="amount" min="1" required>
            </div>

            <button type="submit">Proses Transaksi</button>
        </form>

        <div class="info-text">
            * Saldo minimum yang harus tersisa adalah Rp. 5.000
        </div>
    </div>

    <script>
        function muatSaldo() {
            fetch('/Tugas1API')
                .then(respons => respons.json())
                .then(data => {
                    document.getElementById('balanceAmount').textContent =
                        data.saldo.toLocaleString('id-ID');
                });
        }

        document.getElementById('transactionForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const dataFormulir = new FormData(this);
            const message = document.getElementById('message');
            const messageText = document.getElementById('messageText');

            fetch('/Tugas1API', {
                    method: 'POST',
                    body: dataFormulir
                })
                .then(respons => respons.json())
                .then(data => {
                    messageText.textContent = data.message;
                    message.className = `message ${data.success ? 'success' : 'error'} show`;
                    document.getElementById('balanceAmount').textContent =
                        data.saldo.toLocaleString('id-ID');
                    document.getElementById('amount').value = '';
                    
                    setTimeout(() => {
                        message.classList.remove('show');
                    }, 3000);
                })
                .catch(kesalahan => {
                    console.error('Kesalahan:', kesalahan);
                });
        });

        muatSaldo();
    </script>
</body>

</html>