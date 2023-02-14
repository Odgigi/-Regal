<?php
session_start();
require "base-de-donnees.php";
require "const.php";
$erreurs = [];

// si un des deux champs est vide => ajouter une erreur
if(empty($_POST["login"]) || empty($_POST["password"])){
    array_push($erreurs, "Veuillez compléter ces deux champs");
}

// recherche dans la table users une ligne dans laquelle le login saisi dans le formulaire = email et password saisi hashé = password
$sth = $connexion->prepare('SELECT * FROM users WHERE email = :login AND password = MD5(:password)');
$sth->execute($_POST).
$user = $sth->fetch(); // si j'ai trouvé => tableau // si je n'ai pas trouvé empty

if(empty($user)){
    array_push($erreurs, "les identifiants sont invalides");
}

$_SESSION["form"] = $_POST; // permet de retourner les valeurs dans le formulaire

if(count($erreurs) === 0){
    $_SESSION["form"] = [];
    $_SESSION["user"] = $user;
    header("Location: " . WWW . "?page=accueil&partie=privee");
} else {
    $_SESSION["message"] = [
        "alert" => "danger",
        "info" => $erreurs
    ];
    header("Location: " . WWW . "?page=login");
}
exit;