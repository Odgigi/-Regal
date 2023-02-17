<?php require "lib/functions.php";
isLogged();

if(isset($recette)) :?>
<h1 class="mb-4">Modifier la recette</h1>
<?php else :?>
  <h1>Ajouter une recette</h1>
<?php endif ?>

<section class="row">
  <div class="col-3">
      <?php require "lib/menu-privee.php"; ?>
  </div>
  <div class="col">

    <form action="lib/traitement-recette.php" method="POST">
      <div class="mb-3">
        <label for="nom">Saisir le nom</label>
        <input type="text" name="nom" id="nom" class="form-control" placeholder="saisir le nom" value="<?php echo isset($recette) ? $recette["nom"] : "" ?>">
      </div>
      <div>
        <label for="preparation">Saisir la préparation</label>
        <textarea name="preparation" id="preparation" class="form-control" placeholder="saisir la préparation" <?php echo isset($recette) ? $recette["preparation"] : "" ?>></textarea>
      </div>
      <div>
        <label for="prix">Saisir le prix</label>
        <input type="number" name="prix" id="prix" class="form-control" placeholder="saisir le prix" value="<?php echo isset($recette) ? $recette["prix"] : "" ?>">
      </div>
      <div>
      <label for="categorie"></label>
        <select name="categorie" id="categorie" class="form-control" placeholder="saisir la catégorie" value="<?php echo isset($recette) ? $recette["categorie"] : "" ?>">
            <option value="">veuillez choisir une catégorie</option>
            <option value="entree">user</option>
            <option value="plat">rédacteur</option>
            <option value="dessert">admin</option>
        </select>
      </div>
      <div>
        <label for="image">Saisir l'url de l'image</label>
        <input type="url" name="image" id="image" class="form-control" placeholder="url de l'image" value="<?php echo isset($recette) ? $recette["image"] : "" ?>">
      </div>
      <div>
        <label for="auteur">Saisir l'auteur</label>
        <input type="text" name="auteur" id="auteur" class="form-control" placeholder="saisir l'auteur" value="<?php echo isset($recette) ? $recette["auteur"] : "" ?>">
      </div>

      <?php if(isset($recette)) : ?>
        <!-- champ qui permet de distinguer entre INSERT et UPDATE -->
        <input type="hidden" name="id" value="<?php echo $recette["id"] ?>">
      <?php endif ?>
      <div>
        <input type="submit" class="btn btn-success">
      </div>
    </form>
    <?php require "lib/message-flash.php" ?>
  </div>
</section>
<script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js"
      referrerpolicy="origin"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@2/dist/tinymce-jquery.min.js"></script>
<script>
    $('textarea#preparation').tinymce({
        height: 200,
        menubar: false,
        toolbar: 'undo redo | blocks | bold italic backcolor | ' +
          'alignleft aligncenter alignright alignjustify | ' +
          'bullist numlist outdent indent | removeformat | help'
    });
</script>