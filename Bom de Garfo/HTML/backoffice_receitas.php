<?php
    $host = "localhost";
    $database = "bom_dgarfo";
    
    $conn = new mysqli($host, "root", "" , $database);
    
    session_start();
    
    $conn->set_charset("UTF8");
?>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/backoffice.css">
    <title>Bom d'Garfo | Home</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/9149445993.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  </head>
    
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
    <nav class="nav">
            <div> 
              <a href="index.php" class="nav_logo">
                <i class='bx bx-layer nav_logo-icon'></i>
                <span class="nav_logo-name">
                  <img src="../IMG/LogotipoNavbar.png" alt="Logo">
                </span> 
              </a>
                <div class="nav_list"> 
                  <a href="backoffice_users.php" class="nav_link">
                    <i class='bx bx-user nav_icon'></i>
                    <span class="nav_name">Utilizadores</span>
                  </a>
                     <a href="backoffice_receitas.php" class="nav_link active">
                      <i class='bx bx-message-square-detail nav_icon'></i>
                      <span class="nav_name">Receitas</span>
                    </a> 
                    <a href="backoffice_stats.php" class="nav_link">
                      <i><img src="../IMG/faq_icon_BO.png" alt="icon_faq" id="faq_icon_img"></i>
                      <span class="nav_name">FAQ</span>
                    </a>
                  </div>
            </div>
             <a href="Faq_Logout.php" class="nav_link">
              <i class='bx bx-log-out nav_icon'></i>
              <span class="nav_name">SignOut</span>
            </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light" id="main_content">
 
    <div class="row" style="margin-bottom:50px;">
                    <div id="num_users" class="col-xs-6" style="margin:auto;">
                    <h2>Número de Receitas</h2>
                    <div id="num_of_users">
                        <?php
                        
                        $count_user = "SELECT * FROM receitas";
                        $count_query = $conn->query($count_user);
                            
                        if ($count_query) {
                        
                            echo $count_query->num_rows;
                        }
                        ?>
                    </div>
                </div>

                <div id="num_pub" class="col-xs-6" style="margin:auto;">
                    <h2>Receitas publicadas</h2>
                    <div id="num_of_pub">
                        <?php
                        
                        $count_receitas = "SELECT * FROM receitas WHERE user='sim'";
                        $count_query_receitas = $conn->query($count_receitas);
                            
                        if ($count_query_receitas) {
                        
                            echo $count_query_receitas->num_rows;
                        }
                        ?>
                    </div>
                </div>


            </div>

        <section class="lista">

        <button id="flip"><p id="user_titu">Receitas</p><img src="../img/faqPlus.png" alt="plus" id="user_img" style="margin-left:1000px;"></button>
        <div class="container" id="user_show">
        <div class="row">
                <table class="ti" style="width:1100px;margin-top:30px;">
                    <tr>
                        <th class="col-xs-1" style="margin:5px;font-size:16pt;">Chef</th>
                        <th class="col-xs-2" style="margin:5px;font-size:16pt;">Titulo</th>
                        <th class="col-xs-2" style="margin:5px;font-size:16pt;">Descrição</th>
                        <th class="col-xs-3" style="margin:5px;font-size:16pt;">Ingredientes</th>
                        <th class="col-xs-1" style="margin:5px;font-size:16pt;">Grau de dif.</th>
                        <th class="col-xs-1" style="font-size:16pt;">Tipo</th>
                        <th class="col-xs-2" style="margin:5px;font-size:16pt;">Classificação</th>
                    </tr>
                    <?php
                    $query = "select * from receitas";
                        $result_set = $conn->query($query);
                        if ($result_set) { 
                            while ($row = $result_set->fetch_assoc()) {
                                echo "<tr> 
                                    <td style='border-bottom: solid 1px black;padding:15px;'>" .$row['cozinheiro']. "</td> 
                                    <td style='width:100px;border-bottom: solid 1px black;padding:15px;'>" . $row['titulo']. " </td> 
                                    <td style='border-bottom: solid 1px black;padding:15px;'>" . $row['descricao']. " </td> 
                                    <td style='width:40px;border-bottom: solid 1px black;padding:15px;'>" . $row['ingredientes']. " </td> 
                                    <td style='width:100px;border-bottom: solid 1px black;padding:15px;'>" . $row['grau_dificuldade']. " </td> 
                                    <td style='border-bottom: solid 1px black;padding:15px;'>" . $row['categoria']. " </td> 
                                    <td style='border-bottom: solid 1px black;'padding:15px;>" . $row['classificacao']. "</td>";

                                echo "</td></tr>";
                                
                            } 
                        } else {
                            $code = $conn->errno; 
                            $message = $conn->error; 
                            printf("<p>Query error: %d %s</p>", $code, $message);
                        }
                    ?>

                </table>
            </div>
            </div>

        </div>


    </section>
</div>
    <!--Container Main end-->


      <script src="../JS/script.js"></script>
      <script src="../JS/backoffice.js"></script>
</body>
</html>