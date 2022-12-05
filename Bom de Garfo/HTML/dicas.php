<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/dicas.css">
  <title>Bom d'Garfo</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
  <script src="https://kit.fontawesome.com/9149445993.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <?php
  require('bd.php');
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
      <a href="#">Sobre</a>
      <hr>
      <a id="profileclick"><i class="fas fa-fingerprint"></i>Profile</a>
    </nav>
    <div class="profile">
      <h6 class="nick"><i class="fas fa-fingerprint finger"></i>Duarte Ferreira</h6>
      <hr>
      <ul>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Favoritos</a></li>
<?php
if (isset($_SESSION['user'])) {
  ?><li><a href="backoffice.php">Backoffice</a></li>
  <li><a href="Faq_Logout.php">Logout</a></li><?php
} else {
  ?><li><a href="login.php">Login</a></li><?php
}
?>
      </ul>
    </div>
  </header>
  <div class="dicastodas">

    <section>
      <h2 class="title">Dicas</h2>

      <?php
      $sql = "SELECT * from dicas_semanais";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);

      if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {


          foreach ($result as $titulo) {
            echo '<div class="faq">
        <div class="question">
        
         <div class="texto1"> ' . $titulo['titulo'] . ' </div>
          <svg width="15" height="10" viewBox="0 0 42 25">
            <path d="M3 3L21 21L39 3" stroke="black" stroke-widht="7" stroke-linecap="round" />
          </svg>
        </div>
        <div class="answer">
          <div class="texto2">
          ' . $titulo['descricao'] . '
          </div>
        </div>
      </div>';
          }
        }
      }

      ?>
    </section>
  </div>














  <button class="bt-top" onclick="backtop()"><i class="fa-solid fa-circle-arrow-up fa-2xl"></i></button>
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="footer-col">
          <h4>mapa website</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Receitas</a></li>
            <li><a href="#">Noticias</a></li>
            <li><a href="#">Sobre NÃ³s</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>contactos</h4>
          <ul>
            <li><a href="#">about us</a></li>
            <li><a href="#">services</a></li>
            <li><a href="#">Receipts</a></li>
            <li><a href="#">Contacts</a></li>
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
          <a href="index.html"><img src="../IMG/LogotipoBranco.png" alt=""></a>
        </div>
      </div>
    </div>
  </footer>
  <script src="../JS/dicas.js"></script>
</body>

</html>