<?php
require_once 'config/Database.php';
require_once 'controllers/MusicController.php';

$controller = new MusicController($pdo);

$musicas = $controller->listarMusicasPorUserId($_COOKIE['user_id']);


if(isset($_POST["operacao"])){
    if($_POST['operacao'] == 'criar'){
        $controller->inserirmusica( $_POST["nome"], $_POST["assunto"], $_POST["assunto"],$_COOKIE['user_id']);
        header("Location: #");
    }
    if($_POST["operacao"] == 'delete'){
        $controller->deletarMusica($_POST['id_musica']);
        header("Location: #");
    }
    if($_POST["operacao"] == 'atualizar'){
        
        $controller->atualizarMusica($_POST['id_musica'],$_POST['nome'],$_POST["assunto"], $_POST["assunto"]);
        header("Location: #");
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estileira.css">
    <title>Spotify - Página Inicial</title>
</head>
<body>
  
<header>
        <div class="logo">
            <img src="IMG\ChatGPT Image 11 de abr. de 2025, 13_55_31.png" alt="Ispotify"  height="170" width="245px" >
        </div>


        <nav>
            <ul>
            <li> <a href="index.php?action=home"><img src="IMG\voltar.png" alt="" height="58" width="58"></a></li>
            <li> <a href="index.php?action=home"><img src="IMG\stickman.png" alt="" height="58" width="58"></a></li>
            <li> <a href="index.php?action=logout"><img src="IMG\saida.png" alt="" height="58" width="58"></a></li>
            </ul>    
        </nav>
    </header>
    <div class="login-container">   
        <div class="login-box2">
            <h2>SOBRE VOCÊ</h2>
    <form method="POST">
      <input  name="nome" placeholder="nome">
      <input  name="duracao" placeholder="genero">
      <input  name="genero" placeholder="sexo">
      <input name="operacao" type="hidden" value="criar">
      <button class="login-btn" type="submit">Criar artigo</button>
    </form> 
    
</div>
</div>
</body>
</html>
