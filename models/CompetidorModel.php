<?php
class CompetidorModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarCompetidor($nome, $idade, $peso, $altura, $sexo, $cpf, $rg, $equipe) {
        $sql = "INSERT INTO competidor (nome, idade, peso, altura, sexo, cpf, rg, equipe) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $idade, $peso, $altura, $sexo, $cpf, $rg, $equipe]);
    }

    public function listarCompetidor() {
        $sql = "SELECT * FROM competidor";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function excluirCompetidor($id_competidor) {
        $sql = "DELETE FROM competidor WHERE id_competidor = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_competidor]);
    }

    public function atualizarCompetidor($id_competidor, $nome, $idade, $peso, $altura, $sexo, $cpf, $rg, $equipe) {
        $sql = "UPDATE competidor SET nome = ?, idade = ?, peso = ?, altura = ?, sexo = ?, cpf = ?, rg = ?, equipe = ? WHERE id_competidor = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $idade, $peso, $altura, $sexo, $cpf, $rg, $equipe, $id_competidor]);
    }
}
?>
