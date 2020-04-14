# Projet Laravel
Bonjour,

Voici notre projet compte rendu Laravel.

#### Group
Pauline CHANUT,
Fatima NASSER

#### Requirements
* composer
* php 7.3

## Installation du projet
=========================

1) Cloner le projet : git clone https://github.com/chanutpline/Projet-laravel.git
2) Se placer dans le répertoire du projet
3) Télécharger les dépendances de laravel : composer install
4) Télécharger Socialite: composer require laravel/socialite
5) Créer un fichier database.sqlite dans le répertoire database du projet
6) Modifier le fichier .env : 
    * Copie de .env.example dans .env : cp .env.example .env
    * Création d'une clé : php artisan key:generate
    * Modification du chemin d'accès à la database dans .env : remplacer laravel par le chemin daccès à la ligne DB_DATABASE=laravel
    * Ajouter les Id client OAuth pour se connecter avec Google et Github (GITHUB_ID= , GITHUB_SECRET=, GOOGLE_ID=, GOOGLE_SECRET=). Pour cela rendez-vous sur les adresses suivantes: https://console.developers.google.com/ , https://github.com/settings/applications.
    * Les adresses utilisées pour le callback sont obtenues en copiant l'adresse de la page d'accueil du site et on y ajoutant /register/google/callback pour se connecter avec google et /register/github/callback pour se connecter avec github.
    * Copier ces adresses aux lignes: GOOGLE_URL et GITHUB_URL.
7) Création de la database et remplissage avec des données : php artisan migrate --seed
8) Lier les répertoires des images : php artisan storage:link
9) Lancer le serveur : php artisan serve
10) Cliquer le lien pour accéder au blog

## Tâches réalisées
#### Fonctionnalités du TP2
=========================

* [x] **Page d'Accueil**

* Page accessible avec l'url '/' ou en cliquant sur le lien 'Home' en haut à gauche des pages
* Il y a dessus trois liens cliquables vers les trois articles les plus récents présents dans la base de données

Test :
* Cliquer les trois liens pour s'assurer qu'ils sont bien cliquables
* Éventuellement se rendre dans la base de données pour s'assurer à l'aide de la colonne qui s'agit bien des plus récents

* [x] **Page Articles**

* Page accessible avec l'url '/articles' ou en cliquant sur le lien 'Articles' en haut à gauche des pages
* Il y a dessus des liens cliquables vers tous les articles présents dans la base de données

Test :
* Cliquer des liens pour s'assurer qu'ils sont bien cliquables

* [x] **Page Contact**

* Page accessible avec l'url '/contact' ou en cliquant sur le lien 'Articles' en haut à gauche des pages
* Il y a un formulaire permettant de renseigner son nom, son adresse mail et un message
* Quand le formulaire est validé si tous les champs sont remplis et si l'adresse mail a un format valide les informations sont enregistrées dans la base de données
* La vue de la page est alors modifiée, le formulaire disparaît et un message de confirmation apparaît
* En cas de validation du formulaire avec des données invalides le formulaire ré-apparaît avec les données envoyées et un message d'erreur en-dessous des champs posant problème

Test :
* Remplir le formulaire avec des données invalides ou en laissant des champs vides
* Remplir le formulaire avec des données valides et aller vérifier leur affichage sur la page Contact

#### Fonctionnalités supplémentaires
==================================
* [x] **1- Gestion des commentaires**

* Formulaire de rédaction d'un commentaire accessible après s'être identifié en cliquant sur login ou register en haut à droite
* Une fois connecté la fonctionnalité est disponible en cliquant sur un article, en bas du texte de l'article qui s'affiche
* Quand le formulaire est validé et que le champ est rempli la page de confirmation s'affiche
* Commentaires déjà rédigés tous lisibles en dessous du formulaire

Test:
* Essayer de valider le formulaire sans rien avoir écrit pour afficher un message d'erreur
* Valider le formulaire aprés l'avoir rempli, puis retourner à la page de l'article, le commentaire devrait apparaître

* [x] **2- CRUD des articles**

Create :
* S'identifier en cliquant sur login ou register en haut à droite
* Formulaire de rédaction d'un nouvel article avec l'url '/rediger' ou en cliquant sur le lien 'Nouvel Article' en haut à gauche des pages
* Quand le formulaire est validé si tous les champs sont remplis et si le nom de l'article est composé uniquement de lettres minuscules et majuscules et n'est pas déjà utilisé les informations sont enregistrées dans la base de données, sinon des messages d'erreurs apparaissent près des champs avec des valeurs invalides
* Redirection vers la page d'accueil

