<?php
require_once 'config/Database.php';
require_once 'controllers/MusicController.php';

$controller = new MusicController($pdo);

$musicas = $controller->listarMusicas();
$suasmusicas = $controller->listarMusicasPorUserId($_COOKIE['user_id']);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triatlo Pro</title>
    <link rel="stylesheet" href="css/estileira.css"> <!-- usei o CSS do primeiro código -->
</head>
<body>
    <header>
        <div class="logo">
            <img src="IMG/ChatGPT_Image_11_de_abr._de_2025__13_55_31-removebg-preview.png" height="170" width="245px" alt="Ispotify">
            <a href="index.php?action=home"></a>
        </div>
        <nav>
            <ul>
                <li> <a href="index.php?action=home"><img src="IMG\voltar.png" alt="" height="58" width="58"></a></li>
                <li> <a href="index.php?action=home"><img src="IMG\stickman.png" alt="" height="58" width="58"></a></li>
                <li> <a href="index.php?action=logout"><img src="IMG\saida.png" alt="" height="58" width="58"></a></li>
            </ul>
        </nav>
    </header>

    <div class="d">
        <h1 class="petro">TRIATLO PRO</h1>
        <h2 class="H2">Desafie seus limites</h2>

        <div class="nova-container-grid">
            <div class="nova-featured-box">
                <img src="IMG/image.png" alt="Triatlo" height="640" width="580">
                <p class="text-coloreta"> TREINE PARA NADAR, PEDALAR E CORRER COMO UM CAMPEÃO.</p>
            </div>

            <div class="nova-side-boxes">
                <div class="nova-text-box">
                    <h2>MODALIDADES :ﾠﾠ
                        <img src="IMG/natacao.png" alt="" height="38" width="38">ﾠ
                        <img src="IMG/ciclismo.png" alt="" height="38" width="38">ﾠ
                        <img src="IMG/correndo.png" alt="" height="40" width="40">
                    </h2>
                </div>

                <div class="nova-text-box">
                    <h3>Natação</h3>
                    <p class="text-coloreta">A natação no triatlon é a primeira etapa da prova, geralmente realizada em águas abertas. Exige técnica, controle da respiração e estratégia para manter o ritmo sem se desgastar para as próximas fases.</p>
                </div>

                <div class="nova-text-box">                   
                    <h3>Ciclismo</h3>
                    <p class="text-coloreta">O ciclismo no triatlon é a segunda etapa e demanda resistência, foco e ritmo constante. É importante manter a postura correta e economizar energia para a corrida que vem em seguida..</p>
                </div>

                <div class="nova-text-box">
                    <h3>Corrida</h3>
                    <p class="text-coloreta">A corrida no triatlon é a etapa final e mais desafiadora. Requer controle físico e mental, já que o corpo já está cansado e o foco deve ser manter o ritmo até o fim..</p>
                </div>
            </div>
        </div>
    </div>

    <p class="rodape-direitos">Copyright © 2025 – Todos os Direitos Reservados.</p>
</body>
</html>
