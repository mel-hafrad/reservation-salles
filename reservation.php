<?php include('header.php') ?>

<?php session_start(); 
require 'config.php';

?>
<?php   
        // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['login'])){
        header('Location:index.php');
        die();
    }?>
 <?php
					$connexion = mysqli_connect("localhost", "root", "", "reservationsalles");//coo

					$requete = "SELECT * FROM reservations  WHERE id = '".$_GET['id']."'";//requette recupere id d
					$resultat = mysqli_query($connexion, $requete);
					$donnees = mysqli_fetch_assoc($resultat);
				
					$requete2 = "SELECT login FROM utilisateurs WHERE id = '".$donnees['id_utilisateur']."'";
					$req = mysqli_query($connexion, $requete2);
					$data = mysqli_fetch_assoc($req);
				?>
				
				<div class="D"><?php echo $donnees['titre']; ?></div>
				<div class="D">Réserver par <?php echo $_SESSION['login']; ?></div>
				<div class="D">Du <?php echo $donnees['debut']; ?></div>
				<div class="D">Au <?php echo $donnees['fin']; ?></div>
				<div class="D">Description<br/><?php echo $donnees['description']; ?>