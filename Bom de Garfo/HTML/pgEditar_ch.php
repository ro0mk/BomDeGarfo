<?php
require('bd.php');
$id=$_REQUEST['IDChefe'];
$query = "SELECT * from chefes where IDChefe=$id"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="pt" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
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
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="insert.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>
<h1>Update Record</h1>
<?php
$status = "";//mensagem que aparece em baixo
if(isset($_POST['new']) && $_POST['new']==1){
    $id=$_REQUEST['IDChefe']; /* (variavel) = Pede [nome da tabela da base de dados] */
    $nome =$_REQUEST['nome'];
    $descricao =$_REQUEST['descric'];
    $especial =$_REQUEST['espec'];
    $foto =$_REQUEST['fotog'];
    $data_nasc =$_REQUEST['dt_nascimento'];
    $update="UPDATE chefes set nome='".$nome."', descricao='".$descricao."',
    Especialidade='".$especial."', foto='".$foto."', dt_nascimento='".$data_nasc."' where IDChefe=$id";
    mysqli_query($conn, $update) or die ( mysqli_error());
    /* $status = "Record Updated Successfully. </br></br>
        <a href='chefs.php'>View Updated Record</a>";    
    echo '<p style="color:#FF0000;">'.$status.'</p>'; */
    header("Location: chefs.php");
}else {
?>
<div>

<h1 class="titulo_editarCh">Editar Chef</h1>
    <form class="forme" action="" method="post">
        <input type="hidden" name="new" value="1" /> <!-- Aqui vai buscar o Id do chefe... -->
        <input name="id" type="hidden" value="<?php echo $row['IDChefe'];?>" /> <!-- ...para saber de qual chefe se trata -->
        <div class="input_ch">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $row['nome']/* vai buscar o nome á bd */;?>">
        </div>
        <div class="input_ch">
            <label for="descric">Descrição:</label>
            <input type="text" name="descric" value="<?php echo $row['descricao'];?>">
        </div>
        <div class="input_ch">
            <label for="espec">Especialidade:</label>
            <input type="text" name="espec" value="<?php echo $row['Especialidade'];?>">
        </div>
        <div class="input_ch">
            <label for="fotog">Foto:</label>
            <input type="text" name="fotog" value="<?php echo $row['foto'];?>">
        </div>
        <div class="input_ch">
            <label for="dt_nascimento">Data de nascimento:</label>
            <input type="text" name="dt_nascimento" value="<?php echo $row['dt_nascimento'];?>">
        </div>
        <input name="submit" type="submit" value="Atualizar" id="atualizar_ch">
        <input type="button" value="Voltar" onclick="window.location.href='chefs.php'" id="voltar_ch">
        
    </form>

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