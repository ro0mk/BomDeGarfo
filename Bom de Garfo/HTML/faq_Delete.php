<?php

$host = "localhost";
$database = "bom_dgarfo";

$conn = new mysqli($host, "root", "" , $database);

session_start();

$IdPergunt = $_POST['select_Pergunta_Delete'];

if (!empty($IdPergunt)) {
    
    $delete_Pergunt = "DELETE FROM `faq` WHERE `faq`.`id_pergunta` = '".$IdPergunt."'";
    $conn->query($delete_Pergunt);

    header('Location: faq.php');
}

?>