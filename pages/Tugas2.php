<?php
session_start();

$valid_username = 'admin';
$valid_password = 'admin123';

// Jika sudah login via session
if (isset($_SESSION['username'])) {
    header("Location: dashboard");
    exit;
}

// Jika belum login tapi ada cookie yang valid
if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    if ($_COOKIE['username'] === $valid_username && $_COOKIE['password'] === $valid_password) {
        $_SESSION['username'] = $_COOKIE['username'];
        header("Location: dashboard");
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username;

        if ($remember) {
            setcookie('username', $username, time() + (86400 * 7), '/');
            setcookie('password', $password, time() + (86400 * 7), '/');
        } else {
            setcookie('username', '', time() - 3600, '/');
            setcookie('password', '', time() - 3600, '/');
        }

        header("Location: /dashboard");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}

$saved_username = $_COOKIE['username'] ?? '';
$saved_password = $_COOKIE['password'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card p-4 shadow" style="min-width: 350px;">
        <h3 class="text-center mb-4">Login</h3>
        <?php if (isset($error)) : ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '<?= $error ?>'
                });
            </script>
        <?php endif; ?>
        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" value="<?= htmlspecialchars($saved_username) ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" value="<?= htmlspecialchars($saved_password) ?>" required>
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" name="remember" id="remember" class="form-check-input" <?= $saved_username ? 'checked' : '' ?>>
                <label for="remember" class="form-check-label">Ingat saya</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            Swal.fire({
                title: 'Login Info',
                html: `<b>Username:</b> <?= htmlspecialchars($valid_username) ?><br><b>Password:</b> <?= htmlspecialchars($valid_password) ?>`,
                icon: 'info',
                confirmButtonText: 'OK'
            });
        });
    </script>
</body>
</html>
