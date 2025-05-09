<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - ecp-saberes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="main">
    
    
            <div class="login-container6">
                
                <div class="login-box">
                    <h2>CADASTRE-SE AGORA MESMO</h2>
            <form action="index.php?action=register" method="post">
                <input type="text" name="nome" placeholder="nome de usuario" required>
                <input type="text" name="email" placeholder="email" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <button type="submit" class="login-btn">Entrar</button>
                <?php
                    if(!empty($_POST)){
                        echo "errou a senha!!!!! tem que ser igual!!";
                    }
                ?>
                <p class="signup-text">ja tem uma conta? <a href="index.php?action=login">fazer login</a>.</p>
            </form>
            </div>
            </div>
</html>
