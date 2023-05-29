<?php 
require ('dbconnexion.php'); 
$user_id = $_POST['user_id'];
$sql = "select * from diagnostics where idpatient = $user_id;";
mysqli_set_charset($con,"utf8");
$result = mysqli_query($con,$sql);
if($result === false){
    echo mysqli_error($con);
    exit;
}else{
$medecins = mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($medecins);    
}