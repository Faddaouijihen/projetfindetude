<?php 
require ('dbconnexion.php'); 
$user_id = $_POST['user_id'];
$sql = "select * from utilisateurs u, medecins m, ordonnance o where m.iduser= u.id and o.idmedecin = m.id and o.idpatient = $user_id";
$result = mysqli_query($con,$sql);
if($result === false){
    echo mysqli_error($con);
    exit;
}else{
$medecins = mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($medecins);    
}