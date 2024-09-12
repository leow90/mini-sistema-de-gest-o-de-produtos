php
<?php
class Cesta {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function adicionarProduto($usuario_id, $produto_id) {
        $sql = "INSERT INTO cestas (usuario_id, produto_id) VALUES (:usuario_id, :produto_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':usuario_id' => $usuario_id, ':produto_id' => $produto_id]);
    }

    public function listarCesta($usuario_id) {
        $sql = "SELECT p.nome, p.preco FROM cestas c 
                JOIN produtos p ON c.produto_id = p.id 
                WHERE c.usuario_id = :usuario_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':usuario_id' => $usuario_id]);
        return $stmt->fetchAll();
    }

    public function calcularTotal($usuario_id) {
        $sql = "SELECT SUM(p.preco) AS total FROM cestas c 
                JOIN produtos p ON c.produto_id = p.id 
                WHERE c.usuario_id = :usuario_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':usuario_id' => $usuario_id]);
        return $stmt->fetch()['total'];
    }
}
?>