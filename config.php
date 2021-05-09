<?php
$db_server='localhost';
$db_username='root';
$db_password='';
$db_name='login';

$con=mysqli_connect($db_server, $db_username, $db_password,$db_name);
if($con===false){
    die("ERROR: Could not connect. " .mysqli_connect_error());

}
?>