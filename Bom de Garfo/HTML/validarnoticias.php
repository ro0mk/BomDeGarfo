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
    $titulo= $descricao= $fotos="";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      if(empty($_POST[$titulo])){
        $titulo="Insira um titulo";
      }
    }

if (isset($_POST['titulo']) && isset($_POST['descricao'])) {

    if (empty($_POST['titulo']) || empty($_POST['descricao'])) {

      echo 'Erro';
    } else {

      $sql = "INSERT INTO noticias (titulo, descricao) VALUES ('" . $_POST['titulo'] . "', '" . $_POST['descricao'] . "');";
      $inserirDados = $conn->query($sql);
    }
  }
$conn->close();
header('location:noticias.php');

?>
    