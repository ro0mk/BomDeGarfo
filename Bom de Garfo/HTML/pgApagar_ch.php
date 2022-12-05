<?php
require('bd.php');
$id=$_REQUEST['IDChefe'];
$query = "DELETE FROM chefes WHERE IDChefe=$id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: chefs.php"); 
?>