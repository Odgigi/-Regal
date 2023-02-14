<?php
$sth = $connexion->prepare('
SELECT * FROM pages WHERE slug = :slug');
$sth->execute(["slug" => "mentions-legales"]);
$mentions = $sth->fetch();
?>
<?php if($mentions) : ?>
<h1><?php echo $mentions["titre"] ?></h1>
<img src="<?php echo $mentions["image"] ?>" alt="" class="img-fluid">
<div>
    <?php echo $mentions["contenu"] ?>
</div>
<?php else : ?>
    <p class="mt-5">Veuillez créer la page dans le back-office avec le slug "mentions-legales"</p>
<?php endif ?>