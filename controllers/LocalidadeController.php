<?php
require_once 'models/LocalidadeModel.php';

class LocalidadeController {
    private $localidadeModel;

    public function __construct($pdo) {
        $this->localidadeModel = new LocalidadeModel($pdo);
    }

    public function criarLocalidade($rua, $bairro, $numero, $cep, $cidade, $estado, $pais) {
        $this->localidadeModel->criarLocalidade($rua, $bairro, $numero, $cep, $cidade, $estado, $pais);
    }

    public function listarLocalidade() {
        return $this->localidadeModel->listarLocalidade();
    }

    public function exibirListaLocalidade() {
        $localidades = $this->localidadeModel->listarLocalidade();
        include 'views/localidade/lista.php';
    }

    public function excluirLocalidade($id) {
        $this->localidadeModel->excluirLocalidade($id);
    }

    public function atualizarLocalidade($id, $rua, $bairro, $numero, $cep, $cidade, $estado, $pais) {
        $this->localidadeModel->atualizarLocalidade($id, $rua, $bairro, $numero, $cep, $cidade, $estado, $pais);
    }
}
?>
