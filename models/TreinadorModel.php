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

    public function excluirTreinador($id_treinador) {
        $sql = "DELETE FROM treinador WHERE id_treinador = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_treinador]);
    }

    public function atualizarTreinador($id_treinador, $nome, $idade, $altura, $peso, $cpf, $rg) {
        $sql = "UPDATE treinador SET nome = ?, idade = ?, altura = ?, peso = ?, cpf = ?, rg = ? WHERE id_treinador = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $idade, $altura, $peso, $cpf, $rg, $id_treinador]);
    }
}
?>