Test :
* Remplir le formulaire avec des données invalides ou en laissant des champs vides
* Remplir le formulaire avec des données valides et vérifier que l'article créé est bien le premier affiché sur la page d'accueil

Read :
* Voir Page Article

Update :
* S'identifier en cliquant sur login ou register en haut à droite
* Cliquer le lien d'un article
* Formulaire de modification accessible via le bouton modifier de la page de l'article
* Le formulaire pré-rempli avec les données de l'article peut être modifié et envoyé
* Quand le formulaire est validé si tous les champs sont remplis et si le nom de l'article est composé uniquement de lettres minuscules et majuscules et n'est pas déjà utilisé les informations sont enregistrées dans la base de données, sinon des messages d'erreurs apparaissent près des champs avec des valeurs invalides
* redirection vers la page d'accueil

Test :
* Remplir le formulaire avec des données invalides ou en laissant des champs vides
* Remplir le formulaire avec des données valides et vérifier que l'article a bien été modifié, soit en cliquant de nouveau sur l'article soit dans la base de données

Delete 
* S'identifier en cliquant sur login ou register en haut à droite
* Cliquer le lien d'un article
* Suppression via le bouton supprimer de la page de l'article
* Redirection vers la page d'accueil

Test :
* Cliquer sur le bouton supprimer d'un article
* Vérifier que l'article n'apparaît plus dans la page Articles

* [x] **5- Ajout de fichiers médias pour les articles**

* Possibilité d'ajouter une ou plusieurs images dans le formulaire servant créer de nouveaux articles (onglet "Nouvel Article", url '/rediger', disponible quand on est identifié)
* Les images sont stockées dans le répertoire public/storage/images et leur lien avec leur article est stocké dans la table 'images' de la base de données
* Quand on article avec des images est ouvert les images apparaissent dans un slider
* Quand un article avec des images est supprimé les lignes le référençant dans la table 'images' sont supprimées et les images disparaissent du répertoire

Test :
* Créer un nouvel article dans l'onglet "Nouvel Article" puis le consulter (premier article qui apparaît sur la page d'accueil)
* Vérifier que les images sont bien placées dans le répertoire et que la table 'image' est bien mise à jour
* Supprimer l'article et vérifier que les images ont disparu du répertoire et que la tables 'images' ne contient plus de référence à ces images

* [x] **6- Identification avec Google et Github en utilisant Socialite**

* Page accessible avec l'url '/login' ou en cliquant sur le boutun 'login' en haut à droit des pages
* Il y a deux boutons, Login with Google, et Login with Github
* Il ne faut pas remplir le formulaire sur la page, mais seulement choisir de se connecter avec google ou github en cliquant sur le bouton correspondant
    * Lorsque vous cliquez sur le bouton Login with Google, une page s'affichera vous demandant de vous connecter avec votre compte google
* Lorsque vous choisissez un compte Google ou Github pour vous inscrire, les informations sont enregistrées dans la base de données
* La vue de la page est alors modifiée, le formulaire disparaît et vous serez redirigé vers la page d'acueil de notre site


Fonctionnement: 
* Cette fonctionnalité commence par rediriger l'utilisateur vers la page d'authentification Github / Google.
* Il obtient ensuite les informations utilisateur de la page Github / Google.
* Ensuite, il gère l'utilisateur lorsqu'il reçoit le rappel de Github / Google.
* Il vérifie si un utilisateur déjà existant possède cette adresse e-mail, si c'est le cas, il le connecte sans ajouter l'utilisateur à la base de données.
* Il vérifie également s'il existe un utilisateur déjà authentifié qui a le provider_id fourni par Github / Google, si c'est le cas, il le connecte sans ajouter l'utilisateur à la base de données.
* Il vérifie si l'utilisateur a un nom défini sur son compte (pas toujours le cas avec github) puis il renvoie ce nom, sinon il renverra le pseudo de son profil github.

Test:
* Essayez de se connecter deux fois avec l'un de deux moyen pour vérifier que la connection se fait toujours avec le même nom d'utilisateur.
* Si votre adresses email est la même pour google et github: 
    * Connectez vous avec le seconde moyen fourni pour vérifier que ce ne provoque pas d'erreur dans la base de données et que vous n'êtes pas ajouté en tant que nouvel utilisateur.

