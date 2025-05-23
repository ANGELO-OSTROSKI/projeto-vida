<?php
require_once 'config/Database.php';
require_once 'controllers/MusicController.php';


$controller = new MusicController($pdo);

$musicas = $controller->listarMusicas();
$suasmusicas = $controller->listarMusicasPorUserId($_COOKIE['user_id']);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>projeto de vida angelo - Página Inicial</title>
    <link rel="stylesheet" href="css/estileira.css">
</head>
<body>
  
    <header>
        <div class="logo">
            <img src="IMG\ChatGPT_Image_11_de_abr._de_2025__13_55_31-removebg-preview.png" height="170" width="245px"alt="Ispotify" >
            
            <a href="index.php?action=home">
            </a>
        </div>
        <nav>
            <ul>
                <li> <a href="index.php?action=quiz"><img src="IMG\QUIZ.png" alt="" height="58" width="58"></a></li>
                <li> <a href="index.php?action=perfil"><img src="IMG\stickman.png" alt="" height="58" width="58"></a></li>
                <li> <a href="index.php?action=pernil"><img src="IMG\user.png" alt="" height="58" width="58"></a></li>
                <li> <a href="index.php?action=logout"><img src="IMG\saida.png" alt="" height="58" width="58"></a></li>
            </ul>    
        </nav>
    </header>
    <div class="d">
    <h1 class="petro">SOBRE MIM </h1>
    <H2 class="H2"></H2>
    <div class="nova-container-grid">
        <div class="nova-featured-box">
            <img src="IMG/angelo efamilia.jpg" alt="">
        </div>
        <div class="nova-side-boxes">
            <div class="nova-text-box"> <h2>METAS :ﾠﾠ<img src="IMG/natacao.png" alt="" height="38" width="38">ﾠ <img src="IMG/ciclismo.png" alt="" height="38" width="38">ﾠ<img src="IMG/correndo.png" alt="" height="40" width="40"></h2> </div>
            <div class="nova-text-box">  <a href="index.php?action=triatlon" class="textor"><h2> Triatlon/Ironman</h2></a></div>
            <div class="nova-text-box"> <a href="index.php?action=faculdade" class="textor"><h2>Faculdade</h2></a></div>
            <div class="nova-text-box"> <a href="index.php?action=vida_exterior" class="textor"><h2>Vida no exterior</h2></a></div>
        </div>
    </div>
</div>

    <p class="rodape-direitos">Copyright © 2025 – Todos os Direitos Reservados.</p>
</footer>
    
    
</body> 
</html>