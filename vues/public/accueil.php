<section class="hero">
    <h1>Bienvenue sur Ô Regal !</h1>
    <a class="btn" href="">Tout sur nous</a>
</section>

<div class="row my-3">
<h2 class="text-center">Nos recettes à la une...</h2>
<?php foreach($recettes as $recette) :?>
    <article class="col mt-2">
        <h3><?php echo $recette["nom"] ?></h3>
            <img src="<?php echo $recette["image"] ?>" alt="" class="img-fluid">
        <div class="row p-2">
            <span><?php echo "Prix: " . $recette["prix"] . "€uros"?></span>
            <span><?php echo "Categorie: " . $recette["categorie"]?></span>
            <span><?php echo "Auteur: " . $recette["auteur"]?></span>
            <span><?php echo "Date de création: " . $recette["dt_creation"]?></span>
        </div>
        <p><?php echo $recette["preparation"] ?></p>
    </article>
<?php endforeach ?>
</div>

