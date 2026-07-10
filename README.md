# LinkUp

LinkUp est une plateforme de réseau social professionnel inspirée de LinkedIn. Les utilisateurs peuvent publier du contenu, interagir avec les publications et développer leur réseau professionnel.

## Fonctionnalités

### Authentification
- Inscription
- Connexion
- Déconnexion

### Gestion des publications
- Créer une publication
- Modifier sa publication
- Supprimer sa publication
- Consulter le fil d'actualité

### Interactions
- Ajouter un commentaire
- Supprimer son commentaire
- Aimer / Retirer un Like

### Profil
- Consulter le profil public d'un utilisateur
- Modifier son profil
- Mettre à jour la photo, le titre professionnel et l'entreprise

### Réseau
- Follow / Unfollow
- Affichage du nombre de Followers
- Affichage du nombre de Following

## Technologies utilisées

- Laravel 12
- PHP 8.2
- MySQL
- Blade
- HTML
- CSS

## Installation

```bash
git clone <repository-url>
cd LinkUp
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

## Auteur

Sara Fasraoui
