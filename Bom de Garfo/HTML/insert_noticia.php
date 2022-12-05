<?php
require ('bd.php');
session_start();

$titulo=$_REQUEST['titulo'];
$descricao=$_REQUEST['descricao'];
$fotos=$_FILES['fotos']['name'];
$extensao=pathinfo($fotos,PATHINFO_EXTENSION);
$folder="../IMG/";
$novo_ficheiro=sha1(microtime()).".".$extensao;

if (move_uploaded_file($_FILES['fotos']['tmp_name'],$folder.$novo_ficheiro)) {

$qnoticia="INSERT INTO noticias (titulo,fotos,descricao) VALUES('".$titulo."','".$novo_ficheiro."','".$descricao."')"; 
$conn->query($qnoticia);
}



header('location:noticias.php');
?>