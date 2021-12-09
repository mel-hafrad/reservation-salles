<?php   include 'header.php';
        require 'config.php';
        session_start(); 
        // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }?>
<!DOCTYPE html>
<div class="article">
    <form action="inscription.php" method="post" id="form-reser">
        <div class="form-group">
            <input type="text" name="titre" class="form-control" placeholder="Titre" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="text" name="description" class="form-control" placeholder="Description" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <span class="label label-default">Début résevation</span>
            <input type="date" name="date_debut" class="form-control" placeholder="date_debut" required="required" autocomplete="off" min="2022-01-01">
        </div>
        <div class="form-group">
            <span class="label label-default">Fin résevation</span>
            <input type="date" name="date_fin" class="form-control" placeholder="date_fin" required="required" autocomplete="off" max="2022-12-31">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Réserver<?php echo ' '. $_SESSION['user'];?></button>
    </form>
</div>
</html>
