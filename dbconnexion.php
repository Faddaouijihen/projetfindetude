<?php 
$db_host = "192.168.10.10:3306";
$db_user = "homestead";
$db_password = "secret";
$db_name= "Med";
$con = mysqli_connect($db_host,$db_user,$db_password,$db_name);

if(!$con)
{
    echo mysqli_connect_error();
    exit;
}