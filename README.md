# PROJET PLANTES 🌱

## Description

Une application web développée avec Symfony pour la gestion de plantes et leur entretien. Cette application permet aux utilisateurs de gérer leur collection de plantes, de suivre leur entretien et de se renseigner sur les plantes.

## Objectifs

* Gestion des utilisateurs (authentification, profils)
* Gestion complète des plantes (CRUD)
* Journal d'entretien des plantes
* Interface multilingue
* Base de données relationnelle
* Dates en format localisé
* Upload d'images pour les plantes
* Système de catégorisation
* Gestion des rôles utilisateurs


## Fonctionnalités

* Gestion complète des plantes (ajout, modification, suppression)
* Catégorisation des plantes
* Journal d'entretien pour chaque plante
* Système d'authentification utilisateur
* Interface disponible en plusieurs langues

## Prérequis

* PHP 8.2 ou supérieur
* Composer
* Symfony CLI
* MySQL/MariaDB
* Node.js et npm (pour les assets)

## Installation

1. Cloner le dépôt :
```
   git clone https://github.com/castorle/Projet_s4.git
   cd Projet_s4
```

2. Installer les dépendances :
```
   composer install
```

3. Configurer le fichier .env.local :
```
   DATABASE_URL="mysql://[USER]:[PASSWORD]@127.0.0.1:3306/[DATABASE_NAME]"
```

4. Créer la base de données :
```
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
```

5. Lancer le serveur de développement :
```
   symfony local:server:start
```

## Utilisation

1. Accédez à l'application via : http://localhost:8000
2. Créez un compte utilisateur
3. Renseignez vous sur vos plantes et suivez leur entretien

## Structure du Projet

- config/         - Configuration Symfony
- migrations/     - Migrations de base de données
- public/         - Fichiers publics
- src/           - Code source
- templates/     - Templates Twig
- translations/  - Fichiers de traduction

## Entités

#### 🪴 Plant
- `id` (int)
- `name` (string)
- `scientificName` (string)
- `image` (string)
- `wateringNeeds` (string)
- `category` (relation)
- `maintenanceLogs` (relation)

#### 📝 MaintenanceLog
- `id` (int)
- `title` (string)
- `content` (text)
- `createdAt` (datetime)
- `plant` (relation)
- `user` (relation)

#### 👤 User
- `id` (int)
- `email` (string)
- `username` (string)
- `password` (string)
- `roles` (array)
- `plants` (relation)

#### 🗂️ Category
- `id` (int)
- `name` (string)
- `description` (text)
- `plants` (relation)

## 👥 Auteur

Ewan Leclercq

## 🎓 Contexte

Projet réalisé dans le cadre de l'année universitaire 2024-2025 - L2
