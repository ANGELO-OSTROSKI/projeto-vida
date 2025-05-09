<?php
require_once 'config/Database.php';



// Busca os dados atualizados do usuário
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id_user = ?");
$stmt->execute([$_COOKIE["user_id"]]);
$usuario = $stmt->fetch();

$stmt = $pdo->prepare("SELECT * FROM artigos WHERE id_user = ?");
$stmt->execute([$_COOKIE["user_id"]]);
$artigo = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Meu Perfil</title>
    <link rel="stylesheet" href="css/estileira.css">
</head>
<body>
<header>
    <div class="pernillogo">
        <img src="IMG/ChatGPT_Image_11_de_abr._de_2025__13_55_31-removebg-preview.png" height="170" width="245px" alt="Ispotify">
        <a href="index.php?action=home"></a>
    </div>
    <nav>
        <ul>
            <li><a href="index.php?action=perfil"><img src="IMG/QUIZ.png" alt="" height="58" width="58"></a></li>
            <li><a href="index.php?action=perfil"><img src="IMG/stickman.png" alt="" height="58" width="58"></a></li>
            <li><a href="index.php?action=pernil"><img src="IMG/profile.png" alt="" height="58" width="58"></a></li>
            <li><a href="index.php?action=logout"><img src="IMG/saida.png" alt="" height="58" width="58"></a></li>
        </ul>    
    </nav>
</header>

<div class="pernillogin-container6">
    <h1>Meu Perfil</h1>
    <form action="views/update_profile.php" method="post" enctype="multipart/form-data">
        <img src="<?php echo htmlspecialchars($usuario['foto_perfil']); ?>" width="150" height="150" alt="Foto de perfil"><br><br>
        
        <label>Trocar foto:</label><br>
        <input type="file" name="foto_perfil"><br><br>

        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?php echo htmlspecialchars($artigo['nome']); ?>"><br><br>

        <label>Sobre Mim:</label><br>
        <textarea name="sobre_mim"><?php echo htmlspecialchars($artigo['sobre_mim']); ?></textarea><br><br>

        <button type="submit">Salvar alterações</button>
    </form>
</div>
</body>
</html>