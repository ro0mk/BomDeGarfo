<?php
$host="localhost";
$database="bom_dgarfo";
$user="root";
$pass="";
$conn = new mysqli($host, $user, $pass, $database); 
session_start();

$id=$_REQUEST['idUtl'];
$query = "DELETE FROM utilizador WHERE idUtl=$id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: listUser.php"); 
?>