# Projet 2PHP

## Objectif

Réaliser un projet complet en Symfony 7.1 et PHP 8.2 minimum, en groupe de 3 personnes maximum.

Ce projet devra inclure diverses fonctionnalités, une gestion correcte de la base de données avec Doctrine, et être versionné via Git en suivant le workflow Git.

Ce devoir mettra à l'épreuve vos compétences dans :
- la gestion d'entités
- la sécurité
- la gestion des rôles
- l'upload de fichiers
- la mise en place de tests unitaires


## Exigences du Projet

### Technologies Requises

- Framework : Symfony 7.1  
- PHP : Version 8.2 minimum  
- Base de données : Utilisation de Doctrine ORM  
- Gestion des emails : Utilisation de Mailtrap pour éviter d'envoyer des emails en production  
- Gestion de versions : Projet versionné sur GitHub en respectant le Git Workflow  
  (branches feature, develop, main/master)


## Fonctionnalités Obligatoires

### Doctrine et Base de Données

- Créer des entités pour gérer la base de données.
- Mettre en place des CRUD pour manipuler ces entités  
  (ajout, modification, suppression, affichage).
- Configurer les migrations pour gérer les modifications de la structure de la base de données.
- Utiliser des fixtures pour insérer des données initiales dans la base de données.


### Système de Connexion Utilisateur

- Mettre en place l'enregistrement des utilisateurs avec Symfony.
- Gérer la connexion, la déconnexion, l'oubli de mot de passe, et l'option  
  "se souvenir de moi".
- Gestion des rôles avec au minimum ROLE_USER et ROLE_ADMIN.
- Implémenter des restrictions sur certaines URL, uniquement accessibles  
  par les administrateurs (par exemple, gestion des utilisateurs, ajout de produits).


### Gestion des Emails

- Envoyer des emails de validation de compte, de récupération de mot de passe,  
  et de notifications.
- Utiliser Mailtrap.io pour les tests d'envoi d'emails.


### Upload et Téléchargement de Fichiers

- Permettre l'upload de fichiers par les utilisateurs  
  (par exemple, upload de photos de profil, de fichiers liés à un produit, etc.).
- Gérer le téléchargement sécurisé de ces fichiers  
  (certaines ressources ne doivent être accessibles qu'aux utilisateurs connectés).


### Tests Unitaires

- Mettre en place des tests unitaires pour valider les fonctionnalités  
  de l'application.
- Tester les services, les contrôleurs, et les entités de votre projet.


## Gestion de Projet avec Git

- Le projet doit être versionné sur GitHub, avec une utilisation correcte  
  du Git Workflow :
  - Branches feature pour chaque nouvelle fonctionnalité.
  - Branch develop pour intégrer les nouvelles fonctionnalités après leur validation.
  - Branch main ou master pour la version stable du projet.

- Chaque membre du groupe doit contribuer au projet via des pull requests  
  et effectuer des revues de code entre membres du groupe.

- Le projet doit inclure un fichier README.md détaillant les instructions  
  d'installation et d'exécution de l'application.


## Exemple de Projet Réalisable

Pour vous guider, voici un exemple précis de projet que vous pouvez réaliser :

### Site Type Reedit

Créer un site où les utilisateurs peuvent créer des posts et les commentés.  
Le site doit inclure les fonctionnalités suivantes :

- Les utilisateurs peuvent uploader des images ou fichier pour s'en servir  
  dans les commentaires. Ces fichiers sont eux aussi téléchargeables.

- Les utilisateurs auteurs d'un post ou d'un commentaire peuvent supprimer  
  son post ou son commentaire.

- Les administrateurs peuvent gérer les utilisateurs, supprimer des posts  
  ou des commentaires.

- Gestion des rôles :  
  Les utilisateurs peuvent chercher un sujet, post pour le trouver,  
  les admin les voient tous.

- Envoi d'un mail lors de l'inscription pour que l'utilisateur devienne  
  "confirmé" et puisse poster un post ou répondre à un commentaire.


## Livrables

À la fin de ce projet, vous devrez rendre :

- Le lien vers votre dépôt GitHub où le projet est versionné correctement.
- Le fichier README.md contenant les instructions d'installation et d'exécution.
- Un fichier .env de configuration avec l'intégration de la base de données,  
  de Mailtrap et d'autres services utilisés.


## Critères d'Évaluation

- Fonctionnalités :  
  L'ensemble des fonctionnalités obligatoires ont été correctement implémentées.

- Qualité du code :  
  Le code est propre, bien organisé, et respecte les bonnes pratiques de Symfony.

- Utilisation des tests :  
  Des tests unitaires sont présents et correctement configurés.

- Gestion de la base de données :  
  Les entités, migrations et fixtures sont bien mis en place.

- Gestion de Git :  
  Le projet est correctement versionné avec des commits clairs et fréquents,  
  et le workflow Git est respecté.

Architecture du projet : 

ReeditProject/
│
├─ bin/
│   └─ console
│
├─ config/
│   ├─ packages/
│   │   ├─ cache.yaml
│   │   ├─ framework.yaml
│   │   └─ routing.yaml
│   ├─ routes/
│   │   └─ framework.yaml
│   ├─ bundles.php
│   ├─ preload.php
│   ├─ reference.php
│   ├─ routes.yaml
│   └─ services.yaml
│
├─ public/
│   ├─ index.php
│   └─ app.css
│
├─ src/
│   ├─ Controller/
│   │   ├─ UserController.php
│   │   ├─ AuthController.php
│   │   ├─ PostController.php
│   │   └─ CommentController.php
│   │
│   ├─ Entity/
│   │   ├─ User.php
│   │   ├─ Post.php
│   │   ├─ Comment.php
│   │   ├─ File.php
│   │   ├─ Token.php
│   │   └─ Tag.php
│   │
│   ├─ Form/Type/
│   │   ├─ RegisterType.php
│   │   ├─ LoginType.php
│   │   ├─ PostType.php
│   │   ├─ CommentType.php
│   │   ├─ AdminUserType.php
│   │   └─ TagType.php
│   │
│   └─ Repository/
│       ├─ UserRepository.php
│       ├─ PostRepository.php
│       ├─ CommentRepository.php
│       └─ TagRepository.php
│
├─ templates/
│   ├─ base.html.twig          # Layout principal pour header/footer/navbar
│   ├─ User/
│   │   └─ userAdmin.html.twig
│   ├─ Site/
│   │   ├─ reception.html.twig
│   │   ├─ home.html.twig
│   │   ├─ post.html.twig
│   │   ├─ login.html.twig
│   │   ├─ register.html.twig
│   │   ├─ forgetPasswd.html.twig
│   │   └─ reinitPasswd.html.twig
│   │
│   ├─ Post/
│   │   ├─ create.html.twig
│   │   └─ modify.html.twig
│   │
│   ├─ Comment/
│   │   ├─ create.html.twig
│   │   └─ modify.html.twig
│   │
│   ├─ Tag/
│   │   └─ tagSearch.html.twig
│   │
│   └─ Widget/
│       ├─ header.html.twig
│       ├─ footer.html.twig
│       └─ navbar.html.twig
│
├─ var/
├─ vendor/
├─ docker-compose.yml
├─ .env
├─ .env.local
├─ composer.json
├─ composer.lock
└─ symfony.lock

