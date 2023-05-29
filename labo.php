<?php 
require ('dbconnexion.php'); 
$sql = "select * from utilisateurs u, agentlabos ag where u.id = ag.iduser;";
$result = mysqli_query($con,$sql);
if($result === false){
    echo mysqli_error($con);
    exit;
}else{
$agentlabo = mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($agentlabo);    
}