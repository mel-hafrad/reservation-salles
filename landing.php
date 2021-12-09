<?php 
    session_start();
    require_once 'config.php'; // ajout connexion bdd 
   // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }

    // On récupere les données de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE login = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
    
   
?>

    <?php include'header.php'?>
        <h1> Bonjour <?php echo $data['login'];
         var_dump($_SESSION['user']);?><h1>
       
    <?php include 'footer.php'?>
