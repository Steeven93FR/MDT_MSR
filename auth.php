<?php

declare(strict_types=1);

require_once __DIR__ . '/db.php';

function start_session(): void
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
}

function attempt_login(string $username, string $password): bool
{
    start_session();

    $pdo = get_db_connection();
    $statement = $pdo->prepare(
        'SELECT id, username, password_hash, first_name, last_name FROM users WHERE username = :username LIMIT 1'
    );
    $statement->execute(['username' => $username]);
    $user = $statement->fetch();

    if (!$user || !password_verify($password, $user['password_hash'])) {
        return false;
    }

    $_SESSION['user'] = [
        'id' => (int) $user['id'],
        'username' => $user['username'],
        'first_name' => $user['first_name'],
        'last_name' => $user['last_name'],
    ];

    return true;
}

function require_login(): void
{
    start_session();

    if (empty($_SESSION['user'])) {
        header('Location: /index.php');
        exit;
    }
}

function current_user(): ?array
{
    start_session();

    return $_SESSION['user'] ?? null;
}

function logout(): void
{
    start_session();

    $_SESSION = [];
    session_destroy();
}
