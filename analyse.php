<?php 
require ('dbconnexion.php'); 
$sql = "select * from utilisateurs u, medecins m, analyses a where m.iduser= u.id and a.idmedecin = m.id";
mysqli_set_charset($con,"utf8");
$result = mysqli_query($con,$sql);
if($result === false){
    echo mysqli_error($con);
    exit;
}else{
$medecins = mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($medecins);    
}