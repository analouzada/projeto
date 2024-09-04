<?php
require_once 'models/CompetidorModel.php';


class CompetidorController {
    private $competidorModel;

    public function __construct($pdo) {
        $this->competidorModel = new CompetidorModel($pdo);
    }

    public function criarCompetidor($nome, $idade, $peso, $altura, $nacionalidade) {
        $this->competidorModel->criarCompetidor($nome, $idade, $peso, $altura, $nacionalidade);
    }

    public function listarCompetidor() {
        return $this->competidorModel->listarCompetidor();
    }

    public function exibirListaCompetidor() {
        $competidores = $this->competidorModel->listarCompetidor();
        include 'views/competidores/lista.php';
    }

    public function excluirCompetidor($id_competidor) {
        $this->competidorModel->excluirCompetidor($id_competidor);
    }

    public function atualizarCompetidor($id_competidor, $nome, $idade, $peso, $altura, $nacionalidade) {
        $this->competidorModel->atualizarcompetidor
        ($id_competidor, $nome, $idade, $peso, $altura, $nacionalidade);
    }
}

    
?>

