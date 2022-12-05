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

    $IDNoticia = $_GET['id'];
    $query = "DELETE FROM noticias WHERE IDNoticia = '$IDNoticia';";
    
    $apaga=$conn->query($query);
    header("location:listUser.php");
?>