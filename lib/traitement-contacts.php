<?php 
session_start();
require "base-de-donnees.php";
require "const.php";
require "fonctions.php";
isLogged();

$erreurs = [];
if(
    empty($_POST["email"]) || empty($_POST["commentaire"])
){
    array_push($erreurs, "Veuillez compléter ces 2 champs.");
}

// traitements 
$_SESSION["form"] = $_POST;

if(count($erreurs) === 0){
    $_SESSION["form"] = [];
    // si l'id n'existe pas déjà "dans" le formulaire
    if(!isset($_POST["id"])){ 
        // ajouter le profil en base de données 
        $sth = $connexion->prepare("
            INSERT INTO contacts 
            (email, commentaire, dt_creation)
            VALUES
            (:email, :commentaire, NOW())
        ");
        $sth->execute($_POST);
    } else {
        // UPDATE de tous les champs y compris le mot de passe 
        $sth = $connexion->prepare("
            UPDATE contacts SET email = :email, commentaire = :commentaire WHERE id = :id 
        ");
        $sth->execute($_POST);
    }
    header("Location: " . WWW . "?page=contacts&partie=privee");
}else{
    $_SESSION["message"] = [
        "alert" => "danger",
        "info" => $erreurs
    ];
    header("Location: " . WWW . "?page=contacts&partie=privee&action=add");
}
exit ;