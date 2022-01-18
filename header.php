
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <title>Reservation Salle</title>
</head>

    <header id="navbar" class="nav">
        <a href="index.php">Acceuil</a>
        <a href="#">Contact</a>

        <?php if(isset($_SESSION['login'])){?>

        <a href="profil.php">Profil de <?=$_SESSION['login']?></a>  
            <!-- dissimuler l'onglet si pas connecté  -->
        <?php } ?>



        <div class="dropdown-1">
            <button id="button">Pages</button>
            <div class="content">
                <a href="inscription.php">Inscription</a>
                <a href="connexion.php">Connexion</a>
                <a href="deconnexion.php">Deconnect</a>
            </div>
        </div>

        <div class="dropdown-1">
        <?php if(isset($_SESSION['login'])){?>

            <button id="button">Réserver</button>

<?php } ?>

                <div class="content">
                <a href="planning.php">Planning</a>
                <a href="reservation-form.php">Réserver</a>
            </div>
        </div>
        <a class="icon" onclick="myFunction()">&#9776;</a>
    </header>
    
    </div>
