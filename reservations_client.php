<?php
//connexion 
require ('dbconnexion.php'); 
$client_id = $_POST['client_id'];
 
mysqli_set_charset($con,'utf8');
$products = "select client_id,date_retour,latitude,longitude,date_retrait,adresse,etat,vehicule_id from reservations where client_id = '$client_id';";
$response = array();
if ($result1 = mysqli_query($con, $products)) {     
    while ($obj = mysqli_fetch_object($result1)) {        
		$vehicule_id = $obj->vehicule_id;		
		$sql = "select * from vehicules where id = $vehicule_id;";
		$result = mysqli_query($con,$sql);
		
	while ($row = mysqli_fetch_array($result))
{
array_push($response,array("id"=>$row["id"],"marque"=>$row["marque"],"model"=>$row["model"],"date_retour"=>$obj->date_retour,
															  "date_retrait"=>$obj->date_retrait,
															  "date_retour"=>$obj->date_retour, 
															  "etat"=>$obj->etat,
															  ));	
															   
}

    
	
	}

 echo json_encode($response);   
mysqli_free_result($result1);
}

?>