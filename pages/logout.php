<?php
session_start();
session_destroy();

// Hapus cookie
setcookie('username', '', time() - 3600, '/');
setcookie('password', '', time() - 3600, '/');

header("Location: /Tugas2");
exit;
