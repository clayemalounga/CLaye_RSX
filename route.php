<?php
// commencons par definir la route qui mene sur la page d'accueil 
$route->map("GET","/RESEAU/", function(){
    require_once "./view/accueil.php";
});

// Creons une autre route pour la connexion 
$route->map("GET","/RESEAU/se-connecter.html", function(){
    require_once "./view/register/connexion.php";
});

// Creons une route pour l'inscription
$route->map("GET","/RESEAU/nous-inscrire.html", function(){
    require_once("./view/register/inscription.php");
});

//Route pour le traitement du formulaire

$route->map("POST","/RESEAU/traitement-de-inscription.html", function(){
    require_once("./controleur/register/inscription.php");
});

// Route pour le traitement de la connexion

$route->map("POST","/RESEAU/traitement-de-connexion.html", function(){
    require_once("./controleur/register/connexion.php");
});

// Creons une route pour le mot de passe oublier

$route->map("GET","/RESEAU/mot-de-passe-rechercher.html",function(){
    require_once "./view/register/password.php";
});

// Crreons la route qui redirige vers le traitement de la page mot de passe oublier.

$route->map("POST","/RESEAU/traitement-password.html",function(){
    require_once("./controleur/register/passowrd.php");
});
// Creons une route qui affiche le compte de l'utilisateur
$route->map("GET","/RESEAU/mon-compte.html", function(){
    require_once "./view/compte.php";
});
/// Creons la route pour mettre le poste dans la base de donnee
$route->map("POST","/RESEAU/nous-postons.html", function(){
    require_once "./controleur/poste/poste.php";
});

//Creons la route pour la deconnexion
$route->map("GET","/RESEAU/se-deconnecter.html", function(){
    require_once "./controleur/register/deconnexion.php";
});
$id=1;
// Creons une route pour le commentaire 
$route->map("POST","/RESEAU/commenter.html", function(){
    require_once "./controleur/commentaire/comentaire.php";
});

//Creons la route pour le like
$route->map("POST","/RESEAU/like.html", function(){
    require_once "./controleur/like/like.php";
});

//Creons la route pour la modification de l'utilisateur.
$route->map("GET","/RESEAU/compte-modif.html",function(){
    require_once "./view/compte_modif.php";
});

// Creons la route qui permet de modifier les informations de l'utilisateur
$route->map("POST","/RESEAU/traitement-compte-modif",function(){
    require_once "./controleur/register/modif_compte.php";
});