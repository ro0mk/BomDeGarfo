<?php
  $host = "localhost";
  $database = "bom_dgarfo";
  
  $conn = new mysqli($host, "root", "" , $database);
  
  session_start();

  $conn->set_charset("UTF8");
?>

<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
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
                     <a href="backoffice_receitas.php" class="nav_link">
                      <i class='bx bx-message-square-detail nav_icon'></i>
                      <span class="nav_name">Receitas</span>
                    </a> 
                    <a href="backoffice_stats.php" class="nav_link active">
                      <i><img src="../IMG/faq_icon_BO.png" alt="icon_faq" id="faq_icon_img"></i>
                      <span class="nav_name">FAQ</span>
                    </a>

                    </a>
                    <a href="backoffice_noticia.php" class="nav_link">
                     <i class='bx bx-grid-alt nav_icon'></i>
                    <span class="nav_name">Dashboard</span> 
                  </a> 
                  </div>
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

  <div class="row">

    <div id="num_users" style="margin:auto;margin-bottom:30px;">
        <h2>Número de Perguntas</h2>
        <div id="num_of_users">
            <?php
            
            $count_user = "SELECT * FROM faq";
            $count_query = $conn->query($count_user);
                
            if ($count_query) {
            
                echo $count_query->num_rows;
            }
            ?>
        </div>
    </div>


    <div id="num_pub" class="col-xs-6" style="margin:auto;margin-bottom:30px;">
                    <h2>Perguntas sem resposta</h2>
                    <div id="num_of_pub">
                        <?php
                        
                        $count_receitas = "SELECT * FROM faq WHERE respostas=''";
                        $count_query_receitas = $conn->query($count_receitas);
                            
                        if ($count_query_receitas) {
                        
                            echo $count_query_receitas->num_rows;
                        }
                        ?>
                    </div>
                </div>

    


  </div>

    <section class="lista">

<button id="flip"><p id="user_titu">FAQ</p><img src="../img/faqPlus.png" alt="plus" id="user_img" style="margin-left:1060px;"></button>
<div class="container" id="user_show">
<div class="row">
        <table class="ti" style="width:1200px;margin-top:30px;">
            <tr>
                <th class="col-xs-4" style="margin:5px;font-size:16pt;">Data</th>
                <th class="col-xs-4" style="margin:5px;font-size:16pt;">Pergunta</th>
                <th class="col-xs-4" style="margin:5px;font-size:16pt;">Resposta</th>
            </tr>
            <?php
            $query = "select * from faq";
            $result_set = $conn->query($query);
            if ($result_set) {
                while ($row = $result_set->fetch_assoc()) {

                    echo "<tr> 
                            <td style='border-bottom: solid 1px black;margin-bottom:10px;'>" .$row['data']. "</td> 
                            <td style='border-bottom: solid 1px black;margin-bottom:10px;'>" .$row['pergunta']. "</td><td style='border-bottom: solid 1px black;margin-bottom:10px;'>" .$row['respostas'];


                    echo "</tr> "; 
                    
                }
            } else {
                $code = $conn->errno; // error code of the most recent operation
                $message = $conn->error; // error message of the most recent op.
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