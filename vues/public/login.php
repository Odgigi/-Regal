<h1>Connexion</h1>
<form action="lib/traitement-login.php" class="row my-5" method="POST">
    <div class="col-3 offset-3">
        <input type="text" placeholder="votre login" class="form-control" name="login" >
    </div>
    <div class="col-3">
        <input type="password" placeholder="votre mot de passe" class="form-control" name="password" >
    </div>
    <div class="col-12 d-flex justify-content-center mt-4">
        <input type="submit" class="btn btn-primary">
    </div>
</form>

<?php require "lib/messages-flash.php" ?>