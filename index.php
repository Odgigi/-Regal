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
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <header class="sticky-top">
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
<!-- http://localhost/-Regal/index.php -->
    <div class="container">
        <!-- partie public -->
        <?php if(empty($_GET)) : ?>
            <!-- page accueil => toutes les recettes (on affiche 3 dernières)-->
            <?php 
            $sth = $connexion->prepare('SELECT * FROM recettes');
            $sth->execute();
            $recettes = $sth->fetchAll();
            ?>
            <?php require "vues/public/accueil.php" ?>
            <!-- page recette -->
        <?php elseif(!empty($_GET["page"]) && $_GET["page"] === "recette") : ?>
            <?php require "vues/public/recette.php" ?>
            <!-- page contact -->
        <?php elseif(!empty($_GET["page"]) && $_GET["page"] === "contact") : ?>
            <?php require "vues/public/contact.php" ?>
            <!-- page login -->
        <?php elseif(!empty($_GET["page"]) && $_GET["page"] === "login") : ?>
            <?php require "vues/public/login.php" ?>
            <!-- page mentions -->
        <?php elseif(!empty($_GET["page"]) && $_GET["page"] === "mentions") : ?>
            <?php require "vues/public/mentions-legales.php" ?>
            <!-- logout -->
        <?php elseif(!empty($_GET["page"]) && $_GET["page"] === "logout") :?>
        <?php unset($_SESSION["user"]);
        $_SESSION["message"] = [
            "alert" => "success",
            "info" => "Vous avez été déconnecté.e avec succès."
        ];
        header("Location: ". WWW . "?page=login");
        exit; ?>

        <!-- partie privee --> 
        <?php elseif(!empty($_GET["page"]) && !empty($_GET["partie"]) && $_GET["page"] === "accueil" && ($_GET["partie"]) === "privee") :?>
            <?php require "vues/privee/tableau-bord.php" ?>
            
        <?php elseif(!empty($_GET["page"]) && !empty($_GET["partie"]) && $_GET["page"] === "users" && ($_GET["partie"]) === "privee") :?>
            <?php if(!empty($_GET["action"]) && $_GET["action"] == "add") :?>
                <?php require "vues/privee/gestion-user-form.php" ?>
            
        <?php elseif(!empty($_GET["action"]) && $_GET["action"] == "delete") :?>

            <?php $sth = $connexion->prepare('
            DELETE FROM users WHERE id = :id');
            $sth->execute(["id" => $_GET["id"]]);
            header("Location: " . WWW . "?page=users&partie=privee");
            exit;
            ?>

        <?php elseif(!empty($_GET["action"]) && $_GET["action"] == "update") :?>
            <?php $sth = $connexion->prepare('
            SELECT * FROM users WHERE id= :id');
            $sth->execute(["id" => $_GET["id"]]);
            $user = $sth->fetch();
            // var_dump($user);
            ?>
            <?php require "vues/privee/gestion-user-form.php" ?>

            <?php else :?>
                <?php require "vues/privee/gestion-users.php" ?>
            <?php endif ?>

        <?php elseif(!empty($_GET["page"]) && !empty($_GET["partie"]) && $_GET["page"] === "pages" && ($_GET["partie"]) === "privee") :?>

            <!-- gérer le CRUD des pages ajout -->
        <?php if(!empty($_GET["action"]) && $_GET["action"] == "add") :?>
                <?php require "vues/privee/gestion-page-form.php" ?>
            <!-- suppression -->
        <?php elseif(!empty($_GET["action"]) && $_GET["action"] == "delete") :?>
            <?php $sth = $connexion->prepare('
            DELETE FROM pages WHERE id = :id');
            $sth->execute(["id" => $_GET["id"]]);
            header("Location: " . WWW . "?page=pages&partie=privee");
            exit;
            ?>
            <!-- modifier -->
        <?php elseif(!empty($_GET["action"]) && $_GET["action"] == "update") :?>
            <?php $sth = $connexion->prepare('
            SELECT * FROM pages WHERE id= :id');
            $sth->execute(["id" => $_GET["id"]]);
            $page = $sth->fetch();
            ?>
            <?php require "vues/privee/gestion-page-form.php" ?>
        <?php  else :?>
            <?php require "vues/privee/gestion-pages.php" ?>
        <?php endif ?>

        <?php elseif(!empty($_GET["page"]) && !empty($_GET["partie"]) && $_GET["page"] === "recettes" && ($_GET["partie"]) === "privee") :?>

            <!-- gérer le CRUD des recettes ajout -->
        <?php if(!empty($_GET["action"]) && $_GET["action"] == "add") :?>
                <?php require "vues/privee/gestion-recette-form.php" ?>
            <!-- suppression -->
        <?php elseif(!empty($_GET["action"]) && $_GET["action"] == "delete") :?>
            <?php $sth = $connexion->prepare('
            DELETE FROM recettes WHERE id = :id');
            $sth->execute(["id" => $_GET["id"]]);
            header("Location: " . WWW . "?page=recettes&partie=privee");
            exit;
            ?>
            <!-- modifier -->
        <?php elseif(!empty($_GET["action"]) && $_GET["action"] == "update") :?>
            <?php $sth = $connexion->prepare('
            SELECT * FROM recettes WHERE id= :id');
            $sth->execute(["id" => $_GET["id"]]);
            $page = $sth->fetch();
            ?>
            <?php require "vues/privee/gestion-recette-form.php" ?>
        <?php  else :?>
            <?php require "vues/privee/gestion-recettes.php" ?>
        <?php endif ?>

        <?php elseif(!empty($_GET["page"]) && !empty($_GET["partie"]) && $_GET["page"] === "contacts" && ($_GET["partie"]) === "privee") :?>
        
            <!-- gérer le CRUD des contacts ajout -->
        <?php if(!empty($_GET["action"]) && $_GET["action"] == "add") :?>
                <?php require "vues/privee/gestion-contacts.php" ?>
            <!-- suppression -->
        <?php elseif(!empty($_GET["action"]) && $_GET["action"] == "delete") :?>
            <?php $sth = $connexion->prepare('
            DELETE FROM contacts WHERE id = :id');
            $sth->execute(["id" => $_GET["id"]]);
            header("Location: " . WWW . "?page=contacts&partie=privee");
            exit;
            ?>
            <!-- modifier -->
        <?php elseif(!empty($_GET["action"]) && $_GET["action"] == "update") :?>
            <?php $sth = $connexion->prepare('
            SELECT * FROM contacts WHERE id= :id');
            $sth->execute(["id" => $_GET["id"]]);
            $page = $sth->fetch();
            ?>
            <?php require "vues/privee/gestion-contacts.php" ?>
        <?php endif ?>

        <?php else : ?>
            <!-- page 404 -->
            <?php require "vues/public/404.php" ?>
        <?php endif ?>
    </div>

    <footer class="text-center position-absolute sticky-bottom">
        &copy; 2023 - <a href="<?php echo WWW ?>?page=mentions" class="text-decoration-none">Mentions légales</a>
    </footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>