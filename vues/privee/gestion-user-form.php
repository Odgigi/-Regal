<?php
require "lib/fonctions.php";
isLogged();
?>

<?php if(isset($user)) :?>
    <h1 class="mb-4">Mettre à jour un profil user</h1>
<?php else : ?>
    <h1 class="mb-4">Ajouter un nouveau profil user</h1>
<?php endif ?>

<section class="row">
    <div class="col-3">
        <?php require "lib/menu-privee.php" ?>
    </div>
    <div class="col">
       <form action="lib/traitement-user.php" method="POST">
            <div class="mb-3">
                <label for="nom">Saisir votre nom</label>
                <input type="text" id="nom"  class="form-control" name="nom" required
                    value="<?php echo isset($user) ? $user["nom"] : "" ?>">
            </div>
            <div class="mb-3">
                <label for="email">Saisir votre email</label>
                <input type="email" id="email"  class="form-control" 
                        name="email" required
                        value="<?php echo isset($user) ? $user["email"] : "" ?>">
            </div>
            <div class="mb-3">
                <?php if(isset($user)) : ?>
                    <label for="password"> 
                        laisser le champ password vide si vous ne voulez pas le modifier 
                    </label>
                <?php else : ?>
                    <label for="password">Saisir votre password</label>
                <?php endif ?>
                <input type="text" id="password" class="form-control" 
                        name="password" required>
            </div>
            <div class="input-field">
                <label for="dt_creation"></label>
                <input type="date" name="dt_creation" id="dt_creation" required value="<?php echo !empty($_SESSION["form"]["dt_creation"]) ? $_SESSION["form"]["dt_creation"] : ""?>">
            </div>

            <?php if(isset($user)) : ?>
                <!-- champ qui permet de distinguer entre INSERT et UPDATE -->
                <input type="hidden" name="id" value="<?php echo $user["id"] ?>">
            <?php endif ?>
            <div class="mt-3">
                <input type="submit" class="btn btn-success">
            </div>
       </form>

       <?php require "lib/messages-flash.php" ?>
    </div>
</section>