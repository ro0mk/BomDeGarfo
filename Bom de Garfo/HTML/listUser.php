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
<body>
    <section class="lista">
        <h1> Tabelas </h1>
        <div class="tabelas">
            <h2 id="utilizadores"> Utilizadores </h2>
                <input class="abrir btn_utilizadores_down" type="button" value="Abrir Tabela">
                <div style = "display:none" class="tabel_util">
                    <div class="container">
                        <table class="ti"><tr>
                            <th> Numero linha </th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th></th>
                            <th></th>
                            </tr>
                        <?php
                        $count=1;
                        $query = "SELECT * FROM utilizador ORDER BY idUtl ASC;";
                        $result_set = $conn->query($query);
                        if ($result_set) { 
                            while ($row = $result_set->fetch_assoc()) {
                                $email = $row['email'];
                                $id=$row['idUtl'];
                                    echo "<tr>
                                        <td align='center'>" .$count. "</td> 
                                        <td align='center'>" .$row['nome']. "</td> 
                                        <td align='center'>" .$email. "</td> <td>";
                                    echo("<a class='editar' href='editUser.php?idUtl=$id'>Editar</a>");
                                    echo "</td> <td>";
                                    echo("<a class='editar' href='delete.php?idUtl=$id'>Apagar</a>");
                                    echo "</td> </tr> "; 
                                $count++;
                            }
                            } else {
                                $code = $conn->errno; 
                                $message = $conn->error; 
                                printf("<p>Query error: %d %s</p>", $code, $message);
                            } 
                        ?>
                        </table>
                        <input type="button" class="Novouser" onclick="location.href='insertUser.php'" value="Novo utilizador">
                    </div>
                <input class="fechar btn_utilizadores_up" type="button" value="Fechar Tabela">
                </div>
            <h2 id="receitas"> Receitas </h2>
                <input class="abrir btn_receitas_down" type="button" value="Abrir Tabela">
                <div style = "display:none" class="tabel_receitas">
                    <div class="container">
                    <table class="ti">
                        <tr>
                            <th> Cozinheiro </th>
                            <th> Titulo </th>
                            <th> Descrição </th>
                            <th> Ingredientes </th>
                            <th> Grau de dif.</th>
                            <th> Categoria </th>
                            <th> Época </th>
                            <th> Classificação </th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
                            $query = "SELECT * from receitas";
                            $result_set = $conn->query($query);
                            if ($result_set) { 
                                while ($row = $result_set->fetch_assoc()) {
                                    $IDReceita=$row['IDReceita'];
                                    echo "<tr> 
                                        <td>" .$row['cozinheiro']. "</td> 
                                        <td>" . $row['titulo']. " </td> 
                                        <td class='descricao'>" . $row['descricao']. " </td> 
                                        <td>" . $row['ingredientes']. " </td> 
                                        <td>" . $row['grau_dificuldade']. " </td> 
                                        <td>" . $row['categoria']. " </td> 
                                        <td>" . $row['epoca']. " </td> 
                                        <td>" . $row['classificacao']. "</td> <td> ";
                                    echo ("<a class='editar' href='editreceita.php?id=$IDReceita'>Editar</a>");
                                    echo "</td><td>";
                                    echo ("<a class='editar' href='deletereceita.php?id=$IDReceita'>Apagar</a>");
                                    echo "</td></tr>";    
                                } 
                            } else {
                                $code = $conn->errno; 
                                $message = $conn->error; 
                                printf("<p>Query error: %d %s</p>", $code, $message);
                            }
                        ?>
                    </table>
                        <input type="button" class="Novouser" onclick="location.href='criarreceita.php'" value="Nova Receita">
                    </div>
                <input class="fechar btn_receitas_up" type="button" value="Fechar Tabela">
                </div>
            <h2 id="noticias"> Noticias </h2>
                <input class="abrir btn_noticias_down" type="button" value="Abrir Tabela">
                <div style = "display:none" class="tabel_noticias">
                    <div class="container">
                    <table class="ti">
                        <tr>
                            <th> ID </th>
                            <th> Título </th>
                            <th> Fotos </th>
                            <th> Descrição </th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
                            $query = "select * from noticias";
                            $result_set = $conn->query($query);
                            if ($result_set) { 
                                while ($row = $result_set->fetch_assoc()) {
                
                                    $IDNoticia=$row['IDNoticia'];
                                    echo "<tr> 
                                            <td>" .$row['titulo']. "</td> 
                                            
                                            <td>" .$row['fotos']. "<td>";
                                    echo("<a class='editar' href='editNoticias.php?id=$IDNoticia'>Editar</a>");
                                    echo "</td> <td>";
                                    echo("<a class='editar' href='deletenoticia.php?id=$IDNoticia'>Apagar</a>");
                                    echo "</td> </tr> ";
                                    
                                }
                            } else {
                                $code = $conn->errno; // error code of the most recent operation
                                $message = $conn->error; // error message of the most recent op.
                                printf("<p>Query error: %d %s</p>", $code, $message);
                            }   
                        ?>
                    </table>
                        <input type="button" class="Novouser" onclick="location.href='nova_noticia.php'" value="Nova Noticia">
                    </div>
                <input class="fechar btn_noticias_up" type="button" value="Fechar Tabela">
                </div>
            <h2 id="eventos"> Eventos </h2>
                <input class="abrir btn_eventos_down" type="button" value="Abrir Tabela">
                <div style = "display:none" class="tabel_eventos">
                    <div class="container">
                    <table class="ti">
                        <tr>
                            <th> Cozinheiro </th>
                            <th> Titulo </th>
                            <th> Descrição </th>
                            <th> Ingredientes </th>
                            <th> Grau de dif.</th>
                            <th> Categoria </th>
                            <th> Época </th>
                            <th> Classificação </th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
                            $query = "SELECT * from eventos";
                            $result_set = $conn->query($query);
                            if ($result_set) { 
                                while ($row = $result_set->fetch_assoc()) {
                                    echo "<tr> 
                                        <td>" .$row['cozinheiro']. "</td> 
                                        <td>" . $row['titulo']. " </td> 
                                        <td class='descricao'>" . $row['descricao']. " </td> 
                                        <td>" . $row['ingredientes']. " </td> 
                                        <td>" . $row['grau_dificuldade']. " </td> 
                                        <td>" . $row['categoria']. " </td> 
                                        <td>" . $row['epoca']. " </td> 
                                        <td>" . $row['classificacao']. "</td> <td> ";
                                    echo ("<a class='editar' href='editUser.php?email=$email'>Editar</a>");
                                    echo "</td><td>";
                                    echo ("<a class='editar' href='delete.php?email=$email'>Apagar</a>");
                                    echo "</td></tr>";
                            
                                } 
                            } else {
                                $code = $conn->errno; 
                                $message = $conn->error; 
                                printf("<p>Query error: %d %s</p>", $code, $message);
                            }
                        ?>

                    </table>
                        <input type="button" class="Novouser" onclick="location.href='insertUser.php'" value="Novo utilizador">
                    </div>
                <input class="fechar btn_eventos_up" type="button" value="Fechar Tabela">
                </div>
            <h2 id="disem"> Dicas_semanais </h2>
                <input class="abrir btn_dicsem_down" type="button" value="Abrir Tabela">
                <div style = "display:none" class="tabel_dicsem">
                    <div class="container">
                    <table class="ti">
                        <tr>
                            <th> Cozinheiro </th>
                            <th> Titulo </th>
                            <th> Descrição </th>
                            <th> Ingredientes </th>
                            <th> Grau de dif.</th>
                            <th> Categoria </th>
                            <th> Época </th>
                            <th> Classificação </th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
                            $query = "SELECT * from dicas_semanais";
                            $result_set = $conn->query($query);
                            if ($result_set) { 
                                while ($row = $result_set->fetch_assoc()) {
                                    echo "<tr> 
                                        <td>" .$row['cozinheiro']. "</td> 
                                        <td>" . $row['titulo']. " </td> 
                                        <td class='descricao'>" . $row['descricao']. " </td> 
                                        <td>" . $row['ingredientes']. " </td> 
                                        <td>" . $row['grau_dificuldade']. " </td> 
                                        <td>" . $row['categoria']. " </td> 
                                        <td>" . $row['epoca']. " </td> 
                                        <td>" . $row['classificacao']. "</td> <td> ";
                                    echo ("<a class='editar' href='editUser.php?email=$email'>Editar</a>");
                                    echo "</td><td>";
                                    echo ("<a class='editar' href='delete.php?email=$email'>Apagar</a>");
                                    echo "</td></tr>";
                                
                                } 
                            } else {
                                $code = $conn->errno; 
                                $message = $conn->error; 
                                printf("<p>Query error: %d %s</p>", $code, $message);
                            }
                        ?>

                    </table>
                        <input type="button" class="Novouser" onclick="location.href='insertUser.php'" value="Novo utilizador">
                    </div>
                <input class="fechar btn_dicsem_up" type="button" value="Fechar Tabela">
                </div>
            <h2 id="livros"> Livros </h2>
                <input class="abrir btn_livros_down" type="button" value="Abrir Tabela">
                <div style = "display:none" class="tabel_livros">
                    <div class="container">
                    <table class="ti">
                        <tr>
                            <th> Id Livro </th>
                            <th> Titulo </th>
                            <th> Fotografia </th>
                            <th> Descrição </th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
                           $query = "SELECT * from livros";
                            $result_set = $conn->query($query);
                            if ($result_set) { 
                                while ($row = $result_set->fetch_assoc()) {
                                    echo "<tr> 
                                        <td>" .$row['IDLivro']. "</td> 
                                        <td>" . $row['titulo']. " </td> 
                                        <td>" . $row['foto']. " </td> 
                                        <td class='descricao'>" . $row['descricao']. " </td> <td> ";
                                    echo ("<a class='editar' href='editUser.php?email=$email'>Editar</a>");
                                    echo "</td><td>";
                                    echo ("<a class='editar' href='delete.php?email=$email'>Apagar</a>");
                                    echo "</td></tr>";

                                } 
                            } else {
                                $code = $conn->errno; 
                                $message = $conn->error; 
                                printf("<p>Query error: %d %s</p>", $code, $message);
                            }
                        ?>

                    </table>
                        <input type="button" class="Novouser" onclick="location.href='insertUser.php'" value="Novo utilizador">
                    </div>
                <input class="fechar btn_livros_up" type="button" value="Fechar Tabela">
                </div>
        </div>

    </section>

    <?php
        if (isset($_SESSION['errors'])) {
            echo "<div>Errors:";
            foreach ($_SESSION['errors'] as $field => $error)
            echo "<p>$field: $error</p>";
            echo "</div>";
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
    <script>
      $(".menu-toggle-btn").click(function(){
        $(this).toggleClass("fa-times");
        $(".navigation-menu").toggleClass("active");
      });
      window.addEventListener("scroll", function(){
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0)
        })



        $(document).ready(function(){
            /* Tabela utilizadores */
            $(".btn_utilizadores_up").click(function(){
                $("div.tabel_util").slideUp();
            });
            $(".btn_utilizadores_down").click(function(){
                $("div.tabel_util").slideDown();
            });

            /* Tabela Receitas */
            $(".btn_receitas_up").click(function(){
                $("div.tabel_receitas").slideUp();
            });
            $(".btn_receitas_down").click(function(){
                $("div.tabel_receitas").slideDown();
            });

            /* Tabela Noticias */
            $(".btn_noticias_up").click(function(){
                $("div.tabel_noticias").slideUp();
            });
            $(".btn_noticias_down").click(function(){
                $("div.tabel_noticias").slideDown();
            });

            /* Tabela Eventos */
            $(".btn_eventos_up").click(function(){
                $("div.tabel_eventos").slideUp();
            });
            $(".btn_eventos_down").click(function(){
                $("div.tabel_eventos").slideDown();
            });

            /* Tabela Dicas Semanais */
            $(".btn_dicsem_up").click(function(){
                $("div.tabel_dicsem").slideUp();
            });
            $(".btn_dicsem_down").click(function(){
                $("div.tabel_dicsem").slideDown();
            });
            
            /* Tabela livros */
            $(".btn_livros_up").click(function(){
                $("div.tabel_livros").slideUp();
            });
            $(".btn_livros_down").click(function(){
                $("div.tabel_livros").slideDown();
            });
        });
    </script>
    <script src="../JS/script.js"></script>
</body>
</html>