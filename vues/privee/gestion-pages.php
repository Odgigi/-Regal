<?php
require "lib/functions.php";
isLogged();
$sth = $connexion->prepare('SELECT id, titre, contenu, DATE_FORMAT(dt_creation, "%d/%m/%Y") AS `dt_creation` FROM pages');
$sth->execute();
$resultat = $sth->fetchAll();
?>
<h1>Gestion des pages du site</h1>
<section class="row">
    <div class="col-3">
        <?php require "lib/menu-privee.php"; ?>
    </div>
    <div class="col">
        <div class="text-end mb-3">
            <a href="<?php echo WWW ?>?page=pages&partie=privee&action=add" class="btn btn-primary mb-3">Ajouter une nouvelle page</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>titre</th>
                        <th>contenu</th>
                        <th>date création</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($resultat as $page) : ?>
                <tr>
                    <!-- htmlentities() fonction de sécurité pour éviter les injections de code -->
                    <td><?php echo htmlentities($page["id"]) ?></td>
                    <td><?php echo htmlentities($page["titre"]) ?></td>
                    <td><?php echo htmlentities($page["contenu"]) ?></td>
                    <td><?php echo htmlentities($page["dt_creation"]) ?></td>
                    <td>
                        <a href="<?php echo WWW ?>?page=pages&partie=privee&action=update&id= <?php echo htmlentities($page["id"]) ?>" class="btn btn-warning me-2">modifier</a>
                        <a href="<?php echo WWW ?>?page=pages&partie=privee&action=delete&id= <?php echo htmlentities($page["id"]) ?>" class="btn btn-danger" onclick="return confirm('Etes-vous sûr.e de vouloir supprimer cette page ?')">supprimer</a>
                    </td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>