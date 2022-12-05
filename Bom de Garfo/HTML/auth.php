<?php 
    $host="localhost";
    $database="bom_dgarfo";
    $user="root";
    $pass="";
    $conn = new mysqli($host, $user, $pass, $database); 

session_start();

if ($conn->connect_errno) {
$code = $conn->connect_errno;
$message = $conn->connect_error;
printf("<p>Connection error: %d %s</p>", $code, $message);
return;
}   

$email = $_POST["email"];
$password = $_POST["pass"];

$user = mysqli_query($conn, "select * from utilizador where email = '". $email."'")->fetch_assoc();/* fetch_assoc só vai buscar o primeiro que encontrar. */
/* print_r($user["nome"]); */

echo "Tás top";

if (!isset($user)) {
    $_SESSION["mensagem"] = "Este email não existe.";
    header("location:login.php");
    exit;
}   

if (hash("sha512", $password) == $user["pass"]) {
    $_SESSION["user"] = $user;
    header("location:listUser.php");
}else{
    $_SESSION["mensagem"] = "Esta password está errada.";
    header("location:login.php");
}

?>