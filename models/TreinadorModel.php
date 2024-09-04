<?php
class TreinadorModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarTreinador($nome, $idade, $nacionalidade) {
        $sql = "INSERT INTO treinador (nome, idade, nacionalidade) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $idade, $nacionalidade]);
    }

    public function listarTreinador() {
        $sql = "SELECT * FROM treinador";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Implementar métodos para atualizar e excluir esportes
    public function excluirTreinador($id_treinador) {
        $sql = "DELETE FROM treinador WHERE id_treinador = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_treinador]);
    }
    public function atualizarTreinador($id_treinador, $nome, $idade, $nacionalidade) {
        $sql = "UPDATE treinador SET nome = ?, idade = ?, nacionalidade = ? WHERE id_treinador = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $idade, $nacionalidade, $id_treinador]);
}
}
?>