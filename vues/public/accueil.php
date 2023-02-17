<section class="hero">
    <h1>Bienvenue sur Ô Regal !</h1>
    <a class="btn" href="">Tout sur nous</a>
</section>

<div class="row">
<h2>Nos recettes à la une...</h2>
<?php foreach($recettes as $recette) :?>
    <article class="col-3">
        <h2><?php echo $recette["nom"] ?></h2>
            <img src="<?php echo $recette["img"] ?>" alt="" class="img-fluid">
        <div class="row">
            <span><?php echo $recette["prix"] ?></span>
            <span><?php echo $recette["categorie"] ?></span>
            <span class="ms-auto"><?php echo $recette["auteur"] ?></span>
            <span><?php echo $recette["dt_creation"] ?></span>
        </div>
        <p><?php echo $recette["preparation"] ?></p>
    </article>
<?php endforeach ?>
</div>

