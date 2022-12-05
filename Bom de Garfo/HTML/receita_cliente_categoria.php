<?php

$host = "localhost";
$database = "bom_dgarfo";

$conn = new mysqli($host, "root", "" , $database);

session_start();

$conn->set_charset("UTF8");

?>

<!DOCTYPE html>
<html lang="pt-PT" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/recei_Clientes.css">
    <title>Bom d'Garfo</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/9149445993.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body  style="width:100%;overflow-x:hidden;">
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

<div id="receita_Cliente">

  <div id="titulo_Receitas_Cliente" class="container">

  <h2 style="font-weight:900;margin-bottom:20px;">Receitas em Destaque</h2>

  </div>

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner container">

    <div class="carousel-item active">
              <img src="../IMG/comida.jpg" alt="comida" style="width: 600px;border-radius: 30px;margin-bottom: 10px;">
              <h3>Bife</h3>
    </div>

  

        <?php

            $get_photo = "SELECT * FROM receitas WHERE user='sim' LIMIT 3";
            $photo_1 = $conn->query($get_photo);

            if (isset($photo_1)) {

              while ($row = $photo_1->fetch_object()) {

                echo '<div class="carousel-item">
                      <img src="../IMG/receitasimg/' .$row->fotos. '" alt="comida" style="width: 600px;border-radius: 30px;margin-bottom: 10px;">
                      <h3>' .$row->titulo. '</h3>
                     </div>';

              }


            }

          

        ?>


      <button id="prev" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button id="next" class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <div class="row">
    <form action="receita_Cliente_Search.php" id="search" method="GET" class="col-xs-12">

      <input type="text" id="searchBar" placeholder="Search.." name="search_Bar">
      <button type="submit" id="searchBtn" name="search_Btn"><img src="../img/searchButton.png" alt="Search"></button>

    </form>
  </div>



  <div class="receitascab">
      <nav class="categoriasnav_Clientes">
      <ul class="nav justify-content-center tipo2">
        <h4>Categorias:</h4>
          <form action="receita_cliente_categoria.php" method="GET" enctype="multipart/form-data" style="display:flex;flex-direction:row;">
            <li class="nav-item">
              <button type="submit" class="nav-link" name="sopas" formaction="receita_cliente_categoria.php" formmethod="GET" value="Sopa">Sopas</button>
            </li>
            <li class="nav-item">
            <button type="submit" class="nav-link" name="carne" formaction="receita_cliente_categoria.php"  formmethod="GET" value="Carne">Carne</button>
            </li>
            <li class="nav-item">
            <button type="submit" class="nav-link" name="peixe" formaction="receita_cliente_categoria.php"  formmethod="GET" value="Peixe">Peixe</button>
            </li>
            <li class="nav-item">
            <button type="submit" class="nav-link" name="vegan" formaction="receita_cliente_categoria.php"  formmethod="GET" value="Vegan">Vegan</button>
            </li>
            <li class="nav-item">
            <button type="submit" class="nav-link" name="sobremesa" formaction="receita_cliente_categoria.php"  formmethod="GET" value="Sobremesas">Sobremesas</button>
            </li>
            <li class="nav-item">
            <button type="submit" class="nav-link" name="bolos" formaction="receita_cliente_categoria.php"  formmethod="GET" value="Bolos">Bolos</button>
            </li>
          </form>
        </ul>
      </nav>
    </div>






