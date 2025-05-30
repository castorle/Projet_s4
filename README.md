# PROJET PLANTES

Application web de gestion de plantes et de leur entretien, développée avec Symfony (backend) et Vue.js (frontend SPA).

## Objectifs pédagogiques


- Utiliser un framework PHP (Symfony) pour la partie principale du site.
- Utiliser un framework JS (Vue.js) pour une partie dynamique du site.
- Respecter les bonnes pratiques d’éco-conception web (RGAA, RGESN).

## Cahier des charges :
### Symfony :
- Au moins 4 entités avec relations justifiées.
- Gestion de l’upload de fichiers (images de plantes).
- Gestion de dates affichées en français (ex : lundi 24 mars 2025).
- Mise en place d’une API pour Vue.js (ex : /api/plants).

### Vue.js :
- Utilisation de plusieurs composants.
- Utilisation du routeur Vue Router.
- Utilisation du store Pinia pour l’état global.
- Consommation de l’API Symfony pour afficher dynamiquement des données.

### Fonctionnalités
- Gestion des utilisateurs (authentification, rôles, profils)
- Gestion complète des plantes (CRUD, upload d’images)
- Catégorisation des plantes
- Journal d’entretien pour chaque plante (dates localisées)
- Interface multilingue (fr, en, es, de, it)
- Navigation hybride Symfony/Vue.js

## Prérequis
- PHP 8.2+
- Composer
- Symfony CLI
- MySQL/MariaDB
- Node.js & npm

## Installation
Cloner le dépôt : 
```bash
git clone https://github.com/castorle/Projet_s4.git cd Projet_s4
```

Installer les dépendances PHP : 
```bash
composer install
```

Configurer l’environnement : (fichier .env.local) 
```bash
DATABASE_URL="mysql://[USER]:[PASSWORD]@127.0.0.1:3306/[DATABASE_NAME]"
```

Installer les dépendances JS :
```bash
npm install
```

Compiler les assets :
```bash
npm run dev (ou pour la prod : npm run build)
```

Créer la base de données :
```bash
php bin/console doctrine:database:create php bin/console doctrine:migrations:migrate
```

Lancer le serveur :
```bash
symfony local:server:start
```

## Utilisation
- Accéder à l’application : http://localhost:8000
- Créer un compte utilisateur
- Gérer vos plantes et leur entretien

## Structure du projet

config/ - Configuration Symfony migrations/ - Migrations de base de données public/ - Fichiers publics (index.php, assets compilés) src/ - Code source PHP (contrôleurs, entités, services) templates/ - Templates Twig (Symfony) assets/ - Frontend Vue.js (SPA, composants, store, router) translations/ - Fichiers de traduction YAML

## Entités principales

#### PLANT
- id (int)
- name (string)
- scientificName (string)
- image (string, upload)
- wateringNeeds (string)
- category (relation)
- maintenanceLogs (relation)

#### MAINTENANCELOG
- id (int)
- title (string)
- content (text)
- createdAt (datetime, affiché en français)
- plant (relation)
- user (relation)

#### USER
- id (int)
- email (string)
- username (string)
- password (string)
- roles (array)
- plants (relation)

#### CATEGORY
- id (int)
- name (string)
- description (text)
- plants (relation)

## API Symfony

- Exemple d’endpoint : /api/plants (liste des plantes au format JSON)
Utilisé par Vue.js pour afficher dynamiquement les données
Frontend Vue.js


- Plusieurs composants (ex : Header, Footer, Home, PlantList, etc.)
- Utilisation de Vue Router pour la navigation SPA
- Utilisation de Pinia pour l’état global (utilisateur, année universitaire, etc.)
- Consommation de l’API Symfony
- Éco-conception du projet

# Audit d’éco-conception du projet

## Audit d’accessibilité (RGAA)

- **Balises sémantiques** :  
  Les composants Vue utilisent bien des balises sémantiques comme `<header>`, `<nav>`, `<section>`, ce qui structure correctement l’interface (voir `Header.vue`, `PlantCard.vue`).
- **Attributs alt pour les images** :  
  Toutes les images de plantes affichées dans les composants (ex : `PlantCard.vue`) possèdent un attribut `alt` dynamique et pertinent basé sur le nom scientifique.
- **Navigation clavier** :  
  La navigation principale utilise `<router-link>` et `<a>`, accessibles au clavier. Les liens sont atteignables et utilisables sans souris.
- **Formulaires accessibles** :  
  Les formulaires (création de compte, ajout de plante, etc.) utilisent des `<label>` associés à chaque champ et des messages d’erreur explicites.

## Audit d’éco-conception (RGESN)

- **Optimisation des images** :  
  Les images uploadées sont redimensionnées côté serveur (Symfony) et compressées en JPEG/WebP. La taille moyenne des images reste inférieure à 200 Ko.
- **Minification CSS/JS** :  
  La commande `npm run build` minifie automatiquement les fichiers JS/CSS via Vite/Webpack. Les bundles générés sont inférieurs à 300 Ko.
- **Utilisation de CDN** :  
  En production, les bibliothèques externes (Vue, axios) sont chargées via CDN dans le template principal pour alléger le serveur.
- **Regroupement des fichiers** :  
  Les assets JS/CSS sont regroupés et versionnés automatiquement lors du build, évitant les inclusions multiples.
- **Mise en cache** :  
  Les ressources statiques (images, JS, CSS) sont servies avec des headers `Cache-Control` configurés dans Symfony/public.

**Points d’amélioration** :  
- Ajouter des tests d’accessibilité automatisés (Lighthouse, axe).  
- Documenter les bonnes pratiques dans le projet.  
- Surveiller le poids total des pages (<1 Mo recommandé).  
- Prévoir un mode sombre pour le confort visuel.