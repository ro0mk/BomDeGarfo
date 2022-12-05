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
                  <a href="backoffice_users.php" class="nav_link active">
                    <i class='bx bx-user nav_icon'></i>
                    <span class="nav_name">Utilizadores</span>
                  </a>
                     <a href="backoffice_receitas.php" class="nav_link">
                      <i class='bx bx-message-square-detail nav_icon'></i>
                      <span class="nav_name">Receitas</span>
                    </a> 
                    <a href="backoffice_stats.php" class="nav_link">
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

    <div id="num_users" style="margin-bottom:30px;">
        <h2>Número de Utilizadores</h2>
        <div id="num_of_users">
            <?php
            
            $count_user = "SELECT * FROM utilizador";
            $count_query = $conn->query($count_user);
                
            if ($count_query) {
            
                echo $count_query->num_rows;
            }
            ?>
        </div>
    </div>

    <section class="lista">

    <button id="flip"><p id="user_titu">Utilizadores</p><img src="../img/faqPlus.png" alt="plus" id="user_img" style="margin-left:950px;"></button>
    <div class="container" id="user_show">
        <div class="container">
            <table class="ti" style="margin-top:10px;margin-bottom:20px;">
                <tr>
                    <th style="width:150px;font-size:18pt;">Nome</th>
                    <th style="width:250px;font-size:18pt">Email</th>
                    <th style="width:100px;"></th>
                    <th></th>
                </tr>

                <?php
                $query = "select * from utilizador";
                $result_set = $conn->query($query);
                if ($result_set) {

                    while ($row = $result_set->fetch_assoc()) {
                        $email = $row['email'];
                        echo "<tr> 
                                <td style='border-bottom: solid 1px black;'>' ".$row['nome']. "'</td>
                                <td style='border-bottom: solid 1px black;'>' ".$email. "'</td>'
                              </tr> "; 
                        
                    }
                } else {
                    $code = $conn->errno; // error code of the most recent operation
                    $message = $conn->error; // error message of the most recent op.
                    printf("<p>Query error: %d %s</p>", $code, $message);
                }        
                ?>
            </table>
            <input type="button" class="Novouser" onclick="location.href='insertUser.php'" value="Novo utilizador">
        </div>
    </div>


    </section>
    <?php
        if (isset($_SESSION['errors'])) {
            echo "<div>Errors:";
            foreach ($_SESSION['errors'] as $field => $error)
            echo "<p>$field: $error</p>";
            echo "</div>";
        }
    ?>
    </div>

    </div>
    <!--Container Main end-->


      <script src="../JS/script.js"></script>
      <script src="../JS/backoffice.js"></script>
</body>
</html>