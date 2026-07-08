# LinkUp

LinkUp est une application web développée avec Laravel 12 qui permet aux utilisateurs de partager des publications professionnelles, similaire à un mini réseau social.

---

## Fonctionnalités

- Inscription d'un nouvel utilisateur
- Connexion et déconnexion
- Authentification avec Laravel
- Création d'une publication
- Modification d'une publication
- Suppression d'une publication
- Fil d'actualité (Feed)
- Validation des formulaires avec Form Requests
- Protection des routes avec Middleware
- Gestion des autorisations avec Policies
- Interface simple et responsive

---

## Technologies utilisées

- Laravel 12
- PHP 8.2
- MySQL
- Blade
- HTML
- CSS

---

## Installation

### 1. Cloner le projet

```bash
git clone https://github.com/votre-compte/linkup.git
```

### 2. Accéder au dossier

```bash
cd linkup
```

### 3. Installer les dépendances

```bash
composer install
```

### 4. Copier le fichier d'environnement

```bash
cp .env.example .env
```

### 5. Générer la clé

```bash
php artisan key:generate
```

### 6. Configurer la base de données

Modifier le fichier `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=linkup
DB_USERNAME=root
DB_PASSWORD=
```

### 7. Exécuter les migrations

```bash
php artisan migrate
```

### 8. Lancer le serveur

```bash
php artisan serve
```

---

## Structure du projet

```
app/
│── Http/
│   ├── Controllers/
│   ├── Requests/
│── Models/
│── Policies/

resources/
│── views/
│   ├── auth/
│   ├── posts/
│   └── feed.blade.php

routes/
└── web.php
```

---

## Sécurité

Le projet utilise :

- Middleware `auth`
- Form Request (`StorePostRequest`)
- Laravel Policies (`PostPolicy`)
- Directive Blade `@can`

Un utilisateur ne peut modifier ou supprimer que ses propres publications.

---

