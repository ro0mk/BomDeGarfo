<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/aa.css">
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
        if (isset($_SESSION['authenticated'])) {
            header('Location: listUser.php');
        exit(0); }
    ?>



<body>
    <section class="login">
    <div class="container"> 

        <div class="user signinBx">
            <div class="imgBx"><img src="../IMG/cooking.jpg"></div>
            <div class="formBx">
                <form action="auth.php" method="post">
                    <h2> Entrar </h2>
                    <input type="email" name="email" placeholder="Email" id="email">
                    <input type="password" name="pass" placeholder="Password" id="pass">
                    <input type="submit" value="Entrar">
                    <p class="signup">Não tem uma conta? <a href="#" onclick="toggleForm()">Criar conta</a></p>
                </form>
            </div>
        </div>

        <?php
            $nome = "";
            $email = "";
            $passw = "";

            if(!empty($_POST)){
                if (empty($_POST["nomereg"])) {
                    echo "<p>O campo Nome tem de ser preenchido.</p>";
                    $nome = "";
                }else {
                    $nome = $_POST["nomereg"];
                    /* $query = "insert into utilizador (nome) values ('".$nome."')";
                    $result = $conn->query($query); */
                }

                if (empty($_POST["emailreg"])) {
                    echo "<p>O campo Email tem de ser preenchido.</p>";
                    $email = "";
                }else {
                    $email = $_POST["emailreg"];
                    /* $query = "insert into utilizador (email) values ('".$email."')";
                    $result = $conn->query($query); */
                }

                if (empty($_POST["passreg"])) {
                    echo "<p>O campo Password tem de ser preenchido.</p>";
                    $passw = "";
                }else {
                    $passw = hash('sha512', $plaintext_password);
                    /* $query = "insert into utilizador (pass) values ('".$passw."')";
                    $result = $conn->query($query); */
                }
                $query = "insert into utilizador (nome, email, pass, foto) values ('".$nome."','".$email."','".$passw."')";
                $result = $conn->query($query);
            }
        ?>
        <div class="user signupBx">
            <div class="formBx">
            <?php
            if (isset($_SESSION["mensagem"])) { 
                echo $_SESSION["mensagem"];
                unset($_SESSION["mensagem"]);
            }
            if (isset($_SESSION['authenticated'])) {
                header('Location: listUser.php');
            exit(0); }?>
                <form action="listUser.php" method="post">
                    <h2> Criar uma conta </h2>
                    <input type="text" placeholder="Nome" name="nomereg">
                    <input type="email" placeholder="Email" name="emailreg">
                    <input type="password" placeholder="Password" name="passreg">
                    <input type="password" placeholder="Confirme Password"  name="cpassreg">
                    <input type="submit" value="Criar">
                    <p class="signup">Já tem uma conta? <a href="#" onclick="toggleForm()">Entrar</a></p>
                    <?php
                        if (isset($_SESSION['errors'])) {
                        echo "<div>Errors:";
                        foreach ($_SESSION['errors'] as $field => $error)
                        echo "<p>$field: $error</p>";
                        echo "</div>";
                    }?>
                </form>
            </div>
            <div class="imgBx"><img src="../IMG/cooking2.jpg"></div>
        </div>

    </div>
    </section>

    <script>
        function toggleForm() {
            section = document.querySelector("section");
            container = document.querySelector(".container");
            section.classList.toggle("active");
            container.classList.toggle("active");
        }
    </script>
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
    <script src="../JS/script.js"></script>
</body>
</html>