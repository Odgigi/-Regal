<?php
session_start();
require "base-de-donnees.php";
require "const.php";
$erreurs = [];

// PREMIERE CONNEXION
// uniquement pour le formulaire d'Ajout => login
if(empty($_POST["password"]) && !isset($_POST["id"])){
    array_push($erreurs, "Veuillez compléter le mot de passe.");
}
if((strlen($_POST["password"]) <= 4 || strlen($_POST["password"]) > 255) && !isset($_POST["id"])){
    array_push($erreurs , "Le mot de passe doit contenir entre 5 et 255 caractères.");
}
if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    array_push($erreurs, "L'email n'est pas valide.");
}
// autre test => il ne faut pas qu'il y ait 2 utilisateurs qui disposent du même email 
$sth = $connexion->prepare("SELECT * FROM users WHERE email = :email");
$sth->execute(["email" => $_POST["email"]]);
$resultat = $sth->fetch();

if(!empty($resultat) && $_POST["id"] != $resultat["id"]){
    array_push($erreurs , "il existe déjà un profil avec cet email");
}

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
    header("Location: " . WWW . "?page=users&partie=privee");
}else{
    $_SESSION["message"] = [
        "alert" => "danger",
        "info" => $erreurs
    ];
    header("Location: " . WWW . "?page=users&partie=privee&action=add");
}
exit ;

// CONNEXIONS ULTERIEURES
if(empty($_POST["email"]) || empty($_POST["password"])){
    array_push($erreurs, "Veuillez compléter ces deux champs");
}
// recherche dans la table users une ligne dans laquelle le login saisi dans le formulaire = email et password saisi hashé = password
$sth = $connexion->prepare('SELECT * FROM users WHERE email = :email AND password = MD5(:password)');
$sth->execute($_POST).
$user = $sth->fetch(); // si j'ai trouvé => tableau
// si je n'ai pas trouvé => empty

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