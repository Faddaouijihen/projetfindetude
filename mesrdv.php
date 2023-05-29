<?php
//connexion 
require ('dbconnexion.php'); 
$user_id = $_POST['user_id'];
 
mysqli_set_charset($con,'utf8');
$products = "select date,heure,idmedecins,etat from Rendezvous where idpatients = '$user_id';";
$response = array();
if ($result1 = mysqli_query($con, $products)) {     
    while ($obj = mysqli_fetch_object($result1)) {        
		$idmedecins = $obj->idmedecins;		
		$date = $obj->date;		
		$heure = $obj->heure;		
		$etat = $obj->etat;		
		$sql = "select * from medecins m, utilisateurs u where m.iduser = u.id and u.id = $idmedecins;";
		$result = mysqli_query($con,$sql);
		
	while ($row = mysqli_fetch_array($result))
{
array_push($response,array("id"=>$row["id"],"nom"=>$row["nom"],"prenom"=>$row["prenom"],"date"=>$date,"heure"=>$heure,"etat"=>$etat));	
															   
}

    
	 
	}
 echo json_encode($response);  

mysqli_free_result($result1);
}

?>