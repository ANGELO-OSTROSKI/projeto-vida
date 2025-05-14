<?php
require_once '../config/Database.php';

// Verifica se o usuário está autenticado
if (!isset($_COOKIE['user_id'])) {
    header("Location: ../index.php?action=login");
    exit;
}

$userId = $_COOKIE['user_id'];
$nome = $_POST['nome'] ?? '';
$sobre_mim = $_POST['sobre_mim'] ?? '';
$fotoPath = null;

// Upload de foto, se houver
if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK) {
    $fotoTmp = $_FILES['foto_perfil']['tmp_name'];
    $fotoNome = basename($_FILES['foto_perfil']['name']);
    $extensao = strtolower(pathinfo($fotoNome, PATHINFO_EXTENSION));
    $novonome = uniqid() . "." . $extensao;
    $caminhoFinal = "uploads/" . $novonome;

    // Criar a pasta se não existir
    if (!is_dir('../uploads')) {
        mkdir('../uploads', 0777, true);
    }

    if (move_uploaded_file($fotoTmp, "../" . $caminhoFinal)) {
        $fotoPath = $caminhoFinal;
    }
}

// Atualiza os dados no banco de dados
if ($fotoPath) {
    
    $stmt = $pdo->prepare("UPDATE usuarios SET foto_perfil = ? WHERE id_user = ?");
    $stmt->execute([$fotoPath, $userId]);
    
} else {
    $stmt = $pdo->prepare("UPDATE artigos SET nome = ?, sobre_mim = ? WHERE id_user = ?");
    $stmt->execute([$nome, $sobre_mim, $userId]);
    
    $stmt = $pdo->prepare("SELECT * FROM artigos WHERE id_user = ?");
    $stmt->execute([$userId]);
    $artigo = $stmt->fetchAll();
    
    if(!empty($artigo)){
        $stmt = $pdo->prepare("UPDATE artigos SET nome = ?, sobre_mim = ? WHERE id_user = ?");
        $stmt->execute([$nome, $sobre_mim, $userId]);    
    }else{
        $stmt = $pdo->prepare("INSERT INTO artigos (nome, sobre_mim, id_user) VALUES (?,?,?)");
        $stmt->execute([$nome, $sobre_mim, $userId]);
    }
}

// Redireciona de volta ao perfil
header("Location: ../index.php?action=pernil");
exit;
?>
