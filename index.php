<?php
session_start();
require "lib/base-de-donnees.php";
require "lib/const.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <header class="bg-danger-lighter sticky-top">
        <nav class="navbar navbar-expand container navbar-light mb-3">
            <span class="navbar-brand fs-3">🍽️Régal</span>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?php echo WWW ?>" class="nav-link">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo WWW ?>?page=contact" class="nav-link">Contact</a></li>
            </ul>
            <ul class="navbar-nav ms-auto">
            <?php if(isset($_SESSION["user"])) :?>
                <li class="nav-item">
                    <a href="<?php echo WWW ?>?page=accueil&partie=privee"class="nav-link">Tableau-de-bord</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo WWW ?>?page=logout"class="nav-link">Déconnexion</a>
                </li>
                <?php else :?>
                <li class="nav-item">
                    <a href="<?php echo WWW ?>?page=login"class="nav-link">Connexion</a>
                </li>
                <?php endif ?>
            </ul>
        </nav>
    </header>
<!-- http://localhost/php-initiation/jour12/index.php -->
    <div class="container">
        <!-- partie public -->
        <?php if(empty($_GET)) : ?>
            <!-- page d'accueil -->
            <!-- mise à disposition de la variable $articles pour la page d'accueil uniquement -->
            <?php require "vues/public/accueil.php" ?>
        <?php elseif(!empty($_GET["page"]) && $_GET["page"] === "article") : ?>
            <!-- page article -->
            <?php require "vues/public/article.php" ?>
        <?php elseif(!empty($_GET["page"]) && $_GET["page"] === "contact") : ?>
            <!-- page de contact -->
            <?php require "vues/public/contact.php" ?>
        <?php elseif(!empty($_GET["page"]) && $_GET["page"] === "login") : ?>
            <!-- page login -->
            <?php require "vues/public/login.php" ?>
        <?php elseif(!empty($_GET["page"]) && $_GET["page"] === "mentions") : ?>
            <!-- page mentions -->
            <?php require "vues/public/mentions-legales.php" ?>
        <?php elseif(!empty($_GET["page"]) && $_GET["page"] === "logout") :?>
        <?php unset($_SESSION["user"]);
        $_SESSION["message"] = [
            "alert" => "success",
            "info" => "Vous avez été déconnecté.e avec succès."
        ];
        header("Location: ". WWW . "?page=login");
        exit; ?>
        <?php else : ?>
            <!-- page 404 -->
            <?php require "vues/404.php" ?>
        <?php endif ?>
    </div>

    <footer class="text-center position-absolute sticky-bottom">
        &copy; 2023 - <a href="http://localhost/php-initiation/blog/index.php?page=mentions">Mentions légales</a>
    </footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>