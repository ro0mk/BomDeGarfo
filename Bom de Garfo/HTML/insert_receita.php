<?php
require ('bd.php');
session_start();

$titulo=$_REQUEST['titulo'];
$cozinheiro=$_REQUEST['cozinheiro'];
$descricao=$_REQUEST['descricao'];
$ingredientes=$_REQUEST['ingredientes'];
$grau_dificuldade=$_REQUEST['grau_dificuldade'];
$doses=$_REQUEST['doses'];
$categoria=$_REQUEST['categoria'];
$epoca=$_REQUEST['epoca'];
$tempo_preparacao=$_REQUEST['tempo_preparacao'];
$fotos=$_FILES['fotos']['name'];
$extensao=pathinfo($fotos,PATHINFO_EXTENSION);
$folder="../IMG/receitasimg/";
$novo_ficheiro=sha1(microtime()).".".$extensao;

if (move_uploaded_file($_FILES['fotos']['tmp_name'],$folder.$novo_ficheiro)) {

$receitanova="INSERT INTO receitas (titulo,cozinheiro,fotos,descricao,ingredientes,grau_dificuldade,doses,categoria,epoca,tempo_preparacao) 
                VALUES('".$titulo."','".$cozinheiro."','".$novo_ficheiro."','".$descricao."','".$ingredientes."','".$grau_dificuldade."','".$doses."','".$categoria."','".$epoca."','".$tempo_preparacao."')"; 
$conn->query($receitanova);
}

header('location:receitas.php');
?>