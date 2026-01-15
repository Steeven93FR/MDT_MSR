# MDT Shelby (FiveM)

Ce projet fournit une base de site MDT (Mobile Data Terminal) pour un serveur FiveM.

## Installation rapide

1. Configurez un serveur PHP (Apache/Nginx) pointant vers ce dossier.
2. Assurez-vous que PHP dispose de l'extension `pdo_mysql`.
3. Créez la table `users` dans votre base :

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(60) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    first_name VARCHAR(80) NOT NULL,
    last_name VARCHAR(80) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

4. Insérez un utilisateur avec un mot de passe hashé :

```php
<?php
echo password_hash('monMotDePasse', PASSWORD_DEFAULT);
```

5. Lancez le site et connectez-vous avec vos identifiants.

## Personnalisation

- Modifiez `assets/style.css` pour adapter le thème.
- Ajoutez vos pages MDT dans le menu de gauche (Rapports, Casier, etc.).

## Sécurité

- Les sessions PHP protègent les pages internes.
- Pensez à remplacer les identifiants de base dans `config.php` si besoin.
