<?php
session_start();
include_once 'controllers/UserController.php';
include_once 'config/Database.php';

$action = $_GET['action'] ?? '';

$controller = new UserController($pdo);

switch ($action) {
    case 'register':
        if (!empty($_POST)) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            
            if ($controller->register($nome, $email, $senha)) {
                header("Location: index.php?action=login");
            } else {
                echo "Erro ao cadastrar usuário.";
            }
        } else {
            include 'views/register.php';
        }
        break;

    case 'login':

        if (!empty($_POST)) {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            if ($controller->login($email, $senha)) {
                header("Location: index.php?action=home");
            } else {
                echo "Login ou senha inválidos.";
            }
        } else {
            include 'views/login.php';
        }
        break;

    case 'redefinirsenha':
        if (isset($_COOKIE['user_id'])) {
            include 'views/redefinirsenha.php';
        } else {
            header("Location: index.php?action=redefinirsenha");
        }
        break;

    case 'home':
        if (isset($_COOKIE['user_id'])) {
            include 'views/home.php';
        } else {
            header("Location: index.php?action=login");
        }
        break;
    case 'triatlon':
        if (isset($_COOKIE['user_id'])) {
            include 'views/triatlon.php';
        } else {
            header("Location: index.php?action=triatlon");
        }
        break;
    case 'faculdade':
        if (isset($_COOKIE['user_id'])) {
            include 'views/faculdade.php';
        } else {
            header("Location: index.php?action=faculdade");
        }
        break;
    case 'vida_exterior':
        if (isset($_COOKIE['user_id'])) {
            include 'views/vida_exterior.php';
        } else {
            header("Location: index.php?action=vida_exterior");
        }
        break;
        case 'pernil':
            if (isset($_COOKIE['user_id'])) {
                include 'views/pernil.php';
            } else {
                header("Location: index.php?action=pernil");
            }
            break;
    case 'logout':
        session_destroy();
        header("Location: index.php?action=login");
        break;
    case 'perfil':
        if (isset($_COOKIE['user_id'])) {
            include 'views/perfil.php';
        } else {
            header("Location: index.php?action=perfil");
        }
        break;
    case 'quiz':
        if (isset($_COOKIE['user_id'])) {
            include 'views/quiz.php';
        } else {
            header("Location: index.php?action=quiz");
        }
        break;
    default:
        header("Location: index.php?action=login");
        break;
}
?>

