<?php
session_start();
$erreurs = [];
require "base-de-donnees.php";
require "const.php";
// require "lib/fonctions.php";
// isLogged();

if(empty($_POST["titre"]) || empty($_POST["contenu"])){
    array_push($erreurs, "Veuillez remplir tous les champs");
}

// vérifier que titre contient entre 5 et 255 caractères
if(strlen($_POST["titre"]) <= 4 || strlen($_POST["titre"]) >= 255){
    array_push($erreurs, "Le champ titre doit contenir entre 5 et 255 caractères.");
}
 
if(strlen($_POST["contenu"]) <= 4 || strlen($_POST["contenu"]) >= 65000){
    array_push($erreurs, "Le champ contenu ne doit pas contenir plus de 65 000 caractères.");
}

// traitements
$_SESSION["form"] = $_POST;

if(count($erreurs) === 0){
    $_SESSION["form"] = [];
    // si le formulaire ne contient pas déjà une id
    if(!isset($_POST["id"])){
        $sth = $connexion->prepare('
        INSERT INTO pages
        (titre, contenu, dt_creation)
        VALUES
        (:titre, :contenu, NOW()) ');
        $sth->execute($_POST);
        $_SESSION["message"] = [
            "alert" => "success",
            "info" => "La page a été insérée en base de données."
        ];
    } else {
    $sth = $connexion->prepare('
    UPDATE pages SET titre = :titre, contenu = :contenu WHERE id = :id');
    $sth->execute($_POST);
    $_SESSION["message"] = [
        "alert" => "success",
        "info" => "La page a été mise à jour en base de données."
    ];
    
    }
} else {
    $_SESSION["message"] = [
        "alert" => "danger",
        "info" => $erreurs
    ];
    header("Location: " . WWW . "?page=pages&partie=privee");
}
exit;