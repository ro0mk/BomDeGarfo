<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Bom d'Garfo | Receitas</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/9149445993.js" crossorigin="anonymous"></script>
    <?php
      require ('bd.php');
    ?>
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
    <div class="receitascab">
      <nav class="categoriasnav">
      <ul class="nav justify-content-center tipo2">
        <h2>Categorias:</h2>
          <li class="nav-item">
            <a class="nav-link" href="receitas.php">Sopas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="receitas.php">Carne</a>  
          </li>
          <li class="nav-item">
            <a class="nav-link" href="receitas.php">Peixe</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="receitas.php">Vegan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="receitas.php">Sobremesas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="receitas.php">Bolos</a>
          </li>
        </ul>
      </nav>
      <h2>TODAS AS RECEITAS</h2>
    </div>

    <div style="display: flex; justify-content: center;">
    <a href="criarreceita.php"><button id="myBtn">Criar Receita</button></a>
    <a href="receita_cliente.php"><button style="margin-left: 50px;" id="myBtn">Receitas Clientes</button></a>
    </div>
    <div class="estruturacard">
    <?php
            $query = "select * from receitas";
            $result_set = $conn->query($query);
            while ($row = $result_set->fetch_object()) {
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
        ?>
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
      <script src="../JS/script.js"></script>
  </body>
</html>
