<?php 
require ('dbconnexion.php'); 
$sql = "select * from patients";
mysqli_set_charset($con,"utf8");
$result = mysqli_query($con,$sql);
if($result === false){
    echo mysqli_error($con);
    exit;
}else{
$patients = mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($patients);    
}