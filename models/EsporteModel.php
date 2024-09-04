<?php
class EsporteModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarEsporte($modalidade, $ano_olimpiada) {
        $sql = "INSERT INTO esporte (modalidade, ano_olimpiada) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$modalidade, $ano_olimpiada]);
    }

    public function listarEsportes() {
        $sql = "SELECT * FROM esporte";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Implementar métodos para atualizar e excluir esportes
    public function excluirEsporte($id_esporte) {
        $sql = "DELETE FROM esporte WHERE id_esporte = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_esporte]);
    }
    public function atualizarEsporte($id_esporte, $modalidade, $ano_olimpiada) {
        $sql = "UPDATE esporte SET modalidade = ?, ano_olimpiada = ? WHERE id_esporte = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$modalidade, $ano_olimpiada, $id_esporte]);
}
}
?>