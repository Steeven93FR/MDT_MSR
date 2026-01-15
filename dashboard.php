<?php

declare(strict_types=1);

require_once __DIR__ . '/auth.php';

require_login();

$user = current_user();
$fullName = trim(($user['first_name'] ?? '') . ' ' . ($user['last_name'] ?? ''));
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MDT Shelby - Tableau de bord</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body class="dashboard-page">
    <div class="dashboard">
        <aside class="sidebar">
            <div class="sidebar-header">
                <span class="logo">MDT Shelby</span>
                <span class="status">En service</span>
            </div>
            <nav class="nav">
                <a href="#" class="nav-item active">Tableau de bord</a>
                <a href="#" class="nav-item">Rapports</a>
                <a href="#" class="nav-item">Casier judiciaires</a>
                <a href="#" class="nav-item">Fiches civiles</a>
                <a href="#" class="nav-item">Véhicules</a>
                <a href="#" class="nav-item">Mandats</a>
                <a href="#" class="nav-item">Archives</a>
            </nav>
            <div class="sidebar-footer">
                <div class="user-card">
                    <div class="user-avatar">SF</div>
                    <div>
                        <p class="user-name"><?php echo htmlspecialchars($fullName ?: $user['username'] ?? 'Utilisateur'); ?></p>
                        <p class="user-role">Agent connecté</p>
                    </div>
                </div>
                <a class="logout" href="/logout.php">Se déconnecter</a>
            </div>
        </aside>
        <main class="content">
            <header class="content-header">
                <div>
                    <h1>Tableau de bord</h1>
                    <p>Bienvenue dans votre MDT. Accédez rapidement aux dossiers de votre service.</p>
                </div>
                <button class="primary">Nouvelle recherche</button>
            </header>
            <section class="cards">
                <div class="card">
                    <h3>Rapports récents</h3>
                    <p>Consultez les derniers rapports d'intervention.</p>
                    <button>Voir</button>
                </div>
                <div class="card">
                    <h3>Casier judiciaires</h3>
                    <p>Recherchez les antécédents des civils.</p>
                    <button>Accéder</button>
                </div>
                <div class="card">
                    <h3>Véhicules</h3>
                    <p>Liste des véhicules liés à vos enquêtes.</p>
                    <button>Ouvrir</button>
                </div>
            </section>
            <section class="activity">
                <h2>Activité en cours</h2>
                <ul>
                    <li>3 rapports en attente de validation.</li>
                    <li>2 mandats actifs.</li>
                    <li>1 enquête prioritaire.</li>
                </ul>
            </section>
        </main>
    </div>
    <script src="/assets/app.js"></script>
</body>
</html>
