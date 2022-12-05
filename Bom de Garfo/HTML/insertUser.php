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

    $status = "";
    if(isset($_POST['new']) && $_POST['new']==1){
        $id=$_REQUEST['idUtl'];
        $nome =$_REQUEST['nome'];
        $email =$_REQUEST['email'];
        $ins_query="insert into utilizador (`idUtl`,`nome`,`email`)values
        ('$id','$nome','$email')";
        mysqli_query($conn,$ins_query) or die(mysql_error());
        $status = "New Record Inserted Successfully.
            </br></br><a href='view.php'>View Inserted Record</a>";
        }
?>
<!DOCTYPE html>
<html lang="pt" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/aa.css">
    <title>Bom de Garfo</title>
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
          <a href="contactos.php">Sobre</a>
          <hr>
          <a id="profileclick"><i class="fas fa-fingerprint"></i>Profile</a>
        </nav>
        <div class="profile">
          <h6 class="nick"><i class="fas fa-fingerprint finger"></i>Duarte Ferreira</h6>
          <hr>
          <ul>
            <li><a href="dicas.php">Dicas</a></li>
            <li><a href="faq.php">FAQ's</a></li>
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
</head>
<body>
    <!-- <p> Será rederecionado em <span id="countdowntimer">5 </span> segundos</p>

    <script>
        var timeleft = 5;
        if (timeleft > 0) {
            var downloadTimer = setInterval(function(){
            timeleft--;
            document.getElementById("countdowntimer").textContent = timeleft;
            if(timeleft <= 0)
                clearInterval(downloadTimer);
            },1000);
        setTimeout(function(){
            location.href = 'login.php';
        }, 5000);
        }
    </script> -->
    <section class="insert">
    <h1>Formuláro de Registo</h1>
    <form class="forme" action="" method="post">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="passw">Password:</label>
            <input type="password" name="passw">
        </div>
        <input type="submit" value="Registar">
        <input type="reset" value="Limpar">
        <input type="button" value="Voltar" onclick="window.location.href='listUser.php'">
        
    </form>

    <div class="mensagens">
    <?php
    $nome = "";
    $email = "";
    $passw = "";

    if(!empty($_POST)){
        if (empty($_POST["nome"])) {
            echo "<p>O campo Nome tem de ser preenchido.</p>";
            $nome = "";
        }else {
            $nome = $_POST["nome"];
            echo "<p>Nome salvo com sucesso</p>";
            /* $query = "insert into utilizador (nome) values ('".$nome."')";
            $result = $conn->query($query); */
        }

        if (empty($_POST["email"])) {
            echo "<p>O campo Email tem de ser preenchido.</p>";
            $email = "";
        }else {
            $email = $_POST["email"];
            echo "<p>Email salvo com sucesso</p>";
            /* $query = "insert into utilizador (email) values ('".$email."')";
            $result = $conn->query($query); */
        }

        if (empty($_POST["passw"])) {
            echo "<p>O campo Password tem de ser preenchido.</p>";
            $passw = "";
        }else {
            echo "<p>Password salva com sucesso</p>";
            /* $passw = hash('sha512', $plaintext_password);
            $query = "insert into utilizador (pass) values ('".$passw."')";
            $result = $conn->query($query);*/
        } 
        $query = "insert into utilizador (nome, email, pass) values ('".$nome."','".$email."','".$passw."')";
        $result = $conn->query($query);
    }

     ?>
     </div>
    </section>


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
            header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>
    <script src="../JS/script.js"></script>
</body>
</html>