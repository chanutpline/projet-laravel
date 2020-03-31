## Installation du projet
=========================

Cloner le projet : git clone https://github.com/chanutpline/Projet-laravel.git
Se placer dans le répertoire du projet
Télécharger les dépendances de laravel : composer install
Créer un fichier database.sqlite dans le répertoire database du projet
Modifier le fichier .env : 
    Copie de .env.example dans .env : cp .env.example .env
    Création d'une clé : php artisan key:generate
    Modification du chemin d'accès à la database dans .env : remplacer laravel par le chemin daccès à la ligne DB_DATABASE=laravel
Création de la database et remplissage avec des données : php artisan migrate --seed
Lancer le serveur : php artisan serve
Cliquer le lien pour accéder au blog

## Fonctionnalités du TP2
=========================

## Page d'Accueil

_Page accessible avec l'url '/' ou en cliquant sur le lien 'Home' en haut à gauche des pages
_Il y a dessus trois liens cliquables vers les trois articles les plus récents présents dans la base de données

Test :
_Cliquer les trois liens pour s'assurer qu'ils sont bien cliquables
_Éventuellement se rendre dans la base de données pour s'assurer à l'aide de la colonne qui s'agit bien des plus récents

## Page Articles

_Page accessible avec l'url '/articles' ou en cliquant sur le lien 'Articles' en haut à gauche des pages
_Il y a dessus des liens cliquables vers tous les articles présents dans la base de données

Test :
_Cliquer des liens pour s'assurer qu'ils sont bien cliquables

## Page Contact

_Page accessible avec l'url '/contact' ou en cliquant sur le lien 'Articles' en haut à gauche des pages
_Il y a un formulaire permettant de renseigner son nom, son adresse mail et un message
_Quand le formulaire est validé si tous les champs sont remplis et si l'adresse mail a un format valide les informations sont enregistrées dans la base de données
_La vue de la page est alors modifiée, le formulaire disparaît et un message de confirmation apparaît
_En cas de validation du formulaire avec des données invalides le formulaire ré-apparaît avec les données envoyées et un message d'erreur en-dessous des champs posant problème

Test :
_Remplir le formulaire avec des données invalides ou en laissant des champs vides
_Remplir le formulaire avec des données valides et aller vérifier leur présence dans la base de données

## Fonctionnalités supplémentaires
==================================



