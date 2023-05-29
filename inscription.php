<?php
//connexion 
require ('dbconnexion.php'); 

$nom = $_POST["name"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = password_hash($_POST["password"],PASSWORD_DEFAULT);

 
$sql = "select * from utilisateurs where email like '".$email."';";

//execute the query 
$result = mysqli_query($con,$sql);
 
$response = array();
if ((mysqli_num_rows($result)>0))
{
	$code = "reg_failed";
	$message = "E-mail existant !";
	
	array_push($response,array("code"=>$code,"message"=>$message));
	
	echo json_encode($response);
	
}

else 
{
$sql = "INSERT INTO `Med`.`utilisateurs` (`id`, `nom`, `prenom`,`profil`, `tel`,  `email`,`adresse`, `permissions`,  `avatar`,`password`) VALUES (NULL, '$nom', '$prenom', '2','$phone','$email',`adresse`, '123', 'default.png', '$password');";	
	 
 

	
	if(mysqli_query($con,$sql)){
	$last_id = mysqli_insert_id($con); 
	 $sql_client = "insert into patients values (NULL,'$last_id','','0','','','','','','','','0','0','','');";
	 $result_client = mysqli_query($con,$sql_client);
	 if($result_client)
	 {
		$code = "reg_success";
	 $message = "merci pour votre inscription";
	 array_push($response,array("code"=>$code,"message"=>$message));
	 echo json_encode($response); 
	 }else 
	 {
		 echo mysqli_error($con);
	 }
	 
	 
}else{
  //echo mysqli_error($con);
  
  $code = "reg_failed";
	$message = mysqli_error($con);
	
	array_push($response,array("code"=>$code,"message"=>$message));
	
	echo json_encode($response);
}
}


 



?>