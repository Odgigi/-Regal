<?php if(!empty($_SESSION["message"])) : ?>
    <?php if($_SESSION["message"]["alert"] === "success") : ?> 
        <p class="alert alert-success" >
            <?php echo $_SESSION["message"]["info"]  ?>
        </p>
    <?php elseif($_SESSION["message"]["alert"] === "danger") : ?> 
        <p class="alert alert-danger">
            <?php foreach($_SESSION["message"]["info"] as $i) : ?>
                <?php echo $i  ?><br>
            <?php endforeach ?>
        </p>
    <?php endif ?>
     
    <?php unset($_SESSION["message"]); 
    // message flash: supprimer une variable
    ?>
    <?php endif ?>
<style>
    .alert{
        animation: deplacement 1s ;
    }
    @keyframes deplacement {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
    }
</style>