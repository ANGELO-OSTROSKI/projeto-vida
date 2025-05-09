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
    <link rel="stylesheet" href="css/estileira.css">
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
        <h1 class="petro">VIVER NO EXTERIOR</h1>
        <h2 class="H2">Explore o mundo e cresça com ele</h2>

        <div class="nova-container-grid">
            <div class="nova-featured-box">
                <img src="IMG/viveer_esterior.jpg" alt="Viver no Exterior" height="700" width="580">
                <p class="text-coloreta">DESCUBRA O MUNDO, NOVAS CULTURAS E OPORTUNIDADES DE VIDA FORA DO PAÍS.</p>
            </div>

            <div class="nova-side-boxes">
                <div class="nova-text-box">
                    <h2>ASPECTOS :ﾠﾠ

                    </h2>
                </div>

                <div class="nova-text-box">
                    <h3>Idioma</h3>
                    <p class="text-coloreta">Aprender e se adaptar a um novo idioma é essencial para viver no exterior. Isso facilita o dia a dia, a comunicação e abre portas profissionais e sociais.</p>
                </div>

                <div class="nova-text-box">                   
                    <h3>Trabalho</h3>
                    <p class="text-coloreta">Trabalhar fora do país exige preparo e adaptação às leis e culturas profissionais locais. É uma ótima forma de crescimento pessoal e financeiro.</p>
                </div>

                <div class="nova-text-box">
                    <h3>Cultura</h3>
                    <p class="text-coloreta">Viver no exterior significa mergulhar em uma nova cultura. Aprender os costumes, tradições e estilos de vida locais é enriquecedor e transformador.</p>
                </div>
            </div>
        </div>
    </div>

    <p class="rodape-direitos">Copyright © 2025 – Todos os Direitos Reservados.</p>
</body>
</html>