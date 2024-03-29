<?php
require "lib/fonctions.php";
isLogged();

$sth = $connexion->prepare("
    SELECT id, email, commentaire, DATE_FORMAT(dt_creation, '%d/%m/%Y') AS `dt_creation`
    FROM contacts
");
$sth->execute();
$resultat = $sth->fetchAll();
?>

<h1>Gestion des contacts</h1>
<section class="row">
    <div class="col-3">
        <?php require "lib/menu-privee.php" ?>
    </div>
    <div class="col">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>email</th>
                    <th>commentaire</th>
                    <th>date création</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php foreach($resultat as $contact) : ?>
                <tr>
                    <!-- htmlentities() fonction de sécurité pour éviter les injections de code -->
                    <td><?php echo htmlentities($contact["id"]) ?></td>
                    <td><?php echo htmlentities($contact["email"]) ?></td>
                    <td><?php echo htmlentities($contact["commentaire"]) ?></td>
                    <td><?php echo htmlentities($contact["dt_creation"]) ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>
                            