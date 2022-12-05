<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../CSS/materialize.min.css"  media="screen,projection"/>
</head>
<body>
<form action="insert_receita.php" method="POST" enctype="multipart/form-data">
  <div class="container">
    <div class="row">
        <div class="input-field col s6">
          <input id="titulo" type="text" class="validate" name="titulo">
          <label class="active" for="titulo">Titulo Receita</label>
        </div>
        <div class="input-field col s6">
          <input id="cozinheiro" type="text" class="validate" name="cozinheiro">
          <label class="active" for="cozinheiro">Cozinheiro</label>
        </div>
        <div class="input-field col s12">
            <textarea id="textarea" class="materialize-textarea" data-length="500" name="descricao"></textarea>
            <label for="textarea">Descrição</label>
        </div>
        <div class="input-field col s12">
            <textarea id="ingredientes" class="materialize-textarea" data-length="200" name="ingredientes"></textarea>
            <label for="ingredientes">Ingredientes</label>
        </div>
        <div class="input-field col s3">
            <select name="categoria">
              <option value="" disabled selected>Escolher categoria</option>
              <option value="Sopa">Sopa</option>
              <option value="Carne">Carne</option>
              <option value="Peixe">Peixe</option>
              <option value="Vegan">Vegan</option>
              <option value="Sobremesa">Sobremesa</option>
              <option value="Bolo">Bolo</option>
              <option value="Outra">Outra</option>
            </select>
            <label>Categoria</label>
          </div>
        <div class="input-field col s3">
            <input type="text" class="timepicker" name="tempo_preparacao">
            <label for="hora">Tempo de Preparação</label>
        </div>
          <div class="input-field col s3">
            <select name="grau_dificuldade">
              <option value="" disabled selected>Escolher dificuldade</option>
              <option value="Facil">Fácil</option>
              <option value="Medio">Médio</option>
              <option value="Dificil">Difícil</option>
            </select>
            <label>Grau de Dificuldade</label>
          </div>
          <div class="input-field col s3">
            <p class="range-field">
            <label>Nº de Doses</label>
                <input type="range" id="test5" min="0" max="30" value="0" name="doses"/>
            </p>
        </div>
          <div class="input-field col s4">
            <textarea id="textarea2" class="materialize-textarea" data-length="200" name="epoca"></textarea>
            <label for="textarea2">Época</label>
        </div>
          <div class="input-field col s12">
            <div class="file-field input-field">
                <div class="btn">
                    <span>Foto</span>
                    <input type="file" name="fotos" multiple>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Insira a foto da receita" name="fotos">
                </div>
            </div>
          </div>
          <div class="input-field col s12">
          <button class="btn waves-effect waves-light" type="submit" name="post">Inserir receita
          <i class="material-icons right">send</i>
        </button>
          </div>
        </div>
      </div>
      </div>
    </form>
      <script type="text/javascript" src="../JS/materialize.min.js"></script>
      <script src="../JS/scriptmaterialize.js"></script>
</body>
</html>