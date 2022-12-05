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
    <div class="criarreceitascab">
      <h2>CRIAR RECEITA</h2>
    </div>  
    <?php include('teste.php');?>
          <!--<div class="formulario">
          <form action="insert_receita.php" method="POST" enctype="multipart/form-data">
            <h3>Titulo Receita</h3>
            <input type="text" name="titulo" autocomplete="off"><br>
            <h3>Cozinheiro</h3>
            <input type="text" name="cozinheiro" autocomplete="off"><br>
            <h3>Descricao</h3>
            <input type="text" name="descricao" autocomplete="off"><br>
            <h3>Ingredientes</h3>
            <input type="text" name="ingredientes" autocomplete="off"><br>
            <h3>Grau de Dificuldade</h3>
            <input type="text" name="grau_dificuldade" autocomplete="off"><br>
            <h3>Tempo de Preparação</h3>
            <input type="text" name="tempo_preparacao" autocomplete="off"><br>
            <h3>Doses</h3>
            <input type="text" name="doses" autocomplete="off"><br>
            <h3>Categoria</h3>
            <input type="text" name="categoria" autocomplete="off"><br>
            <h3>Epoca</h3>
            <input type="text" name="epoca" autocomplete="off"><br>
            <h3>Foto da Receita</h3>
            <input type="file" name="fotos"><br>
            <input type="submit" class="submeter" name="post" value="Inserir Receita"></input>
          </form>
        </div>-->
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
