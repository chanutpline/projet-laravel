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
_Remplir le formulaire avec des données valides et aller vérifier leur affichage sur la page Contact

## Fonctionnalités supplémentaires
==================================
## 1- Gestion des commentaires

_Formulaire de rédaction d'un commentaire accessible en cliquant sur un article en bas du texte de l'article
_Quand le formulaire est validé et que le champ est rempli la page de confirmation s'affiche
_Commentaires déjà rédigés tous lisibles en dessous du formulaire

Test:
_Essayer de valider le formulaire sans rien avoir écrit pour afficher un message d'erreur
_Valider le formulaire aprés l'avoir rempli, puis retourner à la page de l'article, le commentaire devrait apparaître

## 2- CRUD des articles

Create :
_Formulaire de rédaction d'un nouvel article avec l'url '/rediger' ou en cliquant sur le lien 'Nouvel Article' en haut à gauche des pages
_Quand le formulaire est validé si tous les champs sont remplis et si le nom de l'article est composé uniquement de lettres minuscules et majuscules et n'est pas déjà utilisé les informations sont enregistrées dans la base de données, sinon des messages d'erreurs apparaissent près des champs avec des valeurs invalides
_Redirection vers la page d'accueil

Test :
_Remplir le formulaire avec des données invalides ou en laissant des champs vides
_Remplir le formulaire avec des données valides et vérifier que l'article créé est bien le premier affiché sur la page d'accueil

Read :
_Voir Page Article

Update :
_Cliquer le lien d'un article
_Formulaire de modification accessible via le bouton modifier de la page de l'article
_Le formulaire pré-rempli avec les données de l'article peut être modifié et envoyé
_Quand le formulaire est validé si tous les champs sont remplis et si le nom de l'article est composé uniquement de lettres minuscules et majuscules et n'est pas déjà utilisé les informations sont enregistrées dans la base de données, sinon des messages d'erreurs apparaissent près des champs avec des valeurs invalides
_redirection vers la page d'accueil

Test :
_Remplir le formulaire avec des données invalides ou en laissant des champs vides
_Remplir le formulaire avec des données valides et vérifier que l'article a bien été modifié, soit en cliquant de nouveau sur l'article soit dans la base de données

Delete :
_Cliquer le lien d'un article
_Suppression via le bouton supprimer de la page de l'article
_Redirection vers la page d'accueil

Test :
_Cliquer sur le bouton supprimer d'un article
_Vérifier que l'article n'apparaît plus dans la page Articles

