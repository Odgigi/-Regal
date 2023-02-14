<?php
// se connecter à la base de données
// et la variable $connexion va être partagée entre pls fichiers
try{$connexion = new PDO ("mysql:host=localhost;dbname=projet;charset=utf8mb4","root", "");
} catch(Exception $e){
    echo "Impossible de se connecter à la base de données";
    var_dump($e);
    exit;
}