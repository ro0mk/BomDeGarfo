<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/contactos.css">
    <title>Bom d'Garfo</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/9149445993.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <?php
    require('bd.php');
    ?>
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

<body>


    <div class="tituloinicio"> Sobre Nós</div>

    <div class="descricao">Lorem Ipsum is simply dummy text of the printing
        and typesetting industry. Lorem Ipsum has been the industry's standard
        dummy text ever since the 1500s, when an unknown printer took a galley
        of type and scrambled it to make a type specimen book. It has survived
        not only five centuries, but also the leap into electronic typesetting,
        remaining essentially unchanged. It was popularised in the 1960s with
        the release of Letraset sheets containing Lorem Ipsum passages, and more
        recently with desktop publishing software like Aldus PageMaker
        including versions of Lorem Ipsum.</div>

    <div class="equipa">Os nossos Contactos</div>


    <div class='grid-container'>
        <div class="grid-item">Duarte Ferreira</div>
        <div class="grid-item">Roman Kalyuzhnov</div>
        <div class="grid-item">Miguel Mendes</div>
        <div class="grid-item">Bárbara Rodrigues</div>
        <div class="grid-item">Estágio</div>
        <div class="grid-item1">CEO <br>
            <div class="numero"> +351 919 251 172</div>
        </div>
        <div class="grid-item1">COO <br>
            <div class="numero"> +351 923 698 154</div>
        </div>
        <div class="grid-item1">CTO <br>
            <div class="numero"> +351 912 837 162</div>
        </div>
        <div class="grid-item1">Designer <br>
            <div class="numero"> +351 915 812 682</div>
        </div>
        <div class="grid-item1">Engenharia Informática <br>
            <div class="numero"> +351 918 561 123</div>
        </div>
        <?php
        $fotos = $conn->query('SELECT fotos from contactos');
        
       foreach ($fotos as $foto) {
       echo  '<div class="imagemgrid">
       <img class="imagemgrid" alt="foto" src="../IMG/'.$foto['fotos'].'"></img>
   </div>';
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
        <script>
            $(".menu-toggle-btn").click(function() {
                $(this).toggleClass("fa-times");
                $(".navigation-menu").toggleClass("active");
            });
            window.addEventListener("scroll", function() {
                var header = document.querySelector("header");
                header.classList.toggle("sticky", window.scrollY > 0)
            })
        </script>
</body>

</html>