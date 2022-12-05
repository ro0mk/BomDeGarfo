<?php
    $host="localhost";
    $database="bom_dgarfo";
    $user="root";
    $pass="";
    $conn = new mysqli($host, $user, $pass, $database); 
    session_start();

    if (!isset($_SESSION["user"])) {
        $_SESSION["mensagem"] = "Sessão não iniciada.";
        header("location:login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style_sobre.css">
    <title>Bom d'Garfo</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/9149445993.js" crossorigin="anonymous"></script>
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
</head>
<?php
        session_start();
        if (isset($_SESSION["mensagem"])) { 
            echo $_SESSION["mensagem"];
            unset($_SESSION["mensagem"]);
        }
        if (isset($_SESSION['user'])) {
          ?> 
            <li><a href="backoffice.php">Backoffice</a></li>
            <li><a href="faq_logout.php">Logout</a></li>
       <?php } else {
        ?> <li><a href="../login/PHP/login.php">Login</a></li> <?php
       }
    ?>
<body>

    <section class="sobre">
        <h2> Sobre nós </h2>
        <div class="inicio">
            <p class="Bemvindo"> Bem-vindo(a) ao Bom d'Garfo, uma plataforma confiável para o seu dia-a-dia. </p>
            <img class="cozinhando" src="../IMG/cozinhando.jpg" alt="cozinhando">
        </div>

        <div class="Quemsomos">
          <h3> Quem somos </h3>
          <p> Desde 2022 que o nosso propósito é facilitar a vida de pessoas atarefadas e que precisem de receitas rápidas. Além disso, 
            pretendemos desenvolver e evoluir com o principal objetivo de facilitar a procura de quaisquer receitas. Bolos, refeições, 
            entradas… Todo o tipo de comidas. </p>
        </div>

        <div class="historia">
          <h3> A nossa história </h3>
          <p> O Bom d'Garfo surgiu por conta de um projeto escolar, mas evoluiu para muito mais. A nossa equipa consiste em 5 estudantes 
            com um objetivo em comum, ajudar as pessoas muito atarefadas ou que apenas necessitem de receitas rápidas. </p>
        </div>
        <div class="responsabilidade">
          <h3> A nossa Responsabilidade </h3>
          <div class="resps">
          <div class="resp1">
            <img src="../IMG/food.png">
            <h4> Conteúdos </h4>
            <p> Os nossos conteúdos são totalmente pensados nos nossos utilizadores que podem publicar as suas próprias em prol de ajudar outros utilizadores. </p>
          </div>
          <div class="resp2">
            <img src="../IMG/grow.png">
            <h4> Crescimento </h4>
            <p> A perfeição é uma ilusão. Por isso mesmo estamos sempre a trabalhar para aperfeiçoar o nosso website para seu melhor usufruto. </p>
          </div>
          <div class="resp3">
            <img src="../IMG/help.png">
            <h4> Ajuda </h4>
            <p> Estamos sempre a pensar em como melhorar por isso temos a página FAQ onde podemos comunicar com os utilizadores sobre assuntos pertinentes. </p>
          </div>
        </div>
        </div>
        <div class="contactos">
            <h3> Venha conhecer-nos um pouco mais </h3>
            <p> Aqui poderá encontrar a equipa por detrás do Bom D'Garfo como também algumas opções de contacto com cada um de nós. </p>
            <a class="btnCtt" href="a.php"> Contactos</a>
        </div>
        <div class="FAQ">
            <h3> Tem alguma questão? </h3>
            <p> Tem alguma questão que necessite resposta, sinta-se à vontade de visitar a nossa página das perguntas recentemente respondidas (FAQ).
                Caso não encontre o que procura, tem sempre a opção se colocar uma nova questão no formulário. </p>
            <a class="btnFAQ" href="b.php"> FAQ </a>
        </div>
        <div class="noticias">
          <h3> Veja algumas das notícias </h3>
          <div class="notic1">
          <?php 
            $query = "SELECT * FROM noticias LIMIT 3";
            $result_set = $conn->query($query);
            while ($row = $result_set->fetch_object()) {
              echo "<div class='not' id='popup-article?id=$row->IDNoticia'>
                          <div class='imagemmodal'><img src='../IMG/".$row->fotos."' alt=''></div>
                          <h4>".$row->titulo."</h4>
                          <p>".$row->descricao."</p>
                    </div>";
            }
          ?>
          </div>
          <a class="btnnot" href="b.php"> Ver mais </a>
      </div>
    </section>









    <script>
      $(".menu-toggle-btn").click(function(){
        $(this).toggleClass("fa-times");
        $(".navigation-menu").toggleClass("active");
      });
      window.addEventListener("scroll", function(){
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0)
        });

        function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
    </script>


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