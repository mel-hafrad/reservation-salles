<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="planning.css">
    <title>Planning</title>
</head>


<button><a href="index.php" id="btnre";> Acceuil</a> </button>
<?php session_start(); 
        require 'config.php';
?>
<?php if(!isset($_SESSION['login'])){
        header('Location:index.php');
        die();
    }?>

<table border="1">
	<thead>
		<tr>
			<td></td>
			<td>Lundi</td>
			<td>Mardi</td>
			<td>Mercredi</td>
			<td>Jeudi</td>
			<td>Vendredi</td>
			<td>Samedi</td>
			<td>Dimanche</td>
        </tr>

<?php
	
						
$ligne = 11;
$colonne = 7;
$jour = array('Lundi','Mardi','Mercredi','Jeudi','Vendredi',
'Samedi','Dimanche');
$heure=array('08h00','09h00','10h00','11h00','12h00','13h00',
'14h00','15h00','16h00','17h00','18h00','19h00');
$connexion = mysqli_connect("localhost", "root", "", "reservationsalles"); // utiliser msqli pour se co a la bdd
$sql = "SELECT * FROM reservations";
$query = mysqli_query($connexion, $sql);
$resultat=mysqli_fetch_all($query);


?>
   <tbody>
    <tr>

<?php


for($ligne =8; $ligne <= 19; $ligne++ )
{

		echo '<tr>';
		echo "<td>".$ligne."</td>";

  	for($colonne = 1; $colonne <= 7; $colonne++)
  	{
    
				echo "<td>";
				foreach($resultat as $value){

	$id=$value[0];
					$jour=date("w", strtotime($value[3]));
					$heure=date("H", strtotime($value[3]));
				
					if($heure==$ligne && $jour== $colonne)
						{
						
						echo"<a href=\"reservation.php?id=".$id."\">$value[2]</a>";
						
						
					
						}
						else{
							//echo "non";
						}
						
						
						
						 
		
						
		}
		echo '</td>';
	}
		echo '</tr>';			
}
?>



</tr>
   </tbody>

</table>

