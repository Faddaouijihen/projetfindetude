<?php
//connexion 
require ('dbconnexion.php'); 
 
$date = $_POST["date"];
$user_id = $_POST["user_id"];
$medecin_id = $_POST["medecin_id"]; 
$heure = $_POST["time"];
$updated_at = date('y-m-d');
 
 

 
$sql = "insert into Rendezvous values(NULL,'".$date."','".$heure."','".$user_id."','".$medecin_id."','1','".$updated_at."');";
if (mysqli_query($con,$sql))
{
	echo "Rendezvous demandé avec succes";
	
}
else
{
	echo mysqli_error($con);
}
mysqli_close($con);
?>

 