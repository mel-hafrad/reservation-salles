<?php

if (isset($_GET['login_err'])) {
    $err = htmlspecialchars($_GET['login_err']);

    switch ($err) {
        case 'password'
?>
        <div class="alert alert-danger">
            <strong>Erreur</strong>Mot de passe incorrect
        </div>
    <?php
            break;

        case 'login_length'
    ?>
    <div class="alert alert-danger">
        <strong>Erreur</strong>Login incorrect
    </div>
<?php
            break;

        case 'already'
?>
<div class="alert alert-danger">
    <strong>Erreur</strong>compte non existant
</div>
<?php
            break;
    }
}
?>
<?php include 'header.php'?>

<div class="article">
            <form action="connexion.php" method="post">     
                <div class="form-group">
                    <input type="login" name="login" class="form-control" placeholder="login" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                </div>   
            </form>
</div>
<p style="text-align:center">
    <?php
    session_start();
    if (isset($_SESSION['user'])) {
        echo "Vous êtes déjà connecté";
    } else {                                                        //ce bout de code me sert a savoir si l'user est connecter
        echo "Vous êtes déconnecter";
    }

    ?>
<p>
<?php include 'footer.php'?>