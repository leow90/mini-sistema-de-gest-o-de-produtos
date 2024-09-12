php
<?php
class Produto {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function cadastrar($nome, $descricao, $preco, $fornecedor_id) {
        $sql = "INSERT INTO produtos (nome, descricao, preco, fornecedor_id) VALUES (:nome, :descricao, :preco, :fornecedor_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':nome' => $nome, ':descricao' => $descricao, ':preco' => $preco, ':fornecedor_id' => $fornecedor_id]);
    }

    public function listar() {
        $sql = "SELECT * FROM produtos";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
}
?>
```
