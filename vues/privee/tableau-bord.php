<?php
// vérifier que la personne qui accède à cette page est bien connectée
require "lib/fonctions.php";
isLogged();
?>
<h1>Tableau de bord</h1>

<section class="row">
    <div class="col-3">
        <?php require "lib/menu-privee.php"; ?>
    </div>
    <div class="col">
        <h2>Bienvenue dans l'espace de gestion de votre site</h2> 
    </div>
</section>