<div class="estruturacard">
<?php





            if (!empty($_GET['search_Bar'])) {

                $search_re = $_GET['search_Bar'];
                $query = "SELECT * FROM receitas WHERE user='sim' AND titulo LIKE '%" .$search_re. "%'";
                $result_Search = $conn->query($query);

            while ($row = $result_Search->fetch_object()) {
              echo "
              <div class='cardtodo'>
                    <div class='cardcab'>
                        <h5 style='color: #ff6a00;'>".$row->categoria."</h5>
                        <h5 style='color: white;'>".$row->cozinheiro."</h5>
                    </div>
                    <div class='cardcorpo'>
                            <img src='../IMG/receitasimg/".$row->fotos."' alt='' class='imgreceita'>
                        <div class='titulocard'>
                            <h1>".$row->titulo."</h1>
                        </div>
                    </div>
                    <div class='cardfooter'>
                        <img src='../IMG/noun-cook-hat-4585881.svg' class='hat' alt=''>
                        <a href='#popup-article?id=$row->IDReceita' class='open-popup'><input type='button' class='btcard' value='Ver Mais'></a>
                    </div>
                </div>
          <div id='popup-article?id=$row->IDReceita' class='popup'>
              <div class='popup__container'>
                  <a href='#' class='popup__close'>
                  <span class='screen-reader'>close</span>
                  </a>
                  <div class='popup__content'>  
                      <h1 class='popup__title r-title'>".$row->titulo."</h1>
                      <img class='imgpopreceita' src='../IMG/receitasimg/".$row->fotos."' alt=''>
                      <p>".$row->tempo_preparacao." | ".$row->grau_dificuldade." | ".$row->doses."</p>
                      <h4>Ingredientes</h4>
                      <p>".$row->ingredientes."</p>
                      <h4>Descrição</h4>
                      <p>".$row->descricao."</p>
                      <p>".$row->epoca." | ".$row->classificacao." estrelas</p>
                  </div>
              </div>
          </div>";
              }
            
            } if (isset($_GET['sopas'])) {


                $sopas = $_GET['sopas'];
                $sopas_filter = "SELECT * FROM receitas WHERE user='sim' AND categoria='Sopa'";
                $sopas_filter_conn = $conn->query($sopas_filter);

                while ($row = $sopas_filter_conn->fetch_object()) {
                    echo "
                    <div class='cardtodo'>
                          <div class='cardcab'>
                              <h5 style='color: #ff6a00;'>".$row->categoria."</h5>
                              <h5 style='color: white;'>".$row->cozinheiro."</h5>
                          </div>
                          <div class='cardcorpo'>
                                  <img src='../IMG/receitasimg/".$row->fotos."' alt='' class='imgreceita'>
                              <div class='titulocard'>
                                  <h1>".$row->titulo."</h1>
                              </div>
                          </div>
                          <div class='cardfooter'>
                              <img src='../IMG/noun-cook-hat-4585881.svg' class='hat' alt=''>
                              <a href='#popup-article?id=$row->IDReceita' class='open-popup'><input type='button' class='btcard' value='Ver Mais'></a>
                          </div>
                      </div>
                <div id='popup-article?id=$row->IDReceita' class='popup'>
                    <div class='popup__container'>
                        <a href='#' class='popup__close'>
                        <span class='screen-reader'>close</span>
                        </a>
                        <div class='popup__content'>  
                            <h1 class='popup__title r-title'>".$row->titulo."</h1>
                            <img class='imgpopreceita' src='../IMG/receitasimg/".$row->fotos."' alt=''>
                            <p>".$row->tempo_preparacao." | ".$row->grau_dificuldade." | ".$row->doses."</p>
                            <h4>Ingredientes</h4>
                            <p>".$row->ingredientes."</p>
                            <h4>Descrição</h4>
                            <p>".$row->descricao."</p>
                            <p>".$row->epoca." | ".$row->classificacao." estrelas</p>
                        </div>
                    </div>
                </div>";

                }
            } if (isset($_GET['carne'])) {


                $carne = $_GET['carne'];
                $carne_filter = "SELECT * FROM receitas WHERE user='sim' AND categoria='Carne'";
                $carne_filter_conn = $conn->query($carne_filter);

                while ($row = $carne_filter_conn->fetch_object()) {
                    echo "
                    <div class='cardtodo'>
                          <div class='cardcab'>
                              <h5 style='color: #ff6a00;'>".$row->categoria."</h5>
                              <h5 style='color: white;'>".$row->cozinheiro."</h5>
                          </div>
                          <div class='cardcorpo'>
                                  <img src='../IMG/receitasimg/".$row->fotos."' alt='' class='imgreceita'>
                              <div class='titulocard'>
                                  <h1>".$row->titulo."</h1>
                              </div>
                          </div>
                          <div class='cardfooter'>
                              <img src='../IMG/noun-cook-hat-4585881.svg' class='hat' alt=''>
                              <a href='#popup-article?id=$row->IDReceita' class='open-popup'><input type='button' class='btcard' value='Ver Mais'></a>
                          </div>
                      </div>
                <div id='popup-article?id=$row->IDReceita' class='popup'>
                    <div class='popup__container'>
                        <a href='#' class='popup__close'>
                        <span class='screen-reader'>close</span>
                        </a>
                        <div class='popup__content'>  
                            <h1 class='popup__title r-title'>".$row->titulo."</h1>
                            <img class='imgpopreceita' src='../IMG/receitasimg/".$row->fotos."' alt=''>
                            <p>".$row->tempo_preparacao." | ".$row->grau_dificuldade." | ".$row->doses."</p>
                            <h4>Ingredientes</h4>
                            <p>".$row->ingredientes."</p>
                            <h4>Descrição</h4>
                            <p>".$row->descricao."</p>
                            <p>".$row->epoca." | ".$row->classificacao." estrelas</p>
                        </div>
                    </div>
                </div>";

                }
            } if (isset($_GET['peixe'])) {


                $peixe = $_GET['peixe'];
                $peixe_filter = "SELECT * FROM receitas WHERE user='sim' AND categoria='Peixe'";
                $peixe_filter_conn = $conn->query($peixe_filter);

                while ($row = $peixe_filter_conn->fetch_object()) {
                    echo "
                    <div class='cardtodo'>
                          <div class='cardcab'>
                              <h5 style='color: #ff6a00;'>".$row->categoria."</h5>
                              <h5 style='color: white;'>".$row->cozinheiro."</h5>
                          </div>
                          <div class='cardcorpo'>
                                  <img src='../IMG/receitasimg/".$row->fotos."' alt='' class='imgreceita'>
                              <div class='titulocard'>
                                  <h1>".$row->titulo."</h1>
                              </div>
                          </div>
                          <div class='cardfooter'>
                              <img src='../IMG/noun-cook-hat-4585881.svg' class='hat' alt=''>
                              <a href='#popup-article?id=$row->IDReceita' class='open-popup'><input type='button' class='btcard' value='Ver Mais'></a>
                          </div>
                      </div>
                <div id='popup-article?id=$row->IDReceita' class='popup'>
                    <div class='popup__container'>
                        <a href='#' class='popup__close'>
                        <span class='screen-reader'>close</span>
                        </a>
                        <div class='popup__content'>  
                            <h1 class='popup__title r-title'>".$row->titulo."</h1>
                            <img class='imgpopreceita' src='../IMG/receitasimg/".$row->fotos."' alt=''>
                            <p>".$row->tempo_preparacao." | ".$row->grau_dificuldade." | ".$row->doses."</p>
                            <h4>Ingredientes</h4>
                            <p>".$row->ingredientes."</p>
                            <h4>Descrição</h4>
                            <p>".$row->descricao."</p>
                            <p>".$row->epoca." | ".$row->classificacao." estrelas</p>
                        </div>
                    </div>
                </div>";

                }
            } if (isset($_GET['vegan'])) {


                $vegan = $_GET['vegan'];
                $vegan_filter = "SELECT * FROM receitas WHERE user='sim' AND categoria='Vegan'";
                $vegan_filter_conn = $conn->query($vegan_filter);

                while ($row = $vegan_filter_conn->fetch_object()) {
                    echo "
                    <div class='cardtodo'>
                          <div class='cardcab'>
                              <h5 style='color: #ff6a00;'>".$row->categoria."</h5>
                              <h5 style='color: white;'>".$row->cozinheiro."</h5>
                          </div>
                          <div class='cardcorpo'>
                                  <img src='../IMG/receitasimg/".$row->fotos."' alt='' class='imgreceita'>
                              <div class='titulocard'>
                                  <h1>".$row->titulo."</h1>
                              </div>
                          </div>
                          <div class='cardfooter'>
                              <img src='../IMG/noun-cook-hat-4585881.svg' class='hat' alt=''>
                              <a href='#popup-article?id=$row->IDReceita' class='open-popup'><input type='button' class='btcard' value='Ver Mais'></a>
                          </div>
                      </div>
                <div id='popup-article?id=$row->IDReceita' class='popup'>
                    <div class='popup__container'>
                        <a href='#' class='popup__close'>
                        <span class='screen-reader'>close</span>
                        </a>
                        <div class='popup__content'>  
                            <h1 class='popup__title r-title'>".$row->titulo."</h1>
                            <img class='imgpopreceita' src='../IMG/receitasimg/".$row->fotos."' alt=''>
                            <p>".$row->tempo_preparacao." | ".$row->grau_dificuldade." | ".$row->doses."</p>
                            <h4>Ingredientes</h4>
                            <p>".$row->ingredientes."</p>
                            <h4>Descrição</h4>
                            <p>".$row->descricao."</p>
                            <p>".$row->epoca." | ".$row->classificacao." estrelas</p>
                        </div>
                    </div>
                </div>";

                }
            } if (isset($_GET['sobremesa'])) {


                $sobremesa = $_GET['sobremesa'];
                $sobremesa_filter = "SELECT * FROM receitas WHERE user='sim' AND categoria='Sobremesa'";
                $sobremesa_filter_conn = $conn->query($sobremesa_filter);

                while ($row = $sobremesa_filter_conn->fetch_object()) {
                    echo "
                    <div class='cardtodo'>
                          <div class='cardcab'>
                              <h5 style='color: #ff6a00;'>".$row->categoria."</h5>
                              <h5 style='color: white;'>".$row->cozinheiro."</h5>
                          </div>
                          <div class='cardcorpo'>
                                  <img src='../IMG/receitasimg/".$row->fotos."' alt='' class='imgreceita'>
                              <div class='titulocard'>
                                  <h1>".$row->titulo."</h1>
                              </div>
                          </div>
                          <div class='cardfooter'>
                              <img src='../IMG/noun-cook-hat-4585881.svg' class='hat' alt=''>
                              <a href='#popup-article?id=$row->IDReceita' class='open-popup'><input type='button' class='btcard' value='Ver Mais'></a>
                          </div>
                      </div>
                <div id='popup-article?id=$row->IDReceita' class='popup'>
                    <div class='popup__container'>
                        <a href='#' class='popup__close'>
                        <span class='screen-reader'>close</span>
                        </a>
                        <div class='popup__content'>  
                            <h1 class='popup__title r-title'>".$row->titulo."</h1>
                            <img class='imgpopreceita' src='../IMG/receitasimg/".$row->fotos."' alt=''>
                            <p>".$row->tempo_preparacao." | ".$row->grau_dificuldade." | ".$row->doses."</p>
                            <h4>Ingredientes</h4>
                            <p>".$row->ingredientes."</p>
                            <h4>Descrição</h4>
                            <p>".$row->descricao."</p>
                            <p>".$row->epoca." | ".$row->classificacao." estrelas</p>
                        </div>
                    </div>
                </div>";

                }
            } if (isset($_GET['bolos'])) {


                $bolos = $_GET['bolos'];
                $bolos_filter = "SELECT * FROM receitas WHERE user='sim' AND categoria='Bolo'";
                $bolos_filter_conn = $conn->query($bolos_filter);

                while ($row = $bolos_filter_conn->fetch_object()) {
                    echo "
                    <div class='cardtodo'>
                          <div class='cardcab'>
                              <h5 style='color: #ff6a00;'>".$row->categoria."</h5>
                              <h5 style='color: white;'>".$row->cozinheiro."</h5>
                          </div>
                          <div class='cardcorpo'>
                                  <img src='../IMG/receitasimg/".$row->fotos."' alt='' class='imgreceita'>
                              <div class='titulocard'>
                                  <h1>".$row->titulo."</h1>
                              </div>
                          </div>
                          <div class='cardfooter'>
                              <img src='../IMG/noun-cook-hat-4585881.svg' class='hat' alt=''>
                              <a href='#popup-article?id=$row->IDReceita' class='open-popup'><input type='button' class='btcard' value='Ver Mais'></a>
                          </div>
                      </div>
                <div id='popup-article?id=$row->IDReceita' class='popup'>
                    <div class='popup__container'>
                        <a href='#' class='popup__close'>
                        <span class='screen-reader'>close</span>
                        </a>
                        <div class='popup__content'>  
                            <h1 class='popup__title r-title'>".$row->titulo."</h1>
                            <img class='imgpopreceita' src='../IMG/receitasimg/".$row->fotos."' alt=''>
                            <p>".$row->tempo_preparacao." | ".$row->grau_dificuldade." | ".$row->doses."</p>
                            <h4>Ingredientes</h4>
                            <p>".$row->ingredientes."</p>
                            <h4>Descrição</h4>
                            <p>".$row->descricao."</p>
                            <p>".$row->epoca." | ".$row->classificacao." estrelas</p>
                        </div>
                    </div>
                </div>";

                }
            }  
           
