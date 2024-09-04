<?php
class TreinadorModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarTreinador($nome, $idade, $altura, $peso, $cpf, $rg) {
        $sql = "INSERT INTO treinador (nome, idade, altura, peso, cpf, rg) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $idade, $altura, $peso, $cpf, $rg]);
    }

    public function listarTreinador() {
        $sql = "SELECT * FROM treinador";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function excluirTreinador($id) {
        $sql = "DELETE FROM treinador WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function atualizarTreinador($id, $nome, $idade, $altura, $peso, $cpf, $rg) {
        $sql = "UPDATE treinador SET nome = ?, idade = ?, altura = ?, peso = ?, cpf = ?, rg = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $idade, $altura, $peso, $cpf, $rg, $id]);
    }
}
?>
