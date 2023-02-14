<?php 
function isLogged(){
    if(session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    if(!isset($_SESSION["user"])){
        header("Location: ". WWW . "?page=login");
        $_SESSION["message"] = [
            "alert" => "danger",
            "info"  => ["Veuillez vous identifier pour accéder à cette page."]
        ];
        exit ; 
    }
}