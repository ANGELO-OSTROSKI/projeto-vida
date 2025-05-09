<?php
require_once 'config/Database.php';
require_once 'controllers/MusicController.php';

$controller = new MusicController($pdo);

$musicas = $controller->listarMusicasPorUserId($_COOKIE['user_id']);


if(isset($_POST["operacao"])){
    if($_POST['operacao'] == 'criar'){
        $controller->inserirmusica( $_POST["nome"], $_POST["texto"], $_POST["assunto"],$_COOKIE['user_id']);
        header("Location: #");
    }
    if($_POST["operacao"] == 'delete'){
        $controller->deletarMusica($_POST['id_musica']);
        header("Location: #");
    }
    if($_POST["operacao"] == 'atualizar'){
        
        $controller->atualizarMusica($_POST['id_musica'],$_POST['nome'],$_POST["texto"], $_POST["assunto"]);
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
    <form method="POST">
  <h2>Quem Sou Eu?</h2>

  <!-- Dados Pessoais -->
  <h3>Dados Pessoais</h3>
<input name="nome" placeholder="Nome">
<textarea name="texto" placeholder="Digite o texto da música..."></textarea>
<input type="texto" name="assunto" placeholder="Digite o assunto da música">
<input name="idade" placeholder="Idade">
<input name="sexo" placeholder="Sexo">

  <!-- Fale sobre você -->
  <h3>Fale sobre você</h3>
  <textarea name="sobre_voce" placeholder="Fale um pouco sobre você..."></textarea>

  <!-- Minhas Lembranças -->
  <h3>Minhas Lembranças</h3>
  <textarea name="lembrancas" placeholder="Suas lembranças marcantes..."></textarea>

  <!-- Pontos Fortes e Fracos -->
  <h3>Pontos Fortes</h3>
  <input name="pontos_fortes" placeholder="Liste suas qualidades">
  <h3>Pontos Fracos</h3>
  <input name="pontos_fracos" placeholder="Liste suas dificuldades">

  <!-- Meus Valores -->
  <h3>Meus Valores</h3>
  <input name="valores" placeholder="Ex: Respeito, Honestidade, Amor...">

  <!-- Minhas Aptidões -->
  <h3>Minhas Principais Aptidões</h3>
  <select name="aptidoes[]" multiple>
    <option value="lideranca">Liderança</option>
    <option value="criatividade">Criatividade</option>
    <option value="resolucao_problemas">Resolução de Problemas</option>
    <option value="comunicacao">Comunicação</option>
    <!-- Adicione mais conforme necessário -->
  </select>

  <!-- Meus Relacionamentos -->
  <h3>Meus Relacionamentos</h3>
  <input name="familia" placeholder="Relação com a família">
  <input name="amigos" placeholder="Relação com os amigos">
  <input name="escola" placeholder="Relação com a escola">
  <input name="sociedade" placeholder="Relação com a sociedade">

  <!-- Meu Dia a Dia -->
  <h3>Meu Dia a Dia</h3>
  <input name="gostos" placeholder="O que gosto de fazer">
  <input name="nao_gostos" placeholder="O que não gosto de fazer">
  <input name="rotina" placeholder="Descreva sua rotina">
  <input name="lazer" placeholder="Atividades de lazer">
  <input name="estudos" placeholder="Como você estuda?">

  <!-- Minha Vida Escolar -->
  <h3>Minha Vida Escolar</h3>
  <textarea name="vida_escolar" placeholder="Fale sobre sua vida escolar..."></textarea>

  <!-- Minha Visão Sobre Mim -->
  <h3>Minha Visão Sobre Mim</h3>
  <input name="visao_fisica" placeholder="Visão sobre seu corpo físico">
  <input name="visao_intelectual" placeholder="Visão sobre sua mente">
  <input name="visao_emocional" placeholder="Visão sobre seus sentimentos">

  <!-- A Visão das Pessoas Sobre Mim -->
  <h3>A Visão das Pessoas Sobre Mim</h3>
  <input name="visao_amigos" placeholder="O que os amigos dizem">
  <input name="visao_familia" placeholder="O que a família diz">
  <input name="visao_professores" placeholder="O que os professores dizem">

  <!-- Autovalorização -->
  <h3>Autovalorização</h3>
  <p>Use escalas ou escolha múltipla via JS depois, aqui é só rascunho inicial</p>
  <input name="autoestima" placeholder="Autoestima de 1 a 10">
  <input name="autoconfianca" placeholder="Autoconfiança de 1 a 10">

  <h2>Módulo 2: Planejamento de Futuro</h2>

  <!-- Minhas Aspirações -->
  <h3>Minhas Aspirações</h3>
  <textarea name="aspiracoes" placeholder="O que você aspira para seu futuro?"></textarea>

  <!-- Meu Sonho de Infância -->
  <h3>Meu Sonho de Infância</h3>
  <textarea name="sonho_infancia" placeholder="O que você sonhava ser quando criança?"></textarea>

  <!-- Escolha Profissional -->
  <h3>Escolha Profissional</h3>
  <input name="profissao_desejada" placeholder="Digite a profissão que você deseja">

  <!-- Meus Sonhos Hoje -->
  <h3>Meus Sonhos Hoje</h3>
  <input name="sonho_1" placeholder="Sonho atual 1">
  <input name="faco_sonho_1" placeholder="O que já faço por ele?">
  <input name="preciso_sonho_1" placeholder="O que ainda preciso fazer?">

  <!-- Meus Principais Objetivos -->
  <h3>Meus Principais Objetivos</h3>
  <input name="objetivo_curto" placeholder="Objetivo para 1 ano">
  <input name="objetivo_medio" placeholder="Objetivo para 3 anos">
  <input name="objetivo_longo" placeholder="Objetivo para 7 anos">

  <!-- Visão de Futuro -->
  <h3>Como me imagino daqui 10 anos?</h3>
  <textarea name="visao_10_anos" placeholder="Descreva sua vida ideal daqui 10 anos..."></textarea>

  <!-- Botão de envio -->
  <input type="hidden" name="operacao" value="criar">
  <button class="login-btn" type="submit">Salvar Tudo</button>
</form>

    <?php

    




?>
    
</div>
</div>
</body>
</html>
