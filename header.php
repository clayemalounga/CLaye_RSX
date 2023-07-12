<?php
session_start();
require_once './config/constante.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= isset($title) && !empty($title) ? $title . " | " . TITRESITE : TITRESITE ?>
    </title>
    <link rel="shortcut icon" href="./dossierImage/imagefavicon.jpg" type="image/jpg">
    <meta name="description"
        content="<?= isset($description_p) && !empty($description_p) ? $description_p : DESCRIPTION; ?>">
    <meta name="keywords" content="quelques, mots, cles, separés, avec, des, virgules">
    <meta name="author" content="Auteur de la page">
    <link rel="stylesheet" href="./style/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style/icons-1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./style/style.css">
    <script src="./style/bootstrap/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="./style/scriptjs/script1.js" async></script>
    
</head>
<body>
    <header class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
            <a href="<?= ROUTPATH ?>" class="navbar-brand" title="Afficher la page d'accueil">
                <?= TITRESITE; ?>
            </a>
            <button title="Afficher menu" class="navbar-toggler" aria-controls="offcanvasNavbar"
                data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" type="button">
                <i class="navbar-toggler-icon">
                </i>
            </button>
            <nav class="nav offcanvas offcanvas-end " id="offcanvasNavbar">
                <div class="offcanvas-header bg-warning">
                    <h5 class="offcanvas-title">
                        <a href="<?= ROUTPATH ?>" tittle="Afficher la page d'accueil" class="navbar-brand text-dark">
                            <?= TITRESITE; ?>
                        </a>

                    </h5>
                    <button class="btn-close" title="Fermer" type="button" aria-label="Fermer"
                        data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body bg-light">
                    <ul class="navbar-nav nav-pills" role="tablist">
                        <li class="nav-item text-dark" role="presentation">
                            <a href="<?= ROUTPATH ?>" aria-controls="nav-home" id="nav-home-tab"
                                class="nav-link text-dark" role="tab" title="Afficher la page d'accueil"
                                area-selected="true">
                                <i class="bi-house-fill"></i>
                                Accueil
                            </a>
                        </li>
                        <li class="nav-item " role="presentation">
                            <a href="<?= ROUTPATH."commenter.html"?>" class="nav-link text-dark" role="tab" title="Afficher la page de presentation"
                                area-controls="nav-presentation" id="nav-presentation-tab" area-selected="false">
                                <i class="bi-list"></i>
                                A propos
                            </a>
                        </li>

                        <form class="mx-5" role="search" action="#" method="get"
                            style="margin-right: 3em; width: 320px">
                            <div class="input-group">
                                <input type="search" name="search" id="recherche" aria-label="search"
                                    placeholder="Rechercher" class="form-control" title="Tapez le mot ou l'expression"
                                    aria-describedby="button-addon2">
                                <button type="submit" name="recherche" id="button-addon2"
                                    class="btn btn-outline-primary" autofocus title="Chercher">
                                    <i class="bi-search text-dark"></i>
                                </button>
                            </div>
                        </form>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-dark" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Mon compte
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                if (isset($_SESSION['auth']) or isset($_SESSION['idu'])){
                                    ?>
                                    <li class="nav-item visually-hidden">
                                        <a href="<?= ROUTPATH . "se-connecter.html" ?>" class="nav-link text-dark" role="tab"
                                            title="Se connecter" aria-selected="false"
                                            area-controls="nav-connexion">Connexion</a>
                                    </li>
                                    <?php
                                }else{
                                    ?>
                                    <li class="nav-item">
                                        <a href="<?= ROUTPATH . "se-connecter.html" ?>" class="nav-link text-dark" role="tab"
                                        title="Se connecter" aria-selected="false"
                                        area-controls="nav-connexion">Connexion</a>

                                    </li>
                                    <hr class="dropdown-divider">
                                    <?php
                                }
                                ?>
                                <li class="nav-item">
                                    <a href="<?= ROUTPATH . "se-deconnecter.html" ?>" class="nav-link text-dark"
                                        role="tab" title="Se connecter" aria-selected="false"
                                        area-controls="nav-deconnexion">Deconnexion</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>