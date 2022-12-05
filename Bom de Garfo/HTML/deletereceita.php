<?php
    $host="localhost";
    $database="bom_dgarfo";
    $user="root";
    $pass="";
    $conn = new mysqli($host, $user, $pass, $database); 
    session_start();

    if (!isset($_SESSION["user"])) {
        $_SESSION["mensagem"] = "Sessão não iniciada.";
        header("location:login.php");
        exit;
    }

$IDReceita = $_GET['id'];
$query = "DELETE FROM receitas WHERE IDReceita = '$IDReceita';";

$apaga=$conn->query($query);
header("location:listUser.php");
?>