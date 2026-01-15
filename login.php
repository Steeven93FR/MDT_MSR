<?php

declare(strict_types=1);

require_once __DIR__ . '/auth.php';

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if ($username === '' || $password === '') {
    header('Location: /index.php?error=1');
    exit;
}

if (!attempt_login($username, $password)) {
    header('Location: /index.php?error=1');
    exit;
}

header('Location: /dashboard.php');
exit;
