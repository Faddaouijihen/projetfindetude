<?php 
require ('dbconnexion.php');
$specialite = $_POST['specialite']; 
$sql = "select * from medecins m, utilisateurs u where  m.iduser = u.id and m.specialite = '".$specialite."';";
$result = mysqli_query($con,$sql);
if($result === false){
    echo mysqli_error($con);
    exit;
}else{
$medecins = mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($medecins);    
}