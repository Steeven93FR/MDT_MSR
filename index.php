<?php

declare(strict_types=1);

require_once __DIR__ . '/auth.php';

start_session();

if (!empty($_SESSION['user'])) {
    header('Location: /dashboard.php');
    exit;
}

$error = $_GET['error'] ?? '';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MDT Shelby - Connexion</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body class="login-page">
    <div class="login-card">
        <div class="login-header">
            <span class="logo">MDT Shelby</span>
            <p>Accès sécurisé aux opérations FiveM</p>
        </div>
        <?php if ($error): ?>
            <div class="alert">Identifiants invalides. Réessayez.</div>
        <?php endif; ?>
        <form class="login-form" method="post" action="/login.php">
            <label>
                Identifiant
                <input type="text" name="username" required autocomplete="username">
            </label>
            <label>
                Mot de passe
                <input type="password" name="password" required autocomplete="current-password">
            </label>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>
