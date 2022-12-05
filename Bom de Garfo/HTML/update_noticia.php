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
?>

<?php
$titulo=$_REQUEST['titulo'];
$descricao=$_REQUEST['descricao'];
$fotos=$_FILES['fotos']['name'];
$extensao=pathinfo($fotos,PATHINFO_EXTENSION);
$folder="../IMG/";
$novo_ficheiro=sha1(microtime()).".".$extensao;
$idnot=$_GET['id'];

if (move_uploaded_file($_FILES['fotos']['tmp_name'],$folder.$novo_ficheiro)){

$stmt_noticias = $conn->prepare("UPDATE noticias SET titulo = ? ,descricao = ?,fotos = ? WHERE IDNoticia = ?");
$stmt_noticias->bind_param('sssi', $titulo, $descricao, $novo_ficheiro, $idnot);
$stmt_noticias->execute();
$stmt_noticias->close();
    
}
header('location:listUser.php');
?>