?>
    </div>




    <?php 
            if (isset($_SESSION['user'])) {


      echo '<h2 style="display:flex;margin:auto;margin-top:50px;margin-bottom:50px;justify-content:center;color:#FF7919;font-weight:1000;">Partilhe as suas receitas com todos</h2>
      
      
            <button id="flip" style="display:flex;margin: auto;background-color:#ff6a00;border-radius: 100px;height: 100px;width: 100px;border: none;margin-bottom: 50px;transition-duration: 1s;">
              <img src="../img/faqPlus.png" alt="plus" style="margin:auto;display:flex;width:100px;">
            </button>



      <div id="form_Grupo" class="container" style="display: none;justify-content: center;text-align: center;flex-direction: column;">
          <form action="receita_Cliente_insert.php" method="POST" enctype="multipart/form-data" id="form_recei">

            <label for="titu" style="font-size: 20pt;font-weight: 1000;color:#FF7919;">Título receita*</label>
            <input type="text" name="titulo" id="titu" autocomplete="off" style="width:300px;margin:auto;margin-bottom:15px;" placeholder="Nome da receita" required><br>

            <label for="cozi" style="font-size: 20pt;font-weight: 1000;color:#FF7919;">Cozinheiro*</label>
            <input type="text" name="cozinheiro" id="cozi" autocomplete="off"style="width:300px;margin:auto;margin-bottom:15px;" placeholder="Nome do Chef" required><br>

            <label for="descri" style="font-size: 20pt;font-weight: 1000;color:#FF7919;">Descrição*</label>
            <input type="text" name="descricao" id="descri" autocomplete="off" style="width:600px;margin:auto;margin-bottom:15px;" placeholder="1-Ferver água. 2-Adicionar sal..." required><br>

            <label for="ingre" style="font-size: 20pt;font-weight: 1000;color:#FF7919;">Ingredientes*</label>
            <input type="text" name="ingredientes" id="ingre" autocomplete="off" style="width:600px;margin:auto;margin-bottom:15px;" placeholder="Batatas, Couve, Ovos" required><br>

            <label for="Gra_d_difi" style="font-size: 20pt;font-weight: 1000;color:#FF7919;">Grau de Difículdade*</label>
            <select name="grau_dificuldade" id="Gra_d_difi" style="width:200px;text-align:center;margin:auto;margin-bottom:15px;" required>
                <option value="Facil">Fácil</option>
                <option value="Medio">Médio</option>
                <option value="Dificil">Difícil</option>
            </select><br>


            <label for="temp" style="font-size: 20pt;font-weight: 1000;color:#FF7919;">Tempo de Preparação*</label>
            <input type="text" name="tempo_preparacao" id="temp" autocomplete="off" style="width:600px;margin:auto;margin-bottom:15px;" placeholder="00:00:00" required><br>

            <label for="dos" style="font-size: 20pt;font-weight: 1000;color:#FF7919;">Doses*</label>
            <input type="number" name="doses" id="dos" autocomplete="off" style="width:100px;margin:auto;margin-bottom:15px;" placeholder="1" required><br>

            <label for="categor" style="font-size: 20pt;font-weight: 1000;color:#FF7919;">Categoria*</label>
            <select name="categoria" id="categor" style="width:200px;margin:auto;margin-bottom:15px;text-align:center;" required>
                <option value="Sopa">Sopa</option>
                <option value="Peixe">Peixe</option>
                <option value="Carne">Carne</option>
                <option value="Vegan">Vegan</option>
                <option value="Sobremesa">Sobremesa</option>
                <option value="Bolo">Bolos</option>
            </select><br>

            <label for="epc" style="font-size: 20pt;font-weight: 1000;color:#FF7919;">Época*</label>
            <input type="text" name="epoca" id="epc" autocomplete="off" style="width:200px;margin:auto;margin-bottom:15px;" placeholder="Natal" required><br>

            <div class="row" style="display:flex;margin:auto;margin-top:30px;margin-bottom:40px;">

              <label for="fotodR" style="font-size: 20pt;font-weight: 1000;color:#FF7919;margin-right:10px;">Foto da Receita*:</label>
              <input type="file" name="fotos" id="fotodR" style="margin:auto;margin-bottom:25px;" required><br>
            
            </div>

            <button type="submit" class="submeter" name="post" style="width:150px;height:50px;margin:auto;margin-bottom:15px;background-color:#ff6a00;color:white;border-radius:10px;font-weight:bold;">Inserir Receita</button>
          </form>
        </div>';


           };
          ?>
  </div>
    





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

  
  <script>
    $(".menu-toggle-btn").click(function () {
      $(this).toggleClass("fa-times");
      $(".navigation-menu").toggleClass("active");
    });
    window.addEventListener("scroll", function () {
      var header = document.querySelector("header");
      header.classList.toggle("sticky", window.scrollY > 0)
    })
  </script>





  <script src="../js/script.js"></script>
  <script src="../js/receita_cliente.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</body>

</html>