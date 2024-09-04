<?php
require_once 'models/TreinadorModel.php';

class TreinadorController {
    private $treinadorModel;

    public function __construct($pdo) {
        $this->treinadorModel = new TreinadorModel($pdo);
    }

    public function criarTreinador($nome, $idade, $altura, $peso, $cpf, $rg) {
        $this->treinadorModel->criarTreinador($nome, $idade, $altura, $peso, $cpf, $rg);
    }

    public function listarTreinador() {
        return $this->treinadorModel->listarTreinador();
    }

    public function exibirListaTreinador() {
        $treinadores = $this->treinadorModel->listarTreinador();
        include 'views/treinadores/lista.php';
    }

    public function excluirTreinador($id_treinador) {
        $this->treinadorModel->excluirTreinador($id_treinador);
    }

    public function atualizarTreinador($id_treinador, $nome, $idade, $altura, $peso, $cpf, $rg) {
        $this->treinadorModel->atualizarTreinador($id_treinador, $nome, $idade, $altura, $peso, $cpf, $rg);
    }
}
?>
