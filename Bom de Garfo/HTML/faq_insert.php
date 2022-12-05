<?php

session_start();
$host = "localhost";
$database = "bom_dgarfo";


$conn = new mysqli($host, "root", "" , $database);

if (!empty($_POST["pergunta_User"]) && !empty($_POST["email_User"])) {

  $pergunta_Clean = mysqli_real_escape_string($conn, $_POST['pergunta_User']);
  $email_Clean = mysqli_real_escape_string($conn, $_POST['email_User']);

   if (isset($pergunta_Clean) && isset($email_Clean)) {


    $pergunta = (array_key_exists('pergunta_User', $_POST) ? $pergunta_Clean : '');
    $email = (array_key_exists('email_User', $_POST) ? $email_Clean : '');

    $query_Pergunta = "INSERT INTO `faq` (`id_pergunta`, `data`, `email`, `pergunta`, `respostas`)
    VALUES (NULL, CURRENT_TIMESTAMP,'$email', '$pergunta', '')";


    $result_Pergunta = $conn->query($query_Pergunta);

    $_SESSION['success_message'] = "Contact form saved successfully.";

    if ($result_Pergunta === TRUE) {

        
        header('Location: faq.php?status=success');

    } else {

        echo "Error: " . $query_Pergunta . "<br>" . $conn->error;

    }
    

  }

} else {
  header('Location: faq.php');
}
  
  ?>
  