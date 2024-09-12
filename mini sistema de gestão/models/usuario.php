php
<?php
class Usuario {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function cadastrar($nome, $email, $senha) {
        $hashSenha = hash('sha256', $senha);
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':nome' => $nome, ':email' => $email, ':senha' => $hashSenha]);
    }

    public function login($email, $senha) {
        $hashSenha = hash('sha256', $senha);
        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':email' => $email, ':senha' => $hashSenha]);

        return $stmt->fetch();
    }
}
?>