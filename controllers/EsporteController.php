<?php
require_once 'models/EsporteModel.php';


class EsporteController {
    private $esporteModel;

    public function __construct($pdo) {
        $this->esporteModel = new EsporteModel($pdo);
    }

    public function criarEsporte($modalidade, $ano_olimpiada) {
        $this->esporteModel->criarEsporte($modalidade, $ano_olimpiada);
    }

    public function listarEsportes() {
        return $this->esporteModel->listarEsportes();
    }

    public function exibirListaEsportes() {
        $esportes = $this->esporteModel->listarEsportes();
        include 'views/esportes/lista.php';
    }


    public function excluirEsporte($id_esporte) {
        $this->esporteModel->excluirEsporte($id_esporte);
    }

    public function atualizarEsporte($id_esporte, $modalidade, $ano_olimpiada) {
        $this->esporteModel->atualizarEsporte
        ($id_esporte, $modalidade, $ano_olimpiada);
    }

}
    
?>

