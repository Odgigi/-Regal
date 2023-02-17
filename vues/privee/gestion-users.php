<?php
require "lib/fonctions.php";
isLogged();


$sth = $connexion->prepare('SELECT id, nom, email, password AS `password`, DATE_FORMAT(dt_creation, "%d/%m/%Y") AS `dt_creation` FROM users');
$sth->execute();
$resultat = $sth->fetchAll();
// var_dump($resultat);
?>
<h1>Gestion des utilisateurs</h1>
<section class="row">
    <div class="col-3">
        <?php require "lib/menu-privee.php"; ?>
    </div>
    <div class="col">
        <div class="text-end mb-3">
            <a href="<?php echo WWW ?>?page=users&partie=privee&action=add" class="btn btn-primary">Ajouter un nouveau profil</a>
        
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>id</td>
                    <td>nom</td>
                    <td>email</td>
                    <td>password</td>
                    <td>date création</td>
                    <td>action</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($resultat as $user) : ?>
                <tr>
                    <!-- htmlentities() fonction de sécurité pour éviter les injections de code -->
                    <td><?php echo htmlentities($user["id"]) ?></td>
                    <td><?php echo htmlentities($user["nom"]) ?></td>
                    <td><?php echo htmlentities($user["email"]) ?></td>
                    <td><?php echo htmlentities($user["password"]) ?></td>
                    <td><?php echo htmlentities($user["dt_creation"]) ?></td>
                    
                    <td>
                        <a href="<?php echo WWW ?>?page=users&partie=privee&action=update&id= <?php echo htmlentities($user["id"]) ?>" class="btn btn-warning me-2">modifier</a>
                        <a href="<?php echo WWW ?>?page=users&partie=privee&action=delete&id= <?php echo htmlentities($user["id"]) ?>" class="btn btn-danger" onclick="return confirm('Etes-vous sûr.e de vouloir supprimer ce profil ?')">supprimer</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>