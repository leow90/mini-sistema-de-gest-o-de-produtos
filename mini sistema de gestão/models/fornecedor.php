php
<?php
class Fornecedor {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function cadastrar($nome) {
        $sql = "INSERT INTO fornecedores (nome) VALUES (:nome)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':nome' => $nome]);
    }

    public function listar() {
        $sql = "SELECT * FROM fornecedores";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
}
?>
```