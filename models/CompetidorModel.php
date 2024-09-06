<?php
class CompetidorModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarCompetidor($nome, $idade, $peso, $altura, $genero, $cpf, $rg, $equipe) {
        $sql = "INSERT INTO competidor (nome, idade, peso, altura, genero, cpf, rg, equipe) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $idade, $peso, $altura, $genero, $cpf, $rg, $equipe]);
    }

    public function listarCompetidor() {
        $sql = "SELECT * FROM competidor";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function excluirCompetidor($id) {
        $sql = "DELETE FROM competidor WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function atualizarCompetidor($id, $nome, $idade, $peso, $altura, $genero, $cpf, $rg, $equipe) {
        $sql = "UPDATE competidor SET nome = ?, idade = ?, peso = ?, altura = ?, genero = ?, cpf = ?, rg = ?, equipe = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $idade, $peso, $altura, $genero, $cpf, $rg, $equipe, $id]);
    }
}
?>
