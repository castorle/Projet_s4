# PROJET PLANTES

L’application « Jardin Enchanté » est une plateforme web de gestion de plantes et de leur entretien, développée avec Symfony (backend) et Vue.js (frontend SPA). Elle permet la gestion des utilisateurs, des plantes (CRUD, upload d’images), la catégorisation, un journal d’entretien, et propose une interface multilingue (fr, en, es, de, it).

## Structure du projet

- config/ - Configuration Symfony 
- migrations/ - Migrations de base de données 
- public/ - Fichiers publics (index.php, assets compilés) 
- src/ - Code source PHP (contrôleurs, entités, services) 
- templates/ - Templates Twig (Symfony) 
- assets/ - Frontend Vue.js (SPA, composants, store, router) 
- translations/ - Fichiers de traduction YAML

## Entités

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

## Outils et méthodologie utilisés
- **Symfony** : Framework PHP pour le backend, avec API RESTful.
- **Vue.js** : Framework JavaScript pour le frontend, avec Vue Router et Pinia.
- **Twig** : Moteur de templates pour le rendu côté serveur.
- **MySQL** : Base de données relationnelle pour stocker les données des plantes, utilisateurs, etc.
- **Composer** : Gestionnaire de dépendances PHP.
- **npm** : Gestionnaire de paquets JavaScript pour les dépendances frontend.
- **Vite/Webpack** : Outil de build pour compiler et minifier les assets JS/CSS.
- **Encore webpack** : Pour la gestion des assets Symfony.

## Extensions et bibliothèques utilisées
- **Symfony Flex** : Pour simplifier la configuration et l’installation des bundles.
  ```bash
  composer require symfony/flex
  ```
- **Doctrine ORM** : Pour la gestion des entités et des migrations de base de données.
  ```bash
  composer require symfony/orm-pack
  ```
- **Twig Extensions** : Pour des fonctionnalités avancées dans les templates (filtrage, formatage).
    ```bash
    composer require symfony/twig-pack
    ```
- **symfony/translation** : Pour la gestion des traductions côté serveur.
  ```bash
  composer require symfony/translation
  ```
- **Vue Router** : Pour la navigation dans l’application Vue.js.
  ```bash
  npm install vue-router
  ```
- **Pinia** : Pour la gestion de l’état global dans Vue.js.
    ```bash
    npm install pinia
    ```
- **Axios** : Pour les requêtes HTTP vers l’API Symfony.
  ```bash
  npm install axios
  ```
- **i18n** : Pour la gestion de l’internationalisation (traductions) dans Vue.js.
  ```bash
  npm install vue-i18n
  ```


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
npm run dev
```

ou pour la prod :
```bash
npm run build
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

## Présentation des résultats obtenus
### Fonctionnalités réalisées :
- Gestion des utilisateurs (inscription, connexion, rôles)
- Gestion des plantes (CRUD, upload d’images, affichage par carte)
- Catégorisation des plantes
- Journal d’entretien lié à chaque plante
- Interface multilingue (fr, en, es, de, it)

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