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
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/style_livros.css">
        <title>Bom d'Garfo</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
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
        <section class="livros">
            <h2> Livros </h2>
            <div class="intro">
                <p> Nesta página iremos providenciar-lhe com alguns livros de certos chefes de cozinha e pastelaria. </p>
            </div>
            <div class="geral">
                <div class="container">
                    <?php 
                        $query = "SELECT * FROM livros";
                        $result_set = $conn->query($query);
                        while ($row = $result_set->fetch_object()) {
                            echo "<div class='li' id='popup-article?id=$row->IDLivro'>
                                <div class='imagemmodal'><img src='../IMG/".$row->foto."' alt=''></div>
                                <h4>".$row->titulo."</h4>
                                <p>".$row->descricao."</p>
                            </div>";
                        }
                    ?>
                </div>
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