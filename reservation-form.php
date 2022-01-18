<?php   include 'header.php';
        require 'config.php';
        session_start(); 
        // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['login'])){
        header('Location:index.php');
        die();
    }?>
<!DOCTYPE html>
<form action="reservation-form.php" method="post">

   <legend>Evenement </legend>
   <label>Titre :</label>
	<input type="text" name="titre" >

<label>Description :</label>
        <input type="text" name="description">  
<legend>date </legend>      
<label>Date de début :</label>

	<input type="datetime-local" name="debut">
<label>Date de fin :</label>
        <input type="datetime-local" name="fin">
        <input type="submit" name="reserver" value="Reserver">
</form>

<?php
if(isset($_POST["reserver"]))
{
	$titre= $_POST["titre"];
	$description= $_POST["description"];
	$debut= $_POST["debut"];
	$fin= $_POST["fin"];		
    $connexion = mysqli_connect("localhost", "root", "", "reservationsalles");
    
	$requete = "INSERT INTO `reservations` (`titre`, `description`, `debut`, `fin`, `id_utilisateur`)
	VALUES('".$titre."', '".$description."', '".$debut."', '".$fin."' , '".$_SESSION["id"]."')"; 
  $query = mysqli_query($connexion, $requete);
	header('Location: planning.php');
}

?>
		
