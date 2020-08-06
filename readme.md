Ceci est projet scolaire utilisant le framework Laravel (v.5.4)
## A propos de CourseApp

Course App est une application web permettant d'effectuer ses "courses-maisons". 
L'application dispose de deux principales fonctionnalités : la <b>gestion de course et la gestion de produits</b>. 
L'utilisateur simple peut créer, modifier ou supprimer une course. Tandis que l'administrateur peut gérer la liste de produits mais aussi la liste des courses de l'ensemble des utilisateurs.

## Installation et  utilisation du projet
## 1. Installation
Pour utiliser le projet il faut avoir préalablement PHP 7+ installé et **composer**

Allez dans un dossier de votre choix et tapez les commandes suivantes :
```
$ git clone https://github.com/amad1dia/course-app.git
$ cd course-app
$ composer update
$ php artisan serve
```
## 2. Modification à effectuer
Mettre à jour le fichier .env en changeant les bonnes informations de connexion à la base de données.
Si le fichier n'existe pas, tapez la commande :
```
$ cp .env.example .env
```
Et effectuer les modifications en 2.
Importer le fichier app_course.sql disponible à la racine du projet sur MySQL (Vous pouvez utilisez phpMyAdmin)


Vous pouvez avoir un apperçu du projet qui est hébergé sur heroku : 
http://course-appli.herokuapp.com


