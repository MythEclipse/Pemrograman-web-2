<?php
session_start();

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $valid_user = 'admin';
    $valid_pass = 'admin123';

    if ($username === $valid_user && $password === $valid_pass) {
        $_SESSION['user'] = $username;
        setcookie('user', $username, time() + 3600, '/');
        header('Location: /praktikum/perpustakaan/Prak_4b.php');
        exit;
    } else {
        $error = 'Username atau password salah!';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .login-container {
            width: 300px; margin: 100px auto; padding: 20px;
            background: #fff; border-radius: 5px; box-shadow: 0 0 10px #ccc;
        }
        .error { color: red; margin-bottom: 10px; }
    </style>
</head>
<body>
<div class="login-container">
    <h2>Login</h2>
    <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="post" action="">
        <div>
            <label>Username:</label><br>
            <input type="text" name="username" required autofocus>
        </div>
        <div style="margin-top:10px;">
            <label>Password:</label><br>
            <input type="password" name="password" required>
        </div>
        <div style="margin-top:15px;">
            <button type="submit">Login</button>
        </div>
    </form>
</div>
</body>
</html>