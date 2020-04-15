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
4) Créer un fichier database.sqlite dans le répertoire database du projet
5) Modifier le fichier .env : 
    * Copie de .env.example dans .env : cp .env.example .env
    * Création d'une clé : php artisan key:generate
    * Modification du chemin d'accès à la database dans .env : remplacer laravel par le chemin daccès à la ligne DB_DATABASE=laravel
6) Création de la database et remplissage avec des données : php artisan migrate --seed
7) Lier les répertoires des images : php artisan storage:link
8) Lancer le serveur : php artisan serve
9) Cliquer le lien pour accéder au blog

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
* Si l'utilisateur est connecté son nom et son adresse mail sont pré-remplis dans le formulaire, sinon il doit les saisir manuellement
* Quand le formulaire est validé si tous les champs sont remplis et si l'adresse mail a un format valide les informations sont enregistrées dans la base de données
* La vue de la page est alors modifiée, le formulaire disparaît et un message de confirmation apparaît
* En cas de validation du formulaire avec des données invalides le formulaire ré-apparaît avec les données envoyées et un message d'erreur en-dessous des champs posant problème

Test :
* Se rendre sur la page Contact sans être connecté
* Remplir le formulaire avec des données invalides ou en laissant des champs vides
* Remplir le formulaire avec des données valides et aller vérifier leur affichage sur la page Contact
* Se rendre sur la page Contact après s'être connecté pour vérifier que les champs nom et email sont déjà remplis automatiquement

#### Fonctionnalités supplémentaires
==================================
* [x] **1- Gestion des commentaires**

* Formulaire de rédaction d'un commentaire accessible après s'être identifié en cliquant sur login ou register en haut à droite
* Une fois connecté la fonctionnalité est disponible en cliquant sur un article, en bas du texte de l'article qui s'affiche
* Quand le formulaire est validé et que le champ est rempli la page de confirmation s'affiche, elle propose un lien permettant de retourner à l'article commenté
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
* Page de confirmation proposant un lien permettant de retourner vers l'article

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

* [x] **3- Identification/Authentification qui protège l'accès à l'administration**

Créer un compte :
* Possibilité de créer un compte utilisateur en cliquant sur le bouton 'Register' en haut à droite (url '/register')
* Formulaire demandant de renseigner un nom, une adresse mail et de saisir un mot de passe et de le confirmer
* Si tous les champs sont remplis et qu'ils sont corrects (email valide, mot de passe identique dans le champ de confirmation) le compte est créé, l'utilisateur connecté et redirigé vers une page de bienvenue
* Sinon il reste sur la même page et doit saisir ses informations de manière correcte
* A la place du bouton login un message de bienvenue avec son nom apparait et un bouton de déconnection apparait en-dessous
* Le bouton 'Log Out' permet de se déconnecter, dans ce cas l'utilisateur voit apparaître une page de confirmation lui disant au revoir

Se connecter :
* Si l'utilisateur possède déjà un compte il peut cliquer sur le bouton 'Login' en haut à droite (url '/login')
* Un formulaire apparaît lui demandant de saisir son adresse mail et son mot de passe
* Si les champs saisis sont corrects l'utilisateur est connecté et dirigé sur la page d'accueil, comme quand il s'est inscrit la première fois
* Sinon l'utilisateur reste sur la même page et doit saisir de nouveau ses informations

Test :
* Créer un compte en cliquant sur le bouton 'Register' pour vérifier que la connection fonctionne
* Se déconnecter en cliquant sur le bouton 'Log Out'
* Se connecter de nouveau en cliquant sur le bouton 'Log In'

* [x] **5- Ajout de fichiers médias pour les articles**

* Possibilité d'ajouter une ou plusieurs images dans le formulaire servant créer de nouveaux articles (onglet "Nouvel Article", url '/rediger', disponible quand on est identifié)
* Les images sont stockées dans le répertoire public/storage/images et leur lien avec leur article est stocké dans la table 'images' de la base de données
* Quand on article avec des images est ouvert les images apparaissent dans un slider
* Quand un article avec des images est supprimé les lignes le référençant dans la table 'images' sont supprimées et les images disparaissent du répertoire

Test :
* Créer un nouvel article dans l'onglet "Nouvel Article" puis le consulter (premier article qui apparaît sur la page d'accueil)
* Vérifier que les images sont bien placées dans le répertoire et que la table 'image' est bien mise à jour
* Supprimer l'article et vérifier que les images ont disparu du répertoire et que la tables 'images' ne contient plus de référence à ces images
=========================
## Tâches non réalisées
* [ ]
