<?php 
session_start();
$erreurs = [];
require "base-de-donnee.php";
require "fonctions.php";
isLogged(); 

if(
    empty($_POST["nom"]) || 
    empty($_POST["email"])
){
    array_push($erreurs , "veuillez compléter les champs");
}

if( empty($_POST["password"]) && !isset($_POST["id"]) ){
    array_push($erreurs , "veuillez compléter le mot de passe");
}

if(strlen($_POST["nom"]) <= 4 || strlen($_POST["nom"]) >= 255){
    array_push($erreurs , "le champ nom doit contenir entre 4 et 255 lettres");
}

if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    array_push($erreurs , "l'email n'est pas conforme");
}

// le champ password doit contenir entre 4 et 255 caractères uniquement dans le formulaire d'Ajout 
if((strlen($_POST["password"]) <= 4 || strlen($_POST["password"]) >= 255) && !isset($_POST["id"])){
    array_push($erreurs , "le champ password doit contenir entre 4 et 255 lettres");
}

// autre test => il ne faut pas qu'il y ait 2 utilisateurs qui disposent du même email 
$sth = $connexion->prepare("SELECT * FROM users WHERE email = :email");
$sth->execute(["email" => $_POST["email"]]);
$resultat = $sth->fetch();


if(!empty($resultat) && $_POST["id"] != $resultat["id"]){
    array_push($erreurs , "il existe déjà un profil avec cet email");
}

// traitements 
$_SESSION["form"] = $_POST;

if(count($erreurs) === 0){
    $_SESSION["form"] = [];

    // si le formulaire ne contient pas de champ id 
    if(!isset($_POST["id"])){ 
        // ajouter le profil en base données 
        $sth = $connexion->prepare("
            INSERT INTO users 
            (nom, email, password, dt_creation)
            VALUES
            (:nom, :email, MD5(:password), NOW())
        ");
        // MD5() fonction de hashage de MySQL => permet de hasher le mot de passe dans la base 
        // ET la fonction ne dispose pas de fonction inverse 
        $sth->execute($_POST);
    }elseif(isset($_POST["id"]) && empty($_POST["password"])){
        // UPDATE de tous les champs sauf le mot de passe 
        unset($_POST["password"]);
        $sth = $connexion->prepare("
            UPDATE users SET nom = :nom , email = :email WHERE id = :id 
        ");
        $sth->execute($_POST);
    }else {
        // UPDATE de tous les champs y compris le mot de passe 
        $sth = $connexion->prepare("
            UPDATE users SET nom = :nom, 
                    email = :email, password = MD5(:password) WHERE id = :id 
        ");
        $sth->execute($_POST);
    }
    
    header("Location: " . WWW . "?page=user&partie=privee");
}else{
    $_SESSION["message"] = [
        "alert" => "danger",
        "info" => $erreurs
    ];
    header("Location: " . WWW . "?page=user&partie=privee&action=add");
}
exit ;