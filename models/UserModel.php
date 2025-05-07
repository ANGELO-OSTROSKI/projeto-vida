<?php
class UserModel {
    private $pdo;
    private $table_name = "usuarios";

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Método para cadastrar um usuário
    public function cadastrar($nome,$email,$senha) {
        $query = "INSERT INTO " . $this->table_name . " (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($query);

        // Sanitiza os dados e criptografa a senha
        $nome = htmlspecialchars(strip_tags($nome));
        $email = htmlspecialchars(strip_tags($email));

        $stmt->execute([$nome,$email,$senha]);
        
    }

    public function acharEmail($email){
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function acharNome($nome){
        $query = "SELECT * FROM " . $this->table_name . " WHERE nome = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$nome]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    // Método para login de um usuário
    public function login($email,$senha) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$email]);

        $useremail = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($useremail && $useremail['senha'] == $senha) {
            return $useremail;
        }

        $query = "SELECT * FROM " . $this->table_name . " WHERE nome = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$email]);

        $usernome = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($usernome && $usernome['senha'] == $senha) {
            return $usernome;
        }
        return false;
    }
}
?>
