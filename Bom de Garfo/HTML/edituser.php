<?php
    $host="localhost";
    $database="bom_dgarfo";
    $user="root";
    $pass="";
    $conn = new mysqli($host, $user, $pass, $database); 
    session_start();
    
    $id=$_REQUEST['idUtl'];
    $query = "SELECT * FROM utilizador WHERE idUtl=$id"; 
    $result = mysqli_query($conn,$query) or die ( mysqli_error());
    $row = mysqli_fetch_assoc($result);

    if (!isset($_SESSION["user"])) {
        $_SESSION["mensagem"] = "Sessão não iniciada.";
        header("location:login.php");
        exit;
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
    
    <?php
        $status = "";
        if(isset($_POST['new']) && $_POST['new']==1){
            $id=$_REQUEST['idUtl'];
            $nome =$_REQUEST['nome'];
            $email =$_REQUEST['email'];
            $update="UPDATE utilizador SET nome='".$nome."',
            email='".$email."' where idUtl = $id";
            mysqli_query($conn, $update) or die ( mysqli_error());
            header("Location: listUser.php"); 
        }else {
?>

    <section class="insert">
    <h1>Formuláro de Registo</h1>
    <form class="forme" action="" method="post">
        <input type="hidden" name="new" value="1" />
        <input name="id" type="hidden" value="<?php echo $row['idUtl'];?>" />
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $row['nome'];?>">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $row['email'];?>">
        </div>
        <div>
            <label for="passw">Password:</label>
            <input type="password" name="passw" value="<?php echo $row['pass'];?>">
        </div>
        <input name="submit" type="submit" value="Atualizar">
        <input type="button" value="Voltar" onclick="window.location.href='listUser.php'">
        
    </form>
    


    <div class="mensagens">
    <?php
    /* $nome = "";
    $email = "";
    $passw = "";

    if(!empty($_POST)){
        if (empty($_POST["nome"])) {
            echo "<p>O campo Nome tem de ser preenchido.</p>";
            $nome = "";
        }else {
            $nome = $_POST["nome"];
            echo "<p>Nome salvo com sucesso</p>";
        }

        if (empty($_POST["email"])) {
            echo "<p>O campo Email tem de ser preenchido.</p>";
            $email = "";
        }else {
            $email = $_POST["email"];
            echo "<p>Email salvo com sucesso</p>";
        }

        if (empty($_POST["passw"])) {
            echo "<p>O campo Password tem de ser preenchido.</p>";
            $passw = "";
        }else {
            echo "<p>Password salva com sucesso</p>";
        }  */
        /* $query = "insert into utilizador (nome, email, pass) values ('".$nome."','".$email."','".$passw."')";
        $result = $conn->query($query); */
    /* } */
     ?> 
     </div>
     
    </section>

    <?php } ?>

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
      $(".menu-toggle-btn").click(function(){
        $(this).toggleClass("fa-times");
        $(".navigation-menu").toggleClass("active");
      });
      window.addEventListener("scroll", function(){
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>
</body>
</html>