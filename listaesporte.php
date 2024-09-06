<?php
require_once 'config/config.php';
require_once 'controllers/EsporteController.php';
?>
<?php
$controller = new EsporteController($pdo);

$controller->exibirListaEsportes();
?>
<a href="register-e.php">Registrar Novo?</a>