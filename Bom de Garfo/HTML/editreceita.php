<?php
    $host="localhost";
    $database="bom_dgarfo";
    $user="root";
    $pass="";
    $conn = new mysqli($host, $user, $pass, $database); 
    session_start();
    
    $IDReceita=$_REQUEST['IDReceita'];
    $query = "SELECT * FROM receitas WHERE IDReceita=$IDReceita"; 
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
            $IDReceita=$row['IDReceita'];
            $cozinheiro =$_REQUEST['cozinheiro'];
            $titulo =$_REQUEST['titulo'];
            $descricao =$_REQUEST['descricao'];
            $ingredientes =$_REQUEST['ingredientes'];
            $tempo_preparacao =$_REQUEST['tempo_preparacao'];
            $grau_facilidade =$_REQUEST['grau_facilidade'];
            $doses =$_REQUEST['doses'];
            $categoria =$_REQUEST['categoria'];
            $epoca =$_REQUEST['epoca'];
            $classificacao =$_REQUEST['classificacao'];
            $fotos =$_REQUEST['fotos'];
            $update="UPDATE receitas SET cozinheiro= $cozinheiro, titulo= $titulo, descricao= $descricao, 
            ingredientes= $ingredientes, tempo_preparacao= $tempo_preparacao, grau_facilidade= $grau_facilidade, 
            doses= $doses, categoria= $categoria, epoca= $epoca, classificacao= $classificacao, fotos= $fotos 
            where IDReceita = $IDReceita";
            mysqli_query($conn, $update) or die ( mysqli_error());
            header("Location: listUser.php"); 
        }else {
?>

    <section class="insert">
    <h1>Formuláro de Registo</h1>
    <form class="forme" action="" method="post">
        <input type="hidden" name="new" value="1" />
        <input name="IDReceita" type="hidden" value="<?php echo $row['IDReceita'];?>" />
        <div>
            <label for="cozinheiro">Cozinheiro:</label>
            <input type="text" name="cozinheiro" value="<?php echo $row['cozinheiro'];?>">
        </div>
        <div>
            <label for="email">Titulo:</label>
            <input type="text" name="titulo" value="<?php echo $row['titulo'];?>">
        </div>
        <div>
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" value="<?php echo $row['descricao'];?>">
        </div>
        <div>
            <label for="ingredientes">Ingredientes:</label>
            <input type="text" name="ingredientes" value="<?php echo $row['ingredientes'];?>">
        </div>
        <div>
            <label for="tempo_preparacao">Tempo de Preparação:</label>
            <input type="time" name="tempo_preparacao" value="<?php echo $row['tempo_preparacao'];?>">
        </div>
        <div>
            <label for="grau_facilidade">Grau de Facilidade:</label>
            <input type="text" name="grau_facilidade" value="<?php echo $row['grau_facilidade'];?>">
        </div>
        <div>
            <label for="doses">Doses:</label>
            <input type="number" min="1" max="99" name="doses" value="<?php echo $row['doses'];?>">
        </div>
        <div>
            <label for="categoria">Categoria:</label>
            <input type="text" name="categoria" value="<?php echo $row['categoria'];?>">
        </div>
        <div>
            <label for="epoca">Época:</label>
            <input type="text" name="epoca" value="<?php echo $row['epoca'];?>">
        </div>
        <div>
            <label for="fotos">Foto:</label>
            <input type="text" name="fotos" value="<?php echo $row['fotos'];?>">
        </div>
        <div>
            <label for="classificacao">Classificação:</label>
            <input type="number" min="0" max="5" name="classificacao" value="<?php echo $row['classificacao'];?>">
        </div>
        <input name="submit" type="submit" value="Atualizar">
        <input type="button" value="Voltar" onclick="window.location.href='listUser.php'">
        
    </form>
     
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