<?php

$Controller = new UserController($pdo);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $new_password = password_hash( $_POST['new_password'], PASSWORD_DEFAULT);

    // Verificar se o e-mail e senha atual estão corretos
    $stmt = $pdo->prepare("SELECT id_user FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $stmt = $pdo->prepare("UPDATE usuarios SET senha = ? WHERE id_user = ?");
        $stmt->execute([$new_password, $user['id_user']]);
        echo "<p>Senha alterada com sucesso.</p>";
        header("Location: index.php");
    } else {
        echo "<p>E-mail não encontrado.</p>";
    }
}    
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Senha</title>
    <link rel="stylesheet" href="css/style3.css">
</head>

<body>
    
    <form method="POST">
        <h2>Alterar Senha</h2>
        <label for="email">E-mail cadastrado:</label>
        <input type="email" id="email" name="email" required>

        <label for="new_password">Nova Senha:</label>
        <input type="password" id="new_password" name="new_password" required>

        <button type="submit">Alterar Senha</button>
    </form>
</body>

</html>