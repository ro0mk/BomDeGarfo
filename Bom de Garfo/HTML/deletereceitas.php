<?php
$host="localhost";
$database="bom_dgarfo";
$user="root";
$pass="";
$conn = new mysqli($host, $user, $pass, $database); 
session_start();

$IDReceita=$_REQUEST['IDReceita'];
$query = "DELETE FROM receitas WHERE IDReceita=$IDReceita";
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: listUser.php"); 
?>