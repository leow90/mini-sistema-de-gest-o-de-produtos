php
<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=mini_gestao_produtos', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erro ao conectar: ' . $e->getMessage());
}
?>