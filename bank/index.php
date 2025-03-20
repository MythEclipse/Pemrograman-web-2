<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulasi Bank</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .balance {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .message {
            padding: 10px;
            margin: 10px 0;
            background-color: #f0f0f0;
            border-left: 5px solid #333;
            display: none;
        }
    </style>
</head>
<body>
    <h1>Simulasi Bank</h1>
    
    <div class="balance">
        Saldo Anda: Rp. <span id="balanceAmount">0</span>
    </div>
    
    <div class="message" id="message"></div>
    
    <form id="transactionForm">
        <div class="form-group">
            <label for="transactionType">Jenis Transaksi:</label>
            <select id="transactionType" name="transactionType" required>
                <option value="0">Setor Uang</option>
                <option value="1">Ambil Uang</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="amount">Jumlah (Rp):</label>
            <input type="number" id="amount" name="amount" min="1" required>
        </div>
        
        <button type="submit">Proses Transaksi</button>
    </form>
    
    <div style="margin-top: 20px">
        <small>* Saldo minimum yang harus tersisa adalah Rp. 5.000</small>
    </div>

    <script>
        function loadBalance() {
            fetch('api.php')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('balanceAmount').textContent = 
                        data.balance.toLocaleString('id-ID');
                });
        }

        document.getElementById('transactionForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            fetch('api.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('message').textContent = data.message;
                document.getElementById('message').style.display = 'block';
                document.getElementById('balanceAmount').textContent = 
                    data.balance.toLocaleString('id-ID');
                document.getElementById('amount').value = '';
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });

        loadBalance();
    </script>
</body>
</html>
