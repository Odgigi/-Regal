<?php
$sth = $connexion->prepare('
SELECT * FROM recettes WHERE id = :id');
$sth->execute(["id" => "recette"]);
$recette = $sth->fetch();
?>
<?php if($recette) :?>
<h1><?php echo $recette["nom"] ?></h1>
<div>
    <?php echo $recette["preparation"] ?>
</div>
<div>
    <?php echo $recette["prix"] . "€uros"?>
</div>
<div>
    <?php echo $recette["categorie"] ?>
</div>
<div>
    <?php echo $recette["image"] ?>
</div>
<div>
    <?php echo $recette["auteur"] ?>
</div>
<div>
    <?php echo $recette["dt_creation"] ?>
</div>
<?php endif ?>