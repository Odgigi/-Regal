<?php
session_start();
$erreurs = [];
require "base-de-donnees.php";
require "const.php";
require "fonctions.php";
isLogged();

if(empty($_POST["nom"]) || empty($_POST["preparation"]) || empty($_POST["prix"]) || empty($_POST["categorie"]) || empty($_POST["image"]) || empty($_POST["auteur"])){
    array_push($erreurs, "Veuillez remplir tous les champs");
}

$champs = ["nom", "auteur"];
foreach($champs as $c){
    if(strlen($_POST[$c]) <= 4 || strlen($_POST[$c]) >= 255){
    array_push($erreurs, "Le champ {$c} doit contenir entre 5 et 255 caractères.");
    }
}

if(strlen($_POST["categorie"]) < 4 || strlen($_POST["categorie"]) > 7){
    array_push($erreurs, "Le champ catégorie doit contenir entre 4 et 7 caractères.");
}
if(strlen($_POST["preparation"]) <= 4 || strlen($_POST["preparation"]) > 65000){
    array_push($erreurs, "Le champ preparation ne doit pas contenir plus de 65 000 caractères.");
}

if(intval($_POST["prix"]) > 65_000){
    array_push($erreurs, "Le champ prix doit être inférieur à 65 000.");
}

if(!filter_var($_POST["image"], FILTER_VALIDATE_URL) ){
    array_push($erreurs, "L'url de l'image n'est pas valide.");
}

// traitements
$_SESSION["form"] = $_POST;

if(count($erreurs) === 0){
    $_SESSION["form"] = [];
    // si le formulaire ne contient pas déjà une id
    if(!isset($_POST["id"])){
      
        $sth = $connexion->prepare('
        INSERT INTO recettes
        (nom, preparation, prix, categorie, image, auteur, dt_creation)
        VALUES
        (:nom, :preparation, :prix, :categorie, :image, :auteur, NOW()) ');
        $sth->execute($_POST);
        $_SESSION["message"] = [
            "alert" => "success",
            "info" => "La recette a été insérée en base de données."
        ];
    } else {
    $sth = $connexion->prepare('
    UPDATE recettes SET nom = :nom, preparation = :preparation, prix = :prix, categorie = :categorie, image = :image, auteur = :auteur WHERE id = :id');
    $sth->execute($_POST);
    $_SESSION["message"] = [
        "alert" => "success",
        "info" => "La recette a été mise à jour en base de données."
    ];
    }
} else {
    $_SESSION["message"] = [
        "alert" => "danger",
        "info" => $erreurs
    ];
    
}
header("Location: " . WWW . "?page=recettes&partie=privee");
exit;