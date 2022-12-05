<?php




?>





<?php

$host = "localhost";
$database = "bom_dgarfo";

$conn = new mysqli($host, "root", "" , $database);

session_start();

$query = "SELECT * FROM `faq` WHERE id_pergunta = '1'";
$result_set = $conn->query($query);
$row1 = $result_set->fetch_row();

$query2 = "SELECT * FROM `faq` WHERE id_pergunta = '2'";
$result_set2 = $conn->query($query2);
$row2 = $result_set2->fetch_row();

$query3 = "SELECT * FROM `faq` WHERE id_pergunta = '3'";
$result_set3 = $conn->query($query3);
$row3 = $result_set3->fetch_row();

$query4 = "SELECT * FROM `faq` WHERE id_pergunta = '4'";
$result_set4 = $conn->query($query4);
$row4 = $result_set4->fetch_row();

$query5 = "SELECT * FROM `faq` WHERE id_pergunta = '5'";
$result_set5 = $conn->query($query5);
$row5 = $result_set5->fetch_row();

$query6 = "SELECT * FROM `faq` WHERE id_pergunta = '6'";
$result_set6 = $conn->query($query6);
$row6 = $result_set6->fetch_row();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/faqstyle.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Bom d'Garfo</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/9149445993.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  </head>
  <body>
  <header>
        <a href="index.php"><img src="../IMG/LogotipoNavbar.png" alt="" class="logo"></a>
        <i class="menu-toggle-btn fas fa-bars"></i>
        <nav class="navigation-menu">
          <a href="index.php">Home</a>
          <hr>
          <a href="receitas.php">Receitas</a>
          <hr>
          <a href="noticias.php">Notícias</a>
          <hr>
          <a href="sobre.php">Sobre</a>
          <hr>
          <a href="contactos.php">Contactos</a>
          <hr>
          <a id="profileclick"><i class="fas fa-fingerprint"></i>Profile</a>
        </nav>
        <div class="profile">
          <h6 class="nick"><i class="fas fa-fingerprint finger"></i>Duarte Ferreira</h6>
          <hr>
          <ul>
            <li><a href="livros.php">Livros</a></li>
            <li><a href="dicas.php">Dicas</a></li>
            <li><a href="faq.php">FAQ's</a></li>
            <?php
            if (isset($_SESSION['user'])) {
              ?><li><a href="backoffice_stats.php">Backoffice</a></li>
              <li><a href="Faq_Logout.php">Logout</a></li><?php
            } else {
              ?><li><a href="login.php">Login</a></li><?php
            }
            ?>
          </ul>
        </div>
    </header>

  <?php
  
  if (isset($_SESSION['user'])){
    
    ?>

      <button type="button" id="edit_Btn" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_Alt" style="position: fixed;height: 90px;width: 90px;top: 35%;left: 10px;border-radius: 100%;background-color: #65b016;z-index: 9999;">
        <p style="margin: auto; font-size: 11pt;justify-content: center;display: flex;justify-content: center;">Alterar<br>Perguntas</p>
      </button>

      <div id="myModal_Alt" class="modal fade" role="dialog">
          <div class="modal-dialog">


            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar FAQ</h4>
              </div>
              <div class="modal-body">
                <form action="faq_Edit.php" method="POST">

                  <label for="Pergunta_Alt">Selecione a Pergunta</label>
                  <select id="Pergunta_Alt" name="select_Pergunta">
                    
                  <?php 
                    $num_rows = $result_set->num_rows;
                    $select_Pergunta = "SELECT * FROM faq";
                    $result = $conn->query($select_Pergunta);

                    if ($result) {
                      while ($row = $result->fetch_assoc()) {

                        echo "<option value='" .$row['id_pergunta']. "'>" .$row['pergunta']. "</option>";
            
                      };
                    };

                  ?>
                  </select>
                  <br>

                  <button type="submit" name="submit_resposta_edit">Submeter</button>

                </form>
              </div>

            </div>

          </div>
        </div>







      <button type="button" id="edit_Btn" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_Delete" style="position: fixed;height: 90px;width: 90px;top: 65%;left: 10px;border-radius: 100%;background-color: #65b016;z-index: 9999;">
        <p style="margin: auto; font-size: 11pt;justify-content: center;display: flex;justify-content: center;">Apagar<br>Perguntas</p>
      </button>

      <div id="myModal_Delete" class="modal fade" role="dialog">
          <div class="modal-dialog">


            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar FAQ</h4>
              </div>
              <div class="modal-body">
                <form action="faq_Delete.php" method="POST">

                  <label for="Pergunta_Delete">Selecione a Pergunta</label>
                  <select id="Pergunta_Delete" name="select_Pergunta_Delete" require>

                  <?php 
                    $num_rows = $result_set->num_rows;
                    $select_Pergunta = "SELECT * FROM faq";
                    $result = $conn->query($select_Pergunta);

                    if ($result) {
                      while ($row = $result->fetch_assoc()) {

                        echo "<option value='" .$row['id_pergunta']. "'>" .$row['pergunta']. "</option>";
            
                      };
                    };

                  ?>
                  </select>
                  <br>

                  <button type="submit" name="submit_resposta_Delete">Apagar</button>

                </form>
              </div>
            </div>

          </div>
        </div>







      <button type="button" id="edit_Btn" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="position: fixed;height: 90px;width: 90px;top: 50%;left: 10px;border-radius: 100%;background-color: #65b016;z-index: 9999;">
        <p style="margin: auto; font-size: 11pt;justify-content: center;display: flex;justify-content: center;">Editar<br>Perguntas</p>
      </button>


        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">


            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar FAQ</h4>
              </div>
              <div class="modal-body">
                <form action="faq_Edit.php" method="POST">

                  <label for="Edit_Pergunta">Editar Pergunta</label>
                  <input type="text" name="pergunta_Edit" id="Edit_Pergunta">
                  <br>

                  <label for="Resposta_Pergunta">Editar Resposta</label>
                  <input type="text" name="resposta_Edit" id="Resposta_Pergunta">
                  <br>

                  <label for="Pergunta_select">Selecione a Pergunta</label>
                  <select id="Pergunta_select" name="select_Pergunta" require>
                  <?php 
                    $num_rows = $result_set->num_rows;
                    $select_Pergunta = "SELECT * FROM faq";
                    $result = $conn->query($select_Pergunta);

                    if ($result) {
                      while ($row = $result->fetch_assoc()) {

                        echo "<option value='" .$row['id_pergunta']. "'>" .$row['pergunta']. "</option>";
            
                      };
                    };

                  ?>
                  </select>
                  <br>

                  <button type="submit" name="submit_resposta_edit">Submeter</button>

                </form>
              </div>

            </div>

          </div>
        </div>

    <?php
  };


  ?>

  
  <div id="top">

    <div id="title_Faq">

      <h3>Frequently Asked Questions(FAQ's)</h3>

    </div>


      <form action="faq_Search.php" id="search" method="GET">

        <input type="text" id="searchBar" placeholder="Search.." name="search_Bar">
        <button type="submit" id="searchBtn" name="search_Btn"><img src="../img/searchButton.png" alt="Search"></button>

      </form>
  </div>

  <div class="row" id="result_Search">

    <div class="container col-xs-12">

        <?php
        
        $user_Search = $_GET['searchBar'];
        $safe_Search = $conn -> real_escape_string($user_Search);

        if ($user_Search != '') {

            $search = "SELECT * FROM faq WHERE pergunta like '%".$safe_Search."%'";
            $result = $conn->query($search);
            echo '<h3 style="font-weight: bold;">Resultados: </h3>';
            while ($row = $result->fetch_assoc()){
                echo '<div class="search_per" style="color: #FF7919;font-size: 16pt;font-weight: bold;">' .$row['pergunta']. '</div>';
                echo '<div class="search_re" style="margin-bottom: 15px;">' .$row['respostas']. '</div><hr>';
            }

        }
        
        ?>

    </div>

  </div>

 <div class="faq">

  <div id="containersDrop">
    <div class="row" style="justify-content: center;">
      <div id="faqContainer1" class="col-xs-6">
          <div class="dropdownContainer">
            <img src="../img/faqPlus.png" alt="plus" class="plusFaq">
            <h5>
              <b>
                  <?php if ($result_set){

                          echo $row1[3];

                        }else {
                          $code = $conn->errno; // error code of the most recent operation
                          $message = $conn->error; // error message of the most recent op.
                          printf("<p>Query error: %d %s</p>", $code, $message);
                          }
                  ?>
                </b>
            </h5>


<!-- <?php
//if (isset($_SESSION['user'])) {

?>

            <button type="button" id="edit_Btn" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_esc">
        Alterar
      </button>

      <div id="myModal_esc" class="modal fade" role="dialog">
          <div class="modal-dialog">


            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar FAQ</h4>
              </div>
              <div class="modal-body">
                <form action="faq_esc.php" method="POST">

                  <label for="Pergunta_Esc">Selecione a Pergunta</label>
                  <select id="Pergunta_Esc" name="select_Pergunta_Esc" require>

                  <?php 
                    //$num_rows = $result_set->num_rows;
                   // $select_Pergunta = "SELECT * FROM faq";
                    //$result = $conn->query($select_Pergunta);

                    //if ($result) {
                      //while ($row = $result->fetch_assoc()) {

                        //echo "<option value='" .$row['id_pergunta']. "'>" .$row['pergunta']. "</option>";
            
                      //};
                    //};

                  ?>
                  </select>
                  <br>

                  <button type="submit" name="submit_resposta_Esc">Alterar</button>

                </form>
              </div>
            </div>

          </div>
        </div>


        <?php
//};

?> -->




          </div>

          <div class="dropText">

            <p>
                <?php if ($result_set){

                        echo $row1[4];



                      }else {
                        $code = $conn->errno; // error code of the most recent operation
                        $message = $conn->error; // error message of the most recent op.
                        printf("<p>Query error: %d %s</p>", $code, $message);
                        }
                ?>
            </p>

          </div>

          <div class="dropdownContainer">
            <img src="../img/faqPlus.png" alt="plus" class="plusFaq">
                <h5><b>
                  <?php if ($result_set2){


                  echo $row2[3];



                    }else {
                      $code = $conn->errno; // error code of the most recent operation
                      $message = $conn->error; // error message of the most recent op.
                      printf("<p>Query error: %d %s</p>", $code, $message);
                      }
                    ?>
                    </b>
                </h5>
          </div>

          <div class="dropText">

            <p>
                  <?php if ($result_set2){

                    echo $row2[4];



                    }else {
                      $code = $conn->errno; // error code of the most recent operation
                      $message = $conn->error; // error message of the most recent op.
                      printf("<p>Query error: %d %s</p>", $code, $message);
                      }
                  ?>
            </p>

          </div>

          <div class="dropdownContainer">
            <img src="../img/faqPlus.png" alt="plus" class="plusFaq">
            <h5><b>
                  <?php if ($result_set3){

                  echo $row3[3];



                    }else {
                      $code = $conn->errno; // error code of the most recent operation
                      $message = $conn->error; // error message of the most recent op.
                      printf("<p>Query error: %d %s</p>", $code, $message);
                      }
                    ?>
                  </b>
                </h5>
          </div>

          <div class="dropText">

            <p>
                  <?php if ($result_set3){

                  echo $row3[4];



                    }else {
                      $code = $conn->errno; // error code of the most recent operation
                      $message = $conn->error; // error message of the most recent op.
                      printf("<p>Query error: %d %s</p>", $code, $message);
                      }
                    ?>
            </p>

          </div>
        </div>

      <div id="faqContainer2" class="col-xs-6">

        <div class="dropdownContainer">
          <img src="../img/faqPlus.png" alt="plus" class="plusFaq">
          <h5>
            <b>
             <?php if ($result_set4){

                      echo $row4[3];



                    }else {
                      $code = $conn->errno; // error code of the most recent operation
                      $message = $conn->error; // error message of the most recent op.
                      printf("<p>Query error: %d %s</p>", $code, $message);
                      }
              ?>
              </b>
            </h5>
        </div>

        <div class="dropText">

          <p>
              <?php if ($result_set4){

                      echo $row4[4];



                    }else {
                      $code = $conn->errno; // error code of the most recent operation
                      $message = $conn->error; // error message of the most recent op.
                      printf("<p>Query error: %d %s</p>", $code, $message);
                      }
              ?>
          </p>

        </div>

        <div class="dropdownContainer">
          <img src="../img/faqPlus.png" alt="plus" class="plusFaq">
          <h5><b>
              <?php if ($result_set5){

                      echo $row5[3];



                    }else {
                      $code = $conn->errno; // error code of the most recent operation
                      $message = $conn->error; // error message of the most recent op.
                      printf("<p>Query error: %d %s</p>", $code, $message);
                      }
              ?>
              </b>
            </h5>
        </div>

        <div class="dropText">

          <p>
              <?php if ($result_set5){

                      echo $row5[4];



                    }else {
                      $code = $conn->errno; // error code of the most recent operation
                      $message = $conn->error; // error message of the most recent op.
                      printf("<p>Query error: %d %s</p>", $code, $message);
                      }
              ?>
          </p>

        </div>


        <div class="dropdownContainer">
          <img src="../img/faqPlus.png" alt="plus" class="plusFaq">
          <h5><b> <?php if ($result_set6){

                      echo $row6[3];



                    }else {
                      $code = $conn->errno; // error code of the most recent operation
                      $message = $conn->error; // error message of the most recent op.
                      printf("<p>Query error: %d %s</p>", $code, $message);
                      }
              ?>
              </b>
              </h5>
        </div>

        <div class="dropText">

          <p>
              <?php if ($result_set6){

                      echo $row6[4];



                    }else {
                      $code = $conn->errno; // error code of the most recent operation
                      $message = $conn->error; // error message of the most recent op.
                      printf("<p>Query error: %d %s</p>", $code, $message);
                      }
              ?>
          </p>

        </div>
      </div>
      </div>
    </div>
  </div>

<div class="row" style="justify-content: center;" >
  <div id="titulo_Questao" class="col-xs-12"><h2>Tem alguma questão?</h2></div>

</div>
<button id="flip"><img src="../img/faqPlus.png" alt="plus" style="width: 100%;"></button>


  <div class="container" id="form_Grupo">

    <form action="faq_insert.php" method="POST" id="searchGroup">

      <div class="form-group">

        <label for="formGroupExampleInput">Email*</label>
        <input type="email" class="form-control" id="formGroupExampleInput" name="email_User" placeholder="exemplo@mail.pt" required>


      
        <label for="formGroupExampleInput">Pergunta*</label>
        <input type="text" class="form-control" id="formGroupExampleInput" name="pergunta_User" placeholder="Insira uma pergunta" required>
      </div>

      <div class="submit-Group">
        <div class="warning1">
            <?php



              $host1 = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

              if ($host1 == 'localhost/Bom%20de%20Garfo/HTML/faq.php?status=success') {

                if( $_GET['status'] == 'success'){
                  echo "<div id='warning'>Submetido com sucesso</div>";
                }
                
              }

            ?>
          </div>

          <input type="submit" name="submit_pergunta" class="submit_Pergunta" value="Submeter">

      </div>
    </form>



  </div>



  




  <button class="bt-top" onclick="backtop()"><i class="fa-solid fa-circle-arrow-up fa-2xl"></i></button>
  <footer class="footer">
        <div class="container">
          <div class="row">
            <div class="footer-col">
              <h4>mapa website</h4>
              <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="receitas.php">Receitas</a></li>
                <li><a href="noticias.php">Noticias</a></li>
                <li><a href="dicas.php">Contactos</a></li>
              </ul>
            </div>
            <div class="footer-col">
              <h4>contactos</h4>
              <ul>
                <li><a href="login.php">Login</a></li>
                <li><a href="sobre.php">Sobre Nós</a></li>
                <li><a href="contactos.php">Contactos</a></li>
                <li><a href="faq.php">FAQ's</a></li>
              </ul>
            </div>
            <div class="footer-col">
              <h4>siga-nos</h4>
              <div class="social-links">
                <a href="#"><i class="fa-brands fa-facebook-square"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
              </div>
            </div>
            <div class="footer-col">
              <h4>LOGO</h4>
              <a href="index.php"><img src="../IMG/LogotipoBranco.png" alt=""></a>
            </div>
          </div>
        </div>
      </footer>





  <script src="../JS/faqJs.js"></script>
  <script src="../JS/script.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</body>

</html>








