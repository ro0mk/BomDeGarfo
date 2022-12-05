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
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/aa.css">
    <title>Bom de Garfo</title>
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
            <li><a href="#">Backoffice</a></li>
            <li><a href="login.php">Login/Logout</a></li>
          </ul>
        </div>
    </header>
</head>
<?php
$IDNoticia=$_GET['id'];
$noticias=$conn->query('SELECT * FROM noticias where IDNoticia='.$IDNoticia)->fetch_assoc();
$titulo=$noticias['titulo'];
$descricao=$noticias['descricao'];
$fotos=$noticias['fotos'];

?>
<body>


    <section class="insert">
    <h1>Editar Noticias</h1>

    <form action="update_noticia.php?id=<?= $IDNoticia ?>" enctype="multipart/form-data" method="POST" >
    <textarea class="textarea" name="titulo"><?= $titulo ?></textarea>
    <textarea class="textarea" name="descricao"><?= $descricao ?></textarea><br>
    <input class="botaofoto" name="fotos" type="file"><br>
    <input class="botaoatualizar" type="submit" value="Atualizar">
</form>

    </section>
    <style>
  .textarea{
    padding: 1em;
    border-radius: 10px;
    font-size: 16px;
    width: 600px;
    height: 200px;
  }
  .botaofoto{
    margin-top: 10px;
    width: 300px;
    height: 50px;
  }
  .botaoatualizar{
    margin-top: 10px;
    width: 300px;
    height: 30px;
  }
    </style>



<footer class="footer">
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
        <li><a href="#">Sobre Nós</a></li>
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
        <a href="index.html"><img src="../IMG/LogotipoNavbarBranco.png" alt=""></a>
    </div>
    </div>
</div>
</footer>
    <script>
      $(".menu-toggle-btn").click(function(){
        $(this).toggleClass("fa-times");
        $(".navigation-menu").toggleClass("active");
      });
      window.addEventListener("scroll", function(){
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0)
        })
    </script>
</body>
</html>