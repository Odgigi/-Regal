<?php
require "lib/fonctions.php";
isLogged();

$sth = $connexion->prepare('SELECT id, nom, preparation, prix, categorie, image AS `image`, auteur, DATE_FORMAT(dt_creation, "%d/%m/%Y") AS `dt_creation` FROM recettes');
$sth->execute();
$resultat = $sth->fetchAll();
?>
<h1>Gestion des recettes du site</h1>
<section class="row">
    <div class="col-3">
        <?php require "lib/menu-privee.php"; ?>
    </div>
    <div class="col">
        <div class="text-end mb-3">
            <a href="<?php echo WWW ?>?page=recettes&partie=privee&action=add" class="btn btn-primary mb-3">Ajouter une nouvelle recette</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>nom</th>
                        <th>preparation</th>
                        <th>prix</th>
                        <th>catégorie</th>
                        <th>image</th>
                        <th>auteur</th>
                        <th>date création</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($resultat as $recette) : ?>
                <tr>
                    <!-- htmlentities() fonction de sécurité pour éviter les injections de code -->
                    <td><?php echo htmlentities($recette["id"]) ?></td>
                    <td><?php echo htmlentities($recette["nom"]) ?></td>
                    <td><?php echo htmlentities($recette["preparation"]) ?></td>
                    <td><?php echo htmlentities($recette["prix"]) ?></td>
                    <td><?php echo htmlentities($recette["categorie"]) ?></td>
                    <td><img src="<?php echo htmlentities($recette["image"]) ?>" alt="" width="100"></td>
                    <td><?php echo htmlentities($recette["auteur"]) ?></td>
                    <td><?php echo htmlentities($recette["dt_creation"]) ?></td>
                    <td>
                        <a href="<?php echo WWW ?>?page=recettes&partie=privee&action=update&id= <?php echo htmlentities($recette["id"]) ?>" class="btn btn-warning me-2 mb-2">modifier</a>
                        <a href="<?php echo WWW ?>?page=recettes&partie=privee&action=delete&id= <?php echo htmlentities($recette["id"]) ?>" class="btn btn-danger mb-2" onclick="return confirm('Etes-vous sûr.e de vouloir supprimer cette recette ?')">supprimer</a>
                    </td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>