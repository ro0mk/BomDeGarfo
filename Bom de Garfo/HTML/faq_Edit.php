<?php

$host = "localhost";
$database = "bom_dgarfo";

$conn = new mysqli($host, "root", "" , $database);

session_start();

$pergunta_Edit = $_POST['pergunta_Edit'];
$resposta_Edit = $_POST['resposta_Edit'];
$IdPerg = $_POST['select_Pergunta'];

if (!empty($pergunta_Edit) || !empty($resposta_Edit) && !empty($IdPerg)){

    if (!empty($pergunta_Edit)) {

        $update_Perg = "UPDATE `faq` SET `pergunta` = '" .$pergunta_Edit. "' WHERE `faq`.`id_pergunta` = '" .$IdPerg. "'";
        $prep_Pergunta = $conn->prepare($update_Perg);
        $prep_Pergunta->execute();

    }

    if (!empty($resposta_Edit)) {

        $update_Resp = "UPDATE `faq` SET `respostas` = '" .$resposta_Edit. "' WHERE `faq`.`id_pergunta` = '" .$IdPerg. "'";
        $prep_Resposta = $conn->prepare($update_Resp);
        $prep_Resposta->execute();

    }


    header('Location: faq.php');

}

?>