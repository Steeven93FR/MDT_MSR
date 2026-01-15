<?php

declare(strict_types=1);

function get_db_connection(): PDO
{
    static $pdo = null;

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $config = require __DIR__ . '/config.php';
    $db = $config['db'];

    $dsn = sprintf(
        'mysql:host=%s;port=%d;dbname=%s;charset=utf8mb4',
        $db['host'],
        $db['port'],
        $db['database']
    );

    $pdo = new PDO($dsn, $db['username'], $db['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    return $pdo;
}
