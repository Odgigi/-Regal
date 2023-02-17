<?php
$sth = $connexion->prepare('
SELECT * FROM pages WHERE titre = :titre');
$sth->execute(["titre" => "Mentions légales"]);
$mentions = $sth->fetch();
?>
<?php if($mentions) : ?>
<h1><?php echo $mentions["titre"] ?></h1>
<div>
    <?php echo $mentions["contenu"] ?>
</div>
<?php else : ?>
    <p class="mt-5">Veuillez créer la page dans le back-office avec le slug "mentions-legales"</p>
<?php endif ?>