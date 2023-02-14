<?php
$titre = "Formulaire de contact";
echo "<h1>$titre</h1>";
?>
<!-- <h1>Nous contacter</h1> -->
<div class="container">
    <form action="http://localhost/php-initiation/jour12/traitement/form-contact.php" method= "POST">
        <div class="mb-3">
            <label for="email">Votre email</label>
            <input type="email" name="email" id="email" class="form-control" required placeholder="saisir votre email" value="<?php echo !empty($_SESSION["form"]["email"]) ? $_SESSION["form"]["email"]: ""?>">
        </div>
        <div class="mb-3">
            <label for="commentaire">Votre commentaire</label>
            <textarea name="commentaire" id="commentaire" cols="30" rows="4" class=form-control placeholder="saisir votre commentaire" required><?php echo !empty($_SESSION["form"]["commentaire"]) ? $_SESSION["form"]["commentaire"]: ""?></textarea>
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-outline-primary btn-sm">
        </div>
    </form>
</div>

    <?php if(!empty($_SESSION["message"])) :?>
        <?php if($_SESSION["message"]["alert"] === "success") :?>
            <div class="alert alert-success">
                <?php echo $_SESSION["message"]["info"] ?>
            </div>
        <?php else :?>
            <div class="alert alert-danger">
                <?php foreach($_SESSION["message"]["info"] as $m) : ?>
                    <?php echo $m ?> <br>
                <?php endforeach ?>
            </div>
        <?php endif ?>
    <?php endif ?>

<?php if(!empty($_SESSION["message"])){
    $_SESSION["message"] = [];
}
?>