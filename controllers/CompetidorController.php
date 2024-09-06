<?php
require_once 'models/CompetidorModel.php';

class CompetidorController {
    private $competidorModel;

    public function __construct($pdo) {
        $this->competidorModel = new CompetidorModel($pdo);
    }

    public function criarCompetidor($nome, $idade, $peso, $altura, $genero, $cpf, $rg, $equipe) {
        $this->competidorModel->criarCompetidor($nome, $idade, $peso, $altura, $genero, $cpf, $rg, $equipe);
    }

    public function listarCompetidor() {
        return $this->competidorModel->listarCompetidor();
    }

    public function exibirListaCompetidor() {
        $competidores = $this->competidorModel->listarCompetidor();
        include 'views/competidores/lista.php';
    }

    public function excluirCompetidor($id) {
        $this->competidorModel->excluirCompetidor($id);
    }

    public function atualizarCompetidor($id, $nome, $idade, $peso, $altura, $genero, $cpf, $rg, $equipe) {
        $this->competidorModel->atualizarCompetidor($id, $nome, $idade, $peso, $altura, $genero, $cpf, $rg, $equipe);
    }
}
?>
