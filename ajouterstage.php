<?php
//connexion 
require ('dbconnexion.php'); 
//variables
 
$titre = $_POST["titre"];
$description = $_POST["description"];
$date_debut = $_POST["date_debut"];
$date_fin = $_POST["date_fin"];
$stage = $_POST["stage"]; 
 

 
$sql = "insert into stages values('','".$titre."','".$description."','".$date_debut."','".$date_fin."','".$stage."');";
if (mysqli_query($con,$sql))
{
	echo $stage . " ajouté avec succes";
	
}
else
{
	echo mysqli_error($con);
}
mysqli_close($con);
?>

 